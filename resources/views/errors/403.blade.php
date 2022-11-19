<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>KLmna | كلمنا </title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('admin-assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- THEME STYLES-->
    <link href="{{asset('admin-assets/css/main.css')}}" rel="stylesheet"/>
    <style>
        @font-face {
            font-family: 'Cairo';
            src: url("{{asset('fonts/Cairo.ttf')}}");
        }

        * {
            font-family: 'Cairo' !important;
        }

        .content {
            max-width: 450px;
            margin: 0 auto;
            text-align: center;
        }

        .content h1 {
            font-size: 160px
        }

        .error-title {
            font-size: 22px;
            font-weight: 500;
            margin-top: 30px
        }
    </style>
</head>
<body class="bg-silver-100">
<div class="content">
    <h1 class="m-t-20">403</h1>
    <p class="error-title">غير مسموح بالدخول</p>
    <p class="m-b-20">أنت غير مسموح لك بالدخول ... تحقق من الصلاحيات وحاول مرة أخرى
    </p>
    <a href="{{url()->previous()}}" class="btn btn-md btn-danger">
        العودة الى الصفحة السابقة
    </a>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS -->
<script src="{{asset('admin-assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin-assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('admin-assets/js/app.js')}}" type="text/javascript"></script>
</body>
</html>
