@extends('client.layouts.app-login')
<!-- Internal Data table css -->
<style>
    .drop.show {
        left: -125px !important;
        width: 220px;
    }

    .drop.show a {
        width: auto !important;
    }

    .drop.show a i {
        margin-right: 10px;
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
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
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
                                        <a href="{{route('client.units.create')}}"><i
                                                class="sidebar-item-icon fa fa-plus"></i>
                                            <span class="menu-title text-center">
                                              اضافة وحدة جديدة
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item {{ Request::is('*/units') ? 'active' : '' }}">
                                        <a class="active"  href="{{route('client.units.index')}}"><i
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
                                    <div class="card">
                                        <div class="card-header pb-0">
                                            <div class="d-flex justify-content-between">
                                                <div class="col-lg-12 margin-tb">
                                                    @can('add unit')
                                                        <a class="btn pull-left btn-primary btn-md"
                                                           href="{{ route('client.units.create') }}"><i
                                                                class="fa fa-plus"></i> اضافة وحدة معروضة جديد </a>
                                                    @endcan
                                                    <h5 class="pull-right alert alert-md alert-success">عرض وحداتى المتاحة</h5>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table dir="rtl" class="table mg-b-0 text-center table-hover " id="example-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">اسم الوحدة المعروضة</th>
                                                        <th class="text-center"> القسم التابع</th>
                                                        <th class="text-center"> المدينة</th>
                                                        <th class="text-center"> العنوان</th>
                                                        <th class="text-center"> الخدمات المتوفرة</th>
                                                        <th class="text-center"> السعر</th>
                                                        <th class="text-center"> الفترة</th>
                                                        <th class="text-center"> عدد الافراد</th>
                                                        <th class="text-center"> عدد الوحدات المتاحة</th>
                                                        <th class="text-center"> الوصف </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $i=0;
                                                    @endphp
                                                    @foreach ($units as $key => $unit)
                                                        <tr>
                                                            <td>{{ ++$i }}</td>
                                                            <td>{{ $unit->unit_name }}</td>
                                                            <td>{{ $unit->dept->dept_name }}</td>
                                                            <td>{{ $unit->governorate->governorate }}</td>
                                                            <td>{{ $unit->address }}</td>
                                                            <td>{{$unit->services}}</td>
                                                            <td>{{ $unit->price }}</td>
                                                            <td>{{ $unit->interval->interval_name }}</td>
                                                            <td>{{ $unit->count }}</td>
                                                            <td>{{ $unit->available_number }}</td>
                                                            <td>{{mb_substr($unit->description , 0,50)}} ...</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
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
