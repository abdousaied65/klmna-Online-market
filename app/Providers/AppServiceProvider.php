<?php

namespace App\Providers;

use App\Http\Controllers\Site\DeptController;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Customer;

use App\Models\Dept;
use App\Models\Governorate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $admins = Admin::all();
        View::share('admins', $admins);

        $clients = Client::all();
        View::share('clients', $clients);

        $customers = Customer::all();
        View::share('customers', $customers);

        $depts = Dept::all();
        View::share('depts', $depts);

        $governorates = Governorate::all();
        View::share('governorates', $governorates);

    }

}
