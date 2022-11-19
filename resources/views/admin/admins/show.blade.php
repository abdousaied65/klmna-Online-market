@extends('admin.layouts.master')
<!-- Internal Data table css -->
<style>
    i.la {
        font-size: 15px !important;
    }
</style>
@section('content')
    <div class="row text-center">
        <div class="col-lg-10 m-5 p-1">
            <p class="alert alert-info alert-md text-center"> عرض بيانات الموظف </p>
            <a class="btn btn-primary" href="{{ route('admin.admins.index') }}"> عودة للخلف </a>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> اسم الموظف :</strong>
                {{ $admin->name }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> البريد الالكترونى :</strong>
                {{ $admin->email }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> الحالة :</strong>
                @if($admin->Status == "active")
                    مفعل
                @elseif($admin->Status == "blocked")
                    معطل
                @endif
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 ml-5 mt-2 p-1">
            <div class="form-group">
                <strong> الصلاحية :</strong>
                @if(!empty($admin->getRoleNames()))
                    @foreach($admin->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
