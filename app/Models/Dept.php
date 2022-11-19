<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $input)
 * @method static findOrFail($id)
 */
class Dept extends Model
{
    protected $guard = 'admin-web';
    protected $table = 'depts';
    protected $fillable= [
        'dept_name','profit_type','profit_value','dept_pic'
    ];
    public function units(){
        return $this->hasMany('\App\Models\Unit','dept_id','id');
    }
}
