<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <!-- ========== SEO ========== -->
    <title>@yield('title') || {{$settings->name}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta content="" name="author">
    <!-- ========== FAVICON ========== -->
    <link rel="apple-touch-icon-precomposed" href="{{$settings->logo}}"/>
    <link rel="icon" href="{{$settings->logo}}">

    <!-- ========== STYLESHEETS ========== -->
    <link rel="stylesheet" href="{{url('front')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('front')}}/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{url('front')}}/css/jquery.mmenu.css">
    <link rel="stylesheet" href="{{url('front')}}/revolution/css/layers.css">
    <link rel="stylesheet" href="{{url('front')}}/revolution/css/settings.css">
    <link rel="stylesheet" href="{{url('front')}}/revolution/css/navigation.css">
    <link rel="stylesheet" href="{{url('front')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{url('front')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('front')}}/css/daterangepicker.css">
    <link rel="stylesheet" href="{{url('front')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{url('front')}}/css/responsive.css">

    <!-- ========== for Rtl ========== -->
    @if(session('lang') != 'en')
        <link rel="stylesheet" href="{{url('front')}}/css/ar_style.css">
        <link rel="stylesheet" href="{{url('front')}}/css/rtl.css">
    @else
        <link rel="stylesheet" href="{{url('front')}}/css/style.css">
        <!-- ========== for Rtl ========== -->
@endif
<!-- ========== ICON FONTS ========== -->
    <link href="{{url('front')}}/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('front')}}/fonts/flaticon.css" rel="stylesheet">
    <!-- ========== GOOGLE FONTS ========== -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CRoboto:100,300,400,400i,500,700"
          rel="stylesheet">
    <style>
        .myDropDown {
            height: 300px;
            overflow: auto;
        }

        .col-md-10, .col-md-2 {
            width: 50% !important;
        }
    </style>
    <style>
        #center-text {
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;

        }

        #chat-circle {
            position: fixed;
            bottom: 50px;
            left: 50px;
            background: #2d3985;
            width: 65px;
            height: 65px;
            border-radius: 50%;
            color: white;
            padding-top: 21px;
            cursor: pointer;
            box-shadow: 0px 3px 16px 0px rgba(0, 0, 0, 0.6), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
            z-index: 10000;

        }

        .btn #my-btn {
            background: white;
            padding-top: 13px;
            padding-bottom: 12px;
            border-radius: 45px;
            padding-right: 40px;
            padding-left: 40px;
            color: #5865C3;
        }

        #chat-overlay {
            background: rgba(255, 255, 255, 0.1);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            display: none;
        }


        .chat-box {
            display: none;
            background: #efefef;
            position: fixed;
            left: 30px;
            bottom: 50px;
            width: 350px;
            max-width: 85vw;
            max-height: 100vh;
            border-radius: 5px;
            box-shadow: 0px 5px 35px 9px #464a92;
            /*box-shadow: 0px 5px 35px 9px #ccc;*/
            z-index: 10000;
        }

        .chat-box-toggle {
            float: right;
            position: absolute;
            right: 5px;
            top: 4px;
            cursor: pointer;
        }

        .chat-box-header {
            height: 94px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            color: white;
            text-align: center;
            font-size: 20px;
            padding-top: 17px;
            background-color: #e9e9e9
        }

        .chat-box-body {
            position: relative;
            height: 370px;
            height: auto;
            border: 1px solid #ccc;
            overflow: hidden;
        }

        .chat-box-body:after {
            content: "";
            background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAwIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTAgOCkiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+PGNpcmNsZSBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgY3g9IjE3NiIgY3k9IjEyIiByPSI0Ii8+PHBhdGggZD0iTTIwLjUuNWwyMyAxMW0tMjkgODRsLTMuNzkgMTAuMzc3TTI3LjAzNyAxMzEuNGw1Ljg5OCAyLjIwMy0zLjQ2IDUuOTQ3IDYuMDcyIDIuMzkyLTMuOTMzIDUuNzU4bTEyOC43MzMgMzUuMzdsLjY5My05LjMxNiAxMC4yOTIuMDUyLjQxNi05LjIyMiA5LjI3NC4zMzJNLjUgNDguNXM2LjEzMSA2LjQxMyA2Ljg0NyAxNC44MDVjLjcxNSA4LjM5My0yLjUyIDE0LjgwNi0yLjUyIDE0LjgwNk0xMjQuNTU1IDkwcy03LjQ0NCAwLTEzLjY3IDYuMTkyYy02LjIyNyA2LjE5Mi00LjgzOCAxMi4wMTItNC44MzggMTIuMDEybTIuMjQgNjguNjI2cy00LjAyNi05LjAyNS0xOC4xNDUtOS4wMjUtMTguMTQ1IDUuNy0xOC4xNDUgNS43IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIi8+PHBhdGggZD0iTTg1LjcxNiAzNi4xNDZsNS4yNDMtOS41MjFoMTEuMDkzbDUuNDE2IDkuNTIxLTUuNDEgOS4xODVIOTAuOTUzbC01LjIzNy05LjE4NXptNjMuOTA5IDE1LjQ3OWgxMC43NXYxMC43NWgtMTAuNzV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjcxLjUiIGN5PSI3LjUiIHI9IjEuNSIvPjxjaXJjbGUgZmlsbD0iIzAwMCIgY3g9IjE3MC41IiBjeT0iOTUuNSIgcj0iMS41Ii8+PGNpcmNsZSBmaWxsPSIjMDAwIiBjeD0iODEuNSIgY3k9IjEzNC41IiByPSIxLjUiLz48Y2lyY2xlIGZpbGw9IiMwMDAiIGN4PSIxMy41IiBjeT0iMjMuNSIgcj0iMS41Ii8+PHBhdGggZmlsbD0iIzAwMCIgZD0iTTkzIDcxaDN2M2gtM3ptMzMgODRoM3YzaC0zem0tODUgMThoM3YzaC0zeiIvPjxwYXRoIGQ9Ik0zOS4zODQgNTEuMTIybDUuNzU4LTQuNDU0IDYuNDUzIDQuMjA1LTIuMjk0IDcuMzYzaC03Ljc5bC0yLjEyNy03LjExNHpNMTMwLjE5NSA0LjAzbDEzLjgzIDUuMDYyLTEwLjA5IDcuMDQ4LTMuNzQtMTIuMTF6bS04MyA5NWwxNC44MyA1LjQyOS0xMC44MiA3LjU1Ny00LjAxLTEyLjk4N3pNNS4yMTMgMTYxLjQ5NWwxMS4zMjggMjAuODk3TDIuMjY1IDE4MGwyLjk0OC0xOC41MDV6IiBzdHJva2U9IiMwMDAiIHN0cm9rZS13aWR0aD0iMS4yNSIvPjxwYXRoIGQ9Ik0xNDkuMDUgMTI3LjQ2OHMtLjUxIDIuMTgzLjk5NSAzLjM2NmMxLjU2IDEuMjI2IDguNjQyLTEuODk1IDMuOTY3LTcuNzg1LTIuMzY3LTIuNDc3LTYuNS0zLjIyNi05LjMzIDAtNS4yMDggNS45MzYgMCAxNy41MSAxMS42MSAxMy43MyAxMi40NTgtNi4yNTcgNS42MzMtMjEuNjU2LTUuMDczLTIyLjY1NC02LjYwMi0uNjA2LTE0LjA0MyAxLjc1Ni0xNi4xNTcgMTAuMjY4LTEuNzE4IDYuOTIgMS41ODQgMTcuMzg3IDEyLjQ1IDIwLjQ3NiAxMC44NjYgMy4wOSAxOS4zMzEtNC4zMSAxOS4zMzEtNC4zMSIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utd2lkdGg9IjEuMjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIvPjwvZz48L3N2Zz4=');
            opacity: 0.1;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            height: 100%;
            position: absolute;
            z-index: -1;
        }

        #chat-input {
            background: #f4f7f9;
            width: 100%;
            position: relative;
            height: 47px;
            padding-top: 10px;
            padding-right: 50px;
            padding-bottom: 10px;
            padding-left: 15px;
            border: none;
            resize: none;
            outline: none;
            border: 1px solid #ccc;
            color: #888;
            border-top: none;
            border-bottom-right-radius: 5px;
            border-bottom-left-radius: 5px;
            overflow: hidden;
        }

        .chat-input > form {
            margin-bottom: 0;
        }

        #chat-input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
            color: #ccc;
        }

        #chat-input::-moz-placeholder { /* Firefox 19+ */
            color: #ccc;
        }

        #chat-input:-ms-input-placeholder { /* IE 10+ */
            color: #ccc;
        }

        #chat-input:-moz-placeholder { /* Firefox 18- */
            color: #ccc;
        }

        .chat-submit {
            position: absolute;
            bottom: 3px;
            right: 10px;
            background: transparent;
            box-shadow: none;
            border: none;
            border-radius: 50%;
            color: #238b89;
            width: 35px;
            height: 35px;
        }

        .chat-logs {
            padding: 15px;
            height: 370px;
            overflow-y: scroll;
        }

        .chat-logs::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        .chat-logs::-webkit-scrollbar {
            width: 5px;
            background-color: #F5F5F5;
        }

        .chat-logs::-webkit-scrollbar-thumb {
            background-color: #238b89;
        }


        @media only screen and (max-width: 500px) {
            .chat-logs {
                height: 40vh;
            }
        }

        .chat-msg.user > .msg-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            float: left;
            width: 15%;
        }

        .chat-msg.self > .msg-avatar img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            float: right;
            width: 15%;

            position: absolute;
            @if(Request::segment(1) == 'ar')
                right: 33px;
            @else
    left: 29px;

        @endif





        }

        .cm-msg-text {
            background: white;
            padding: 10px 15px 10px 15px;
            color: #666;
            max-width: 75%;
            float: left;
            margin-left: 10px;
            position: relative;
            margin-bottom: 20px;
            border-radius: 30px;
        }

        .chat-msg {
            clear: both;
        }

        .chat-msg.self > .cm-msg-text {
            float: right;
            margin-right: 10px;
            background: #238b89;
            color: white;
        }

        .cm-msg-button > ul > li {
            list-style: none;
            float: left;
            width: 50%;
        }

        .cm-msg-button {
            clear: both;
            margin-bottom: 70px;
        }

        .faaa {
            padding: 20px;
            font-size: 19px;
            width: 53px;
            text-align: center;
            text-decoration: none;
            margin: 5px 2px;
            border-radius: 50%;
            height: 52px;
        }


        .fa:hover {
            opacity: 0.7;
        }

        .fa-facebook {
            background: #3B5998;
            color: white;
        }

        .fa-twitter {
            background: #55ACEE;
            color: white;
        }

        .fa-google {
            background: #dd4b39;
            color: white;
        }

        .fa-linkedin {
            background: #007bb5;
            color: white;
        }

        .fa-whatsapp {
            background: #28a745;
            color: white;
        }

        .fa-youtube {
            background: #bb0000;
            color: white;
        }

        .fa-instagram {
            background: #125688;
            color: white;
        }


            .truncate {
                display: -webkit-box;
                max-width: 450px;
                max-height: 100px;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;

            }

    </style>

