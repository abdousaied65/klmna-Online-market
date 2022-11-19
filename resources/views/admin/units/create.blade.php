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
                        <a class="btn btn-primary btn-md pull-left" href="{{ route('admin.units.index') }}">عودة
                            للخلف</a>
                        <h5 style="min-width: 300px;" class="pull-right alert alert-md alert-success"> اضافة وحده
                            جديدة </h5>
                    </div>
                    <div class="clearfix"></div>
                    <br>

                    <form class="parsley-style-1" id="selectForm2" name="selectForm2"
                          action="{{route('admin.units.store','test')}}" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label> اسم الوحده <span class="text-danger">*</span></label>
                                <input required class="form-control" name="unit_name" type="text">
                            </div>

                            <div class="col-md-3">
                                <label> اسم القسم التابع له <span class="text-danger">*</span></label>
                                <select required name="dept_id" class="form-control selectpicker show-tick"
                                        title="اختر القسم التابع له" data-live-search="true" data-style="btn-info">
                                    @foreach($depts as $dept)
                                        <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label> اسم المدينة التابعة له <span class="text-danger">*</span></label>
                                <select required name="governorate_id" class="form-control selectpicker show-tick"
                                        title="اختر المدينة التابعة له" data-live-search="true"
                                        data-style="btn-danger">
                                    @foreach($governorates as $governorate)
                                        <option value="{{$governorate->id}}">{{$governorate->governorate}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label> اسم العميل <span class="text-danger">*</span></label>
                                <select required name="client_id" class="form-control selectpicker show-tick"
                                        title="اختر العميل" data-live-search="true"
                                        data-style="btn-dark">
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label> العنوان <span class="text-danger">*</span></label>
                                <input required class="form-control" name="address" type="text">
                            </div>

                            <div class="col-lg-3">
                                <label> السعر <span class="text-danger">*</span></label>
                                <input required class="form-control" name="price" type="number">
                            </div>
                            <div class="col-lg-3">
                                <label> الفترة <span class="text-danger">*</span></label>
                                <select required name="interval_id" class="form-control selectpicker show-tick"
                                        title="اختر الفترة" data-live-search="true" data-style="btn-warning">
                                    @foreach($intervals as $interval)
                                        <option value="{{$interval->id}}">{{$interval->interval_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label> عدد الافراد <span class="text-danger">*</span></label>
                                <input required class="form-control" name="count" type="number">
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label> الخدمات المتوفرة <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="services" />
                            </div>
                            <div class="col-lg-3">
                                <label> عدد الوحدات المتاحة <span class="text-danger">*</span></label>
                                <input required class="form-control" name="available_number" type="number">
                            </div>
                            <div class="col-lg-3">
                                <label> صور الوحدة <span class="text-danger">*</span></label>
                                <input required class="form-control" name="images[]" id="gallery-photo-add" type="file"
                                       multiple>
                            </div>
                            <div class="col-lg-3">
                                <p class="alert alert-sm alert-danger text-center mt-2 mb-2">
                                    معاينة الصور
                                </p>
                                <div class="gallery"></div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="">وصف الوحدة</label>
                                <textarea name="description" class="form-control" style="resize: none" id="" cols="30" rows="10"></textarea>
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
<script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var imagesPreview = function (input, placeToInsertImagePreview) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
                        $($.parseHTML('<img style="width:70px;margin:3px;height:70px;border:1px solid #444; border-radius:5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#gallery-photo-add').on('change', function () {
            $('div.gallery').html("");
            imagesPreview(this, 'div.gallery');
        });
    });
</script>
