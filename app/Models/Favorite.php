<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $data)
 * @method static where(string $string)
 * @method static select(string $string, \Illuminate\Database\Query\Expression $raw, \Illuminate\Database\Query\Expression $raw1)
 * @method static findOrFail($reviewid)
 */
class Favorite extends Model
{
    protected $table = "favorites";
    protected $fillable = [
        'customer_id', 'unit_id'
    ];
    public function customer(){
        return $this->belongsTo('\App\Models\Customer','customer_id','id');
    }
    public function unit(){
        return $this->belongsTo('\App\Models\Unit','unit_id','id');
    }
}
