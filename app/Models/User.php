<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method static create(array $array)
 * @method static find(int $id)
 * @method static findOrFail($user_id)
 * @method static where(string $string, string $string1)
 * @method static whereIn(string $string, string $string1)
 * @method static select(string $string, string $string1)
 * @property mixed name
 * @property mixed email
 * @property mixed provider_id
 * @property mixed avatar
 * @property \Illuminate\Support\Carbon|mixed email_verified_at
 * @property mixed|string status
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','api_token','status','phone'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
}

