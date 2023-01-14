@extends('layout.layout')

@section('title')
    {{__('lang.ShowRentContract')}}
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
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.RentContract')}}</h5>
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
                        <h3 class="card-label">{{__('lang.ShowRentContract')}} &nbsp; {{$contract->id}} </h3>
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
                            <div class="row" style="text-align: right;width: 100%; overflow: hidden;padding-top: 12px">
                                <div class="col-sm-4"
                                     style="text-align: right; padding: 0px;  display:inline;width: 300px;float:right;">
                                    <img src="{{$settings->logo}}" alt="{{$settings->name}}" style="width: 208px; height: 70px">
                                    {{--                                <label style="font-size: 18px;font-weight: bold">{{$settings->name}}</label>--}}

                                </div>
                                <div class="col-sm-4"
                                     style="text-align: center; padding: 15px;  display:inline;width: 300px;float:none;">
                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG(url('/'), 'QRCODE',4,4)}}"
                                         alt="barcode"/>

                                </div>
                                <div class="col-sm-4"
                                     style="text-align: left; padding: 0px;  display:inline;width: 300px;float:left;">
                                    <label style="font-size: 18px;font-weight: bold">التاريخ : </label>
                                    <label
                                        style="font-size: 18px;font-weight: bold">  {{ $hijri_date }}
                                    </label> هـ <br>
                                    <label
                                        style="font-size: 18px;font-weight: bold">{{Carbon\Carbon::parse($contract->contract_start_date)->format('Y/m/d')}}</label>
                                    م <br>
                                    <label style="font-size: 18px;font-weight: bold">رقم العقد : </label>
                                    <label
                                        style="font-size: 18px;font-weight: bold;padding-left: 47px">{{$contract->id}}</label><br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12" style="text-align: center">
                            <h3 style="font-size: 18px;font-weight: bold;">عقد تأجير </h3>
                        </div>
                        <br>
                        <div class="col-lg-12" style="text-align: right">
                            <label style="font-size: 12px;font-weight: bold;">الحمد لله رب العالمين والصلاة والسلام على
                                اشرف المرسلين وبعد : </label>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">فقد اتفق كلٌ من الطرف الاول : </label>
                                <input name="owner_name" class="col-lg-3"
                                       value="{{$contract->owner_name}}">
                                <label style="font-size: 12px;">هوية رقم : </label>
                                <input name="owner_identification" class="col-lg-2"
                                       value="{{$contract->owner_identification}}">
                                <label style="font-size: 12px;">جوال : </label>
                                <input name="owner_phone" class="col-lg-2" value="{{$contract->owner_phone}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">والطرف الثاني : </label>
                                <input name="client_name" class="col-lg-3"
                                       value="{{$contract->client_name}}">
                                <label style="font-size: 12px;">هوية رقم : </label>
                                <input name="client_identification" class="col-lg-2"
                                       value="{{$contract->client_identification}}">
                                <label style="font-size: 12px;">جوال : </label>
                                <input name="client_phone" class="col-lg-2" value="{{$contract->client_phone}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">وتاريخ انتهاء الهوية : </label>
                                <input name="client_id_expire" class="col-lg-3" value="{{$contract->client_id_expire}}">
                                <label style="font-size: 12px;">الصادرة من : </label>
                                <input name="client_id_source" class="col-lg-2" value="{{$contract->client_id_source}}">
                                <label style="font-size: 12px;">وعنوانة : </label>
                                <input name="client_address" class="col-lg-2" value="{{$contract->client_address}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;"> 1-أن يستأجر الطرف الثانى من الطرف الاول </label>
                                <input name="ad_name" class="col-lg-3" value="{{$contract->ad_name}}">
                                <label style="font-size: 12px;">الواقعة في : </label>
                                <input name="ad_city" class="col-lg-2" value="{{$contract->ad_city}}">
                                <label style="font-size: 12px;">بحي : </label>
                                <input name="ad_district" class="col-lg-2" value="{{$contract->ad_district}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">المملوكة للطرف الاول بموجب صك رقم : </label>
                                <input name="ad_instrument_number" class="col-lg-4"
                                       value="{{$contract->ad_instrument_number}}">
                                <label style="font-size: 12px;">بأجر سنوي وقدرة : </label>
                                <input name="annual_rent" class="col-lg-3"
                                       value="{{$contract->annual_rent}}">ريال
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">2-يتسلم الطرف الأول الإيجار بدفعات مقدمة على اساس
                                    : </label>
                                <input name="rent_type" class="col-lg-4" value="{{$contract->rent_type}}">


                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">3-دفع الطرف الثاني عند توقيع هذا العقد دفعة وقدرها
                                    : </label>
                                <input name="contract_deposit" class="col-lg-3" value="{{$contract->contract_deposit}}">
                                ريال
                                <label style="font-size: 12px;">وهو مبلغ إيجار مقدم كما هو موضح فى البند
                                    الثاني. </label>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">ومبلغ وقدرة : </label>
                                <input name="insurance_amount" class="col-lg-3" value="{{$contract->insurance_amount}}">
                                ريال
                                <label style="font-size: 12px;"> تأمين يحفظ لدى المالك، يحسم منه تكاليف الصيانة بعد
                                    إخلاء العقار وايضآ تكاليف تصفية جميع فواتير العقار.: </label>

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">4-مدة العقد </label>
                                <input name="contract_duration" class="col-lg-3"
                                       value="{{$contract->contract_duration}}">
                                <label style="font-size: 12px;">اعتبارا من بداية يوم : </label>
                                <input name="contract_start_date" class="col-lg-2"
                                       value="{{$contract->contract_start_date}}">
                                <label style="font-size: 12px;">إلى نهاية يوم : </label>
                                <input name="contract_end_date" class="col-lg-2"
                                       value="{{$contract->contract_end_date}}">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">5-إذا تأخر الطرف الثانًي عن موعد التسدٌد مدة شهر ٌحق
                                    للطرف الأول فسخ العقد دون الحاجة إلى إنذار للطرف الثانًي أو تنبٌه. </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">6-علًى الطرف الثانًي تسلٌم العقار للطرف الأول بنفس
                                    الحالة التًي كان علٌيها عند استلامه إٌياه ولا يٌحق للطرف الثانًي أن يٌجري تعدٌيلات
                                    أو إضافات إلا بموافقة
                                    خطيٌة من المؤجر ولا يحق له مطالبة الطرف الأول بقيٌمة أي إضافات قام بها أثناء مدة
                                    تأجٌره . </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    7-على الطرف الثاني إذا رغب فيً إخلاء العقار إشعار الطرف الأول خطيٌا قبل انتهاء مدة
                                    15 يوما على الأقل وإلا اعتبر الإيٌجار ساري المفعول.
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    8 -لقد أقر الطرف الثانًي أنه استلم العقار بحالة جٌيدة وأنه مسؤول عن تعويٌض الطرف
                                    الأول عن ما ٌيصٌيبه من أضرار أو تلف وأن لايٌسبب إزعاجا أو مضاٌقة
                                    للأخرين بنفس المبنى أو من المجاورين له.
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    9 -لا يحق للطرف الثاني التأجير من الباطن أو التقبيل إلا بعد حصوله على موافقة خطية من
                                    الطرف الأول.
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    10- يتعهد الطرف الثاني أن يحافظ على العقار المستأجر ويقوم بجميع أعمال الصيانة مدة
                                    إقامته على حسابه الخاص.
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    11 -إذا أخل الطرف الثاني بأي شرط من الشروط المذكورة أعاله فأنه يحق للطرف الأول فسخ
                                    العقد وعلى الطرف الثاني إخلاء العقار فورآ . </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    12 -مؤسسة ُرستاق العقارية غير مسؤولة عن تحصيل القسط الثاني وكذلك غير مسؤولة عن العين المؤجرة بعد توقيع العقد ولا عن أي خلافات قد تنشب بين
                                    الطرفين مستقبلآ .
                                </label>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <label style="font-size: 12px;">
                                    13 -كتب هذا العقد من ثلاثة عشر بندا وثلاث نسخ، يسلم كل طرف نسخة وتحفظ نسخة لدى المؤسسة، وإن أحكام وتعاليم الشريعة الإسلامية مكملة لهذا العقد مالم
                                    تذكر بعينها.
                                  </label>

                            </div>
                        </div>

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
                                 </label>
                            <label style="font-size: 13px;font-weight: bold;padding-right: 110px"
                                   class="col-3">المدير العام </label>
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

            newWin.document.title = 'عقد مبايعه رقم ' + {!! json_encode($contract->id) !!};

            newWin.document.close();
            setTimeout(function () {
                newWin.close();
            }, 100000);

        }
    </script>
@endsection
