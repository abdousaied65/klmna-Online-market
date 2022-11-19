<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavoriteController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request,[
            'customer_id' => 'required',
            'unit_id' => 'required',
        ]);

        $check  = Favorite::where('customer_id',$request->customer_id)
            ->where('unit_id',$request->unit_id)
            ->first();
        if (empty($check)){
            $favorite  = Favorite::create($request->all());
            if ($favorite){
                return response() -> json([
                    'status' => true ,
                    'msg' => 'تمت الاضافة الى قائمة المفضلة بنجاح'
                ]);
            }
            else{
                return response() -> json([
                    'status' => false ,
                    'msg' => 'فشل الاضافة برجاء المحاولة مجددا'
                ]);
            }
        }
        else{
            return response() -> json([
                'status' => true ,
                'msg' => 'تمت اضافته من قبل'
            ]);
        }

    }
}
