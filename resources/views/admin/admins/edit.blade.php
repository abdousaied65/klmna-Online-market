@extends('admin.layouts.master')
<style>
</style>
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>الاخطاء :</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <a class="btn btn-primary btn-md" href="{{ route('admin.admins.index') }}">عودة للخلف</a>
                        </div>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success">
                            تعديل بيانات الموظف
                        </h5>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    {!! Form::model($admin, ['method' => 'PATCH','route' => ['admin.admins.update', $admin->id]]) !!}


                    <div class="row mb-3 mt-3">
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label> اسم الموظف : <span class="tx-danger">*</span></label>
                            {!! Form::text('name', null, array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> البريد الالكترونى : <span class="tx-danger">*</span></label>
                            {!! Form::text('email', null, array('class' => 'form-control text-left','dir'=>'ltr','required')) !!}
                        </div>
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label class="form-label"> الحالة </label>
                            <select name="Status" id="select-beast" class="form-control">
                                <option value="active"
                                        @if ($admin->Status == 'active')
                                        selected
                                    @endif
                                > مفعل
                                </option>

                                <option value="blocked"
                                        @if ($admin->Status == 'blocked')
                                        selected
                                    @endif
                                > معطل
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="row  mb-3 mt-3">
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> كلمة المرور : <span class="tx-danger">*</span></label>
                            {!! Form::password('password', array('class' => 'form-control','required')) !!}
                        </div>

                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> تأكيد كلمة المرور : <span class="tx-danger">*</span></label>
                            {!! Form::password('confirm-password', array('class' => 'form-control','required')) !!}
                        </div>
                        <div class="parsley-input col-md-4 mg-t-20 mg-md-t-0" id="lnWrapper">
                            <label> الصلاحية </label>
                            {!! Form::select('role_name[]', $roles,$adminRole,
                                        array('required','class' => 'selectpicker form-control','data-live-search' => 'true','data-style'=>'btn-info'
                                        ,'title' => 'Choose Privileges',)
                                    )
                                    !!}
                        </div>

                    </div>
                    <div class="mt-3 mb-3">
                        <button class="btn btn-info btn-md pd-x-20" type="submit"> تحديث </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
@endsection
