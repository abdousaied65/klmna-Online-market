<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 * @method static where(string $string, $id)
 * @method static findOrFail($customer_id)
 */
class CustomerProfile extends Model
{
    protected $table = 'customer_profiles';
    protected $fillable = [
        'city_name',
        'age',
        'gender',
        'profile_pic',
        'customer_id'
    ];
    public function customer()
    {
        return $this->belongsTo('\App\Models\Customer');
    }
}
