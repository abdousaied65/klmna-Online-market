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
                                        <a href="{{route('home')}}"><i
                                                class="fa fa-dashboard"></i> لوحة التحكم </a>
                                    </li>
                                    <li>
                                        <a class="active" href="{{route('my.reviews')}}"><i
                                                class="fa fa-comments"></i> تقييماتى </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.favorites')}}"><i
                                                class="fa fa-heart"></i> مفضلاتى </a>
                                    </li>
                                    <li>
                                        <a href="{{route('my.reports')}}"><i
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
                                <h2 class="dashbord-title"> عرض تقييماتى </h2>
                            </div>
                            <div class="tabs-wrp account-settings brd-rd5 text-center">
                                <div class="account-settings-inner">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if(isset($reviews) && !$reviews->isEmpty())
                                                <table dir="rtl" class="table table-bordered table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>اسم الاعلان</th>
                                                        <th>صاحب الاعلان</th>
                                                        <th>رقم هاتف صاحب الاعلان</th>
                                                        <th> نص التقييم </th>
                                                        <th> التقييم </th>
                                                        <th>عرض الاعلان</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i = 0; ?>
                                                    @foreach($reviews as $review)
                                                        <tr>
                                                            <td>{{++$i}}</td>
                                                            <td>{{$review->unit->unit_name}}</td>
                                                            <td>{{$review->unit->client->name}}</td>
                                                            <td>{{$review->unit->client->phone_number}}</td>
                                                            <td>{{$review->review_text}}</td>
                                                            <td dir="rtl">{{$review->review_stars}} <i class="fa fa-star"></i></td>
                                                            <td>
                                                                <a target="_blank" href="{{route('unit.show',$review->unit->id)}}" class="btn btn-sm btn-common">
                                                                    عرض الاعلان
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                لا يوجد تقييمات لديك
                                            @endif
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
