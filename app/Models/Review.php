<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static findOrFail($id)
 * @method static select(string $string, \Illuminate\Database\Query\Expression $raw)
 * @method static where(string $string, $id)
 * @method static create(array $all)
 */
class Review extends Model
{
    protected $table = "reviews";
    protected $guard = "admin-web";
    protected $fillable = [
        'customer_id','unit_id','review_text','review_stars'
    ];
    public function customer(){
        return $this->belongsTo('\App\Models\Customer','customer_id','id');
    }
    public function unit(){
        return $this->belongsTo('\App\Models\Unit','unit_id','id');
    }

}
