<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:show client', ['only' => ['index']]);
        $this->middleware('permission:add client', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit client', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete client', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.clients.create',compact('roles'));
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
            'phone_number' => 'required',
            'city_name' => 'required',
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $client = Client::create($data);
        $client->email_verified_at = now();
        $client->save();
        $client->assignRole($data['role_name']);
        $profile = ClientProfile::create([
            'city_name' => $request->city_name,
            'age' => '',
            'gender' => '',
            'profile_pic' => 'assets/img/guest.png',
            'client_id' => $client->id
        ]);

        return redirect()->route('admin.clients.index')
            ->with('success', 'تم اضافة العميل بنجاح');
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        $clientRole = $client->roles->pluck('name', 'name')->all();
        return view('admin.clients.edit', compact('client', 'roles', 'clientRole'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'Status' => 'required',
            'email' => 'required|email',
            'password' => 'same:confirm-password',
            'role_name' => 'required',
            'phone_number' => 'required',
            'city_name' => 'required',
        ]);
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $client = Client::findOrFail($id);
        $client->update($input);

        $client->profile->update($input);

        return redirect()->route('admin.clients.index')
            ->with('success', 'تم تعديل بيانات العميل بنجاح');
    }
    public function destroy(Request $request)
    {
        Client::findOrFail($request->clientid)->delete();
        return redirect()->route('admin.clients.index')
            ->with('success', 'تم حذف العميل بنجاح');
    }
}
