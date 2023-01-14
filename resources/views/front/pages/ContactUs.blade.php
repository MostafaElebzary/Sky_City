@extends('front.layout.master')
@section('title')
    {{trans('lang.CONTACT US')}}
@endsection
@section('css')
    {!! ReCaptcha::htmlScriptTagJsApi() !!}

@endsection
@section('content')

    <!-- ========== PAGE TITLE ========== -->
    <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="inner">
                <h1>CONTACT</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">{{__('lang.MainHome')}}</a>
                    </li>
                    <li>{{__('lang.CONTACT US')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ========== MAIN ========== -->
    <main class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <h4>{{__('lang.CONTACT US')}}</h4>
                        <p class="section-subtitle">Let’s Talk</p>
                    </div>
                {{--                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus sit, fugiat at in assumenda corrupti autem iste eveniet eaque vitae beatae tenetur, voluptatem eius. Numquam.</p>--}}
                <!-- CONTACT FORM -->
                    <form id="" action="{{url('inbox_us')}}" method="post" class="">
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
                            <textarea class="form-control" name="message" placeholder="{{trans('lang.Your_Message')}}"
                                      required></textarea>
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
                        <input type="hidden" name="recaptcha" id="recaptcha">
                        <div class="form-group">
                            <button class="btn mt30">{{trans('lang.Send_Message')}}</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6" style="padding-top: 107px;">
                    <div class="sidebar">
                        <!--                        <div class="google-map">-->
                        <!--                            <div class="toggle-streetview" id="openStreetView">-->
                        <!--                                <i class="fa fa-street-view" aria-hidden="true"></i>-->
                        <!--                            </div>-->
                    <!--{{--                            <div id="map-canvas"></div>--}}-->
                        <!--                        </div>-->
                        <div class="contact-details mt75">
                            <div class="contact-info">
                                <ul class="contact-details">
                                    <li style="color: black!important;">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        {{$settings->address}}
                                    </li>
                                    <li style="color: black!important;">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        {{$settings->phone}}
                                    </li>
                                    <li style="color: black!important;">
                                        <i class="fa fa-fax"></i>
                                        {{$settings->fax}}
                                    </li>

                                    <li style="color: black!important;">
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="social-media mt50">
                                <a class="facebook" data-original-title="Facebook" data-toggle="tooltip"
                                   href="{{$settings->facebook}}">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a class="twitter" data-original-title="Twitter" data-toggle="tooltip"
                                   href="{{$settings->twitter}}">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a class="googleplus" data-original-title="Google Plus" data-toggle="tooltip"
                                   href="{{$settings->instagram}}">
                                    <i class="fa fa-instagram"></i>
                                </a>

                                <a class="linkedin" data-original-title="Linkedin" data-toggle="tooltip"
                                   href="{{$settings->linkedin}}">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a class="youtube" data-original-title="Youtube" data-toggle="tooltip"
                                   href="{{$settings->youtube}}">
                                    <i class="fa fa-youtube"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>


    <script>

        $(document).ready(function () {
            function initialize() {
                var map;
                var panorama;
                var var_latitude = {{$settings->lat}}; // Google Map Latitude
                var var_longitude = {{$settings->lng}}; // Google Map Longitude
                var pin = '{{url('front')}}/images/icons/pin.svg';

                //Map pin-window details
                var title = "{{$settings->name}}";
                var hotel_name = "{{$settings->name}}";
                var hotel_address = "{{$settings->address}}";
                var hotel_desc = "{{$settings->aboutus}}";//ar_aboutus
                var hotel_more_desc = "{{$settings->aboutus}}.";

                var hotel_location = new google.maps.LatLng(var_latitude, var_longitude);
                var mapOptions = {
                    center: hotel_location,
                    zoom: 14,
                    scrollwheel: false,
                    streetViewControl: false,
                    styles: [{
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#444444"
                        }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f5f5f5"
                        }]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 45
                        }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#1dc1f8"
                        }, {
                            "visibility": "on"
                        }]
                    }]
                };

                map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

                var contentString =
                    '<div id="infowindow_content">' +
                    '<p><strong>' + hotel_name + '</strong><br>' +
                    hotel_address + '<br>' +
                    hotel_desc + '<br>' +
                    hotel_more_desc + '</p>' +
                    '</div>';

                var var_infowindow = new google.maps.InfoWindow({
                    content: contentString
                });
                var marker = new google.maps.Marker({
                    position: hotel_location,
                    map: map,
                    icon: pin,
                    title: title,
                    maxWidth: 500,
                    optimized: false,
                });
                google.maps.event.addListener(marker, 'click', function () {
                    var_infowindow.open(map, marker);
                });
                panorama = map.getStreetView();
                panorama.setPosition(hotel_location);
                panorama.setPov( /** @type {google.maps.StreetViewPov} */ ({
                    heading: 265,
                    pitch: 0
                }));
                var openStreet = document.getElementById('openStreetView');
                if (openStreet) {
                    document.getElementById("openStreetView").onclick = function () {
                        toggleStreetView()
                    };
                }

                function toggleStreetView() {
                    var toggle = panorama.getVisible();
                    if (toggle == false) {
                        panorama.setVisible(true);
                    } else {
                        panorama.setVisible(false);
                    }
                }
            }

            //Check if google map exist
            if ($("#map-canvas").length) {
                google.maps.event.addDomListener(window, 'load', initialize);
            }
        });

    </script>
@endsection
