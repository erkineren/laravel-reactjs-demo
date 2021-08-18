<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static CourseFactory factory(...$parameters)
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereCreatedAt($value)
 * @method static Builder|Course whereDescription($value)
 * @method static Builder|Course whereId($value)
 * @method static Builder|Course whereTitle($value)
 * @method static Builder|Course whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string|null $deleted_at
 * @method static Builder|Course whereDeletedAt($value)
 * @method static Builder|Course filter(array $input = [], $filter = null)
 * @method static Builder|Course paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Course simplePaginateFilter(?int $perPage = null, ?int $columns = [], ?int $pageName = 'page', ?int $page = null)
 * @method static Builder|Course whereBeginsWith(string $column, string $value, string $boolean = 'and')
 * @method static Builder|Course whereEndsWith(string $column, string $value, string $boolean = 'and')
 * @method static Builder|Course whereLike(string $column, string $value, string $boolean = 'and')
 * @property string $price
 * @method static Builder|Course wherePrice($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lecture[] $lectures
 * @property-read int|null $lectures_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 * @property-read int|null $purchases_count
 */
class Course extends Model
{
    use HasFactory, DynamicallyFilterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    /**
     * @return HasMany
     */
    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class);
    }

    /**
     * @return HasMany
     */
    public function lectures(): HasMany
    {
        return $this->hasMany(Lecture::class);
    }


}
