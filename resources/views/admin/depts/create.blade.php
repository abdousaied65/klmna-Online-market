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
                        <a class="btn btn-primary btn-md pull-left" href="{{ route('admin.depts.index') }}">عودة
                            للخلف</a>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success"> اضافة قسم
                            جديد </h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <form class="parsley-style-1" id="selectForm2" name="selectForm2"
                          action="{{route('admin.depts.store','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label> اسم القسم <span class="text-danger">*</span></label>
                                <input required class="form-control" name="dept_name" type="text">
                            </div>
                            <div class="col-lg-3">
                                <label for=""> نوع النسبة </label>
                                <select name="profit_type" class="form-control" id="">
                                    <option value="">اختر نوع النسبة</option>
                                    <option value="percent"> % مئوية</option>
                                    <option value="value"> جنيه مصرى</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for=""> قيمة النسبة </label>
                                <input type="text" class="form-control" name="profit_value"/>
                            </div>
                            <div class="col-lg-3">
                                <label for=""> الصورة المعبرة </label>
                                <input accept=".jpg,.png,.jpeg" type="file"
                                       oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="file"
                                       name="dept_pic" class="form-control">
                                <label for="" class="d-block"> معاينة الصورة </label>
                                <img id="pic" src=""
                                     style="width: 100px; height:100px;"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-info pd-x-20" type="submit">اضافة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
