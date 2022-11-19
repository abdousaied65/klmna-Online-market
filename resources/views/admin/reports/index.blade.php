@extends('admin.layouts.master')
<!-- Internal Data table css -->
<style>
    .drop.show {
        left: -125px !important;
        width: 220px;
    }

    .drop.show a {
        width: auto !important;
    }

    .drop.show a i {
        margin-right: 10px;
    }
</style>
@section('content')
    @if (session('success'))

        <div class="alert alert-success alert-dismissable fade show">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-lg-12 margin-tb">
                            <h5 class="pull-right alert alert-md alert-success">عرض كل البلاغات</h5>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mg-b-0 text-center table-hover " id="example-table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">اسم الوحدة </th>
                                <th class="text-center"> عدد الزبائن المبلغين عنها </th>
                                <th class="text-center">عرض كل البلاغات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($reports as $key => $report)
                                <tr>
                                    <td>{{ ++$i }} {{$report->id}}</td>
                                    <td>{{ $report->unit->unit_name }}</td>
                                    <td>{{ $report->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.reports.show', $report->unit_id) }}"
                                           class="btn btn-md btn-success" data-toggle="tooltip"
                                           title="عرض بلاغات هذه الوحدة" data-placement="top"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
