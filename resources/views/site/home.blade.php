@extends('site.layouts.app-login')
<style>
    input.form-control {
        height: 40px !important;
        padding: 10px !important;
    }

    label {
        color: #444;
    }
</style>
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">لوحة تحكم العملاء والزوار </h2>
                        <ol class="breadcrumb">
                            <li><a href="javascript:;">الصفحة الرئيسية /</a></li>
                            <li class="current">لوحة تحكم العملاء والزوار</li>
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
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert text-center alert-success">
                            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
                            {{ session('status') }}
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
                                             src="{{asset($customer->profile->profile_pic)}}" alt=""></a>
                                </figure>
                                <div class="usercontent">
                                    <h3>{{$customer->name}}</h3>
                                    <h4>العملاء والزوار</h4>
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a class="active" href="{{route('home')}}"><i
                                                class="fa fa-dashboard"></i> لوحة التحكم </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.reviews')}}" ><i
                                                class="fa fa-comments"></i> تقييماتى </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.favorites')}}" ><i
                                                class="fa fa-heart"></i> مفضلاتى </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.reports')}}" ><i
                                                class="fa fa-heart"></i> بلاغاتى </a>
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
                                <h2 class="dashbord-title">اعدادات الحساب الشخصى</h2>
                            </div>
                            <div class="tabs-wrp account-settings brd-rd5 text-center">
                                <div class="account-settings-inner">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-4 col-lg-4">
                                            <div class="profile-info text-center">
                                                <div class="profile-thumb brd-rd50">
                                                    <img id="pic" style="width:160px; height: 160px;"
                                                         src="{{asset($customer->profile->profile_pic)}}"
                                                         alt="profile-img1.jpg" itemprop="image">
                                                </div>
                                                <div class="profile-img-upload-btn">
                                                    <label class="fileContainer brd-rd5 yellow-bg">
                                                        تغيير الصورة الشخصية
                                                        <input class="form-control m-3"
                                                               name="profile_pic" accept=".jpg,.png,.jpeg" type="file"
                                                               oninput="pic.src=window.URL.createObjectURL(this.files[0])"
                                                               id="file"
                                                               form="myform"/>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-lg-8">
                                            <div class="profile-info-form-wrap">
                                                <form enctype="multipart/form-data" id="myform"
                                                      class="profile-info-form"
                                                      action="{{route('update.profile')}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="customer_id"
                                                           value="{{Auth::user()->id}}"/>
                                                    <div class="row">
                                                        <div class="mt-2 mb-2 col-lg-12">
                                                            <label class="d-block">الاسم بالكامل
                                                                <sup>*</sup></label>
                                                            <input class="brd-rd3 text-right form-control"
                                                                   type="text" name="name"
                                                                   value="{{$customer->name}}"
                                                                   dir="rtl" required
                                                                   placeholder="اكتب الاسم بالكامل ">
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="mt-2 mb-2  col-md-12 col-sm-12 col-lg-12">
                                                            <label>البريد الالكترونى
                                                                <sup>*</sup></label>
                                                            <input class="brd-rd3 text-left  form-control"
                                                                   type="email" name="email"
                                                                   value="{{$customer->email}}"
                                                                   dir="ltr"
                                                                   placeholder="اكتب البريد الالكترونى">
                                                        </div>
                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12">
                                                            <label> رقم الهاتف <sup>*</sup></label>
                                                            <input class="brd-rd3 text-left  form-control"
                                                                   type="number" required
                                                                   dir="ltr" name="phone_number"
                                                                   value="{{$customer->phone_number}}"
                                                                   placeholder="اكتب رقم الهاتف">
                                                        </div>
                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12">
                                                            <label> كلمة المرور <sup>*</sup></label>
                                                            <input class="brd-rd3 text-left  form-control"
                                                                   type="password" required
                                                                   dir="ltr" name="password"
                                                                   placeholder="اكتب كلمة المرور">
                                                        </div>
                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12">
                                                            <label> العنوان <sup>*</sup></label>
                                                            <div class="select-wrp">
                                                                <input name="city_name" dir="rtl"
                                                                       value="{{$customer->profile->city_name}}"
                                                                       class="form-control"
                                                                       required/>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12">
                                                            <label> العمر / السن
                                                                <sup>*</sup></label>
                                                            <input class="brd-rd3 text-left form-control"
                                                                   type="number" required
                                                                   dir="ltr" name="age"
                                                                   value="{{$customer->profile->age}}"
                                                                   placeholder="اكتب العمر او السن ">
                                                        </div>

                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12">
                                                            <label> النوع <sup>*</sup></label>
                                                            <select required style="height: 40px;"
                                                                    name="gender"
                                                                    class="form-control">
                                                                <option value="">اختر النوع</option>
                                                                <option
                                                                    @if($customer->profile->gender == "male") selected
                                                                    @endif value="male"> ذكر
                                                                </option>
                                                                <option
                                                                    @if($customer->profile->gender == "female") selected
                                                                    @endif value="female"> أنثى
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="mt-2 mb-2 col-md-12 col-sm-12 col-lg-12"
                                                             style="margin-top: 40px">
                                                            <button type="submit"
                                                                    class="btn btn-md btn-success">
                                                                <i class="fa fa-check"></i> تحديث
                                                                البيانات
                                                            </button>
                                                        </div>
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
            </div>
        </div>
    </div>
@endsection
