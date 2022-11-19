<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Review;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $client = Client::where('id',Auth::user()->id)->first();
        $units= $client->units;
        $units_arr = array();
        foreach ($units as $unit){
            array_push($units_arr,$unit->id);
        }
        $reviews = Review::select('unit_id', DB::raw('count(*) as total'),DB::raw('sum(review_stars) as sum'))
            ->groupBy('unit_id')
            ->whereIn('unit_id', $units_arr)
            ->get();
        return view('client.reviews.index',compact('reviews','client'));
    }
    public function show($id){
        $client = Client::where('id',Auth::user()->id)->first();
        $unit = Unit::findOrFail($id);
        $reviews = Review::where('unit_id',$id)->get();
        return view('client.reviews.show',compact('reviews','unit','client'));
    }
}
