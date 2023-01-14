@extends('front.layout.master')
@section('title')
    {{$data->title}}
@endsection
@section('css')

    <style>
        .rating {
            display: inline-block;
            position: relative;
            height: 50px;
            line-height: 50px;
            font-size: 50px;
        }

        .rating label {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            cursor: pointer;
        }

        .rating label:last-child {
            position: static;
        }

        .rating label:nth-child(1) {
            z-index: 5;
        }

        .rating label:nth-child(2) {
            z-index: 4;
        }

        .rating label:nth-child(3) {
            z-index: 3;
        }

        .rating label:nth-child(4) {
            z-index: 2;
        }

        .rating label:nth-child(5) {
            z-index: 1;
        }

        .rating label input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }

        .rating label .icon {
            float: left;
            color: transparent;
        }

        .rating label:last-child .icon {
            color: #000;
        }

        .rating:not(:hover) label input:checked ~ .icon,
        .rating:hover label:hover input ~ .icon {
            color: #ffb600;
        }

        .rating label input:focus:not(:checked) ~ .icon:last-child {
            color: #000;
            text-shadow: 0 0 5px #09f;
        }

        .width {
            width: 900px !important;
        }

        @media only screen and (max-width: 600px) {
            .width {
                width: 400px !important;
            }
            .pd-46 {
                padding-top: 46px;
            }

        }
    </style>

@endsection
@section('js')
    <script>
        $(':radio').change(function () {
            console.log('New star rating: ' + this.value);
        });
    </script>
