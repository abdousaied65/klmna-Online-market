@extends('site.layouts.app-main')
<style>
    .icon img {
        width: 90px !important;
        height: 70px !important;
    }
    img.img-fluid{
        width: 100% !important;
        height: 200px !important;
    }
    div.meta-tag > span > a{
        font-size: 12px !important;
    }
</style>
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissable text-center" style="margin-top: 30px;">
            <button class="close" data-dismiss="alert" aria-label="Close">×</button>
            {{ session('success') }}
        </div>
    @endif

    <section id="categories">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12 col-xs-12">
                    <div id="categories-icon-slider" class="categories-wrapper owl-carousel owl-theme">
                        @foreach($depts as $dept)
                            <div class="item">
                                <a href="{{route('dept.units',$dept->id)}}">
                                    <div class="category-icon-item">
                                        <div class="icon-box">
                                            <div class="icon">
                                                <img src="{{asset($dept->dept_pic)}}" alt="">
                                            </div>
                                            <h4>{{$dept->dept_name}}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-lis section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
                    <h3 class="section-title">
                        أحدث العروض المضافة
                    </h3>
                    <div id="new-products" class="owl-carousel owl-theme">
                        @if(isset($latest_units) && !$latest_units->isEmpty())
                            @foreach($latest_units as $unit)
                                <div class="item">
                                    <div class="product-item">
                                        <div class="carousel-thumb">
                                            <img class="img-fluid" src="{{asset($unit->images->first()->unit_image)}}"
                                                 alt="">
                                            <div class="overlay">
                                                <div>
                                                    <a class="btn btn-common" href="{{route('unit.show',$unit->id)}}">عرض التفاصيل</a>
                                                </div>
                                            </div>
                                            <span class="price text-right" dir="rtl">
                                                {{$unit->price}} / {{$unit->interval->interval_name}}
                                            </span>
                                        </div>
                                        <div class="product-content">
                                            <h3 class="product-title justify-content-center text-center"><a href="{{route('unit.show',$unit->id)}}">
                                                    {{$unit->unit_name}}
                                                </a>
                                            </h3>
                                            <div class="meta-tag text-right" dir="rtl" >
                                                <span>
                                                    <a href="javascript:;"><i class="lni-user"></i>
                                                        {{$unit->client->name}}
                                                    </a>
                                                </span>
                                                <span>
                                                    <a href="javascript:;"><i class="lni-map-marker"></i>
                                                        {{$unit->governorate->governorate}}
                                                    </a>
                                                </span>
                                                <span>
                                                    <a href="{{route('dept.units',$unit->dept->id)}}"><i
                                                            class="lni-tag"></i> {{$unit->dept->dept_name}} </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="works section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">كيف تصبح معنا</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-thumbs-up"></i>
                        </div>
                        <p>استقبل عمليات الشراء</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-bookmark-alt"></i>
                        </div>
                        <p>انشر اعلان عن منتج</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="works-item">
                        <div class="icon-box">
                            <i class="lni-users"></i>
                        </div>
                        <p>انشأ حساب لدينا</p>
                    </div>
                </div>
                <hr class="works-line">
            </div>
        </div>
    </section>


    <section class="services bg-light section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="section-title">
                        ما يميزنا عن غيرنا
                    </h3>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.2s">
                        <div class="icon">
                            <i class="lni-leaf"></i>
                        </div>
                        <div class="services-content">
                            <h3 class="text-center"><a href="#">
                                    أسعار غير قابلة للمنافسة
                                </a></h3>
                            <p dir="rtl" class="text-center">
                                أقل الاسعار فى السوق لدينا .. ولدينا ايضا عروض على الاسعار وتخفيضات تصل ل 50%
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.4s">
                        <div class="icon">
                            <i class="lni-display"></i>
                        </div>
                        <div class="services-content">
                            <h3 class="text-center"><a href="#">
                                    أعلى جودة ممكنة
                                </a></h3>
                            <p class="text-center">
                                نحرص على الجودة كما نحرص على السعر كما نقدم أعلى جودة مقارنة بمنافسينا
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xs-12">
                    <div class="services-item wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon">
                            <i class="lni-color-pallet"></i>
                        </div>
                        <div class="services-content">
                            <h3 class="text-center"><a href="#">الدعم الفنى وحل المشكلات</a></h3>
                            <p class="text-center">
                                لدينا فريق عمل مهمته الرد على استفسارات العملاء والتواصل معهم على مدار
                                اليوم
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
