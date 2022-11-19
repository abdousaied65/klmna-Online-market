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
                            <h5 class="pull-right alert alert-md alert-success">عرض كل المفضلات لدى الزبائن</h5>
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
                                <th class="text-center"> عدد الزبائن المفضلين </th>
                                <th class="text-center">عرض كل المفضلات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($favorites as $key => $favorite)
                                <tr>
                                    <td>{{ ++$i }} {{$favorite->id}}</td>
                                    <td>{{ $favorite->unit->unit_name }}</td>
                                    <td>{{ $favorite->total }}</td>
                                    <td>
                                        <a href="{{ route('admin.favorites.show', $favorite->unit_id) }}"
                                           class="btn btn-md btn-success" data-toggle="tooltip"
                                           title="عرض مفضلات هذه الوحدة" data-placement="top"><i class="fa fa-eye"></i></a>
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
