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
                            @can('add unit')
                                <a class="btn pull-left btn-primary btn-md"
                                   href="{{ route('admin.units.create') }}"><i
                                        class="fa fa-plus"></i> اضافة وحدة معروضة جديد </a>
                            @endcan
                            <h5 class="pull-right alert alert-md alert-success">عرض كل الوحدات المعروضة</h5>
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
                                <th class="text-center">اسم الوحدة المعروضة</th>
                                <th class="text-center"> القسم التابع</th>
                                <th class="text-center"> العميل </th>
                                <th class="text-center"> المدينة</th>
                                <th class="text-center"> العنوان</th>
                                <th class="text-center"> الخدمات المتوفرة</th>
                                <th class="text-center"> السعر</th>
                                <th class="text-center"> الفترة</th>
                                <th class="text-center"> عدد الافراد</th>
                                <th class="text-center"> عدد الوحدات المتاحة</th>
                                <th class="text-center">وصف</th>
                                <th class="text-center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($units as $key => $unit)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->dept->dept_name }}</td>
                                    <td>{{ $unit->client->name }}</td>
                                    <td>{{ $unit->governorate->governorate }}</td>
                                    <td>{{ $unit->address }}</td>
                                    <td>
                                        {{$unit->services}}
                                    </td>
                                    <td>{{ $unit->price }}</td>
                                    <td>{{ $unit->interval->interval_name }}</td>
                                    <td>{{ $unit->count }}</td>
                                    <td>{{ $unit->available_number }}</td>
                                    <td>{{ mb_substr($unit->description,0,50) }} ....</td>
                                    <td>
                                        @can('edit unit')
                                            <a href="{{ route('admin.units.edit', $unit->id) }}"
                                               class="btn btn-md btn-info" data-toggle="tooltip"
                                               title="تعديل" data-placement="top"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete unit')
                                            <a class="modal-effect btn btn-md btn-danger delete_unit"
                                               unit_id="{{ $unit->id }}"
                                               unit_name="{{ $unit->unit_name }}" data-toggle="modal" href="#modaldemo9"
                                               title="delete"><i
                                                    class="fa fa-trash"></i></a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" unit="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف وحدة معروضة </h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.units.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="unitid" id="unitid">
                            <input class="form-control" name="unitname" id="unitname" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.delete_unit').on('click', function () {
            var unit_id = $(this).attr('unit_id');
            var unit_name = $(this).attr('unit_name');
            $('.modal-body #unitid').val(unit_id);
            $('.modal-body #unitname').val(unit_name);
        });
    });
</script>
