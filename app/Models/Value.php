<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * @property-read mixed $translations
 *
 * @method static \Database\Factories\ValueFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereJsonContainsLocale(string $column, string $locale, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereJsonContainsLocales(string $column, array $locales, ?mixed $value, string $operand = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereLocales(string $column, array $locales)
 *
 * @property int $id
 * @property int $attribute_id
 * @property array<array-key, mixed> $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Attribute $attribute
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereAttributeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Value whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Value extends Model
{
    /** @use HasFactory<\Database\Factories\ValueFactory> */
    use HasFactory, HasTranslations;

    protected $fillable = ['attribute_id', 'product_id', 'name'];

    public array $translatable = ['name'];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
