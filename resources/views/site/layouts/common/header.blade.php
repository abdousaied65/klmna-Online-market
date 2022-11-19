<header id="header-wrap">
    <nav class="navbar navbar-expand-lg bg-white fixed-top scrolling-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{route('index')}}" class="navbar-brand"><img src="{{asset('assets/img/logo.png')}}"
                                                                       alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                        aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">
                            الرئيسية
                        </a>
                    </li>
                    @foreach($depts as $dept)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dept.units',$dept->id)}}">
                                {{$dept->dept_name}}
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">
                            تواصل معنا
                        </a>
                    </li>
                    @auth('client-web')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.home')}}">
                                لوحة التحكم
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="d-inline" action="{{route('client.logout')}}" method="POST">
                                @csrf
                                @method('POST')
                                <button style="border: 0;" class="nav-link" type="submit">
                                    تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    @elseauth('web')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">
                                لوحة التحكم
                            </a>
                        </li>
                        <li class="nav-item">
                            <form class="d-inline" action="{{route('logout')}}" method="POST">
                                @csrf
                                @method('POST')
                                <button style="border: 0;" class="nav-link" type="submit">
                                    تسجيل الخروج
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                تسجيل الدخول
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('client.login')}}">اصحاب الاعلانات</a>
                                <a class="dropdown-item" href="{{route('login')}}">العملاء والزوار</a>
                                <a class="dropdown-item" href="{{route('admin.login')}}">الادارة العامة</a>
                            </div>
                        </li>
                    @endauth
                </ul>
                <div class="post-btn">
                    <a class="btn btn-common" href="{{route('client.units.create')}}"><i class="lni-pencil-alt"></i> اضف
                        اعلانك </a>
                </div>
            </div>
        </div>
        <ul class="mobile-menu" dir="rtl">
            <li class="text-right">
                <a class="active" href="{{route('index')}}">
                    الرئيسية
                </a>
            </li>
            @auth('client-web')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('client.home')}}">
                        لوحة التحكم
                    </a>
                </li>
                <form class="d-inline" action="{{route('client.logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button style="border: 0; width: 100%;background: #fff; text-align: right;padding-right: 20px ;"
                            class="nav-link" type="submit">
                        تسجيل الخروج
                    </button>
                </form>
            @elseauth('web')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                        لوحة التحكم
                    </a>
                </li>
                <form class="d-inline" action="{{route('logout')}}" method="POST">
                    @csrf
                    @method('POST')
                    <button style="border: 0; width: 100%;background: #fff; text-align: right;padding-right: 20px ;"
                            class="nav-link" type="submit">
                        تسجيل الخروج
                    </button>
                </form>
            @else
                <li>
                    <a href="#" class="first_login">
                        تسجيل الدخول
                    </a>
                    <ul class="dropdown">
                        <li>
                            <a href="{{route('client.login')}}">اصحاب الاعلانات</a>
                        </li>
                        <li>
                            <a href="{{route('login')}}">العملاء والزوار</a>
                        </li>
                        <li>
                            <a href="{{route('admin.login')}}">الادارة العامة</a>
                        </li>
                    </ul>
                </li>
            @endauth
            @foreach($depts as $dept)
                <li class="text-right">
                    <a href="{{route('dept.units',$dept->id)}}">
                        {{$dept->dept_name}}
                    </a>
                </li>
            @endforeach
            <li class="text-right">
                <a href="{{route('contact')}}"> تواصل معنا </a>
            </li>

            <li class="text-right">
                <a href="{{route('client.units.create')}}"> اضف اعلانك </a>
            </li>
        </ul>
    </nav>

    <div id="hero-area">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xs-12 text-center">
                    <div class="contents">
                        <h1 class="head-title">
                            مرحبًا بكم في أكبر سوق
                            <span class="year">للاعلانات المبوبة</span></h1>
                        <p dir="rtl">
                            قم ببيع وشراء كل شيء من خلال موقعنا ، أو ابحث
                            عما تريد ...
                        </p>
                        <div class="search-bar">
                            <div class="search-inner">
                                <form class="search-form" role="search" dir="rtl" method="get"
                                      action="{{route('units.search.custom')}}" id="search-form">
                                    <button dir="rtl" class="btn btn-common float-left pull-left" type="submit"><i
                                            class="lni-search"></i>
                                        ابحث
                                    </button>
                                    <div dir="rtl" class="form-group float-right">
                                        <input list="keys" required type="text" dir="rtl"
                                               name="key"
                                               class="form-control" placeholder="عن اى شئ تبحث ؟؟">
                                        <datalist id="keys">
                                            <option value="قاعة">
                                            <option value="سيارة">
                                            <option value="دى جى">
                                            <option value="كوافير">
                                        </datalist>
                                    </div>
                                    <div dir="rtl" class="form-group inputwithicon float-right" role="location">
                                        <select name="governorate_id" required class="form-control">
                                            <option selected value="">اختر الموقع</option>
                                            @foreach($governorates as $governorate)
                                                <option
                                                    value="{{$governorate->id}}">{{$governorate->governorate}}</option>
                                            @endforeach
                                        </select>
                                        <i class="lni-target"></i>
                                    </div>
                                    <div dir="rtl" class="form-group inputwithicon float-right" role="category">
                                        <select name="dept_id" required class="form-control">
                                            <option selected value="">اختر القسم</option>
                                            @foreach($depts as $dept)
                                                <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                            @endforeach
                                        </select>
                                        <i class="lni-menu"></i>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
