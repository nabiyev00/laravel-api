<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\StockFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock query()
 *
 * @property int $id
 * @property int $product_id
 * @property string|null $attributes
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereAttributes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stock whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;

    protected $fillable = ['product_id', 'attribute', 'quantity'];
}
