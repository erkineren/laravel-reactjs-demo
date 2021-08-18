<?php

namespace App\Models;

use Database\Factories\PurchaseFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property string $price
 * @property string|null $paid_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static PurchaseFactory factory(...$parameters)
 * @method static Builder|Purchase filter(array $input = [], $filter = null)
 * @method static Builder|Purchase newModelQuery()
 * @method static Builder|Purchase newQuery()
 * @method static Builder|Purchase paginateFilter($perPage = null, $columns = [], $pageName = 'page', $page = null)
 * @method static Builder|Purchase query()
 * @method static Builder|Purchase simplePaginateFilter(?int $perPage = null, ?int $columns = [], ?int $pageName = 'page', ?int $page = null)
 * @method static Builder|Purchase whereBeginsWith(string $column, string $value, string $boolean = 'and')
 * @method static Builder|Purchase whereCourseId($value)
 * @method static Builder|Purchase whereCreatedAt($value)
 * @method static Builder|Purchase whereDeletedAt($value)
 * @method static Builder|Purchase whereEndsWith(string $column, string $value, string $boolean = 'and')
 * @method static Builder|Purchase whereId($value)
 * @method static Builder|Purchase whereLike(string $column, string $value, string $boolean = 'and')
 * @method static Builder|Purchase wherePaidAt($value)
 * @method static Builder|Purchase wherePrice($value)
 * @method static Builder|Purchase whereUpdatedAt($value)
 * @method static Builder|Purchase whereUserId($value)
 * @mixin Eloquent
 * @property-read \App\Models\Course $course
 * @property-read \App\Models\User $user
 */
class Purchase extends Model
{
    use HasFactory, DynamicallyFilterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'course_id',
        'price',
        'paid_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

}
