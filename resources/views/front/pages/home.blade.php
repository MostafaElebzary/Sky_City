@extends('front.layout.master')
@section('title')
    {{__('lang.Home')}}
@endsection

@section('css')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

    <style>
        .item {
            position: relative;
            padding-top: 20px;
            display: inline-block;
        }

        .notify-badge {
            position: absolute;
            right: 13px;
            top: 18px;
            background: #2d3985;
            text-align: center;
            border-radius: 30px 30px 30px 30px;
            color: white;
            padding: 5px 10px;
            font-size: 20px;
        }{

        }

    </style>
@endsection

@section('content')
    <marquee width="100%" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
        @if(isset($settings->phone))
            <a class="btn" style="border-radius:5px;color:#FFF; margin:5px; max-width: 125px"  href="tel:{{$settings->phone}}">{{$settings->phone}}</a>

        @endif
        @if(isset($settings->phone2))
            <a class="btn" style="border-radius:5px;color:#FFF;  margin:5px; max-width: 125px"  href="tel:{{$settings->phone2}}">{{$settings->phone2}}</a>
        @endif
        @if(isset($settings->phone3))
            <a class="btn" style="border-radius:5px;color:#FFF;  margin:5px; max-width: 125px"  href="tel:{{$settings->phone3}}">{{$settings->phone3}}</a>
        @endif
        @if(isset($settings->phone4))
            <a class="btn" style="border-radius:5px;color:#FFF;  margin:5px; max-width: 125px"  href="tel:{{$settings->phone4}}">{{$settings->phone4}}</a>
        @endif
    </marquee>
    <!-- end header -->
    <div class="slider">
        <div class="container">
            <div class="row " style="
                position: absolute;
                top: 43px;
                z-index: 1010;
            @if(session('lang') == 'en')
                margin-left:500px
            @else

            @endif
                ">
                <?php

                ?>
                <div class="col-md-12 col-sm-4" style="margin-right: 61px;display:none;">



                </div>
            </div>
        </div>
        <div id="rev-slider-1" class="rev_slider gradient-slider" style="display:none" data-version="5.4.5">
            <ul>
            @foreach($sliders as $key=>$slider)
                <!-- SLIDE NR. 1 -->
                    <li data-transition="crossfade">
                        <!-- MAIN IMAGE -->
                        <img src="{{$slider->image}}" alt="{{$slider->title}}" title="{{$slider->title}}"
                             data-bgposition="center center"
                             data-bgfit="contain" data-bgrepeat="no-repeat" data-bgparallax="0" class="rev-slidebg"
                             data-no-retina="">
                        <!-- LAYER NR. 1 -->
                        <h1
                            class="tp-caption tp-resizeme "
                            data-x="center"
                            data-hoffset=""
                            data-y="320"
                            data-voffset=""
                            data-responsive_offset="on"
                            data-fontsize="['80','50','40','30']"
                            data-lineheight="['60','50','40','30']"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 5; color: #fff; font-weight: 800; line-height:92px!important;">
                            {{$slider->title}}</h1>
                        <!-- LAYER NR. 2 -->
                        <div
                            class="tp-caption tp-resizeme"
                            data-x="center"
                            data-hoffset=""
                            data-y="410"
                            data-voffset=""
                            data-responsive_offset="on"
                            data-fontsize="16"
                            data-lineheight="16"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1500,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="z-index: 6; color: #fff;">{!! $slider->description !!}
                        </div>
                        <!-- LAYER NR. 3 -->
                        @if($slider->advertising_id)
                            <div
                                class="tp-caption"
                                data-x="center"
                                data-hoffset="-120"
                                data-y="250"
                                data-voffset=""
                                data-responsive_offset="on"
                                data-whitespace="nowrap"
                                data-frames='[{"delay":2400,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                style="z-index: 11;">
                                <a class="btn" href="{{url('Advertising-Details/'.$slider->advertising_id)}}">
                                    <i class="fa fa-calendar"></i>{{trans('lang.show_Ad')}}</a>
                            </div>
                        @endif

                    <!-- LAYER NR. 4 -->
                        @if($slider->advertising_id)
                            <div
                                class="tp-caption"
                                data-x="center"
                                data-hoffset="128"
                                data-y="250"
                                data-voffset=""
                                data-responsive_offset="on"
                                data-whitespace="nowrap"
                                data-frames='[{"delay":2400,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                style="z-index: 11;">
                                <a class="btn" href="{{url('Contact-us')}}">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>{{trans('lang.contact_us')}}</a>
                            </div>
                    @endif
                    <!-- LAYER NR. 6 -->
                        <div
                            class="tp-caption tp_m_title tp-resizeme"
                            data-x="center"
                            data-hoffset=""
                            data-y="240"
                            data-voffset=""
                            data-responsive_offset="on"
                            data-fontsize="['25','25','18','18']"
                            data-lineheight="['25','25','18','18']"
                            data-whitespace="nowrap"
                            data-frames='[{"delay":1800,"speed":1500,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                            style="color: #fff">

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
    <!-- ========== ABOUT ========== -->
    <section class="about ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title">
                        <h4 class="text-uppercase" style="color: #293784;
    font-size: 40px;
