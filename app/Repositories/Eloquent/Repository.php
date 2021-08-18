<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Exceptions\RepositoryException;
use EloquentFilter\Filterable;
use Illuminate\Container\Container as App;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var Builder|Model|Filterable
     */
    protected $model;

    /**
     * @param App $app
     * @throws RepositoryException|BindingResolutionException
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public abstract function model(): string;

    /**
     * @return array
     */
    public function allWith(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function singleWith(): array
    {
        return [];
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {
        return $this->model
            ->with($this->allWith())
            ->get($columns);
    }

    /**
     * @param $filters
     * @return mixed
     */
    public function filter($filters)
    {
        return $this->model
            ->with($this->allWith())
            ->filter($filters)
            ->paginateFilter();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 15, $columns = array('*'))
    {
        return $this->model
            ->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model
            ->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return int
     */
    public function update(array $data, $id, string $attribute = "id")
    {
        return $this->model
            ->where($attribute, '=', $id)
            ->update($data);
    }

    /**
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function delete($id, string $attribute = "id")
    {
        return $this->model
            ->where($attribute, '=', $id)
            ->delete();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->with($this->singleWith())->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @return Builder
     * @throws RepositoryException|BindingResolutionException
     */
    public function makeModel(): Builder
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

        return $this->model = $model->newQuery();
    }
}
