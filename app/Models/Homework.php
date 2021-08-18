<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Homework
 *
 * @property int $id
 * @property int $lecture_id
 * @property string $title
 * @property string $description
 * @property string|null $due_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Lecture $lecture
 * @method static \Database\Factories\HomeworkFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homework newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homework paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework query()
 * @method static \Illuminate\Database\Eloquent\Builder|Homework simplePaginateFilter(?int $perPage = null, ?int $columns = [], ?int $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereBeginsWith(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereDueAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereEndsWith(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereLectureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereLike(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homework whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Homework extends Model
{
    use HasFactory, DynamicallyFilterable;

    protected $table = 'homeworks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lecture_id',
        'title',
        'description',
        'due_at',
    ];

    /**
     * @return BelongsTo
     */
    public function lecture(): BelongsTo
    {
        return $this->belongsTo(Lecture::class);
    }
}
