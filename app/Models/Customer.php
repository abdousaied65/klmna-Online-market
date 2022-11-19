<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static create(array $array)
 * @method static find(int $id)
 * @method static select(string $string)
 * @method static findOrFail($id)
 * @method static where(string $string, $id)
 */
class Customer extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'password', 'role_name', 'Status', 'phone_number', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $casts = [
        'role_name' => 'array',
        'email_verified_at' => 'datetime'
    ];

    public function profile()
    {
        return $this->hasOne('\App\Models\CustomerProfile');
    }

    public function reviews()
    {
        return $this->hasMany('\App\Models\Review', 'customer_id', 'id');
    }

    public function favorites()
    {
        return $this->hasMany('\App\Models\Favorite', 'customer_id', 'id');
    }

    public function messages()
    {
        return $this->hasMany('\App\Models\Message', 'customer_id', 'id');
    }

}


