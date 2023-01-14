@extends('front.layout.master')
@section('title')
    {{__('lang.search')}}
@endsection

@section('css')
    <style>
        .room-list-item .favorite-item:before {
            border-top: 50px solid #2f3788;

        }
    </style>
@endsection


@section('content')

    <!-- ========== PAGE TITLE ========== -->
    <div class="page-title gradient-overlay op6" style="background: url({{asset('front/images/breadcrumb.jpg')}}); background-repeat: no-repeat;
    background-size: cover;">
        <div class="container">
            <div class="inner">
                <h1>   {{__('lang.search')}}</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">{{__('lang.MainHome')}}</a>
                    </li>
                    <li>{{__('lang.search')}}</li>
                </ol>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
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
                            <!-- DATE -->
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
                                        <div class="panel-dropdown-content">
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
                                <button style="margin-bottom: 37px; max-height: 38px; width: 150px;" type="submit"
                                        class="btn btn-book">{{__('lang.Search')}}</button>
                            </div>
                        </div>
                    </form>

                <div class="container">
                @foreach($ads as $ad)
                    <!-- ITEM -->
                        <div class="room-list-item">
                            @if($ad->is_favorite == 1)
                                <div class="favorite-item">
                                    <i class="fa fa-star-o"></i>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-4">
                                    <figure class="gradient-overlay-hover link-icon">
                                        <a href="{{url('Advertising-Details/'.$ad->id)}}"><img
                                                style="height: 200px;width: 400px"
                                                src="{{$ad->image}}"
                                                class="img-fluid"
                                                alt="{{$ad->title}}"></a>
                                    </figure>
                                </div>
                                <div class="col-lg-6">
                                    <div class="room-info">
                                        <h3 class="room-title">
                                            <a href="{{url('Advertising-Details/'.$ad->id)}}">{{$ad->title}}</a>
                                            <br>
                                            <label
                                                for=""> {{__('lang.id')}} : {{$ad->id}}</label>
                                        </h3>
                                        <span class="room-rates">

                  </span>
                                        <div class="truncate">{!! $ad->description !!}</div>
                                        <div class="room-services">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="room-price">
                                        <span class="price"
                                              style="color: #2f3788"> {{$ad->price}} {{trans('lang.currency')}}</span>
                                        <a href="{{url('Advertising-Details/'.$ad->id)}}"
                                           class="btn btn-sm">{{trans('lang.show')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach

                </div>
            </div>

        </div>
    </div>



@endsection
@section('js')
    <script>
        $("#MainCategory2").on('click , change', function () {
            var wahda = $(this).val();
            if (wahda != '') {

                $.get("{{ URL::to('/GetSubCategory2')}}" + '/' + wahda, function ($data) {
                    console.log($data)
                    var outs = "";
                    outs += '<option value="0">@if(Session('lang') == 'en') All @else
                        الكل  @endif
                        </option>';
                    $.each($data, function (b, val) {
                        @if(Session('lang') == 'ar')
                            outs += '<option value="' + val.id + '">' + val.ar_title + '</option>'
                        @else
                            outs += '<option value="' + val.id + '">' + val.en_title + '</option>'

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
                        </option>';
                    $.each($data, function (b, val) {
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
    </script>

@endsection
