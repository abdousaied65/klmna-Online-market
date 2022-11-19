@extends('site.layouts.app-login')
<style>

</style>
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">تواصل معنا</h2>
                        <ol class="breadcrumb">
                            <li><a href="#">الصفحة الرئيسية /</a></li>
                            <li class="current"> تواصل معنا</li>
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
        <div class="alert alert-md text-center alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <section id="google-map-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <object style="border:0; height: 450px; width: 100%;"
                            data="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d110506.81695948941!2d31.3097917!3d30.0558437!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1629731817349!5m2!1sar!2seg"></object>
                </div>
            </div>
        </div>
    </section>


    <section id="content" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-xs-12">

                    <form class="contact-form" method="POST" action="{{route('contact.store')}}">
                        @csrf
                        @method('POST')
                        <h2 class="contact-title text-right" dir="rtl">
                            ارسل رسالة فورية
                        </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row text-right" dir="rtl">
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="اكتب الاسم" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="email" dir="ltr" class="form-control" id="email" placeholder="البريد الالكترونى"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="msg_subject" name="subject"
                                                   placeholder="موضوع الرسالة" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row text-right" dir="rtl">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <textarea name="message" style="resize: none" class="form-control" placeholder="نص الرسالة" rows="7" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="phone_number" name="phone"
                                                   placeholder="رقم الهاتف" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" id="submit" class="btn btn-common">ارسل الان</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="information text-right" dir="rtl">
                        <h3>بيانات التواصل</h3>
                        <div class="contact-datails">
                            <ul class="list-unstyled info">
                                <li><span>العنوان الجغرافى : </span>
                                    <p> القاهرة - التجمع الخامس - شارع التسعين - المبنى بجوار بنك الامارات دبى الوطنى</p></li>
                                <li><span>البريد الالكترونى : </span>
                                    <p><a target="_blank" href="mailto:contact@klmna.com">Contact@klmna.com</a>
                                    </p></li>
                                <li><span>رقم التواصل : </span>
                                    <a dir="ltr" href="tel:+966599684247">+966599684247</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
