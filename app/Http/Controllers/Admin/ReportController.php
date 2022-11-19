<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::select('unit_id', DB::raw('count(*) as total'))
            ->groupBy('unit_id')
            ->get();
        return view('admin.reports.index',compact('reports'));
    }
    public function show($id){
        $unit = Unit::findOrFail($id);
        $reports = Report::where('unit_id',$id)->get();
        return view('admin.reports.show',compact('reports','unit'));
    }

    public function destroy(Request $request)
    {
        Report::findOrFail($request->reportid)->delete();
        return redirect()->back()->with('success', 'تم حذف البلاغ بنجاح');
    }

}
