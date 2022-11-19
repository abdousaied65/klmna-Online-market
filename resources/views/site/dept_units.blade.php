@extends('site.layouts.app-login')
<style>
    img.img-unit {
        width: 100% !important;
        height: 250px !important;
        min-height: 250px !important;
        max-height: 250px !important;
    }

    .feature-content {
        width: 100% !important;
    }

    .price {
        font-size: 16px !important;
    }
</style>
@section('content')
    <div class="page-header" style="background: url({{asset('assets/img/banner1.jpg')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-wrapper text-right" dir="rtl">
                        <h2 class="product-title">وحدات القسم</h2>
                        <ol class="breadcrumb">
                            <li><a href="{{route('index')}}">الصفحة الرئيسية /</a></li>
                            <li class="current"> وحدات القسم</li>
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

    <div class="main-container section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12 page-sidebar">
                    <aside>

                        <div class="widget_search">
                            <form role="search" dir="rtl" method="get" action="{{route('units.search')}}"
                                  id="search-form">
                                <input type="search" dir="rtl" @if(isset($key)) value="{{$key}}" @endif class="form-control" autocomplete="off" name="key"
                                       placeholder="ابحث ..." id="search-input">
                                <button type="submit" id="search-submit" class="search-btn float-left">
                                    <i class="lni-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="widget categories">
                            <h4 class="widget-title text-right">كل الاقسام</h4>
                            <ul class="categories-list text-right" dir="rtl">
                                @foreach($depts as $dept)
                                    <li dir="rtl" class="text-right">
                                        <a href="{{route('dept.units',$dept->id)}}" dir="rtl">
                                            <img src="{{asset($dept->dept_pic)}}"
                                                 style="width: 20px; height: 20px; margin-left: 10px;" alt="">
                                            {{$dept->dept_name}}
                                            <span class="category-counter">({{$dept->units->count()}})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12 page-content">

                    <div class="product-filter text-center">
                        <h5>
                            @if(isset($dept_k) && !empty($dept_k))
                                عرض وحدات القسم
                                ( {{$dept_k->dept_name}} )
                            @else
                                عرض نتائج البحث
                            @endif
                        </h5>
                    </div>

                    <div class="adds-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show">
                                <div class="row">
                                    @if(!$units->isEmpty())
                                        @foreach($units as $unit)
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                <div class="featured-box" dir="rtl">
                                                    <figure>
                                                        <a href="{{route('unit.show',$unit->id)}}">
                                                            <img class="img-fluid img-unit"
                                                                 @if($unit->images->isEmpty())
                                                                 src=""
                                                                 @else
                                                                 src="{{asset($unit->images->first()->unit_image)}}"
                                                                @endif
                                                            />
                                                        </a>
                                                    </figure>
                                                    <div class="feature-content text-right justify-content-center"
                                                         dir="rtl">
                                                        <div class="product text-right">
                                                            <a href="{{route('unit.show',$unit->id)}}"> {{$unit->dept->dept_name}} </a>
                                                        </div>
                                                        <h4 class="text-center"><a href="ads-details.html">
                                                                {{$unit->unit_name}}
                                                            </a></h4>
                                                        <div class="meta-tag">
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
                                                        <div class="listing-bottom">
                                                            <h5 class="price float-left" dir="rtl">
                                                                {{$unit->price}} / {{$unit->interval->interval_name}}
                                                            </h5>
                                                            <a href="{{route('unit.show',$unit->id)}}"
                                                               class="btn btn-common float-right">
                                                                عرض التفاصيل
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    @else
                                        <div class="col-lg-12 mt-3 mb-3">
                                            <p class="alert alert-sm btn-custom text-center">
                                                لا يوجد عروض
                                            </p>
                                        </div>
                                    @endif
                                </div>
                                <div class="clearfix text-right bg-dark p-2 pr-5 text-white" style="border-radius:5px"
                                     dir="rtl">
                                    عدد نتائج العرض :
                                    {{ $units->total() }}
                                </div>
                                <div class="clearfix text-center" dir="rtl">
                                    {{ $units->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
