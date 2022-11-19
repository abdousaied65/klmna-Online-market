@extends('site.layouts.app-login')
<style>
    .popup-social {
        float: left;
        width: 100%;
        /*margin-bottom: 100px;*/
    }
    .popup-social > a {
        display: inline-block;
        margin: 2.5px 0px;
        color: #fff;
        font-size: 14px;
        padding: 8px 28px;
        border-width: 2px;
        border-style: solid;
    }
    .popup-social > a i {
        font-size: 13px;
    }
    .popup-social > a:hover {
        background-color: transparent;
    }

    /*===== Social Media Offical Colors =====*/
    a.facebook,
    a.facebook-clr:hover {
        background: #3b5998;
        border-color: #3b5998;
    }

    a.facebook-clr,
    a.facebook:hover {
        border-color: #3b5998;
        color: #3b5998;
    }

    a.google,
    a.google-clr:hover {
        background: #dd4b39;
        border-color: #dd4b39;
    }

    a.google-clr,
    a.google:hover {
        border-color: #dd4b39;
        color: #dd4b39;
    }

    a.github,
    a.github-clr:hover {
        background: #1f76b6;
        border-color: #1f76b6;
    }

    a.github-clr,
    a.github:hover {
        border-color: #1f76b6;
        color: #1f76b6;
    }

</style>
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title"> تسجيل الدخول العملاء والزوار</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}"> الصفحة الرئيسية / </a></li>
                            <li class="current"> تسجيل الدخول العملاء والزوار</li>
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
                            تسجيل الدخول العملاء والزوار
                        </h3>
                        <form role="form" class="login-form" method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-user"></i>
                                    <input required type="number" id="sender-email" class="form-control" name="phone_number"
                                           placeholder=" رقم الهاتف " style="padding-left: 60px !important;">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="lni-lock"></i>
                                    <input  required type="password" class="form-control" name="password"
                                           placeholder="كلمة المرور" style="padding-left: 60px !important;">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" checked
                                           id="checkedall">
                                    <label class="custom-control-label" for="checkedall">تذكرنى</label>
                                </div>
                                <a class="forgetpassword" href="{{route('password.request')}}">هل نسيت كلمة
                                    المرور ؟</a>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-common log-btn">تسجيل الدخول</button>
                            </div>
                            <hr>
                            <div class="sign-popup-title text-center">
                                <span>أو من خلال شبكات التواصل الاجتماعى</span>
                            </div>
                            <div class="popup-social text-center">
                                <a class="facebook brd-rd3" href="{{route('login.facebook')}}" title="Facebook"
                                   itemprop="url">
                                    <i class="fa fa-facebook"></i> Facebook
                                </a>
                                <a class="google brd-rd3" href="{{route('login.google')}}" title="Google Plus"
                                   itemprop="url">
                                    <i class="fa fa-google-plus"></i> Google
                                </a>
                                <a class="github brd-rd3" href="{{route('login.github')}}" title="Github" itemprop="url">
                                    <i class="fa fa-github"></i> Github
                                </a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>

                            <hr>
                            <div class="form-group mt-4">
                                <ul class="">
                                    <li class="float-left"><a class="btn btn-sm btn-common" href="{{route('register')}}">انشاء حساب جديد</a>
                                    </li>
                                    <li class="float-right"><a class="btn btn-sm btn-common" href="{{route('index')}}">العودة الى الصفحة الرئيسية </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
