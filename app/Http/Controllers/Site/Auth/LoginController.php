<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerProfile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
    protected function loggedOut(Request $request)
    {
        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
    protected function guard()
    {
        return Auth::guard('web');
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function showLoginForm() {
        if (Auth::guard('admin-web')->check()) {
            return redirect()->route('admin.home');
        }
        elseif (Auth::guard('client-web')->check()) {
            return redirect()->route('client.home');
        }
        elseif (Auth::guard('web')->check()) {
            return redirect()->route('home');
        }
        else{
            return view('site.auth.login');
        }
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback()
    {
        $customer = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($customer);
        return redirect()->route('home');

    }
    public function handleGithubCallback()
    {
        $customer = Socialite::driver('github')->user();
        $this->_registerOrLoginUser($customer);
        return redirect()->route('home');
    }
    public function handleFacebookCallback()
    {
        $customer = Socialite::driver('facebook')->user();
        $this->_registerOrLoginUser($customer);
        return redirect()->route('home');
    }
    public function _registerOrLoginUser($data){
        $customer = Customer::where('email','=',$data->email)->first();
        if(!$customer){
            $customer = new Customer();
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->provider_id = $data->id;
            $customer->avatar = $data->avatar;
            $customer->email_verified_at = now();
            $customer->status = 'active';
            $customer->role_name = ["زبون"];
            $customer->save();
        }
        Auth::login($customer);
    }

    public function username()
    {
        return 'phone_number';
    }
}
