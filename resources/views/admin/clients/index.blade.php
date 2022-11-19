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
                            @can('add client')
                                <a class="btn pull-left btn-primary btn-md"
                                   href="{{ route('admin.clients.create') }}"><i
                                        class="fa fa-plus"></i> اضافة عميل جديد </a>
                            @endcan
                            <h5 class="pull-right alert alert-md alert-success">عرض كل العملاء</h5>
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
                                <th class="text-center">اسم العميل</th>
                                <th class="text-center">البريد الالكترونى</th>
                                <th class="text-center"> رقم الهاتف </th>
                                <th class="text-center"> المدينة </th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">الصلاحية</th>
                                <th class="text-center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($clients as $key => $client)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone_number }}</td>
                                    <td>{{ $client->profile->city_name }}</td>
                                    <td>
                                        @if($client->Status == "active")
                                            مفعل
                                        @elseif($client->Status == "blocked")
                                            معطل
                                        @endif
                                    </td>
                                    <td>
                                        @if (!empty($client->role_name))
                                            @foreach ($client->role_name as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit client')
                                            <a href="{{ route('admin.clients.edit', $client->id) }}"
                                               class="btn btn-md btn-info" data-toggle="tooltip"
                                               title="تعديل" data-placement="top"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete client')
                                            <a class="modal-effect btn btn-md btn-danger delete_client"
                                               client_id="{{ $client->id }}"
                                               client_name="{{ $client->name }}" data-toggle="modal" href="#modaldemo9"
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
            <div class="modal-dialog modal-dialog-centered" client="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف عميل</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.clients.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="clientid" id="clientid">
                            <input class="form-control" name="clientname" id="clientname" type="text" readonly>
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
        $('.delete_client').on('click', function () {
            var client_id = $(this).attr('client_id');
            var client_name = $(this).attr('client_name');
            $('.modal-body #clientid').val(client_id);
            $('.modal-body #clientname').val(client_name);
        });
    });
</script>