@yield('css')

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G8Q386Q5JR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-G8Q386Q5JR');
    </script>
</head>
<body>
<!-- ========== PRELOADER ========== -->
<div class="loader loader3">
    <div class="loader-inner">
        <div class="spin">
            <span></span>
            <img src="{{$settings->logo}}" alt="{{$settings->name}}">
        </div>
    </div>
</div>
<!-- ========== MOBILE MENU ========== -->
<nav id="mobile-menu"></nav>
<!-- ========== WRAPPER ========== -->
<div class="wrapper">
    <!-- ========== TOP MENU ========== -->
    <div class="topbar">
        <div class="container">
            <div class="welcome-mssg">

                @if(Session('lang') == 'en')   {{$settings->welcome_message_en}}
                .  @else  {{$settings->welcome_message_ar}}. @endif
            </div>
            <div class="top-right-menu">
                <ul class="top-menu">
                    <li class="d-none d-md-inline">
                        <a target="_blank" href="https://www.google.com/maps/?q={{$settings->lat}},{{$settings->lng}}"
                           style="color: #FFF">
                            <i style="color: #FFF" class="fa fa-map-marker "></i> {{__('lang.location')}}
                        </a>
                    </li>
                    <li class="d-none d-md-inline">
                        <a href="mailto:contact@hotelhimara.com" style="color: #FFF">
                            <i style="color: #FFF" class="fa fa-envelope-o "></i>{{$settings->email}}</a>
                    </li>
                    @if(session('lang') != 'en')
                        <li class="language-menu">
                            <a href="#" class="active-language" style="color: #FFF"><img
                                    src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}" alt="Image">العربية</a>
                            <ul class="languages">
                                <li class="language">
                                    <a href="{{url('lang/en')}}"><img src="{{url('front')}}/images/icons/flags/gb.png"
                                                                      alt="Image">English</a>
                                </li>
                            </ul>
                        </li>

                    @else

                        <li class="language-menu">
                            <a href="#" class="active-language" style="color: #FFF">
                                <img src="{{url('front')}}/images/icons/flags/gb.png" alt="Image">English</a>
                            <ul class="languages">
                                <li class="language">
                                    <a href="{{url('lang/ar')}}">
                                        <img src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}"
                                             alt="Image">العربية</a>
                                </li>


                            </ul>
                        </li>

                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- ========== HEADER ========== -->
    <header class="horizontal-header sticky-header" data-menutoggle="991">
        <!-- BRAND -->
        <div class="row">
            <div class="col-md-2">
                <div class="brand">
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{$settings->logo}}" alt="{{$settings->name}}"
                                 @if(Session('lang')  == 'en') style="    margin-top: -10px;
    height: 58px;
    width: 225px;
        margin-left: 36px;

