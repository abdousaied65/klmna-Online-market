<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CustomerController extends Controller
{
    function __construct()
    {
//        $this->middleware('permission:show customer', ['only' => ['index']]);
//        $this->middleware('permission:add customer', ['only' => ['create', 'store']]);
//        $this->middleware('permission:edit customer', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:delete customer', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.customers.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|same:confirm-password',
            'role_name' => 'required',
            'Status' => 'required',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $customer = Customer::create($data);
        $customer->email_verified_at = now();
        $customer->save();
        $customer->assignRole($data['role_name']);
        $profile = CustomerProfile::create([
            'phone_number' => '',
            'city_name' => '',
            'age' => '',
            'gender' => '',
            'profile_pic' => 'assets/img/guest.png',
            'customer_id' => $customer->id
        ]);

        return redirect()->route('admin.customers.index')
            ->with('success', 'تم اضافة الزبون بنجاح');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $customerRole = $customer->roles->pluck('name', 'name')->all();
        return view('admin.customers.edit', compact('customer', 'roles', 'customerRole'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'Status' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'role_name' => 'required'
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $customer = Customer::findOrFail($id);
        $customer->update($input);

        return redirect()->route('admin.customers.index')
            ->with('success', 'تم تعديل بيانات الزبون بنجاح');
    }
    public function destroy(Request $request)
    {
        Customer::findOrFail($request->customerid)->delete();
        return redirect()->route('admin.customers.index')
            ->with('success', 'تم حذف الزبون بنجاح');
    }
}
