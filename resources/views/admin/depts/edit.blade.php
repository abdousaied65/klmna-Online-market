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
                            <a class="btn btn-primary btn-md" href="{{ route('admin.depts.index') }}">عودة للخلف</a>
                        </div>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success">
                            تعديل بيانات القسم
                        </h5>
                        <div class="clearfix"></div>
                    </div>
                    <br>
                    <form action="{{route('admin.depts.update', $dept->id)}}" enctype="multipart/form-data"
                          method="post">
                        @csrf
                        @method('PATCH')

                        <div class="row mb-3 mt-3">
                            <div class="parsley-input col-md-3" id="fnWrapper">
                                <label> اسم القسم : <span class="tx-danger">*</span></label>
                                {!! Form::text('dept_name', $dept->dept_name, array('class' => 'form-control','required')) !!}
                            </div>
                            <div class="col-lg-3">
                                <label for=""> نوع النسبة </label>
                                <select name="profit_type" class="form-control" id="">
                                    <option value="">اختر نوع النسبة</option>
                                    <option @if($dept->profit_type == "percent") selected @endif value="percent"> %
                                        مئوية
                                    </option>
                                    <option @if($dept->profit_type == "value") selected @endif value="value"> جنيه
                                        مصرى
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for=""> قيمة النسبة </label>
                                <input type="text" value="{{$dept->profit_value}}" class="form-control"
                                       name="profit_value"/>
                            </div>
                            <div class="col-lg-3">
                                <label for=""> الصورة المعبرة </label>
                                <input accept=".jpg,.png,.jpeg" type="file"
                                       oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="file"
                                       name="dept_pic" class="form-control">
                                <label for="" class="d-block"> معاينة الصورة </label>
                                <img id="pic" src="{{asset($dept->dept_pic)}}"
                                     style="width: 100px; height:100px;"/>
                            </div>
                        </div>
                        <div class="mt-3 mb-3">
                            <button class="btn btn-info btn-md pd-x-20" type="submit"> تحديث</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- main-content closed -->
@endsection
