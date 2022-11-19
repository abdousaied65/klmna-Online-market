<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dept;
use App\Models\Governorate;
use App\Models\Interval;
use App\Models\Unit;
use App\Models\Client;
use App\Models\UnitImage;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $units = Unit::all();
        return view('admin.units.index', compact('units'));
    }

    public function create()
    {
        $governorates = Governorate::all();
        $depts = Dept::all();
        $intervals = Interval::all();
        return view('admin.units.create', compact('governorates', 'intervals', 'depts'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
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
        return redirect()->route('admin.units.index')->with('success','تم اضافة الوحدة بنجاح');
    }

    public function edit($id)
    {
        $governorates = Governorate::all();
        $depts = Dept::all();
        $unit = unit::findOrFail($id);
        $intervals = Interval::all();
        return view('admin.units.edit', compact('unit', 'governorates', 'depts', 'intervals'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
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
        $unit = unit::findOrFail($id);
        $unit->update($input);
        if ($request->hasFile('images')) {
            $prev_images = $unit->images;
            foreach ($prev_images as $image){
                $image->delete();
            }
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
        return redirect()->route('admin.units.index')
            ->with('success', 'تم تعديل بيانات الوحدة بنجاح');
    }

    public function destroy(Request $request)
    {
        unit::findOrFail($request->unitid)->delete();
        return redirect()->route('admin.units.index')
            ->with('success', 'تم حذف الوحدة بنجاح');
    }

}
