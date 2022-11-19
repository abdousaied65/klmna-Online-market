<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

Carbon::setLocale('ar');

class ReportController extends Controller
{
    public function make_report(Request$request){
        $report = Report::create($request->all());
        return redirect()->back()->with('success','تم ارسال ابلاغك عن الخدمة بنجاح');
    }
}
