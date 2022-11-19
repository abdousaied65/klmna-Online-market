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
                            <a class="btn btn-primary btn-md" href="{{ route('admin.intervals.index') }}">عودة للخلف</a>
                        </div>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success">
                            تعديل بيانات الفترة
                        </h5>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    {!! Form::model($interval, ['method' => 'PATCH','route' => ['admin.intervals.update', $interval->id]]) !!}


                    <div class="row mb-3 mt-3">
                        <div class="parsley-input col-md-4" id="fnWrapper">
                            <label> اسم الفترة : <span class="tx-danger">*</span></label>
                            {!! Form::text('interval_name', null, array('class' => 'form-control','required')) !!}
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
