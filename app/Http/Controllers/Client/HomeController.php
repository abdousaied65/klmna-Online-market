<?php

namespace App\Http\Controllers\Client;

use App\Models\ClientProfile;
use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Models\Governorate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:client-web');
    }

    public function index()
    {
        $auth_id = Auth::user()->id;
        $user = Client::findOrFail($auth_id);

        if(ClientProfile::where('client_id', '=', $auth_id)->count() > 0){
            //profile found
        }
        else{
            // profile not found
            $user->assignRole($user->role_name);
            $profile = ClientProfile::create([
                'phone_number' => '',
                'city_name' => '',
                'age' => '',
                'gender' => '',
                'profile_pic' => 'assets/img/guest.png',
                'client_id' => $auth_id
            ]);
        }
        $depts = Dept::all();
        $governorates = Governorate::all();
        $client = $user;
        return view('client.home', compact('client','governorates','depts'));
    }
}
