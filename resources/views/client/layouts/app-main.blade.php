<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{asset('assets/img/favicon.png')}}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title> KLmna | كلمنا </title>
    @include('site.layouts.common.css_links')
    <style>
        .services-content{
            margin-top: 20px;
        }
        i.la {
            font-size: 15px !important;
        }

        .contact-footer li {
            margin-top: 20px;
        }

        .footer-social li a {
            /*padding-top: 0px !important;*/
        }

        select.form-control {
            height: 50px !important;
            padding: 10px;
            border: 1px solid #ccc !important;
            border-radius: 5px !important;
        }

        input.form-control {
            border-radius: 5px !important;
            height: 50px !important;
            padding: 10px !important;
            border: 1px solid #ccc !important;
        }

        select.form-control {
            padding-right: 50px;
        }

        @font-face {
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }

        label {
            font-size: 13px !important;
        }

        table {
            font-size: 13px !important;
        }

        h1, h2, h3, h4, h5, h6, p, span, div, table {
            font-family: 'Cairo' !important;
        }

        .dropdown-menu.dropdown-menu-right.show {
            width: 200px !important;
        }

        body, html {
            font-family: 'Cairo' !important;
            font-size: 13px !important;
        }

        .navigation.navigation-main {
            padding-bottom: 50px !important;
        }

        .btn.dropdown-toggle.bs-placeholder, .btn.dropdown-toggle {
            height: 40px !important;
        }

        ul.dropdown li a, ul.dropdown li a:focus, ul.dropdown li a:hover {
            color: #333;
        }

        ul.slicknav_nav li {
            transition: 0.5s;
        }

        ul.slicknav_nav li a {
            padding-right: 15px;
        }

        ul.slicknav_nav li:hover {
            background: #e91e63;
        }

        ul.slicknav_nav li:hover > a {
            color: #fff;
        }
        button.nav-link:hover {
            color: #e91e63 !important;
            cursor: pointer;
        }

    </style>
</head>
<body itemscope>
<main>
    @include('site.layouts.common.header')
    @yield('content')
    @include('site.layouts.common.footer')
    @include('site.layouts.common.js_links')
</main>
</body>
</html>
