<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $input)
 * @method static findOrFail($id)
 */
class Unit extends Model
{
    protected $guard = 'admin-web';
    protected $table = 'units';
    protected $fillable= [
        'unit_name','dept_id','client_id','governorate_id','address','services','price',
        'interval_id','count','available_number','description'
    ];
    public function dept(){
        return $this->belongsTo('\App\Models\Dept','dept_id','id');
    }
    public function client(){
        return $this->belongsTo('\App\Models\Client','client_id','id');
    }
    public function governorate(){
        return $this->belongsTo('\App\Models\Governorate','governorate_id','id');
    }
    public function interval(){
        return $this->belongsTo('\App\Models\Interval','interval_id','id');
    }
    public function reviews(){
        return $this->hasMany('\App\Models\Review','unit_id','id');
    }
    public function images(){
        return $this->hasMany('\App\Models\UnitImage','unit_id','id');
    }
}
