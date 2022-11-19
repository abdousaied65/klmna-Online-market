@extends('site.layouts.app-login')
<style>
    input.form-control, .bootstrap-touchspin-down, .bootstrap-touchspin-up {
        height: 40px;
    }

    #message {
        width: 100%;
        height: 50px;
        padding: 10px;
        text-align: center;
        color: forestgreen;
        background: #fff;
        position: relative;
        top: 0px;
        left: 0px;
        z-index: 9999;
        border: 1px solid #bbb;
        border-left: 1px solid forestgreen;
        box-shadow: 1px 1px 5px #bbb;
        direction: rtl;
        display: none;
        font-size: 15px;
        text-shadow: 0px 0px 1px forestgreen;
    }

    .btn-common {
        padding: 5px;
        text-align: center;
    }
</style>
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">تفاصيل العرض</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}">الصفحة الرئيسية /</a></li>
                            <li class="current">تفاصيل العرض</li>
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

    <div class="section-padding">
        <div class="container">
            <div class="product-info row">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="ads-details-wrapper">
                        <div id="owl-demo" class="owl-carousel owl-theme">
                            @if(!$unit->images->isEmpty())
                                @foreach($unit->images as $image)
                                    <div class="item">
                                        <div class="product-img">
                                            <img class="img-fluid" style="width:100%; height: 400px;"
                                                 src="{{asset($image->unit_image)}}" alt="">
                                        </div>
                                        <span class="price"
                                              dir="rtl">{{$unit->price}} / {{$unit->interval->interval_name}}</span>
                                    </div>
                                @endforeach()
                            @endif
                        </div>
                    </div>
                    <div class="details-box">
                        <div class="ads-details-info">
                            <h2 class="text-center">{{$unit->unit_name}}</h2>
                            <div class="details-meta text-right float-right" dir="rtl">
                                <span><a href="{{route('dept.units',$unit->dept->id)}}"><i class="lni-tag"></i>
                                        {{$unit->dept->dept_name}}
                                    </a></span>
                                <span><a href="javascript:;"><i class="lni-alarm-clock"></i>
                                        نشر
                                        {{$unit->created_at->diffForHumans()}}
                                    </a></span>
                                <span><a href="javascript:;"><i class="lni-map-marker"></i>
                                    {{$unit->governorate->governorate}}
                                    </a></span>
                                <span><a href="javascript:;"><i class="lni-eye"></i>
                                    {{$unit->address}}
                                    </a></span>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <p class="mb-4 text-right" dir="rtl">
                                {{$unit->description}}
                            </p>
                        </div>
                        <div class="tag-bottom">
                            <div class="float-right">
                                <ul class="advertisement text-right float-right" dir="rtl">
                                    <li>
                                        <p><strong><i class="lni-folder"></i> الخدمات :</strong> <a href="javascript:;">
                                                {{$unit->services}}
                                            </a>
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong><i class="lni-archive"></i> السعر :</strong>
                                            {{$unit->price}} / {{$unit->interval->interval_name}}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong><i class="lni-package"></i> متاح لعدد افراد :</strong> <a
                                                href="javascript:;">
                                                {{$unit->count}}
                                            </a></p>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">

                    <aside class="details-sidebar">
                        <div class="widget">
                            <h4 class="widget-title text-center">
                                تم نشر الاعلان بواسطه
                            </h4>
                            <div class="agent-inner">
                                <div class="agent-title">
                                    <div class="agent-photo">
                                        <a href="javascript:;"><img src="{{asset($unit->client->profile->profile_pic)}}"
                                                                    alt=""></a>
                                    </div>
                                    <div class="agent-details">
                                        <h3><a href="javascript:;">
                                                {{$unit->client->name}}
                                            </a></h3>
                                        <span><i class="lni-phone-handset"></i>
                                            <a href="tel:{{$unit->client->phone_number}}">
                                                {{$unit->client->phone_number}}
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right" dir="rtl">
{{--                                    <a href="{{route('contact.client')}}" class="d-block btn-common m-2">--}}
{{--                                        <i class="fa fa-envelope"></i>--}}
{{--                                        مراسلة عبر الموقع--}}
{{--                                    </a>--}}
                                    <a href="javascript:;" unit_id="{{$unit->id}}"
                                       class="add_favorite d-block btn-common m-2">
                                        <i class="fa fa-heart"></i>
                                        اضافة الى مفضلاتى
                                    </a>
                                    <a href="#mymodal99" data-toggle="modal" unit_id="{{$unit->id}}" class="modal-effect add_review d-block btn-common m-2">
                                        <i class="fa fa-star"></i>
                                        اعطاء تقييم
                                    </a>
                                    <a href="javascript:;" id="share_url" class="d-block btn-common m-2">
                                        <i class="fa fa-link"></i>
                                        مشاركة رابط الاعلان
                                    </a>
                                    <div id="message">
                                        <i class="fa fa-check-circle"></i>
                                        تم نسخ الرابط
                                    </div>
                                    <?php
                                    $phone_number = "+2" . $unit->client->phone_number;
                                    $client_name = $unit->client->name;
                                    $unit_name = $unit->unit_name;
                                    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                                        $url = "https://";
                                    } else {
                                        $url = "http://";
                                    }
                                    $url .= $_SERVER['HTTP_HOST'];
                                    $url .= $_SERVER['REQUEST_URI'];
                                    $message = "السلام عليكم " . $client_name . " عندي استفسار بخصوص إعلانك " . $unit_name . " رابط الاعلان " . $url;
                                    $full_message = "https://api.whatsapp.com/send/?phone=" . $phone_number . "&text=" . $message . "&app_absent=0";
                                    ?>
                                    <input type="hidden" value="<?php echo $url; ?>" id="url"/>

                                    <a target="_blank" href="<?php echo $full_message;?>"
                                       class="d-block btn-common m-2">
                                        <i class="fa fa-whatsapp"></i>
                                        مراسلة عبر واتساب
                                    </a>
                                    <a href="#mymodal98" data-toggle="modal" unit_id="{{$unit->id}}" class="modal-effect add_report d-block btn-common m-2">
                                        <i class="fa fa-flag"></i>
                                        ابلاغ عن المحتوى
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="widget">
                            <h4 class="widget-title text-right">
                                اعلانات اخرى مشابهة
                            </h4>
                            <ul class="posts-list">
                                @if(isset($similars) && !$similars->isEmpty())
                                    @foreach($similars as $similar)
                                        <li>
                                            <div class="widget-thumb">
                                                <a href="{{route('unit.show',$similar->id)}}"><img
                                                        src="{{asset($similar->images->first()->unit_image)}}" alt=""/></a>
                                            </div>
                                            <div class="widget-content">
                                                <h4>
                                                    <a href="{{route('unit.show',$similar->id)}}">{{$similar->unit_name}}</a>
                                                </h4>
                                                <div class="meta-tag">
                                            <span>
                                                <a href="javascript:;"><i class="lni-user"></i> {{$similar->client->name}}</a>
                                            </span>
                                                    <span>
                                                <a href="javascript:;"><i class="lni-map-marker"></i> {{$similar->governorate->governorate}}</a>
                                            </span>
                                                    <span>
                                                <a href="{{route('dept.units',$similar->dept->id)}}"><i
                                                        class="lni-tag"></i> {{$similar->dept->dept_name}}</a>
                                            </span>
                                                </div>
                                                <h4 class="price btn-common text-white" dir="rtl">{{$similar->price}}
                                                    / {{$similar->interval->interval_name}}</h4>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <hr>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal effects -->
    <div class="modal" id="mymodal98">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal-content-demo">
                <div class="modal-header text-center">
                    <h6 class="modal-title w-100"
                        style="font-family: 'Cairo'; "> ابلاغ عن المحتوى للادارة </h6>
                    <button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 pull-right text-right" dir="rtl">
                        <div id="report_form">
                            <form id="report_form" action="{{route('report.unit')}}" class="report_form" method="POST">
                                @csrf
                                @method('POST')
                                @auth
                                    <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                                    <input type="hidden" class="unit_id" name="unit_id" value=""/>
                                @endauth
                                <label for=""> اكتب نص البلاغ </label>
                                <textarea class="input form-control" name="report_text" required
                                          style="resize: none; width: 60%; height: 100px;"></textarea>
                                <button type="submit" class="btn btn-success btn-sm mt-3"><i
                                        class="fa fa-envelope"></i> ارسال
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> اغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="mymodal99">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content modal-content-demo">
                <div class="modal-header text-center">
                    <h6 class="modal-title w-100"
                        style="font-family: 'Cairo'; "> عمل تقييم للخدمة </h6>
                    <button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 pull-right text-right" dir="rtl">
                        <div id="review_form">
                            <form id="review_form" action="{{route('make.review')}}" class="review_form" method="POST">
                                @csrf
                                @method('POST')
                                @auth
                                    <input type="hidden" name="customer_id" value="{{Auth::user()->id}}"/>
                                    <input type="hidden" class="unit_id" name="unit_id" value=""/>
                                @endauth
                                <label for=""> اكتب تقييمك للخدمة </label>
                                <textarea class="input form-control" name="review_text" required
                                          style="resize: none; width: 60%; height: 100px;"></textarea>
                                <div class="input-rating">
                                    <span>تقييمك :  </span>
                                    <div class="clearfix"></div>
                                    <div class="stars">
                                        <input required id="star5" name="review_stars" value="5" type="radio"><label
                                            for="star5"></label>
                                        <input required id="star4" name="review_stars" value="4" type="radio"><label
                                            for="star4"></label>
                                        <input required id="star3" name="review_stars" value="3" type="radio"><label
                                            for="star3"></label>
                                        <input required id="star2" name="review_stars" value="2" type="radio"><label
                                            for="star2"></label>
                                        <input required id="star1" name="review_stars" value="1" type="radio"><label
                                            for="star1"></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm"><i
                                        class="fa fa-envelope"></i> ارسال
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-sm btn-danger"><i class="fa fa-close"></i> اغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    @auth('web')
        <input type="hidden" value="{{Auth::user()->id}}" id="customer_id" />
    @endauth
    <script src="{{asset('admin-assets/js/jquery.min.js')}}"></script>
    <script>
        $('#share_url').on('click', function () {
            var copyText = document.getElementById("url");
            copyText.select();
            navigator.clipboard.writeText(copyText.value);
            $('#message').show(200).delay(2000).hide(200);
        });
    </script>
@endsection
