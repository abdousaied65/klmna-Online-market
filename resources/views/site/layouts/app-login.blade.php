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
        .btn-custom{
            background: rgb(233, 30, 99);
            color: #fff;
        }

        .contact-footer li {
            margin-top: 20px;
        }

        .footer-social li a {
            padding-top: 10px;
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
        .chat {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .chat li {
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px dotted #B3A9A9;
        }

        .chat li .chat-body p {
            margin: 0;
            color: #777777;
        }

        .panel-body {
            overflow-y: scroll;
            height: 350px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
            background-color: #555;
        }

    </style>
</head>
<body itemscope>
<main>
    @include('site.layouts.common.header-login')
    @yield('content')
    @include('site.layouts.common.footer')
    @include('site.layouts.common.js_links')
</main>
</body>
</html>
