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
                            @can('add governorate')
                                <a class="btn pull-left btn-primary btn-md"
                                   href="{{ route('admin.governorates.create') }}"><i
                                        class="fa fa-plus"></i> اضافة مدينة جديد </a>
                            @endcan
                            <h5 class="pull-right alert alert-md alert-success">عرض كل المدن</h5>
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
                                <th class="text-center">اسم المدينة</th>
                                <th class="text-center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($governorates as $key => $governorate)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $governorate->governorate }}</td>
                                    <td>
                                        @can('edit governorate')
                                            <a href="{{ route('admin.governorates.edit', $governorate->id) }}"
                                               class="btn btn-md btn-info" data-toggle="tooltip"
                                               title="تعديل" data-placement="top"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete governorate')
                                            <a class="modal-effect btn btn-md btn-danger delete_governorate"
                                               governorate_id="{{ $governorate->id }}"
                                               governorate_name="{{ $governorate->governorate }}" data-toggle="modal" href="#modaldemo9"
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
            <div class="modal-dialog modal-dialog-centered" governorate="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف مدينة</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.governorates.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="governorateid" id="governorateid">
                            <input class="form-control" name="governoratename" id="governoratename" type="text" readonly>
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
        $('.delete_governorate').on('click', function () {
            var governorate_id = $(this).attr('governorate_id');
            var governorate_name = $(this).attr('governorate_name');
            $('.modal-body #governorateid').val(governorate_id);
            $('.modal-body #governoratename').val(governorate_name);
        });
    });
</script>
