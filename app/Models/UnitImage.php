<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $input)
 * @method static findOrFail($id)
 */
class UnitImage extends Model
{
    protected $guard = 'admin-web';
    protected $table = 'unit_images';
    protected $fillable= [
        'unit_id','unit_image'
    ];
    public function unit(){
        return $this->belongsTo('\App\Models\Unit','unit_id','id');
    }
}
