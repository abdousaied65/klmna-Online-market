<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;

Carbon::setLocale('ar');

class DeptController extends Controller
{
    public function dept_units($id)
    {
        $dept_k = Dept::findOrFail($id);
        return view('site.dept_units', [
            'units' => Unit::query()
                ->where('dept_id',$dept_k->id)
                ->paginate(9),
            'dept_k' => $dept_k
        ]);
    }

    public function unit_show($id)
    {
        $unit = Unit::findOrFail($id);
        $dept_id = $unit->dept_id;
        $similars = Unit::where('dept_id',$dept_id)
            ->where('id','!=',$id)
            ->take(3)->get();
        return view('site.unit_detail', compact('unit','similars'));
    }
    public function units_search(Request $request){
        $key = $request->key;
        return view('site.dept_units', [
            'units' => Unit::query()
                ->where('unit_name','LIKE','%'.$key.'%')
                ->paginate(9),
            'key' => $key
        ]);
    }
    public function units_search_custom(Request $request){
        $key = $request->key;
        $governorate_id = $request->governorate_id;
        $dept_id = $request->dept_id;
        return view('site.dept_units', [
            'units' => Unit::query()
                ->where('unit_name','LIKE','%'.$key.'%')
                ->where('dept_id',$dept_id)
                ->where('governorate_id',$governorate_id)
                ->paginate(9),
            'key' => $key
        ]);
    }

}
