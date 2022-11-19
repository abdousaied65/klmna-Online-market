<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/line-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slicknav.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-switcher.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-select.css')}}">
<style>
    /*-- Review Form --*/
    .review_form .input {
        margin-bottom: 15px;
    }

    .review_form .input-rating {
        margin-bottom: 15px;
    }

    .review_form .input-rating .stars {
        display: inline-block;
        vertical-align: top;
    }

    .review_form .input-rating .stars input[type="radio"] {
        display: none;
    }

    .review_form .input-rating .stars > label {
        float: right;
        cursor: pointer;
        padding: 0px 5px;
        margin: 0px;
    }

    .review_form .input-rating .stars > label:before {
        content: "\f006";
        font-family: FontAwesome;
        color: #E4E7ED;
        font-size: 25px;
        -webkit-transition: 0.2s all;
        transition: 0.2s all;
    }

    .review_form .input-rating .stars > label:hover:before, .review_form .input-rating .stars > label:hover ~ label:before {
        color: #D10024;
    }

    .review_form .input-rating .stars > input:checked label:before, .review_form .input-rating .stars > input:checked ~ label:before {
        content: "\f005";
        color: #D10024;
    }


</style>
