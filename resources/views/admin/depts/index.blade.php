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
                            @can('add dept')
                                <a class="btn pull-left btn-primary btn-md"
                                   href="{{ route('admin.depts.create') }}"><i
                                        class="fa fa-plus"></i> اضافة قسم جديد </a>
                            @endcan
                            <h5 class="pull-right alert alert-md alert-success">عرض كل الاقسام</h5>
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
                                <th class="text-center">اسم القسم</th>
                                <th class="text-center"> ربح من كل عملية حجز</th>
                                <th class="text-center"> صورة</th>
                                <th class="text-center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($depts as $key => $dept)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $dept->dept_name }}</td>
                                    <td>{{ $dept->profit_value }}
                                        @if($dept->profit_type == "percent")
                                            %
                                        @elseif($dept->profit_type="value")
                                            جنيه مصرى
                                        @endif
                                    </td>
                                    <td>
                                        <img data-toggle="modal" href="#modaldemo8" src="{{asset($dept->dept_pic)}}"
                                             style="width:50px; height: 50px;cursor:pointer;"
                                             alt="" />
                                    </td>
                                    <td>
                                        @can('edit dept')
                                            <a href="{{ route('admin.depts.edit', $dept->id) }}"
                                               class="btn btn-md btn-info" data-toggle="tooltip"
                                               title="تعديل" data-placement="top"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete dept')
                                            <a class="modal-effect btn btn-md btn-danger delete_dept"
                                               dept_id="{{ $dept->id }}"
                                               dept_name="{{ $dept->dept_name }}" data-toggle="modal" href="#modaldemo9"
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

        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100"
                            style="font-family: 'Cairo'; ">عرض صورة القسم</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img id="image_larger" alt="image" style="width: 100%; "/>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-colse"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="modaldemo9">
            <div class="modal-dialog modal-dialog-centered" dept="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف قسم</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.depts.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="deptid" id="deptid">
                            <input class="form-control" name="deptname" id="deptname" type="text" readonly>
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
        $('.delete_dept').on('click', function () {
            var dept_id = $(this).attr('dept_id');
            var dept_name = $(this).attr('dept_name');
            $('.modal-body #deptid').val(dept_id);
            $('.modal-body #deptname').val(dept_name);
        });
        $('img').on('click', function () {
            var image_larger = $('#image_larger');
            var path = $(this).attr('src');
            $(image_larger).prop('src', path);
        });
    });
</script>
