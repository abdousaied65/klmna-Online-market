@extends('admin.layouts.master')
<style>

</style>
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>الاخطاء :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-primary btn-md pull-left" href="{{ route('admin.clients.index') }}">عودة
                            للخلف</a>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success"> اضافة عميل
                            جديد </h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <form class="parsley-style-1" id="selectForm2" name="selectForm2"
                          action="{{route('admin.clients.store','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="profile_id" value="{{Auth::user()->id}}">
                        <h5 class="col-lg-12 d-block mb-2">البيانات الاساسية</h5>
                        <hr>
                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label> اسم العميل <span class="text-danger">*</span></label>
                                <input required class="form-control" name="name" type="text">
                            </div>

                            <div class="col-md-4">
                                <label> البريد الالكترونى <span class="text-danger">*</span></label>
                                <input dir="ltr" required class="form-control text-left" name="email" type="email">
                            </div>

                            <div class="col-md-4">
                                <label> كلمة المرور <span class="text-danger">*</span></label>
                                <input required class="form-control" name="password" type="password">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label> تأكيد كلمة المرور <span class="text-danger">*</span></label>
                                <input required class="form-control" name="confirm-password" type="password">
                            </div>
                            <div class="col-md-4">
                                <label> الحالة <span class="text-danger">*</span></label>
                                <select name="Status" class="form-control">
                                    <option value="">اختر الحالة</option>
                                    <option selected value="active">مفعل</option>
                                    <option value="blocked">معطل</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label> صلاحية <span class="text-danger">*</span></label>
                                <input readonly dir="rtl" value="عميل" required class="form-control" name="role_name[]" type="text">
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-4">
                                <label> رقم الهاتف <span class="text-danger">*</span></label>
                                <input dir="ltr" required class="form-control text-left" name="phone_number" type="number">
                            </div>

                            <div class="col-md-4">
                                <label> المدينة <span class="text-danger">*</span></label>
                                <input dir="rtl" required class="form-control text-right" name="city_name" type="text">
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-info pd-x-20" type="submit">تحديث</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
