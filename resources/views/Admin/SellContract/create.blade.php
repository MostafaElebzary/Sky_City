@extends('layout.layout')

@section('title')
    {{__('lang.CreateSellContract')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet"
          type="text/css"/>

    <style>
        label {
            font-weight: bold;
        !important;
        }
    </style>
    <link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">

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
                <div class="card-header ">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.CreateSellContract')}}
                    </div>
                </div>
                <div class="card-body">
                    <form class="px-10" novalidate="novalidate" id="kt_form" method="post"
                          action="{{url('sell-contract-store')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Card-->


                        <div class="card-body">
                            <div class="card card-custom">
                                {{--                                <div class="card-header card-header-tabs-line">--}}
                                {{--                                    <div class="card-title">--}}
                                {{--                                        <h3 class="card-label">{{__('lang.Owner_data')}}</h3>--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="card-toolbar">--}}
                                {{--                                        <ul class="nav nav-tabs nav-bold nav-tabs-line">--}}
                                {{--                                            --}}{{--                                                <li class="nav-item">--}}
                                {{--                                            --}}{{--                                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">--}}
                                {{--                                            --}}{{--																<span class="nav-icon">--}}
                                {{--                                            --}}{{--																	<i class="fa fa-user"></i>--}}
                                {{--                                            --}}{{--																</span>--}}
                                {{--                                            --}}{{--                                                        <span class="nav-text">{{__('lang.owner_data')}}</span>--}}
                                {{--                                            --}}{{--                                                    </a>--}}
                                {{--                                            --}}{{--                                                </li>--}}
                                {{--                                            --}}{{--                                                <li class="nav-item">--}}
                                {{--                                            --}}{{--                                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">--}}
                                {{--                                            --}}{{--																<span class="nav-icon">--}}
                                {{--                                            --}}{{--																	<i class="flaticon2-drop"></i>--}}
                                {{--                                            --}}{{--																</span>--}}
                                {{--                                            --}}{{--                                                        <span class="nav-text">Month</span>--}}
                                {{--                                            --}}{{--                                                    </a>--}}
                                {{--                                            --}}{{--                                                </li>--}}

                                {{--                                        </ul>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade " id="kt_tab_pane_1_3" role="tabpanel"
                                             aria-labelledby="kt_tab_pane_1_3">
                                            <div class="card-title">
                                                <h3 class="card-label">{{__('lang.Owner_data')}}</h3>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade " id="kt_tab_pane_2_3" role="tabpanel"
                                             aria-labelledby="kt_tab_pane_2_3">
                                            <div class="card-title">
                                                <h3 class="card-label">{{__('lang.client_data')}}</h3>
                                            </div>
                                            <div class="form-group row">
                                                <label>{{trans('lang.client')}}</label>
                                                <div class="col-lg-9 col-md-9 col-sm-9">
                                                    <select style="width: 100%" class="form-control" id="client_id"
                                                            name="client_id">
                                                        <option value="">{{trans('lang.select_client')}}</option>
                                                        @foreach($clients as $client)
                                                            <option value="{{$client->id}}">{{$client->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2 ">
                                                    <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4"
                                                            class="btn btn-primary font-weight-bolder">
                <span class="svg-icon svg-icon-md">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                       height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24"/>
                      <circle fill="#000000" cx="9" cy="15" r="6"/>
                      <path
                          d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                          fill="#000000" opacity="0.3"/>
                    </g>
                  </svg>
                    <!--end::Svg Icon-->
                </span> </button>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_name')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="client_name" id="client_name" required
                                                       placeholder="{{__('lang.client_name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_nationality')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="client_nationality" id="client_nationality" required
                                                       placeholder="{{__('lang.client_nationality')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_identification')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="client_identification" id="client_identification" required
                                                       placeholder="{{__('lang.client_identification')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_id_expire')}} </label>
                                                <input type="date" class="form-control form-control-solid"
                                                       name="client_id_expire" id="client_id_expire" required
                                                       placeholder="{{__('lang.client_id_expire')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_id_source')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="client_id_source" id="client_id_source" required
                                                       placeholder="{{__('lang.client_id_source')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.client_phone')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="client_phone" id="client_phone" required
                                                       placeholder="{{__('lang.client_phone')}}">
                                            </div>

                                        </div>
                                        <div class="tab-pane fade show active" id="kt_tab_pane_3_3" role="tabpanel"
                                             aria-labelledby="kt_tab_pane_2_3">
                                            <div class="card-title">
                                                <h3 class="card-label">{{__('lang.ad_data')}}</h3>
                                            </div>
                                            <div class="form-group row">
                                                <label>{{trans('lang.ads')}}</label>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <select style="width: 100%" class="form-control" id="ad_id"
                                                            name="ad_id">
                                                        <option value="">{{trans('lang.select_ad')}}</option>
                                                        @foreach($ads as $ad)
                                                            <option value="{{$ad->id}}">{{$ad->title}} -
                                                                ({{$ad->owner ? $ad->owner->name : "--"}})
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.ad_name')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="ad_name" id="ad_name" required
                                                       placeholder="{{__('lang.ad_name')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.ad_address')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="ad_address" id="ad_address" required
                                                       placeholder="{{__('lang.ad_address')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.ad_area')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="ad_area" id="ad_area" required
                                                       placeholder="{{__('lang.ad_area')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.ad_instrument_number')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="ad_instrument_number" id="ad_instrument_number" required
                                                       placeholder="{{__('lang.ad_instrument_number')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.ad_instrument_date')}} </label>
                                                <input type="date" class="form-control form-control-solid"
                                                       name="ad_instrument_date" id="ad_instrument_date" required
                                                       placeholder="{{__('lang.ad_instrument_date')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.peace_number')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="peace_number" id="peace_number" required
                                                       placeholder="{{__('lang.peace_number')}}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.north_border')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="north_border" id="north_border" required
                                                           placeholder="{{__('lang.north_border')}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.north_length')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="north_length" id="north_length" required
                                                           placeholder="{{__('lang.north_length')}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.south_border')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="south_border" id="south_border" required
                                                           placeholder="{{__('lang.south_border')}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.south_length')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="south_length" id="south_length" required
                                                           placeholder="{{__('lang.south_length')}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.east_border')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="east_border" id="east_border" required
                                                           placeholder="{{__('lang.east_border')}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.east_length')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="east_length" id="east_length" required
                                                           placeholder="{{__('lang.east_length')}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.west_border')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="west_border" id="west_border" required
                                                           placeholder="{{__('lang.west_border')}}">
                                                </div>
                                                <div class="form-group col-6">
                                                    <label>{{__('lang.west_length')}} </label>
                                                    <input type="text" class="form-control form-control-solid"
                                                           name="west_length" id="west_length" required
                                                           placeholder="{{__('lang.west_length')}}">
                                                </div>
                                            </div>
                                            {{-- owner data--}}
                                            <div class="card-header">
                                                <h3 class="card-label">{{__('lang.Owner_data')}}</h3>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_name')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_name" id="owner_name" required
                                                       placeholder="{{__('lang.owner_name')}}">

                                                <input type="hidden" class="form-control form-control-solid"
                                                       name="owner_id" id="owner_id" required
                                                       placeholder="{{__('lang.owner_id')}}">

                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_nationality')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_nationality" id="owner_nationality" required
                                                       placeholder="{{__('lang.owner_nationality')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_identification')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_identification" id="owner_identification" required
                                                       placeholder="{{__('lang.owner_identification')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_id_expire')}} </label>
                                                <input type="date" class="form-control form-control-solid"
                                                       name="owner_id_expire" id="owner_id_expire" required
                                                       placeholder="{{__('lang.owner_id_expire')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_id_source')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_id_source" id="owner_id_source" required
                                                       placeholder="{{__('lang.owner_id_source')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_address')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_address" id="owner_address" required
                                                       placeholder="{{__('lang.owner_address')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_district')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_district" id="owner_district" required
                                                       placeholder="{{__('lang.owner_district')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.owner_phone')}} </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       name="owner_phone" id="owner_phone" required
                                                       placeholder="{{__('lang.owner_phone')}}">
                                            </div>


                                        </div>
                                        <div class="tab-pane fade " id="kt_tab_pane_4_3" role="tabpanel"
                                             aria-labelledby="kt_tab_pane_2_3">
                                            <div class="card-title">
                                                <h3 class="card-label">{{__('lang.contract_data')}}</h3>
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.contract_date')}} </label>
                                                <input type="date" class="form-control form-control-solid"
                                                       name="contract_date" id="contract_date" required
                                                       placeholder="{{__('lang.contract_date')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.amount')}} </label>
                                                <input type="text" min="0" class="form-control form-control-solid"
                                                       name="amount" id="amount" required
                                                       placeholder="{{__('lang.amount')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.deposit_payed')}} </label>
                                                <input type="text" min="0" class="form-control form-control-solid"
                                                       name="deposit" id="deposit" required
                                                       placeholder="{{__('lang.deposit_payed')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.remaining')}} </label>
                                                <input type="text" min="0" class="form-control form-control-solid"
                                                       name="remaining" id="remaining" required
                                                       placeholder="{{__('lang.remaining')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.remaining_date')}} </label>
                                                <input type="date" class="form-control form-control-solid"
                                                       name="remaining_date" id="remaining_date" required
                                                       placeholder="{{__('lang.remaining_date')}}">
                                            </div>
                                            <div class="form-group">
                                                <label>{{__('lang.notes')}} </label>
                                                <textarea class="form-control" name="notes" id="notes">

                                                </textarea>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="card-header card-header-tabs-line">
                                    <div class="card-title">
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_3_3">
																<span class="nav-icon">
																	<i class="fa fa-building"></i>
																</span>
                                                    <span class="nav-text">{{__('lang.ad_data')}}</span>
                                                </a>
                                            </li>
                                            {{--                                            <li class="nav-item">--}}
                                            {{--                                                <a class="nav-link " data-toggle="tab" href="#kt_tab_pane_1_3">--}}
                                            {{--																<span class="nav-icon">--}}
                                            {{--																	<i class="fa fa-user"></i>--}}
                                            {{--																</span>--}}
                                            {{--                                                    <span class="nav-text">{{__('lang.Owner_data')}}</span>--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </li>--}}
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
																<span class="nav-icon">
																	<i class="fa fa-user-circle"></i>
																</span>
                                                    <span class="nav-text">{{__('lang.client_data')}}</span>
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4_3">
																<span class="nav-icon">
																	<i class="fa fa-file-contract"></i>
																</span>
                                                    <span class="nav-text">{{__('lang.contract_data')}}</span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--end::Card-->


                        <button type="submit" class="btn btn-block btn-primary">{{__('lang.save')}}</button>


                    </form>

                </div>

            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>

    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.Users_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="px-10" novalidate="novalidate" id="kt_form" method="post"
                          action="{{url('Create_Clients')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>{{__('lang.id_num')}} </label>
                            <input type="text" class="form-control form-control-solid" name="id_num" required
                                   placeholder="{{__('lang.id_num')}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.name')}} </label>
                            <input type="text" class="form-control form-control-solid" name="name" required
                                   placeholder="{{__('lang.name')}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.phone')}} </label>
                            <input type="number" class="form-control form-control-solid" name="phone" required
                                   placeholder="{{__('lang.phone')}}">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.address')}} </label>
                            <input type="text" class="form-control form-control-solid" name="address" required
                                   placeholder="{{__('lang.address')}}">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.email')}} </label>
                            <input type="email" class="form-control" name="email"  value="">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.client_id_expire')}} </label>
                            <input type="date" class="form-control" name="id_num_expired" value="">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.client_id_source')}} </label>
                            <input type="text" class="form-control" name="id_num_export" value="">
                        </div>

                        <div class="form-group">
                            <label>{{__('lang.District')}} </label>
                            <input type="text" class="form-control" name="district" value="">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.client_nationality')}} </label>
                            <input type="text" class="form-control" name="nationality" value="">
                        </div>
                        <div class="form-group">
                            <label>{{__('lang.tax_num')}} </label>
                            <input type="text" class="form-control" name="tax_num" value="">
                        </div>

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('lang.Image')}}</label>
                            <div class="col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="card-title"></h4>
                                        <div class="controls">
                                            <input type="file" id="input-file-now" class="dropify" name="image" required
                                                   data-validation-required-message="{{trans('word.This field is required')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{__('lang.Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>
                        <!--begin: Wizard Step 1-->
                        <!--end: Wizard Step 1-->
                        <!--begin: Wizard Step 2-->
                        <!--end: Wizard Step 2-->
                        <!--begin: Wizard Step 3-->
                        <!--end: Wizard Step 3-->
                        <!--begin: Wizard Actions-->
                        <!--end: Wizard Actions-->
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/custom/wizard/wizard-6.js')}}"></script>
    {{--    <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>--}}
    <script src="{{asset('hijri/js/momentjs.js')}}"></script>
    <script src="{{asset('hijri/js/moment-with-locales.js')}}"></script>
    <script src="{{asset('hijri/js/moment-hijri.js')}}"></script>
    <script src="{{asset('hijri/js/bootstrap-hijri-datetimepicker.js')}}"></script>
    <script src="{{asset('hijri/js/bootstrap-hijri-datetimepicker.js')}}"></script>

    {{--    <script>--}}
    {{--        // Class definition--}}
    {{--        var KTSelect2 = function () {--}}
    {{--            // Private functions--}}
    {{--            var demos = function () {--}}
    {{--                // basic--}}
    {{--                $('#owner_id, #kt_select2_1_validate').select2({--}}
    {{--                    placeholder: '{{trans("lang.select_owner")}}'--}}
    {{--                });--}}
    {{--            }--}}
    {{--            // Public functions--}}
    {{--            return {--}}
    {{--                init: function () {--}}
    {{--                    demos();--}}
    {{--                    modalDemos();--}}
    {{--                }--}}
    {{--            };--}}
    {{--        }();--}}

    {{--        // Initialization--}}
    {{--        jQuery(document).ready(function () {--}}
    {{--            KTSelect2.init();--}}
    {{--        });--}}

    {{--    </script>--}}
    <script>
        // Class definition
        var KTSelect3 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#client_id, #kt_select2_2_validate').select2({
                    placeholder: '{{trans("lang.select_client")}}'
                });
            }
            // Public functions
            return {
                init: function () {
                    demos();
                    modalDemos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTSelect3.init();
        });

    </script>
    <script>
        // Class definition
        var KTSelect4 = function () {
            // Private functions
            var demos = function () {
                // basic
                $('#ad_id, #kt_select2_3_validate').select2({
                    placeholder: '{{trans("lang.select_ad")}}'
                });
            }
            // Public functions
            return {
                init: function () {
                    demos();
                    modalDemos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function () {
            KTSelect4.init();
        });

    </script>



    <script>
        $("#owner_id").change(function () {
            var id = this.value;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                url: "{{url('owner_data')}}",
                data: {"id": id},
                success: function (data) {
                    $("#owner_name").val(data.data.name);
                    $("#owner_nationality").val(data.data.nationality);
                    $("#owner_identification").val(data.data.id_num);
                    $("#owner_id_expire").val(data.data.id_num_expired);
                    $("#owner_id_source").val(data.data.id_num_export);
                    $("#owner_address").val(data.data.address);
                    $("#owner_district").val(data.data.district);
                    $("#owner_phone").val(data.data.phone);
                }
            })
        })
    </script>
    <script>
        $("#client_id").change(function () {
            var id = this.value;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                url: "{{url('client_data')}}",
                data: {"id": id},
                success: function (data) {
                    $("#client_name").val(data.data.name);
                    $("#client_nationality").val(data.data.nationality);
                    $("#client_identification").val(data.data.id_num);
                    $("#client_id_expire").val(data.data.id_num_expired);
                    $("#client_id_source").val(data.data.id_num_export);
                    $("#client_phone").val(data.data.phone);
                }
            })
        })
    </script>
    <script>
        $("#ad_id").change(function () {
            var id = this.value;
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "GET",
                url: "{{url('ad_data')}}",
                data: {"id": id},
                success: function (data) {
                    console.log(data);
                    $("#ad_name").val(data.data.title);
                    $("#ad_address").val(data.data.city.title + " " + data.data.district.title);
                    $("#ad_area").val(data.data.space);
                    $("#ad_instrument_number").val(data.data.ad_instrument_number);
                    $("#ad_instrument_date").val(data.data.ad_instrument_date);
                    $("#owner_id").val(data.data.owner_id);
                    $("#owner_name").val(data.data.owner.name);
                    $("#owner_nationality").val(data.data.owner.nationality);
                    $("#owner_identification").val(data.data.owner.id_num);
                    $("#owner_id_expire").val(data.data.owner.id_num_expired);
                    $("#owner_id_source").val(data.data.owner.id_num_export);
                    $("#owner_address").val(data.data.owner.address);
                    $("#owner_district").val(data.data.owner.district);
                    $("#owner_phone").val(data.data.owner.phone);
                }
            })
        })
    </script>


    <?php
    $message = session()->get("message");
    ?>

    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type: "success",
                    timer: 1000,
                    showConfirmButton: false
                });

            </script>
        @elseif ( $message == "Failed")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "{{__('lang.operation_failed')}}",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif

        @if( $message == "phone")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "عفوا رقم الهاتف موجود بالفعل",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
        @if( $message == "email")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "عفوا البريد الالكتروني موجود بالفعل",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
        @if( $message == "job_num")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "عفوا رقم الوظيفة موجود بالفعل",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
        @if( $message == "contract_num")
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: "{{__('lang.Sorry')}}",
                    text: "عفوا رقم العقد موجود بالفعل",
                    type: "error",
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endif

@endsection
