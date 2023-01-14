@extends('layout.layout')

@section('title')
    {{__('lang.ShowSellContract')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>

    <style>
        @media print {

            .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
                float: left !important;
            }

            .col-sm-12 {
                width: 100%;
            }

            .col-sm-11 {
                width: 91.66666666666666%;
            }

            .col-sm-10 {
                width: 83.33333333333334%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-8 {
                width: 66.66666666666666%;
            }

            .col-sm-7 {
                width: 58.333333333333336%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-5 {
                width: 41.66666666666667%;
            }

            .col-sm-4 {
                width: 33.33333333333333%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-2 {
                width: 16.666666666666664%;
            }

            .col-sm-1 {
                width: 8.333333333333332%;
            }

        }
    </style>

@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none"
                            id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->

                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">


                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.SellContract')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <!--begin::Card-->
            <br>
            <br>
            <br>
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.ShowSellContract')}} &nbsp; {{$contract->id}} </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->

                        <button onclick="printDiv()" class="btn btn-primary font-weight-bolder">
                            <i class="fa fa-print"></i> {{__('lang.print')}}</button>

                        <!--end::Button-->
                    </div>

                </div>

                <div class="card-body" id="content_2">
                    <form class="px-10" novalidate="novalidate" id="kt_form" method="get"
                          action="#" enctype="multipart/form-data">

                        <div class="col-sm-12 row">
                            <div class="row" style="text-align: right;width: 100%; overflow: hidden;padding-top: 45px">
                                <div class="col-sm-4" style="text-align: right; padding: 0px;  display:inline;width: 300px;float:right;">
                                    <img src="{{$settings->logo}}" alt="{{$settings->name}}" style="width: 208px; height: 70px">
                                    {{--                                <label style="font-size: 18px;font-weight: bold">{{$settings->name}}</label>--}}

                                </div>
                                <div class="col-sm-4" style="text-align: center; padding: 15px;  display:inline;width: 300px;float:none;">
                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(url('/'), 'QRCODE',4,4)}}"
                                         alt="barcode"/>

                                </div>
                                <div class="col-sm-4" style="text-align: left; padding: 0px;  display:inline;width: 300px;float:left;">
                                    <label style="font-size: 18px;font-weight: bold">التاريخ : </label>
                                    <label
                                        style="font-size: 18px;font-weight: bold">  {{ $hijri_date }}
                                    </label> هـ <br>
                                    <label
                                        style="font-size: 18px;font-weight: bold">{{Carbon\Carbon::parse($contract->contract_date)->format('Y/m/d')}}</label>
                                    م <br>
                                    <label style="font-size: 18px;font-weight: bold">رقم العقد : </label>
                                    <label
                                        style="font-size: 18px;font-weight: bold;padding-left: 47px">{{$contract->id}}</label><br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12" style="text-align: center">
                            <h3 style="font-size: 18px;font-weight: bold;">عقد مبايعة </h3>
                        </div>
                        <br>
                        <div class="col-lg-12" style="text-align: right">
                            <label style="font-size: 12px;font-weight: bold;">إن الحمدلله والصلاة والسلام على اشرف
                                خلق الله، وبعد :- </label>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">فإن الطرف الأول : </label>
                                <input name="owner_name" value="{{$contract->owner_name}}">
                                <label style="font-size: 12px;">وجنسيتة : </label>
                                <input name="owner_nationality" value="{{$contract->owner_nationality}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">بموجب هوية رقم : </label>
                                <input name="owner_identification" class="col-lg-3"
                                       value="{{$contract->owner_identification}}">
                                <label style="font-size: 12px;">بتاريخ إنتهاء : </label>
                                <input name="owner_id_expire" class="col-lg-2" value="{{$contract->owner_id_expire}}">
                                <label style="font-size: 12px;">مصدرها : </label>
                                <input name="owner_id_source" class="col-lg-2" value="{{$contract->owner_id_source}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">وعنوانه : </label>
                                <input name="owner_address" class="col-lg-3" value="{{$contract->owner_address}}">
                                <label style="font-size: 12px;">حي : </label>
                                <input name="owner_district" class="col-lg-2" value="{{$contract->owner_district}}">
                                <label style="font-size: 12px;">رقم جوال : </label>
                                <input name="owner_phone" class="col-lg-2" value="{{$contract->owner_phone}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">قد باع : </label>
                                <input name="ad_name" class="col-lg-5" value="{{$contract->ad_name}}">
                                <label style="font-size: 12px;">الواقعة في : </label>
                                <input name="ad_address" class="col-lg-4" value="{{$contract->ad_address}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">للطرف الثانى : </label>
                                <input name="client_name" class="col-lg-3" value="{{$contract->client_name}}">
                                <label style="font-size: 12px;">وجنسيتة : </label>
                                <input name="client_nationality" class="col-lg-2"
                                       value="{{$contract->client_nationality}}">
                                <label style="font-size: 12px;">بموجب هوية رقم : </label>
                                <input name="client_identification" class="col-lg-2"
                                       value="{{$contract->client_identification}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">بتاريخ إنتهاء : </label>
                                <input name="client_id_expire" class="col-lg-2" value="{{$contract->client_id_expire}}">
                                <label style="font-size: 12px;">مصدرها : </label>
                                <input name="client_id_source" class="col-lg-2" value="{{$contract->client_id_source}}">
                                <label style="font-size: 12px;">رقم جوال : </label>
                                <input name="client_phone" class="col-lg-2" value="{{$contract->client_phone}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">المحدودة شمالا : </label>
                                <input name="north_border" class="col-lg-5" value="{{$contract->north_border}}">
                                <label style="font-size: 12px;">بطول : </label>
                                <input name="north_length" class="col-lg-4" value="{{$contract->north_length}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">المحدودة جنوبآ : </label>
                                <input name="south_border" class="col-lg-5" value="{{$contract->south_border}}">
                                <label style="font-size: 12px;">بطول : </label>
                                <input name="south_length" class="col-lg-4" value="{{$contract->south_length}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">المحدودة شرقآ : </label>
                                <input name="east_border" class="col-lg-5" value="{{$contract->east_border}}">
                                <label style="font-size: 12px;">بطول : </label>
                                <input name="east_length" class="col-lg-4" value="{{$contract->east_length}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">المحدودة غربآ : </label>
                                <input name="west_border" class="col-lg-5" value="{{$contract->west_border}}">
                                <label style="font-size: 12px;">بطول : </label>
                                <input name="west_length" class="col-lg-4" value="{{$contract->west_length}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">البالغ مساحتها : </label>
                                <input name="ad_area" class="col-lg-1" value="{{$contract->ad_area}}">
                                <label style="font-size: 12px;">والمملوك للطرف الأول بموجب صك رقم : </label>
                                <input name="ad_instrument_number" class="col-lg-2"
                                       value="{{$contract->ad_instrument_number}}">
                                <label style="font-size: 12px;">رقم القطعه : </label>
                                <input name="peace_number" class="col-lg-2"
                                       value="{{$contract->peace_number}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">بتاريخ : </label>
                                <input name="ad_instrument_date" class="col-lg-3"
                                       value="{{$contract->ad_instrument_date}}">
                                <label style="font-size: 12px;">وقبض الطرف الأول -البائع- من الطرف الثاني -المشتري- في
                                    مجلس العقد مبلغ وقدرة : </label>
                                <input name="deposit" class="col-lg-2" value="{{$contract->deposit}}">
                                <label style="font-size: 12px;"> أما الباقي وقدرة : </label>
                                <input name="remaining" class="col-lg-2" value="{{$contract->remaining}}">
                                <br>
                                <label style="font-size: 12px;"> يدفعة الطرف الثاني المشتري في : </label>
                                <input name="remaining_date" class="col-lg-3" value="{{$contract->remaining_date}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">وقد شاهد المشتري العقار المباع مشاهدة شرعية منافية
                                    للجهالة ورضى به واشتراه بمحض إرادته وطوعه وإختياره وذلك بواسطة مؤسسة رستاق العقارية
                                    وبشهادة الشهود جرى التوقيع على هذا العقد والله ولي التوفيق،،، </label>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;"> ملاحظات : </label>
                                <textarea class="col-lg-5" name="notes" cols="100">{!! $contract->notes !!}</textarea>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <br>
                            <br>
                            <br>
                            <br>
                            <label style="font-size: 13px;font-weight: bold;padding-right: 50px" class="col-3">الطرف
                                الاول </label>
                            <label style="font-size: 13px;font-weight: bold;padding-right: 110px" class="col-3">الطرف
                                الثاني
                                المشتري </label>
                            <label style="font-size: 13px;font-weight: bold;padding-right: 110px"
                                   class="col-3">الشهود </label>
                            <label style="font-size: 13px;font-weight: bold;padding-right: 110px"
                                   class="col-3">الختم </label>


                        </div>
                        <br>

                    </form>
                </div>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


@endsection



@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/custom/wizard/wizard-6.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

    <script>
        function printDiv() {

            var divToPrint = document.getElementById('content_2');

            var newWin = window.open('', 'Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body dir="rtl" onload="window.print()">' + divToPrint.innerHTML + '</body></html>');

            newWin.document.title = 'سند رقم  ' + {!! json_encode($contract->id) !!};

            newWin.document.close();
            setTimeout(function () {
                newWin.close();
            }, 100000);

        }
    </script>
@endsection
