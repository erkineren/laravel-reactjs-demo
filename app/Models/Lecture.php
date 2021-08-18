<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Lecture
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Homework[] $homework
 * @property-read int|null $homework_count
 * @method static \Database\Factories\LectureFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture filter(array $input = [], $filter = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture simplePaginateFilter(?int $perPage = null, ?int $columns = [], ?int $pageName = 'page', ?int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereBeginsWith(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereEndsWith(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereLike(string $column, string $value, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lecture whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Lecture extends Model
{
    use HasFactory, DynamicallyFilterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'title',
        'description',
    ];

    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * @return HasMany
     */
    public function homework(): HasMany
    {
        return $this->hasMany(Homework::class);
    }

}
