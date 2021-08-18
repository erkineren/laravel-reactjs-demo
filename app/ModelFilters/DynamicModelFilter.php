<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Schema;

class DynamicModelFilter extends ModelFilter
{
    /**
     * Related Models that have ModelFilters as well as the method on the ModelFilter
     * As [relationMethod => [input_key1, input_key2]].
     *
     * @var array
     */
    public $relations = [];


    public function handle()
    {
        // Filter global methods
        if (method_exists($this, 'setup')) {
            $this->setup();
        }

        // Run input filters
        $this->filterInputDynamically();
        // Set up all the whereHas and joins constraints
        $this->filterRelations();

        return $this->query;
    }

    public function filterInputDynamically()
    {
        $table = $this->getModel()->getTable();
        foreach ($this->input as $key => $val) {
            if (Schema::hasColumn($table, $key)) {

                if (Schema::getColumnType($table, $key) == 'string') {
                    $this->query->whereLike($key, $val);
                } else if (Schema::getColumnType($table, $key) == 'datetime') {
                    $this->query->whereDate($key, '=', $val);
                } else {
                    $this->query->where($key, $val);
                }

            }
        }


        if ($search = $this->input['search'] ?? false) {
            $cols = $this->getConnection()->getSchemaBuilder()->getColumnListing($table);
            foreach ($cols as $col) {
                if (Schema::getColumnType($table, $col) == 'string') {
                    $this->query->orWhere($col, "LIKE", "%$search%");
                } else if (Schema::getColumnType($table, $col) == 'datetime') {
                    $this->query->orWhere($col, '=', $search);
                } else {
                    $this->query->orWhere($col, $search);
                }
            }
        }


        if ($filters = $this->input['filter'] ?? false) {
            $filters = isset($filters[0]) ? $filters : [$filters];
            foreach ($filters as $filter) {
                $this->query->where($filter['field'], $filter['operator'], $filter['value']);
            }
        }
    }

}
