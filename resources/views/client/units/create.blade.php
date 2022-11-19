@extends('client.layouts.app-login')
<style>
    input.form-control,select.form-control {
        height: 40px !important; padding: 5px !important;
    }
</style>
@section('content')

    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">لوحة تحكم اصحاب الاعلانات</h2>
                        <ol class="breadcrumb">
                            <li><a href="javascript:;">الصفحة الرئيسية /</a></li>
                            <li class="current">لوحة تحكم اصحاب الاعلانات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('success'))
                        <div class="alert text-center alert-success">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure>
                                    <a href="javascript:;">
                                        <img style="width: 160px; height: 160px;"
                                             src="{{asset($client->profile->profile_pic)}}" alt=""></a>
                                </figure>
                                <div class="usercontent">
                                    <h3>{{$client->name}}</h3>
                                    <h4>أصحاب الاعلانات</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li class="nav-item {{ Request::is('*home') ? 'active' : '' }}">
                                        <a href="{{route('client.home')}}"><i
                                                class="sidebar-item-icon fa fa-dashboard"></i>
                                            <span class="menu-title text-center">
                                              لوحة التحكم
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('*/units/create') ? 'active' : '' }}">
                                        <a class="active" href="{{route('client.units.create')}}"><i
                                                class="sidebar-item-icon fa fa-plus"></i>
                                            <span class="menu-title text-center">
                                              اضافة وحدة جديدة
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('*/units') ? 'active' : '' }}">
                                        <a href="{{route('client.units.index')}}"><i
                                                class="sidebar-item-icon fa fa-list"></i>
                                            <span class="menu-title text-center">
                                              عرض وحداتى المتاحة
                                            </span>
                                        </a>
                                    </li>


                                    <li class="nav-item {{ Request::is('*/units-reviews') ? 'active' : '' }}">
                                        <a href="{{route('client.units.reviews')}}">
                                            <i class="fa fa-star"></i>
                                            <span class="menu-title text-center">
                                              تقييمات الزبائن لوحداتى
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <form action="{{route('client.logout')}}" method="POST">
                                            @csrf
                                            <button class="btn-block btn-danger btn text-left" type="submit">
                                                <i class="lni-enter" style="margin-right: 20px;"></i>
                                                تسجيل الخروج
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="page-content">
                        <div class="inner-box">
                            <div class="dashboard-box text-center">
                                <h2 class="dashbord-title">اضافة وحدة جديدة</h2>
                            </div>
                            <div class="tabs-wrp account-settings brd-rd5 text-center p-4" dir="rtl">
                                <div class="account-settings-inner">
                                    <form class="parsley-style-1" id="selectForm2" name="selectForm2"
                                          action="{{route('client.units.store','test')}}" enctype="multipart/form-data"
                                          method="post">
                                        {{csrf_field()}}
                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label> اسم الوحده <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="unit_name" type="text">
                                            </div>

                                            <div class="col-md-4">
                                                <label> اسم القسم التابع له <span class="text-danger">*</span></label>
                                                <select required name="dept_id"class="form-control">
                                                    <option value="">اختر القسم التابع له</option>
                                                    @foreach($depts as $dept)
                                                        <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label> اسم المدينة التابعة له <span
                                                        class="text-danger">*</span></label>
                                                <select required name="governorate_id" class="form-control">
                                                    <option value="">اختر المدينة التابعة له</option>
                                                    @foreach($governorates as $governorate)
                                                        <option
                                                            value="{{$governorate->id}}">{{$governorate->governorate}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label> العنوان <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="address" type="text">
                                            </div>

                                            <div class="col-lg-4">
                                                <label> الخدمات المتوفرة <span class="text-danger">*</span></label>
                                                <input type="text" name="services" required class="form-control" />

                                            </div>
                                            <div class="col-lg-4">
                                                <label> السعر <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="price" type="number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label> الفترة <span class="text-danger">*</span></label>
                                                <select required name="interval_id"
                                                        class="form-control">
                                                    <option value="">اختر الفترة</option>
                                                    @foreach($intervals as $interval)
                                                        <option
                                                            value="{{$interval->id}}">{{$interval->interval_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> عدد الافراد <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="count" type="number">
                                            </div>

                                            <div class="col-lg-4">
                                                <label> عدد الوحدات المتاحة <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="available_number"
                                                       type="number">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label for="">
                                                    وصف الوحدة
                                                </label>
                                                <textarea name="description" style="resize: none;"
                                                          class="form-control" id="" cols="30" rows="8"></textarea>
                                            </div>
                                            <div class="col-lg-4">
                                                <label> صور الوحدة <span class="text-danger">*</span></label>
                                                <input required class="form-control" name="images[]" id="gallery-photo-add" type="file"
                                                       multiple>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="alert alert-sm alert-danger text-center mt-2 mb-2">
                                                    معاينة الصور
                                                </p>
                                                <div class="gallery"></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button class="btn btn-info pd-x-20" type="submit"> اضافة </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
