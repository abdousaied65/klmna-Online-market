<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Models\Governorate;
use App\Models\Interval;
use App\Models\Unit;
use App\Models\Client;
use App\Models\UnitImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $client = Client::where('id',Auth::user()->id)->first();
        $units= $client->units;
        return view('client.units.index',compact('units','client'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        $client = Client::where('id',Auth::user()->id)->first();
        $depts= Dept::all();
        $intervals= Interval::all();
        return view('client.units.create',compact('governorates','client','intervals','depts'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'unit_name' => 'required',
            'dept_id' => 'required',
            'governorate_id' => 'required',
            'address' => 'required',
            'services' => 'required',
            'price' => 'required',
            'interval_id' => 'required',
            'count' => 'required',
            'available_number' => 'required',
            'description' => 'required'
        ]);
        $input = $request->all();
        $client_id = Auth::user()->id;
        $input['client_id'] = $client_id;
        $unit = unit::create($input);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $fileName = $image->getClientOriginalName();
                $uploadDir = 'uploads/units/' . $unit->id;
                $image->move($uploadDir, $fileName);
                $unit_image = UnitImage::create([
                    'unit_id' => $unit->id,
                    'unit_image' => $uploadDir . '/' . $fileName
                ]);
            }
        }
        return redirect()->route('client.units.create')->with('success','تم اضافة الوحدة بنجاح');
    }
}
