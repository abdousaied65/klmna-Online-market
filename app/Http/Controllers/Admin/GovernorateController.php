<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $governorates = Governorate::all();
        return view('admin.governorates.index',compact('governorates'));
    }

    public function create()
    {
        return view('admin.governorates.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'governorate' => 'required'
        ]);
        $input = $request->all();
        $governorate = Governorate::create($input);
        return redirect()->route('admin.governorates.index')->with('success','تم اضافة المدينة بنجاح');
    }

    public function edit($id)
    {
        $governorate = Governorate::findOrFail($id);
        return view('admin.governorates.edit', compact('governorate'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'governorate' => 'required'
        ]);
        $input = $request->all();
        $governorate = Governorate::findOrFail($id);
        $governorate->update($input);
        return redirect()->route('admin.governorates.index')
            ->with('success', 'تم تعديل بيانات المدينة بنجاح');
    }

    public function destroy(Request $request)
    {
        Governorate::findOrFail($request->governorateid)->delete();
        return redirect()->route('admin.governorates.index')
            ->with('success', 'تم حذف المدينة بنجاح');
    }
}
