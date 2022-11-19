<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $favorites = Favorite::select('unit_id', DB::raw('count(*) as total'))
            ->groupBy('unit_id')
            ->get();
        return view('admin.favorites.index',compact('favorites'));
    }
    public function show($id){
        $unit = Unit::findOrFail($id);
        $favorites = Favorite::where('unit_id',$id)->get();
        return view('admin.favorites.show',compact('favorites','unit'));
    }

    public function destroy(Request $request)
    {
        Favorite::findOrFail($request->favoriteid)->delete();
        return redirect()->back()->with('success', 'تم حذف المفضل بنجاح');
    }

}
