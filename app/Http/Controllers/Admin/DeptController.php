<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Dept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $depts = Dept::all();
        return view('admin.depts.index',compact('depts'));
    }

    public function create()
    {
        return view('admin.depts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'dept_name' => 'required',
            'profit_type' => 'required',
            'profit_value' => 'required',
            'dept_pic' => 'required',
        ]);
        $input = $request->all();
        $dept = Dept::create($input);
        if ($request->hasFile('dept_pic')) {
            $image = $request->file('dept_pic');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/depts/' . $dept->id;
            $image->move($uploadDir, $fileName);
            $dept->dept_pic = $uploadDir . '/' . $fileName;
            $dept->save();
        }
        return redirect()->route('admin.depts.index')->with('success','تم اضافة القسم بنجاح');
    }

    public function edit($id)
    {
        $dept = Dept::findOrFail($id);
        return view('admin.depts.edit', compact('dept'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'dept_name' => 'required',
            'profit_type' => 'required',
            'profit_value' => 'required',
            'dept_pic' => 'required',

        ]);
        $input = $request->all();
        $dept = Dept::findOrFail($id);
        $dept->update($input);
        if ($request->hasFile('dept_pic')) {
            $image = $request->file('dept_pic');
            $fileName = $image->getClientOriginalName();
            $uploadDir = 'uploads/depts/' . $dept->id;
            $image->move($uploadDir, $fileName);
            $dept->dept_pic = $uploadDir . '/' . $fileName;
            $dept->save();
        }
       return redirect()->route('admin.depts.index')
            ->with('success', 'تم تعديل بيانات القسم بنجاح');
    }

    public function destroy(Request $request)
    {
        Dept::findOrFail($request->deptid)->delete();
        return redirect()->route('admin.depts.index')
            ->with('success', 'تم حذف القسم بنجاح');
    }
}