"
                                 @else  style="
    margin-top: -10px;
    height: 58px;
    width: 225px;
    margin-right: 90px;

" @endif>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-10">
                <div id="toggle-menu-button" class="toggle-menu-button">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <!-- MAIN MENU -->
                <nav id="main-menu" class="main-menu">
                    <ul class="menu">
                        <li class="menu-item  ">
                            <a href="{{url('/')}}">{{__('lang.MainHome')}}</a>
                        </li>


                        @inject('MainCategory','App\Models\MainCategory')
                        @inject('SubCategory','App\Models\SubCategory')
                        @foreach($MainCategory->where('is_visible',1)->get() as $MainCat)

                            <li class="menu-item dropdown">
                                <a href="#">{{$MainCat->title}}</a>
                                <ul class="submenu myDropDown">
                                    @foreach($SubCategory->where('is_visible',1)->where('main_category_id',$MainCat->id)->get() as $SubCat)
                                        <li class="menu-item">
                                            <a href="{{url('Category/'.$SubCat->id)}}">{{$SubCat->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                        <li class="menu-item">
                            <a href="{{url('Contact-us')}}">{{__('lang.CONTACT US')}}</a>
                        </li>
                        <li class="menu-item">
                            <form method="get" action="{{url('SubCategorySearch')}}">

                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" style="    margin-top: 21px;" class="form-control" name="id"
                                               placeholder="@if(Session('lang') == 'en')  Num..  @else رقم... @endif ">
                                    </div>

                                    <div class="col-md-1">
                                        <button style="margin-top:23px; max-height: 46px; width: 85px;font-size:12px "
                                                type="submit"
                                                class="btn btn-book">{{__('lang.Search')}}</button>
                                    </div>
                                </div>
                            </form>

                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- MOBILE MENU BUTTON -->
    </header>
    <!-- ========== REVOLUTION SLIDER ========== -->
