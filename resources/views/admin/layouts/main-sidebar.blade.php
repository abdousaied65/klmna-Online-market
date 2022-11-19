<style>
    .side-menu__icon {
        font-size: 15px !important;
    }
</style>
<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/admin/' . $page='home') }}"><img
                src="{{URL::asset('assets/img/logo.png')}}" class="main-logo" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/admin/' . $page='home') }}"><img
                src="{{URL::asset('assets/img/favicon.png')}}" class="logo-icon" alt="logo"></a>
    </div>

    <div class="main-sidemenu">
        <ul class="side-menu" style="min-height: 1000px !important;" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="slide {{ Request::is('home*') ? 'active' : '' }}">
                <a class="side-menu__item" href="{{ url('/admin/' . $page='home') }}">
                    <i class="fa fa-home side-menu__icon"></i>
                    <span class="side-menu__label">الصفحة الرئيسية</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-users side-menu__icon"></i>
                    <span class="side-menu__label">
                        الموظفين
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.admins.create') }}">
                            اضافة موظف جديد
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.admins.index') }}">
                            قائمة الموظفين
                        </a>
                    </li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-users side-menu__icon"></i>
                    <span class="side-menu__label">
                        العملاء
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.clients.create') }}">
                            اضافة عميل جديد
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.clients.index') }}">
                            قائمة العملاء
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-users side-menu__icon"></i>
                    <span class="side-menu__label">
                        الزبائن
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.customers.create') }}">
                            اضافة زبون جديد
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.customers.index') }}">
                            قائمة الزبائن
                        </a>
                    </li>
                </ul>
            </li>


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-code-branch side-menu__icon"></i>
                    <span class="side-menu__label">
                        الاقسام
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.depts.create') }}">
                            اضافة قسم جديد
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.depts.index') }}">
                            قائمة الاقسام
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-clock side-menu__icon"></i>
                    <span class="side-menu__label">
                        الفترات الزمنية
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.intervals.create') }}">
                            اضافة فترة زمنية جديدة
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.intervals.index') }}">
                            قائمة الفترات الزمنية
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-map-marked side-menu__icon"></i>
                    <span class="side-menu__label">
                        المدن
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.governorates.create') }}">
                            اضافة مدينة جديدة
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.governorates.index') }}">
                            قائمة المدن
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-list side-menu__icon"></i>
                    <span class="side-menu__label">
                        الوحدات
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.units.create') }}">
                            اضافة وحدة جديدة
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.units.index') }}">
                            قائمة الوحدات
                        </a>
                    </li>
                    <li>
                        <a class="slide-item" href="{{ route('admin.units.reviews') }}">
                            تقييمات الوحدات
                        </a>
                    </li>
                </ul>
            </li>


            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-envelope side-menu__icon"></i>
                    <span class="side-menu__label">
                        رسائل الزوار
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.contacts.index') }}">
                            عرض رسائل الزوار
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-heart side-menu__icon"></i>
                    <span class="side-menu__label">
                         الخدمات المفضلة
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.favorites.index') }}">
                            عرض الخدمات المفضلة
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fa fa-flag side-menu__icon"></i>
                    <span class="side-menu__label">
                         البلاغات
                    </span><i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item" href="{{ route('admin.reports.index') }}">
                            عرض البلاغات
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
