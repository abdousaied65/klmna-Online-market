@extends('client.layouts.app-login')

@section('content')

    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">اعادة تعيين كلمة المرور اصحاب الاعلانات</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}">الرئيسية /</a></li>
                            <li class="current">اعادة تعيين كلمة المرور اصحاب الاعلانات</li>
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
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-12 col-xs-12">
                    <div class="forgot login-area">
                        <h3>
                             اعادة تعيين كلمة المرور اصحاب الاعلانات
                        </h3>
                        @if (session('status'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form role="form" action="{{ route('client.password.email') }}" method="post" class="login-form">
                            @csrf

                            <div class="form-group">
                                <div class="input-icon">
                                    <i class="icon lni-user"></i>
                                    <input type="email" id="sender-email" class="form-control @error('email') is-invalid @enderror" style="padding-left: 60px !important;" name="email"
                                           value="{{ old('email') }}" required autocomplete="email"
                                           autofocus placeholder="البريد الالكترونى">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-common log-btn">
                                    ارسال رابط اعادة تعيين كلمةالمرور
                                </button>
                            </div>
                            <div class="form-group mt-4">
                                <ul class="form-links">
                                    <li class="float-left"><a href="{{route('client.register')}}">انشاء حساب جديد</a></li>
                                    <li class="float-right"><a href="{{route('client.login')}}">العودة الى تسجيل الدخول </a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
