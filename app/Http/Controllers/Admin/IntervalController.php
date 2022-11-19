<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Interval;
use Illuminate\Http\Request;

class IntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     * \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $intervals = Interval::all();
        return view('admin.intervals.index',compact('intervals'));
    }

    public function create()
    {
        return view('admin.intervals.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'interval_name' => 'required'
        ]);
        $input = $request->all();
        $interval = Interval::create($input);
        return redirect()->route('admin.intervals.index')->with('success','تم اضافة الفترة بنجاح');
    }

    public function edit($id)
    {
        $interval = Interval::findOrFail($id);
        return view('admin.intervals.edit', compact('interval'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'interval_name' => 'required'
        ]);
        $input = $request->all();
        $interval = Interval::findOrFail($id);
        $interval->update($input);
        return redirect()->route('admin.intervals.index')
            ->with('success', 'تم تعديل بيانات الفترة بنجاح');
    }

    public function destroy(Request $request)
    {
        Interval::findOrFail($request->intervalid)->delete();
        return redirect()->route('admin.intervals.index')
            ->with('success', 'تم حذف الفترة بنجاح');
    }
}
