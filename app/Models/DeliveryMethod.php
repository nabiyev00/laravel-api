<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $name
 * @property int $estimated_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 *
 * @method static \Database\Factories\DeliveryMethodFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod whereEstimatedTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryMethod whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class DeliveryMethod extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryMethodFactory> */
    use HasFactory, HasTranslations, SoftDeletes;

    protected $fillable = [
        'name',
        'estimated_time',
        'sum',
    ];

    public array $translatable = ['name'];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
