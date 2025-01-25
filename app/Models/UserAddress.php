<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $region
 * @property string|null $district
 * @property string|null $street
 * @property string|null $home
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\UserAddressFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereHome($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserAddress whereUserId($value)
 *
 * @mixin \Eloquent
 */
class UserAddress extends Model
{
    /** @use HasFactory<\Database\Factories\UserAddressFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'region',
        'district',
        'street',
        'home',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