">{{$settings->name}}</h4>
                    </div>
                    <div class="info-branding">
                        <p>{!! $settings->aboutus !!}</p>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="brand-info">
                        <div class="inner" style="height: 400px">
                            <div class="content" style="height: 380px">
                                <img src="{{$settings->about_image}}" width="100" alt="Image">
                                <h5 class="title">{{$settings->name}}</h5>
                                <p class="mt20">{!! $settings->footer_description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== ROOMS ========== -->
    <section class="rooms gray">
        <div class="container">
            <div class="section-title">
                <h4 style="    color: #293784;
    font-size: 35px;">{{trans('lang.favourite_advertising')}}</h4>
                {{--                <p class="section-subtitle">{{trans('lang.favourite_advertising')}}</p>--}}
            </div>
            <form method="get" action="{{url('SubCategorySearch')}}"
                  style="@if(Session('lang') != 'en') margin-right: 15px @else margin-left: 15px @endif ">
                <!-- NAME -->
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{trans('lang.main_category')}}
                            </label>
                            <select id="MainCategory2" name="category_id" class="form-control">
                                <option value="0"></option>
                                @foreach(\App\Models\MainCategory::OrderBy('id','asc')->get() as $sub)
                                    <option value="{{$sub->id}}">{{$sub->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="col-md-2" id="subCats">
                        <div class="form-group">
                            <label>{{trans('lang.sub_category')}}
                                <a href="#" title="Your Email" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Please type your email adress">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </label>
                            <select id="SubCategory2" name="sub_category_id" class="form-control">
                            </select>
                        </div>
                    </div>
                    <!-- ROOM TYPE -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{trans('lang.City')}}
                                <a href="#" title="Room Type" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Please select room type">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </label>
                            <select name="city_id" id="City" class="form-control">
                                <option value=""></option>
                                @foreach(\App\Models\City::all() as $sub)
                                    <option value="{{$sub->id}}">{{$sub->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{__('lang.district_area')}}</label>
                            <select name="district_area" class="form-control" >
                                <option value="0"></option>
                                <option value="east">{{__('lang.east')}}</option>
                                <option value="west">{{__('lang.west')}}</option>
                                <option value="north">{{__('lang.north')}}</option>
                                <option value="south">{{__('lang.south')}}</option>
                            </select>
                        </div>
                    </div>
                    <!-- DATE -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{trans('lang.District')}}
                                <a href="#" title="Check-In / Check-Out" data-toggle="popover" data-placement="top"
                                   data-trigger="hover"
                                   data-content="Please select check-in and check-out date <br>*Check In from 11:00am">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </label>
                            <select name="district_id" id="district" class="form-control">

                            </select>
                        </div>
                    </div>


                    <!-- GUESTS -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>{{__('lang.price')}}
                                <a href="#" title="Guests" data-toggle="popover" data-placement="top"
                                   data-trigger="hover" data-content="Please Select Adults / Children">
                                    <i class="fa fa-info-circle"></i>
                                </a>
                            </label>
                            <div class="panel-dropdown">
                                <div class="form-control guestspicker" style="max-height: 38px">
                                    <span class="gueststotal"></span></div>
                                <div class="panel-dropdown-content" style="z-index:2000;">
                                    <div class="">
                                        <label>{{__('lang.priceFrom')}}
                                            <a href="#" title="" data-toggle="popover" data-placement="top"
                                               data-trigger="hover" data-content="18+ years"
                                               data-original-title="Adults">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </label>
                                        <div class="">
                                            <input type="text" name="priceFrom" class="form-control" value="0">
                                        </div>
                                    </div>
                                    <div class="">
                                        <label>{{__('lang.priceTo')}}
                                            <a href="#" title="" data-toggle="popover" data-placement="top"
                                               data-trigger="hover" data-content="Under 18 years"
                                               data-original-title="Children">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </label>
                                        <div class="">
                                            <input type="text" name="priceTo" class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- BOOKING BUTTON -->
                    <div class="col-md-2">
                        <button style="margin-bottomg: 37px; max-height: 38px; width: 150px;" type="submit"
                                class="btn btn-book">{{__('lang.Search')}}</button>
                    </div>
                </div>
            </form>
            <div class="row">
            @foreach($advertisings as $key => $ad)
                <!-- ITEM -->
                    <div class="col-md-4" style="padding: 14px;">
                        <div class="room-grid-item">
                            <figure class="gradient-overlay-hover link-icon">
                                <a href="{{url('Advertising-Details/'.$ad->id)}}">
                                    <div class="item">
                                        <span class="notify-badge">{{$ad->MainCategory->title}}</span>
                                        <img src="{{$ad->image}}" class="img-fluid"  style="height: 200px;width: 400px"
                                             alt="Image">
                                    </div>
                                </a>
                                <div class="room-price">{{$ad->price}} {{trans('lang.currency')}}</div>
                            </figure>
                            <div class="room-info">
                                <h2 class="room-title">
                                    <a href="{{url('Advertising-Details/'.$ad->id)}}">{{$ad->title}} </a>
                                </h2>
                            <!--<p id="desc" style="width:100%;overflow:hidden;height:50px;line-height:50px;">{!!  $ad->description  !!}-->

                                <!--</p>-->

                                <label
                                    for=""> <p> {{__('lang.id')}} : {{$ad->id}} </p></label>
                                <br>

                                <label for="desc">{{$ad->MainCategory->title}}</label>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- ========== Sub Categories ========== -->
    <section class="gallery">
        <div class="container">
            <div class="section-title" >
                <h4 style=" color: #293784;font-size: 40px; ">{{trans('lang.sub_categories')}}</h4>

            </div>
            <div class="gallery-owl owl-carousel ">
                @foreach($sub_categories as $sub_category)
                    <div class="gallery-item">
                        <figure class="gradient-overlay image-icon">
                            <a href="{{url('Category/'.$sub_category->id)}}">
                                <img src="{{$sub_category->image}}"  style="height: 200px;width: 210px" alt="Image">
                            </a>
                            <figcaption>{{$sub_category->title}}</figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ========== Reviews ========== -->
    {{--    <section class="testimonials gray">--}}
    {{--        <div class="container">--}}
    {{--            <div class="section-title">--}}
    {{--                <h4 style=" color: #293784;font-size: 40px; ">{{trans('lang.client_reviews')}}</h4>--}}
    {{--            </div>--}}
    {{--            <div class="owl-carousel testimonials-owl">--}}
    {{--            @foreach($reviews as $review)--}}
    {{--                <!-- ITEM -->--}}
    {{--                    <div class="item" style="width: 100%; height: 100%!important;">--}}
    {{--                        <div class="testimonial-item" style='min-width:100% !important; height:245px !important'>--}}
    {{--                            <div class="author-img">--}}
    {{--                                <img alt="Image" class="img-fluid" src="{{$settings->about_image}}">--}}
    {{--                            </div>--}}
    {{--                            <div class="author">--}}
    {{--                                <h4 class="name">{{$review->name}}</h4>--}}
    {{--                            </div>--}}
    {{--                            <div class="rating">--}}

    {{--                                <i class="fa fa-star @if($review->rate >= 1)voted @endif" aria-hidden="true"></i>--}}
    {{--                                <i class="fa fa-star @if($review->rate >= 2)voted @endif" aria-hidden="true"></i>--}}
    {{--                                <i class="fa fa-star @if($review->rate >= 3)voted @endif" aria-hidden="true"></i>--}}
    {{--                                <i class="fa fa-star @if($review->rate >= 4)voted @endif" aria-hidden="true"></i>--}}
    {{--                                <i class="fa fa-star @if($review->rate >= 5)voted @endif" aria-hidden="true"></i>--}}
    {{--                            </div>--}}
    {{--                            <p>{!! $review->description !!}</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- ========== MainCategories  first 3 ========== -->
    <section class="restaurant image-bg parallax gradient-overlay op5" data-src="{{$settings->about_image}}"
             data-parallax="scroll" data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">
        <div class="container">
            <div class="section-title">
                <h4 style=" color: #293784;font-size: 40px; ">{{trans('lang.main_categories')}}</h4>
            </div>
            <div class="row">
                <!-- ITEM -->
                @foreach($main_categories as $main_category)
                    <div class="col-md-4 col-sm-6 col-4">
                        <div class="restaurant-menu-item">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <figure>
                                        <img src="{{$main_category->image}}" class="img-fluid "
                                             style="height: 100px;width: 200px"
                                             alt="Image">
                                    </figure>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="info">
                                        <div class="title">
                                            <span class="name">{{$main_category->title}}</span>
                                        </div>
                                        <p>  <span class="price">
                                              <span class="amount">{{$main_category->Advertising->count()}}</span>
                                            </span>{{trans('lang.ads')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== VIDEO ========== -->
    {{--    <section class="video np parallax gradient-overlay op6" data-src="{{$settings->about_image}}" data-parallax="scroll"--}}
    {{--             data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">--}}
    {{--        <div class="inner gradient-overlay">--}}
    {{--            <div class="container">--}}
    {{--                <div class="video-popup">--}}
    {{--                    <a class="popup-vimeo" href="{{$settings->home_video}}">--}}
    {{--                        <i class="fa fa-play"></i>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <section class="video np   " data-src="{{$settings->about_image}}" data-parallax="scroll"
             data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">
        <?php
        $link = explode('watch?v=',$settings->home_video);
        if(isset($link[1])){
            $youtube = $link[1];
        }else{
            $youtube = null;
        }
        ?>
        <iframe width="1520" height="500" src="https://www.youtube.com/embed/{{$youtube}}" frameborder="0" allowfullscreen></iframe>

    </section>

    <!-- ========== CONTACT V2 ========== -->
    <section class="contact-v2 gray">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-title">
                        <h4 style=" color: #293784;font-size: 40px; ">{{trans('lang.contact_us')}}</h4>

                    </div>
                    <ul class="contact-details">
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{$settings->address}}
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            {{$settings->phone}}
                        </li>
                        <li>
                            <i class="fa fa-fax"></i>
                            {{$settings->fax}}
                        </li>

                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7">
                    <div class="section-title">
                        <h1>&nbsp;</h1>
                    </div>
                    <form action="{{url('inbox_us')}}" name="contact-form" method="post">
                        @csrf
                        <div class="form-group">
                            <input class="form-control" name="name" placeholder="{{trans('lang.Your_Name')}}"
                                   type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="phone" placeholder="{{trans('lang.Your_Phone')}}"
                                   type="text" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="email" type="email"
                                   placeholder="{{trans('lang.Your_Email')}}" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" type="text"
                                   placeholder="{{trans('lang.subject')}}" required>
                        </div>
                        <div class="form-group">
                            {!! htmlFormSnippet([
                                "theme" => "light",
                                "size" => "normal",
                                "tabindex" => "3",
                                "callback" => "callbackFunction",
                                "expired-callback" => "expiredCallbackFunction",
                                "error-callback" => "errorCallbackFunction",
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="{{trans('lang.Your_Message')}}"
                                      required></textarea>
                        </div>
                        <button class="btn" type="submit">
                            <i class="fa fa-location-arrow"></i>{{trans('lang.Send_Message')}}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        .tp-resizeme{
            line-height: 100px!important;
        }
        .tp-resizeme p {
            padding-top: 50px;
        }
    </style>


@endsection
@section('js')
    <script src="{{url('front')}}/js/bootstrap-select.min.js"></script>

    <script>

        $("#MainCategory2").on('click , change',function () {
            var wahda = $(this).val();
            if (wahda != '') {

                $.get("{{ URL::to('/GetSubCategory2')}}" + '/' + wahda, function ($data) {
                    console.log($data)
                    var outs = "";
                    outs += '<option value="0">@if(Session('lang') == 'en') All @else
                        الكل  @endif
                        </option>';
                    $.each($data, function (b , val) {
                        @if(Session('lang') == 'en')
                            outs += '<option value="' + val.id + '">' + val.en_title + '</option>'
                        @else
                            outs += '<option value="' + val.id + '">' + val.ar_title + '</option>'
                        @endif
                    });
                    $('#SubCategory2').html(outs);


                });
            }
        });
        $("#City").change(function () {
            var wahda = $(this).val();

            if (wahda != '') {

                $.get("{{ URL::to('/GetDistricts2')}}" + '/' + wahda, function ($data) {
                    console.log($data)
                    var outs = "";
                    outs += '<option value="0">@if(Session('lang') == 'en') All @else
                        الكل  @endif
                        </option>'

                    $.each($data, function (b , val) {
                        @if(Session('lang') == 'en')
                            outs += '<option value="' + val.id + '">' + val.en_title + '</option>'
                        @else
                            outs += '<option value="' + val.id + '">' + val.ar_title + '</option>'
                        @endif
                    });
                    $('#district').html(outs);


                });
            }
        });

        $("#MainCategory").change(function () {
            var wahda = $(this).val();
            if (wahda != '') {
                $.get("{{ URL::to('/GetSubCategory')}}" + '/' + wahda, function ($data) {

                    var outs = '<select class="form-control" id="" name="booking-roomtype"' +
                        '                                            title="{{trans("lang.sub_Category")}}"' +
                        '                                            data-header="{{trans("lang.sub_Category")}}">'
                    outs += '<option value="0">@if(Session('lang') == 'en') All @else
                        الكل  @endif
                        </option>';


                    $.each($data, function (name, id) {
                        outs += '<option value="' + id + '">' + name + '</option>'
                    });
                    outs += '</select>';

                    $('#SubCategory').html(outs);


                });
            }
        });

    </script>
    <script src="{{url('front')}}/js/bootstrap-select.min.js"></script>

@endsection
