@extends('client.layouts.app-login')
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title"> تسجيل الدخول اصحاب الاعلانات</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}"> الصفحة الرئيسية / </a></li>
                            <li class="current"> تسجيل الدخول اصحاب الاعلانات</li>
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
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <section class="login section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="login-form login-area">
                        <h3>
                            تسجيل الدخول اصحاب الاعلانات
                        </h3>
                        <form role="form" class="login-form" method="POST" action="{{route('client.login')}}">
                            @csrf
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input type="text" id="sender-email" class="form-control" name="email"
                                           placeholder="البريد الالكترونى " style="padding-left: 60px !important;">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input type="password" class="form-control" name="password" placeholder="كلمة المرور" style="padding-left: 60px !important;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" checked id="checkedall">
                                    <label class="custom-control-label" for="checkedall">تذكرنى</label>
                                </div>
                                <a class="forgetpassword" href="{{route('client.password.request')}}">هل نسيت كلمة المرور ؟</a>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-common log-btn">تسجيل الدخول</button>
                            </div>
                            <div class="form-group mt-4">
                                <ul class="form-links">
                                    <li class="float-left"><a href="{{route('client.register')}}">انشاء حساب جديد</a></li>
                                    <li class="float-right"><a href="{{route('index')}}">العودة الى الصفحة الرئيسية </a></li>
                                </ul>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
