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
                            @can('add customer')
                                <a class="btn pull-left btn-primary btn-md"
                                   href="{{ route('admin.customers.create') }}"><i
                                        class="fa fa-plus"></i> اضافة زبون جديد </a>
                            @endcan
                            <h5 class="pull-right alert alert-md alert-success">عرض كل الزبائن</h5>
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
                                <th class="text-center">اسم الزبون</th>
                                <th class="text-center">البريد الالكترونى</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">صلاحية</th>
                                <th class="text-center">تحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach ($customers as $key => $customer)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        @if($customer->Status == "active")
                                            مفعل
                                        @elseif($customer->Status == "blocked")
                                            معطل
                                        @endif

                                    </td>
                                    <td>
                                        @if (!empty($customer->role_name))
                                            @foreach ($customer->role_name as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @can('edit customer')
                                            <a href="{{ route('admin.customers.edit', $customer->id) }}"
                                               class="btn btn-md btn-info" data-toggle="tooltip"
                                               title="تعديل" data-placement="top"><i class="fa fa-edit"></i></a>
                                        @endcan

                                        @can('delete customer')
                                            <a class="modal-effect btn btn-md btn-danger delete_customer"
                                               customer_id="{{ $customer->id }}"
                                               customer_name="{{ $customer->name }}" data-toggle="modal" href="#modaldemo9"
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
            <div class="modal-dialog modal-dialog-centered" customer="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header text-center">
                        <h6 class="modal-title w-100" style="font-family: 'Cairo'; ">حذف زبون</h6>
                        <button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('admin.customers.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متأكد من الحذف ?</p><br>
                            <input type="hidden" name="customerid" id="customerid">
                            <input class="form-control" name="customername" id="customername" type="text" readonly>
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
        $('.delete_customer').on('click', function () {
            var customer_id = $(this).attr('customer_id');
            var customer_name = $(this).attr('customer_name');
            $('.modal-body #customerid').val(customer_id);
            $('.modal-body #customername').val(customer_name);
        });
    });
</script>
