<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerProfile;
use App\Models\Favorite;
use App\Models\Report;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
Carbon::setLocale('ar');

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function index()
    {
        $auth_id = Auth::user()->id;
        $customer = Customer::findOrFail($auth_id);
        if(CustomerProfile::where('customer_id', '=', $auth_id)->count() > 0){
            //profile found
        }
        else{
            // profile not found
            $customer->assignRole($customer->role_name);
            $profile = CustomerProfile::create([
                'city_name' => '',
                'age' => '',
                'gender' => '',
                'profile_pic' => 'assets/img/guest.png',
                'customer_id' => $auth_id
            ]);
        }
        return view('site.home',compact('customer'));
    }
    public function my_reviews(){
        $customer_id = Auth::user()->id;
        $customer = Customer::findOrFail($customer_id);
        $reviews = Review::where('customer_id',$customer_id)->get();
        return view('site.reviews',compact('reviews','customer'));
    }

    public function my_favorites(){
        $customer_id = Auth::user()->id;
        $customer = Customer::findOrFail($customer_id);
        $favorites = Favorite::where('customer_id',$customer_id)->get();
        return view('site.favorites',compact('favorites','customer'));
    }

    public function my_reports(){
        $customer_id = Auth::user()->id;
        $customer = Customer::findOrFail($customer_id);
        $reports = Report::where('customer_id',$customer_id)->get();
        return view('site.reports',compact('reports','customer'));
    }


    public function update_profile(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone_number' => 'required',
            'password' => 'required',
            'city_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
        ]);
        $customer = Customer::findOrFail($request->customer_id);
        $customer->update($request->all());
        $customer->password = bcrypt($request->password);
        $customer->save();

        $profile = CustomerProfile::where('customer_id',$request->customer_id)->first();
        $profile->update($request->all());

        if ($request->hasFile('profile_pic')) {
            $profile_pic = $request->file('profile_pic');
            $fileName = $profile_pic->getClientOriginalName();
            $uploadDir = 'uploads/profiles/customers/' . $customer->id;
            $profile_pic->move($uploadDir, $fileName);
            $profile->profile_pic = $uploadDir . '/' . $fileName;
            $profile->save();
        }
        return redirect()->route('home')->with('success','تم تغيير اعدادات الحساب بنجاح');
    }
}
