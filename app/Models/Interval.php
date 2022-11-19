<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string[] $array)
 */
class Interval extends Model
{
    protected $guard = 'admin-web';
    protected $table = 'intervals';
    protected $fillable= [
        'interval_name'
    ];
}
