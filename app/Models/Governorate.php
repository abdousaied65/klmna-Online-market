<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Governorate extends Model
{
    protected $guard = 'admin-web';
    protected $table = 'governorates';
    protected $fillable= [
        'governorate'
    ];
}
