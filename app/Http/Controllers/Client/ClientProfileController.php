<?php

namespace App\Http\Controllers\Client;

use App\Models\Client;
use App\Models\ClientProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class ClientProfileController extends Controller
{
    public function edit($id)
    {
        $user = Client::findOrFail($id);
        $profile = ClientProfile::where('client_id', $id)->first();
        return view('client.profiles.edit', compact('user', 'profile'));
    }
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'phone_number' => 'required',
            'city_name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $input = $request->all();
        $user = Client::findOrFail($id);
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, array('password'));
        }
        $user->update($input);
        $user->assignRole($request->input('role_name'));
        $profile = ClientProfile::where('client_id', $id)->first();
        if (ClientProfile::where('client_id', '=', $id)->count() > 0) {
            if ($request->hasFile('profile_pic')) {
                $profile_pic = $request->file('profile_pic');
                $fileName = $profile_pic->getClientOriginalName();
                $profile->update($input);
                $uploadDir = 'uploads/profiles/Clients/' . $id;
                $profile_pic->move($uploadDir, $fileName);
                $profile->profile_pic = $uploadDir . '/' . $fileName;
                $profile->save();
                return redirect()->back()
                    ->with('success', 'تم تحديث البيانات الشخصية بنجاح');
            }
            else{
                $profile->update($input);
                return redirect()->back()->with('success','تم تحديث البيانات الشخصية بنجاح');
            }
        } else {
            if ($request->hasFile('profile_pic')) {
                $profile_pic = $request->file('profile_pic');
                $fileName = $profile_pic->getClientOriginalName();
                $user->profile()->create($input);
                $uploadDir = 'uploads/profiles/clients/' . $id;
                $profile_pic->move($uploadDir, $fileName);
                $profile->profile_pic = $uploadDir . '/' . $fileName;
                $profile->save();
                return redirect()->back()->with('success','تم تحديث البيانات الشخصية بنجاح');
            }
            else{
                $user->profile()->create($input);
                return redirect()->back()->with('success','تم تحديث البيانات الشخصية بنجاح');
            }
        }
    }
}
