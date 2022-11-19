<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Models\Review;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::select('unit_id', DB::raw('count(*) as total'),DB::raw('sum(review_stars) as sum'))
            ->groupBy('unit_id')
            ->get();
        return view('admin.reviews.index',compact('reviews'));
    }
    public function show($id){
        $unit = Unit::findOrFail($id);
        $reviews = Review::where('unit_id',$id)->get();
        return view('admin.reviews.show',compact('reviews','unit'));
    }
    public function make_review(Request$request){
        $review = Review::create($request->all());
        return redirect()->back()->with('success','تم ارسال تقييمك عن الخدمة بنجاح');
    }
    public function destroy(Request $request)
    {
        Review::findOrFail($request->reviewid)->delete();
        return redirect()->back()->with('success', 'تم حذف التقييم بنجاح');
    }

}