@endsection
@section('content')
    <!-- ========== ROOM SLIDER ========== -->

    <!-- ========== MAIN ========== -->
    <main class="room">
        <div class="container">
            <div class="row">
                <!-- SIDEBAR -->
                <div class="col-lg-12 col-12">
                    <div class="room-slider width">
                        <div id="room-main-image" class="owl-carousel image-gallery">
                            <!-- ITEM -->
                        @foreach($sliders as $Slider)
                            <!-- ITEM -->
                                <div class="item" style="width:100%; height:100%;">
                                    <figure class="gradient-overlay-hover image-icon">
                                        <a href="{{$Slider->image}}">
                                            <img class="img-fluid width" src="{{$Slider->image}}" alt="Image">
                                        </a>
                                    </figure>
                                </div>
                            @endforeach
                        </div>
                        <div id="room-thumbs" class="room-thumbs owl-carousel">
                            <!-- ITEM -->
                            @foreach($sliders as $Slider)
                                <div class="item"><img class="img-fluid" style="    height: 107px;"
                                                       src="{{$Slider->image}}" alt="Image"></div>
                        @endforeach
                        <!-- ITEM -->
                        </div>
                    </div>
                    <div style="padding: 10px; padding-top: 97px">
                        {!! $data->description !!}
                    </div>
                    <div class="section-title sm">
                        <h4>{{__('lang.Advertising-Details')}}</h4>
                    </div>
                    <div class="room-services-list">
                        <div class="row">
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.id')}} : {{$data->id}}</li>
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.MainCategory')}}
                                        : {{$data->MainCategory->title}} </li>
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.SubCategory')}}
                                        : {{$data->SubCategory->title}}</li>
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.City')}} : {{$data->City->title}} </li>
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.District')}} : {{$data->District->title}}
                                    </li>

                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.address')}} : {{$data->address}}</li>
                                    <li>
                                        <i class="fa fa-check"></i>{{__('lang.space')}} : {{$data->space}} </li>
                                    @if(isset($data->peace_number) &&  $data->peace_number != 0  )
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.peace_number')}}
                                            : {{$data->peace_number}}</li>
                                    @endif
                                    @if(isset($data->price) &&  $data->price != 0 )
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.price')}} : {{$data->price}} </li>
                                    @endif
                                    @if(isset($data->soom) &&  $data->soom != 0 )
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.soom')}} : {{$data->soom}} </li>
                                    @endif
                                    @if(isset($data->build_area) &&  $data->build_area != 0 )
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.build_area')}} : {{$data->build_area}}
                                        </li>
                                    @endif


                                </ul>
                            </div>

                            <div class="col-sm-4">
                                <ul class="list-unstyled">
                                    @if(isset($data->rooms_count) && $data->rooms_count != 0)
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.rooms_count')}}
                                            : {{$data->rooms_count}}</li>
                                    @endif
                                    @if(isset($data->created_at) && $data->created_at != null)
                                        <li>
                                            <i class="fa fa-check"></i>{{__('lang.date')}}
                                            : {{$data->created_at->format('Y-m-d')}} </li>
                                        <li>
                                            @endif

                                            <i class="fa fa-check"></i>{{__('lang.Views Count')}} : {{$data->view}} </li>

                                        @if(isset($data->plate_number) && $data->plate_number != 0)
                                            <li>
                                                <i class="fa fa-check"></i>{{__('lang.plate_number')}}
                                                : {{$data->plate_number}}</li>
                                        @endif
                                        @if(isset($data->build_age) &&  $data->build_age != 0 )
                                            <li>
                                                <i class="fa fa-check"></i>{{__('lang.build_age')}} : {{$data->build_age}}
                                            </li>
                                        @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                @if(isset($data->lat) &&  $data->lng != 0 && $data->active_location == 'active' )

                    <!-- ========== VIDEO ========== -->
                        <div class="row">
                            <div class="col-md-6">
                                <iframe
                                    width="100%"
                                    height="100%"
                                    frameborder="0"
                                    scrolling="no"
                                    marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?q={{$data->lat}},{{$data->lng}}&hl=es&z=14&amp;output=embed"
                                >
                                </iframe>

                            </div>
                            <div class="col-md-6">
                                <?php
                                $link = explode('watch?v=', $data->video_link);
                                if (isset($link[1])) {
                                    $youtube = $link[1];
                                } else {
                                    $youtube = null;
                                }
                                ?>

                                @if($youtube != null)
                                    <section class="video np parallax  op6" data-src="{{$data->image}}" data-parallax="scroll"
                                             data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">
                                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$youtube}}"
                                                frameborder="0" allowfullscreen></iframe>

                                    </section>
                                @endif
                            </div>
                        </div>
                    @else
                        <?php
                        $link = explode('watch?v=', $data->video_link);
                        if (isset($link[1])) {
                            $youtube = $link[1];
                        } else {
                            $youtube = null;
                        }
                        ?>

                        @if($youtube != null)
                            <section class="video np parallax  op6" data-src="{{$data->image}}" data-parallax="scroll"
                                     data-speed="0.3" data-mirror-selector=".wrapper" data-z-index="0">
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{$youtube}}"
                                        frameborder="0" allowfullscreen></iframe>

                            </section>
                        @endif
                    @endif
                <!-- ROOM REVIEWS -->
                    {{--                    <div id="room-reviews" class="room-reviews">--}}
                    {{--                        <div class="section-title sm">--}}
                    {{--                            <h4> REVIEWS</h4>--}}
                    {{--                        </div>--}}
                    {{--                        @inject('AllReview','App\Models\Review')--}}
                    {{--                        <?php--}}
                    {{--                        if(count($reviews) > 0){--}}
                    {{--                            $count = count($reviews);--}}
                    {{--                            $Sum = $AllReview->where('advertising_id',$data->id)->sum('rate');--}}
                    {{--                            $total = $Sum/$count;--}}
                    {{--                        }else{--}}
                    {{--                            $total = 0;--}}
                    {{--                            $count =0;--}}
                    {{--                        }--}}
                    {{--                        ?>--}}
                    {{--                        @if($count > 0)--}}
                    {{--                            <div class="rating-details">--}}
                    {{--                                <div class="row">--}}
                    {{--                                    <div class="col-lg-3">--}}
                    {{--                                        <div class="review-summary">--}}
                    {{--                                            <div class="average"><?php  print_r($total) ?> </div>--}}
                    {{--                                            <div class="rating">--}}
                    {{--                                                <i class="fa fa-star voted" aria-hidden="true"></i>--}}
                    {{--                                                <i class="fa fa-star voted" aria-hidden="true"></i>--}}
                    {{--                                                <i class="fa fa-star voted" aria-hidden="true"></i>--}}
                    {{--                                                <i class="fa fa-star voted" aria-hidden="true"></i>--}}
                    {{--                                                <i class="fa fa-star" aria-hidden="true"></i>--}}
                    {{--                                            </div>--}}
                    {{--                                            <small>@if(Session('lang') != 'en' ) بناءً على  {{ $count }} تقييمات @else Based on  {{ $count }} ratings @endif</small>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="col-lg-9">--}}
                    {{--                                        <!-- ITEM -->--}}
                    {{--                                        <div class="progress-item">--}}
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-lg-2 col-sm-2 col-3">--}}
                    {{--                                                    <div class="progress-stars">5 star</div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-9 col-sm-9 col-8">--}}
                    {{--                                                    <div class="progress">--}}
                    {{--                                                        <div class="progress-bar" role="progressbar" style="width: {{ ($AllReview->where('advertising_id',$data->id)->where('rate',5)->count() / $count) * 100 }}%" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>--}}

                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-1 col-sm-1 col-1">--}}
                    {{--                                                    <div class="progress-value">--}}

                    {{--                                                        {{ round( ($AllReview->where('advertising_id',$data->id)->where('rate',5)->count() / $count) * 100 , 1 ) }}--}}



                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- ITEM -->--}}
                    {{--                                        <div class="progress-item">--}}
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-lg-2 col-sm-2 col-3">--}}
                    {{--                                                    <div class="progress-stars">4 star</div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-9 col-sm-9 col-8">--}}
                    {{--                                                    <div class="progress">--}}
                    {{--                                                        <div class="progress-bar" role="progressbar" style="width:{{ ($AllReview->where('advertising_id',$data->id)->where('rate',4)->count() / $count) * 100 }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-1 col-sm-1 col-1">--}}
                    {{--                                                    <div class="progress-value">{{ round( ($AllReview->where('advertising_id',$data->id)->where('rate',4)->count() / $count) * 100 , 1 )}} %</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- ITEM -->--}}
                    {{--                                        <div class="progress-item">--}}
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-lg-2 col-sm-2 col-3">--}}
                    {{--                                                    <div class="progress-stars">3 star</div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-9 col-sm-2 col-8">--}}
                    {{--                                                    <div class="progress">--}}
                    {{--                                                        <div class="progress-bar" role="progressbar" style="width: {{ ($AllReview->where('advertising_id',$data->id)->where('rate',3)->count() / $count) * 100 }}%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-1 col-sm-1 col-1">--}}
                    {{--                                                    <div class="progress-value">{{ round( ($AllReview->where('advertising_id',$data->id)->where('rate',3)->count() / $count) * 100 , 1 ) }}%</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- ITEM -->--}}
                    {{--                                        <div class="progress-item">--}}
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-lg-2 col-sm-2 col-3">--}}
                    {{--                                                    <div class="progress-stars">2 star</div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-9 col-sm-9 col-8">--}}
                    {{--                                                    <div class="progress">--}}
                    {{--                                                        <div class="progress-bar" role="progressbar" style="width: {{ ($AllReview->where('advertising_id',$data->id)->where('rate',2)->count() / $count) * 100 }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-1 col-sm-1 col-1">--}}
                    {{--                                                    <div class="progress-value">{{ round( ($AllReview->where('advertising_id',$data->id)->where('rate',2)->count() / $count) * 100 , 1 )}}%</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                        <!-- ITEM -->--}}
                    {{--                                        <div class="progress-item">--}}
                    {{--                                            <div class="row">--}}
                    {{--                                                <div class="col-lg-2 col-sm-2 col-3">--}}
                    {{--                                                    <div class="progress-stars">1 star</div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-9 col-sm-9 col-8">--}}
                    {{--                                                    <div class="progress">--}}
                    {{--                                                        <div class="progress-bar" role="progressbar" style="width: {{ ($AllReview->where('advertising_id',$data->id)->where('rate',1)->count() / $count) * 100 }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                                <div class="col-lg-1 col-sm-1 col-1">--}}
                    {{--                                                    <div class="progress-value">{{ round( ($AllReview->where('advertising_id',$data->id)->where('rate',1)->count() / $count) * 100 , 1 )  }}  %</div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        @endif--}}
                    {{--                        @foreach($reviews as $key => $review)--}}

                    {{--                            <div class="review-box @if($key != 0 ) clearfix @endif ">--}}
                    {{--                                <figure class="review-author">--}}
                    {{--                                    <img src="{{$settings->logo}}" alt="Image">--}}
                    {{--                                </figure>--}}
                    {{--                                <div class="review-contentt">--}}
                    {{--                                    <div class="rating">--}}
                    {{--                                        <i class="fa fa-star  @if($review->rate >= 1) voted @endif "  aria-hidden="true"></i>--}}
                    {{--                                        <i class="fa fa-star  @if($review->rate >= 2) voted @endif " aria-hidden="true"></i>--}}
                    {{--                                        <i class="fa fa-star  @if($review->rate >= 3) voted @endif " aria-hidden="true"></i>--}}
                    {{--                                        <i class="fa fa-star  @if($review->rate >= 4) voted @endif " aria-hidden="true"></i>--}}
                    {{--                                        <i class="fa fa-star  @if($review->rate >= 5) voted @endif " aria-hidden="true"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="review-info">--}}
                    {{--                                        {{$review->name}} – {{$review->created_at->format('Y-m-d H:i')}}--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="review-text">--}}
                    {{--                                        <p>--}}
                    {{--                                            {{$review->description}}--}}
                    {{--                                        </p>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                    @endforeach--}}
                    {{--                    <!-- End review-box -->--}}
                    {{--                        <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4" class="btn btn-primary font-weight-bolder">--}}
                    {{--            <span class="svg-icon svg-icon-md">--}}
                    {{--              <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->--}}
                    {{--              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                    {{--                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                    {{--                  <rect x="0" y="0" width="24" height="24" />--}}
                    {{--                  <circle fill="#000000" cx="9" cy="15" r="6" />--}}
                    {{--                  <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />--}}
                    {{--                </g>--}}
                    {{--              </svg>--}}
                    {{--                <!--end::Svg Icon-->--}}
                    {{--            </span> {{__('lang.AddReview')}}</button>--}}

                    {{--                        <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                    {{--                            <div class="modal-dialog modal-lg" role="document">--}}
                    {{--                                <div class="modal-content">--}}
                    {{--                                    <div class="modal-header">--}}
                    {{--                                        <h5 class="modal-title" id="exampleModalLabel">--}}
                    {{--                                            {{__('lang.AddReview')}}</h5>--}}
                    {{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--                                        </button>--}}
                    {{--                                    </div>--}}
                    {{--                                    <div class="modal-body">--}}
                    {{--                                        <form  action="{{url('AddReview')}}" method="post" class="contact-form">--}}
                    {{--                                            @csrf--}}
                    {{--                                            <div class="form-group">--}}
                    {{--                                                <input class="form-control" name="name" placeholder="{{trans('lang.Your_Name')}}"--}}
                    {{--                                                       type="text" required>--}}
                    {{--                                                <input class="form-control" name="advertising_id"--}}
                    {{--                                                       type="hidden" value="{{$data->id}}" required>--}}

                    {{--                                            </div>--}}
                    {{--                                            <label>Your Rate</label>--}}

                    {{--                                            <div class="form-group " >--}}
                    {{--                                                <div class="rating">--}}
                    {{--                                                    <label  style="font-size: 27px">--}}
                    {{--                                                        <input type="radio" name="rate" value="1" />--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                    </label>--}}
                    {{--                                                    <label  style="font-size: 27px">--}}
                    {{--                                                        <input type="radio" name="rate" value="2" />--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                    </label>--}}
                    {{--                                                    <label  style="font-size: 27px">--}}
                    {{--                                                        <input type="radio" name="rate" value="3" />--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                    </label>--}}
                    {{--                                                    <label  style="font-size: 27px">--}}
                    {{--                                                        <input type="radio" name="rate" value="4" />--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                    </label>--}}
                    {{--                                                    <label style="font-size: 27px">--}}
                    {{--                                                        <input type="radio" name="rate" value="5" />--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                        <span class="icon">★</span>--}}
                    {{--                                                    </label>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group">--}}
                    {{--                            <textarea class="form-control" name="description" placeholder="{{trans('lang.Your Comment')}}"--}}
                    {{--                                      required></textarea>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group">--}}
                    {{--                                                <button class="btn mt30">{{trans('lang.AddReview')}}</button>--}}
                    {{--                                            </div>--}}
                    {{--                                        </form>--}}

                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}
                    <div class="similar-rooms">
                        <div class="section-title sm">
                            <h4>{{__('lang.SmilllerAdvertising')}}</h4>
                            {{--                            <p class="section-subtitle">Leave your review</p>--}}
                        </div>
                        <div class="row">
                            <!-- ITEM -->
                            @inject('SmilllerAdvertising','App\Models\Advertising')
                            @foreach($SmilllerAdvertising->where('is_visible',1)->where('main_category_id',$data->main_category_id)->where('sub_category_id',$data->sub_category_id)->limit(3)->get() as $SmillerAdv)
                                <div class="col-lg-4">
                                    <div class="room-grid-item">
                                        <figure class="gradient-overlay-hover link-icon">
                                            <a href="{{url('Advertising-Details/'.$SmillerAdv->id)}}">
                                                <img src="{{$SmillerAdv->image}}" class="img-fluid" alt="Image">
                                            </a>
                                            {{--                                        <div class="room-services">--}}
                                            {{--                                            <i class="fa fa-coffee" aria-hidden="true" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Breakfast Included" data-original-title="Breakfast"></i>--}}
                                            {{--                                            <i class="fa fa-wifi" aria-hidden="true" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Free WiFi" data-original-title="WiFi"></i>--}}
                                            {{--                                            <i class="fa fa-television" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="Plasma TV with cable channels" data-original-title="TV"></i>--}}
                                            {{--                                        </div>--}}
                                            <div class="room-price">{{$SmillerAdv->price}}  </div>
                                        </figure>
                                        <div class="room-info">
                                            <h2 class="room-title">
                                                <a href="{{url('Advertising-Details/'.$SmillerAdv->id)}}">{{$SmillerAdv->title}}</a>
                                            </h2>
                                            {{--                                        <p>Enjoy our single room</p>--}}
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <!-- ITEM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
