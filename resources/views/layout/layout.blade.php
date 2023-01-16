<!DOCTYPE html>
@if(session('lang') == 'en')
    <html lang="en">
    @else

        <html direction="rtl" dir="rtl" style="direction: rtl">
        @endif
        <head>
            <base href="">
            <meta charset="utf-8"/>
            @inject('Setting','App\Models\Setting')
            <title>
                {{--                {{$setting->find(1)->name}}--}}
                | @yield('title')
            </title>
            <meta name="description" content=""/>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
            <link rel="canonical" href=""/>
            <!--begin::Fonts-->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
            <!--end::Fonts-->
            <link rel="shortcut icon" href="{{asset('dashboard/A icon-01.png')}}"/>

            @if(session('lang') == 'ar')
                <link href="{{asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}"
                      rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}"
                      rel="stylesheet" type="text/css"/>
                <link href="{{asset('dashboard/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
            @elseif(session('lang') == 'en')

                <link href="{{asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}"
                      rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet"
                      type="text/css"/>
            @else
                <link href="{{asset('dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}"
                      rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}"
                      rel="stylesheet" type="text/css"/>
                <link href="{{asset('dashboard/assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css"/>

                <link href="{{asset('dashboard/assets/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
                <link href="{{asset('dashboard/assets/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet"
                      type="text/css"/>
            @endif
            <style>
                @media only screen and (max-width: 800px) {
                    #kt_subheader {
                        display: none;
                    }
                }

            </style>

            @yield('css')
        </head>

        <!-- end::Head -->

        <!-- begin::Body -->
        <body id="kt_body"
              class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

        <!-- begin:: Page -->
        <!--begin::Header Mobile-->
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
            <!--begin::Logo-->
            <a href="/">
                <img alt="Logo" src="#" style="max-width: 110px;"/>
            </a>
            <!--end::Logo-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Aside Mobile Toggle-->
                <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Aside Mobile Toggle-->
                <!--begin::Header Menu Mobile Toggle-->
            {{--        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">--}}
            {{--            <span></span>--}}
            {{--        </button>--}}
            <!--end::Header Menu Mobile Toggle-->
                <!--begin::Topbar Mobile Toggle-->
                <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path
                                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path
                                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                    fill="#000000" fill-rule="nonzero"/>
							</g>
						</svg>
                        <!--end::Svg Icon-->
					</span>
                </button>
                <!--end::Topbar Mobile Toggle-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Header Mobile-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                <!--begin::Aside-->
                <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <!--begin::Brand-->
                    <div class="brand flex-column-auto" id="kt_brand">
                        <!--begin::Logo-->
                        <a href="{{url('/')}}" class="brand-logo">
                            <img alt="Logo" src="#" style="width:150px;"/>
                        </a>
                        <!--end::Logo-->
                        <!--begin::Toggle-->
                        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"/>
										<path
                                            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"/>
										<path
                                            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"/>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
                        </button>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Aside Menu-->
                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <!--begin::Menu Container-->
                        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                             data-menu-dropdown-timeout="500">
                            <!--begin::Menu Nav-->
                            <ul class="menu-nav">

                                <li class="menu-item @if(Request::segment(1) == '')  menu-item-active @endif  "
                                    aria-haspopup="true">
                                    <a href="/Admin-Panel" class="menu-link">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
													<path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>
													<path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        id="Path" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                                        <span class="menu-text"
                                              style="font-size:16px!important;">{{__('lang.Home')}}  </span>
                                    </a>
                                </li>
                                @can('Contact')
                                    <li class="menu-item @if(Request::segment(1) == 'Contact')  menu-item-active @endif  "
                                        aria-haspopup="true">
                                        <a href="/Contact" class="menu-link">
<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Incoming-mail.svg--><svg
        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
        viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z"
            fill="#000000"/>
        <path
            d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"
            transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            <span class="menu-text"
                                                  style="font-size:16px!important;">{{__('lang.ContactUs')}}</span>
                                            <span class="menu-label">
                                            @if($unread_inbox->count() > 0)
                                                    <span
                                                        class="label label-danger label-inline">{{$unread_inbox->count()}}</span>
                                                @endif
													</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('Advertising')
                                    <li class="menu-item @if(Request::segment(1) == 'Advertising')  menu-item-active @endif  "
                                        aria-haspopup="true">
                                        <a href="{{url('Advertising')}}" class="menu-link">
										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                            <span class="menu-text"
                                                  style="font-size:16px!important;">{{__('lang.AdvertisingSettings')}}</span>
                                        </a>
                                    </li>
                                @endcan
{{--                                @can('Clients')--}}
{{--                                    <li class="menu-item @if(Request::segment(1) == 'Clients')  menu-item-active @endif  "--}}
{{--                                        aria-haspopup="true">--}}
{{--                                        <a href="{{url('Clients')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                            <span class="menu-text"--}}
{{--                                                  style="font-size:16px!important;">{{__('lang.Users')}}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endcan--}}
{{--                                @can('Reciepts')--}}
{{--                                    <li class="menu-item @if(Request::segment(1) == 'Reciepts')  menu-item-active @endif  "--}}
{{--                                        aria-haspopup="true">--}}
{{--                                        <a href="{{url('Reciepts')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                            <span class="menu-text"--}}
{{--                                                  style="font-size:16px!important;">{{__('lang.Receipts')}}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="menu-item @if(Request::segment(1) == 'invoices')  menu-item-active @endif  "--}}
{{--                                        aria-haspopup="true">--}}
{{--                                        <a href="{{url('invoices')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                            <span class="menu-text"--}}
{{--                                                  style="font-size:16px!important;">{{__('lang.Invoices')}}</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endcan--}}

{{--                                @if (Auth::user()->can('sell-contracts') || Auth::user()->can('rent-contracts') )--}}
{{--                                    <li class="menu-item menu-item-submenu--}}
{{--                                @if(--}}
{{--                                            Request::segment(1) == 'sell-contracts' ||--}}
{{--                                            Request::segment(1) == 'sell-contract-show' ||--}}
{{--                                            Request::segment(1) == 'create-sell-contracts'||--}}
{{--                                             Request::segment(1) == 'rent-contracts' ||--}}
{{--                                            Request::segment(1) == 'rent-contract-show' ||--}}
{{--                                            Request::segment(1) == 'create-rent-contracts'--}}

{{--                                            )   menu-item-open active @endif--}}
{{--                                        " aria-haspopup="true" data-menu-toggle="hover">--}}
{{--                                        <a href="javascript:;" class="menu-link menu-toggle">--}}
{{--										<span class="svg-icon menu-icon">--}}
{{--											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->--}}
{{--											<svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                 viewBox="0 0 24 24" version="1.1">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<rect x="0" y="0" width="24" height="24"/>--}}
{{--													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>--}}
{{--													<path--}}
{{--                                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"--}}
{{--                                                        fill="#000000" opacity="0.3"/>--}}
{{--												</g>--}}
{{--											</svg>--}}
{{--                                            <!--end::Svg Icon-->--}}
{{--										</span>--}}
{{--                                            <span class="menu-text menu-item-open"--}}
{{--                                                  style="font-size:16px!important;">{{trans('lang.Contracts')}}</span>--}}
{{--                                            <i class="kt-menu__ver-arrow la la-angle-left"></i>--}}
{{--                                        </a>--}}
{{--                                        <div class="menu-submenu">--}}
{{--                                            <i class="menu-arrow"></i>--}}
{{--                                            <ul class="menu-subnav">--}}
{{--                                                @can('sell-contracts')--}}

{{--                                                    <li class="menu-item @if(Request::segment(1) == 'sell-contracts' ||Request::segment(1) == 'sell-contract-show' ||Request::segment(1) == 'create-sell-contracts')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('sell-contracts')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                                  style="font-size:16px!important;">{{__('lang.SellContract')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
{{--                                                @can('rent-contracts')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'rent-contracts' ||Request::segment(1) == 'rent-contract-show' ||Request::segment(1) == 'create-rent-contracts')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('rent-contracts')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                                  style="font-size:16px!important;">{{__('lang.RentContract')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'Outrent-contracts' )  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('Outrent-contracts')}}" class="menu-link">--}}

{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Files/User-folder.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <path--}}
{{--            d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--        <path--}}
{{--            d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                                  style="font-size:16px!important;">{{__('lang.OutRentContract')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}

{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                @endif--}}
                                @if (Auth::user()->can('Owners')
                                    || Auth::user()->can('Sliders')
                                    || Auth::user()->can('roles')
                                    || Auth::user()->can('Admins')
                                    || Auth::user()->can('Categories')
                                    || Auth::user()->can('Cities')
                                    || Auth::user()->can('District')
                                    || Auth::user()->can('setting')
                                     )
                                    <li class="menu-item menu-item-submenu
                                @if(Request::segment(1) == 'Owners' ||
                                    Request::segment(1) == 'Sliders' ||
                                    Request::segment(1) == 'roles'||
                                    Request::segment(1) == 'Admins'||
                                    Request::segment(1) == 'Categories'||
                                    Request::segment(1) == 'Cities'||
                                    Request::segment(1) == 'District'||
                                    Request::segment(1) == 'faq'||
                                    Request::segment(1) == 'setting'
                                 )   menu-item-open active @endif


                                        " aria-haspopup="true" data-menu-toggle="hover">
                                        <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
													<path
                                                        d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
                                                        fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                                            <span class="menu-text menu-item-open"
                                                  style="font-size:16px!important;">{{trans('lang.Settings')}}</span>
                                            <i class="kt-menu__ver-arrow la la-angle-left"></i>
                                        </a>
                                        <div class="menu-submenu">
                                            <i class="menu-arrow"></i>
                                            <ul class="menu-subnav">

{{--                                                @can('Owners')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'Owners')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="/Owners" class="menu-link">--}}
{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--        <path--}}
{{--            d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"--}}
{{--            fill="#000000"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.Owners')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
                                                @can('Sliders')
                                                    <li class="menu-item @if(Request::segment(1) == 'Sliders')  menu-item-active @endif  "
                                                        aria-haspopup="true">
                                                        <a href="/Sliders" class="menu-link">
										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
            fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                            <span class="menu-text"
                                                            >{{__('lang.Sliders')}}</span>
                                                        </a>
                                                    </li>
                                                @endcan
{{--                                                @can('roles')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'roles')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="/roles" class="menu-link">--}}
{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Communication/Shield-user.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1">--}}
{{--                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                <path--}}
{{--                                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"--}}
{{--                                                    fill="#000000" opacity="0.3"/>--}}
{{--                                                <path--}}
{{--                                                    d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"--}}
{{--                                                    fill="#000000" opacity="0.3"/>--}}
{{--                                                <path--}}
{{--                                                    d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"--}}
{{--                                                    fill="#000000" opacity="0.3"/>--}}
{{--                                            </g>--}}
{{--                                         </svg><!--end::Svg Icon-->--}}
{{--                                        </span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.roles')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
                                                @can('Admins')
                                                    <li class="menu-item @if(Request::segment(1) == 'Admins')  menu-item-active @endif  "
                                                        aria-haspopup="true">
                                                        <a href="/Admins" class="menu-link">
										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Communication/Shield-user.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path
                                                    d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path
                                                    d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                    fill="#000000" opacity="0.3"/>
                                                <path
                                                    d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                    fill="#000000" opacity="0.3"/>
                                            </g>
                                         </svg><!--end::Svg Icon-->
                                        </span>
                                                            <span class="menu-text"
                                                            >{{__('lang.Admins')}}</span>
                                                        </a>
                                                    </li>
                                                @endcan
{{--                                                @can('Categories')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'Categories')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="/Categories" class="menu-link">--}}
{{--									<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Text/Menu.svg--><svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                            viewBox="0 0 24 24" version="1.1">--}}
{{--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--        <rect x="0" y="0" width="24" height="24"/>--}}
{{--        <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>--}}
{{--        <path--}}
{{--            d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"--}}
{{--            fill="#000000" opacity="0.3"/>--}}
{{--    </g>--}}
{{--</svg><!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.Categories')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
{{--                                                @can('g')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'ReceiptType')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('ReceiptType')}}" class="menu-link">--}}
{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>--}}
{{--													<path--}}
{{--                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"--}}
{{--                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>--}}
{{--													<path--}}
{{--                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"--}}
{{--                                                        id="Path" fill="#000000" opacity="0.3"/>--}}
{{--												</g>--}}
{{--											</svg>--}}
{{--                                            <!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.ReceiptType')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
{{--                                                @can('Cities')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'Cities')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('Cities')}}" class="menu-link">--}}
{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>--}}
{{--													<path--}}
{{--                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"--}}
{{--                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>--}}
{{--													<path--}}
{{--                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"--}}
{{--                                                        id="Path" fill="#000000" opacity="0.3"/>--}}
{{--												</g>--}}
{{--											</svg>--}}
{{--                                            <!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.CitySetting')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                @endcan--}}
{{--                                                @can('District')--}}
{{--                                                    <li class="menu-item @if(Request::segment(1) == 'District')  menu-item-active @endif  "--}}
{{--                                                        aria-haspopup="true">--}}
{{--                                                        <a href="{{url('District')}}" class="menu-link">--}}
{{--										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg--}}
{{--                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">--}}
{{--												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>--}}
{{--													<path--}}
{{--                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"--}}
{{--                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>--}}
{{--													<path--}}
{{--                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"--}}
{{--                                                        id="Path" fill="#000000" opacity="0.3"/>--}}
{{--												</g>--}}
{{--											</svg>--}}
{{--                                            <!--end::Svg Icon--></span>--}}
{{--                                                            <span class="menu-text"--}}
{{--                                                            >{{__('lang.DistrictSetting')}}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}

{{--                                                @endcan--}}

                                                    <li class="menu-item @if(Request::segment(1) == 'faq')  menu-item-active @endif  "
                                                        aria-haspopup="true">
                                                        <a href="{{url('faq')}}" class="menu-link">
										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
													<path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>
													<path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        id="Path" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon--></span>
                                                            <span class="menu-text"
                                                            >{{__('lang.faq')}}</span>
                                                        </a>
                                                    </li>

                                                @can('setting')
                                                    <li class="menu-item @if(Request::segment(1) == 'Cities')  menu-item-active @endif  "
                                                        aria-haspopup="true">
                                                        <a href="{{url('Cities')}}" class="menu-link">
										<span class="svg-icon menu-icon"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo2/dist/../src/media/svg/icons/Design/Image.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon id="Bound" points="0 0 24 0 24 24 0 24"/>
													<path
                                                        d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                        id="Shape" fill="#000000" fill-rule="nonzero"/>
													<path
                                                        d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                        id="Path" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon--></span>
                                                            <span class="menu-text"
                                                            >{{__('lang.General setting')}}</span>
                                                        </a>
                                                    </li>
                                                @endcan


                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        </li>

                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu"
                                 class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Notifications-->

                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown"
                                     data-offset="10px,0px">
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
											<span id="notification" class="svg-icon svg-icon-xl svg-icon-primary">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                                  <span style="color: red;font-weight: bold;font-size: 10px;"
                                                        id="counter">1</span>
												<svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path
                                                            d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                                            fill="#000000" opacity="0.3"/>
														<path
                                                            d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                                            fill="#000000"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>
                                        <span class="pulse-ring"></span>
                                    </div>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div
                                    class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <form>
                                        <!--begin::Header-->
                                        <div
                                            class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                                            style="background-image: url({{asset('/dashboard/assets/media/misc/bg-1.jpg')}})">
                                            <!--begin::Title-->

                                            <!--end::Title-->
                                            <!--begin::Tabs-->
                                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab"
                                                       href="#topbar_notifications_notifications">{{trans('lang.inbox')}}</a>
                                                </li>

                                            </ul>
                                            <!--end::Tabs-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Content-->
                                        <div class="tab-content">
                                            <!--begin::Tabpane-->
                                            <div class="tab-pane show p-8 active"
                                                 id="topbar_notifications_notifications" role="tabpanel">
                                                <!--begin::Scroll-->
                                                <div class="scroll pr-7 mr-n7 ps ps--active-y" data-scroll="true"
                                                     data-height="300" data-mobile-height="200" id="append-firebase"
                                                     style="height: 300px; overflow: hidden;">
                                                    <div id="newNotif">
                                                    </div>

                                                    <!--end::Item-->
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                             style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y"
                                                         style="top: 0px; right: 0px; height: 300px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                             style="top: 0px; height: 205px;"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!--end::Tabpane-->
                                            <!--begin::Tabpane-->

                                        </div>
                                        <!--end::Content-->
                                    </form>
                                </div>
                                <!--end::Dropdown-->
                            </div>

                            <!--end::Notifications-->

                            <!--begin::Languages-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                        @if(session('lang') == 'ar')
                                            <img class="h-20px w-20px rounded-sm"
                                                 src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}"
                                                 alt=""/>
                                        @else
                                            <img class="h-20px w-20px rounded-sm"
                                                 src="{{asset('/dashboard/assets/media/flags/020-flag.svg')}}"
                                                 alt=""/>
                                        @endif

                                    </div>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div
                                    class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                    <!--begin::Nav-->
                                    <ul class="navi navi-hover py-4">
                                        <li class="navi-item">
                                            @if(session('lang') == 'en')
                                                <a href="{{url('lang/ar')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">

                                                    <img
                                                        src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}"
                                                        alt=""/>

                                            </span>
                                                    العربية

                                                </a>
                                            @elseif(session('lang') == 'ar')
                                                <a href="{{url('lang/en')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">
                                                 <img
                                                     src="{{asset('/dashboard/assets/media/flags/020-flag.svg')}}"
                                                     alt=""/>

                                            </span>

                                                    English
                                                </a>

                                            @else
                                                <a href="{{url('lang/ar')}}" class="navi-link">
                                            <span class="symbol symbol-20 mr-3">

                                                    <img
                                                        src="{{asset('/dashboard/assets/media/flags/008-saudi-arabia.svg')}}"
                                                        alt=""/>

                                            </span>


                                                </a>

                                            @endif
                                        </li>

                                    </ul>
                                    <!--end::Nav-->
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Languages-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div
                                    class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle" style="width: 650px;!important;">
                                        <span
                                            class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,

                                            {{Auth::user()->name}}
                                        </span>
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"></span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
										</span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <!--begin::Entry-->

                @yield('content')

                <!--end::Entry-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2"></span>

                            {{--                    <a href="http://uram.com/" target="_blank" class="text-dark-75 text-hover-primary">©--}}
                            {{--                        URAMIT</a>--}}
                            {{--                    2021 - ALL RIGHTS RESERVED UIT 2021--}}

                        </div>

                        <!--end::Copyright-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
        </div>
        <!--end::Main-->

        <!-- begin::User Panel-->
        <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
            <!--begin::Header-->
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <small class="text-muted font-size-sm ml-2"></small></h3>
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                    <i class="ki ki-close icon-xs text-muted"></i>
                </a>
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="offcanvas-content pr-5 mr-n5">
                <!--begin::Header-->
                <div class="d-flex align-items-center mt-5">
                    <div class="symbol symbol-100 mr-5">
                        <div class="symbol-label" style="background-image:url('{{Auth::user()->image}}')"></div>
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <div class="text-muted mt-1">{{Auth::user()->name}}</div>
                        <div class="navi mt-2">
                            <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-text text-muted text-hover-primary"></span> {{Auth::user()->email}}
								</span>
                            </a>
                            <a href="/logout"
                               class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">@if(session('lang') == 'ar')
                                    تسجيل الخروج @else sign out @endif </a>
                        </div>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-8 mb-5"></div>
                <!--end::Separator-->
                <!--begin::Nav-->
                <div class="navi navi-spacer-x-0 p-0">
                    <!--begin::Item-->
                    <a href="{{url('Profile')}}" class="navi-item">
                        <div class="navi-link">
                            <div class="symbol symbol-40 bg-light mr-3">
                                <div class="symbol-label">

									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path
                                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                    fill="#000000"/>
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5"/>
											</g>
										</svg>
                                        <!--end::Svg Icon-->
									</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!--end:Item-->
                    <!--end:Item-->
                </div>
                <!--end::Nav-->
                <!--begin::Separator-->
                <div class="separator separator-dashed my-7"></div>
                <!--end::Separator-->
                <!--begin::Notifications-->
                <div>
                    <!--begin:Heading-->

                    <!--end:Heading-->
                    <!--begin::Item-->
                    <!--end::Item-->
                    <!--begin::Item-->
                    <!--end::Item-->
                </div>
                <!--end::Notifications-->
            </div>
            <!--end::Content-->
        </div>
        <!-- end::User Panel-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('lang.createEvent')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/store_event" method="post">

                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label> {{__('lang.title')}}</label>
                                <input type="text" name="title" class="form-control">
                                <input type="hidden" value="{{Auth::user()->id}}" name="user_id"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label> {{__('lang.Date')}}</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> {{__('lang.time')}}</label>
                                <input type="time" name="time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> {{__('lang.description')}}</label>
                                <textarea name="description" class="form-control" rows="6"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('lang.Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path
                            d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                            fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
        </div>
        <!--end::Scrolltop-->
        <script>var KTAppSettings = {
                "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#3699FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#E4E6EF",
                            "dark": "#181C32"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1F0FF",
                            "secondary": "#EBEDF3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#3F4254",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#EBEDF3",
                        "gray-300": "#E4E6EF",
                        "gray-400": "#D1D3E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#7E8299",
                        "gray-700": "#5E6278",
                        "gray-800": "#3F4254",
                        "gray-900": "#181C32"
                    }
                },
                "font-family": "Poppins"
            };</script>
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{asset('/dashboard/assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('/dashboard/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        <script src="{{asset('/dashboard/assets/js/scripts.bundle.js')}}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->

        <script src="{{asset('/dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{asset('/dashboard/assets/js/pages/widgets.js')}}"></script>
        <script>
            var KTCalendarBasic = function () {

                return {
                    //main function to initiate the module
                    init: function () {
                        var todayDate = moment().startOf('day');
                        var YM = todayDate.format('YYYY-MM');
                        var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
                        var TODAY = todayDate.format('YYYY-MM-DD');
                        var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

                        var calendarEl = document.getElementById('kt_calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                            themeSystem: 'bootstrap',

                            isRTL: KTUtil.isRTL(),

                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },

                            height: 250,
                            contentHeight: 150,
                            aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

                            nowIndicator: true,
                            now: TODAY + 'T09:25:00', // just for demo

                            views: {
                                dayGridMonth: {buttonText: 'month'},
                                timeGridWeek: {buttonText: 'week'},
                                timeGridDay: {buttonText: 'day'}
                            },

                            defaultView: 'dayGridMonth',
                            defaultDate: TODAY,

                            editable: true,
                            eventLimit: true, // allow "more" link when too many events
                            navLinks: true,
                            events: [],

                            eventRender: function (info) {
                                var element = $(info.el);

                                if (info.event.extendedProps && info.event.extendedProps.description) {
                                    if (element.hasClass('fc-day-grid-event')) {
                                        element.data('content', info.event.extendedProps.description);
                                        element.data('placement', 'top');
                                        KTApp.initPopover(element);
                                    } else if (element.hasClass('fc-time-grid-event')) {
                                        element.find('.fc-title').append('<br>' + info.event.extendedProps.description);
                                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                                        element.find('.fc-list-item-title').append('&lt;div class="fc-description"&gt;' + info.event.extendedProps.description + '&lt;/div&gt;');
                                    }
                                }
                            }
                        });

                        calendar.render();
                    }
                };
            }();

            jQuery(document).ready(function () {
                KTCalendarBasic.init();
            });
        </script>

        <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
        <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
        <script>
            var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
                cluster: '{{env("PUSHER_APP_CLUSTER")}}',
                encrypted: true
            });

            var channel = pusher.subscribe('notify-channel');
            channel.bind('App\\Events\\notifacation', function (data) {
                new Audio('https://audio-previews.elements.envatousercontent.com/files/157617930/preview.mp3?response-content-disposition=attachment%3B+filename%3D%228KR4YVH-notification-2.mp3%22').play();
                if (data) {
                    var out = '<div class="d-flex align-items-center mb-6">' +
                        '                    <div class="symbol symbol-40 symbol-light-danger mr-5">' +
                        '                    <span class="symbol-label">' +
                        '                    <span class="svg-icon svg-icon-lg svg-icon-danger">' +
                        '                    <svg xmlns="http://www.w3.org/2000/svg"' +
                        '                xmlns:xlink="http://www.w3.org/1999/xlink"' +
                        '                width="24px" height="24px" viewBox="0 0 24 24"' +
                        '                version="1.1">' +
                        '                    <g stroke="none" stroke-width="1" fill="none"' +
                        '                fill-rule="evenodd">' +
                        '                    <rect x="0" y="0" width="24" height="24"></rect>' +
                        '                    <path' +
                        '                d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"' +
                        '                fill="#000000"></path>' +
                        '                    <circle fill="#000000" opacity="0.3" cx="19.5"' +
                        '                cy="17.5" r="2.5"></circle>' +
                        '                    </g>' +
                        '                    </svg>' +
                        '                    </span>' +
                        '                    </span>' +
                        '                    </div>' +
                        '                    <div class="d-flex flex-column font-weight-bold">' +
                        ' <a href="' + ' {{url('booking')}} ' + '/' + data.id + '"' +
                        'class="text-dark text-hover-primary mb-1 font-size-lg">' + '{{__("lang.NewInbox")}} ' +
                        '</a>' +
                        '                    <span class="text-muted">' +
                        '                    </span>' +
                        '                    </div>' +
                        '                    </div>';
                    $("#newNotif").append(out);
                }

            });
        </script>
        <script>

            var pusher = new Pusher('{{env("MIX_PUSHER_APP_KEY")}}', {
                cluster: '{{env("PUSHER_APP_CLUSTER")}}',
                encrypted: true
            });

            var channel = pusher.subscribe('MessageSent1-channel');
            channel.bind('App\\Events\\MessageSent', function (data) {
                new Audio('https://audio-previews.elements.envatousercontent.com/files/157617930/preview.mp3?response-content-disposition=attachment%3B+filename%3D%228KR4YVH-notification-2.mp3%22').play();
                if (data) {
                    var out = '<div class="d-flex align-items-center mb-6">' +
                        '                    <div class="symbol symbol-40 symbol-light-danger mr-5">' +
                        '                    <span class="symbol-label">' +
                        '                    <span class="svg-icon svg-icon-lg svg-icon-danger">' +
                        '                    <svg xmlns="http://www.w3.org/2000/svg"' +
                        '                xmlns:xlink="http://www.w3.org/1999/xlink"' +
                        '                width="24px" height="24px" viewBox="0 0 24 24"' +
                        '                version="1.1">' +
                        '                    <g stroke="none" stroke-width="1" fill="none"' +
                        '                fill-rule="evenodd">' +
                        '                    <rect x="0" y="0" width="24" height="24"></rect>' +
                        '                    <path' +
                        '                d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"' +
                        '                fill="#000000"></path>' +
                        '                    <circle fill="#000000" opacity="0.3" cx="19.5"' +
                        '                cy="17.5" r="2.5"></circle>' +
                        '                    </g>' +
                        '                    </svg>' +
                        '                    </span>' +
                        '                    </span>' +
                        '                    </div>' +
                        '                    <div class="d-flex flex-column font-weight-bold">' +
                        ' <a href="' + '{{url('/dashboard/chat/Room')}}' + '/' + data.room_id + '"' +
                        'class="text-dark text-hover-primary mb-1 font-size-lg">' + '{{__("lang.NewChat")}} ' +
                        '</a>' +
                        '                    <span class="text-muted">' +
                        '                    </span>' +
                        '                    </div>' +
                        '                    </div>';
                    $("#newNotif").append(out);
                }

            });
        </script>
        <script>

            function onGranted() {

            }

            function onDenied() {

            }

            Push.Permission.request(onGranted, onDenied);
            // Initialize Firebase
            var firebaseConfig = {
                apiKey: "AIzaSyDJJJ8vCPvv-qaIB1YU54ExNTvXaOe3fvA",
                authDomain: "amartech-69196.firebaseapp.com",
                databaseURL: "https://amartech-69196-default-rtdb.firebaseio.com",
                storageBucket: "amartech-69196.appspot.com",
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            var database = firebase.database();
            firebase.database().ref('amar/inboxes').on('child_added', function (snapshot) {
                var value = snapshot.val();


                // console.log(value.id);


            });

        </script>
        @yield('js')
        <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>


        <?php
        $errors = session()->get("errors");
        ?>

        @if( session()->has("errors"))
            <?php
            $e = implode(' - ', $errors->all());
            ?>

            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "{{$e}} ",
                    type: "error",
                    timer: 5000,
                    showConfirmButton: false
                });
            </script>

        @endif


        <!--end::Page Scripts -->
        </body>
        <style>
            .flex-wrap {
                float: left !important;
            }
        </style>

        <!-- end::Body -->
        </html>
