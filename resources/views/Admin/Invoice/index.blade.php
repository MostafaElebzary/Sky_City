@extends('layout.layout')

@section('title')
    {{__('lang.Invoices')}}
@endsection
@section('css')
    <link href="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">

@endsection

@section('content')

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <!--begin::Container-->        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Mobile Toggle-->
                    <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                        <span></span>
                    </button>
                    <!--end::Mobile Toggle-->
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->

                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="{{url('resources')}}" class="text-muted">{{trans('lang.HR')}}</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="breadcrumb-item">--}}
                            {{--                                <a href="" class="text-muted">Profile</a>--}}
                            {{--                            </li>--}}

                            <li class="breadcrumb-item">
                                <h5 class="text-dark font-weight-bold my-1 mr-5 ">{{trans('lang.Invoices')}}</h5>
                            </li>
                        </ul>

                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
            </div>
        </div>

        <div class="container">
            <!--begin::Card--><br><br><br>            <!--begin::Card-->
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap py-3">
                    <div class="card-title">
                        <h3 class="card-label">{{__('lang.Invoices')}}
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" data-toggle="modal" data-toggle="modal" data-target="#kt_modal_4" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
              <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24" />
                  <circle fill="#000000" cx="9" cy="15" r="6" />
                  <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                </g>
              </svg>
                <!--end::Svg Icon-->
            </span> {{__('lang.Create')}}</button>
                        &nbsp;&nbsp;
                        <button id="delete" class="btn btn-danger font-weight-bolder"><span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\General\Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                    <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
                            ?????????? ????????????????</button>
                        <!--end::Button-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable mt-10" id="kt_tdata">
                            <thead>
                            <tr>

                                <th style="display:none;"></th>
                                <th class="headerr" >#</th>
                                <th  class="headerr">?????? ???????????????? </th>
                                <th  class="headerr">?????? ???????????? </th>
                                <th  class="headerr"> ?????? ???????????????? </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($Invoices as $Key => $Invoice)
                                <tr>

                                    <td style="display:none;">{{$Invoice[0]['order_id']}}</td>
                                    <td>INV-{{$Invoice[0]['order_id']}}</td>
                                    <td>{{$Invoice[0]['order_type'] == 0?'???????????? ????????':"???????????? ??????????";}}</td>
                                    <td>{{$Invoice[0]['client_name']}}</td>
                                    <td nowrap="nowrap">
                                        <a href="{{url("show-invoices/" . $Invoice[0]['order_id'])}}" class="btn btn-info btn-sm btn-clean btn-icon btn-icon-md edit-Advert"   data-id="{{$Invoice[0]['order_id']}}" data-original-title="???????? ????????????????" title="???????? ????????????????">
                                            <i class="fa fa-eye icon-nm"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <nav aria-label="Page navigation example">

                            @php
                                $paginator =$Invoices->appends(request()->input())->links()->paginator;
                                    if ($paginator->currentPage() < 2 ){
                                        $link = $paginator->currentPage();
                                    }else{
                                         $link = $paginator->currentPage() -1;
                                    }
                                    if($paginator->currentPage() == $paginator->lastPage()){
                                               $last_links = $paginator->currentPage();
                                    }else{
                                               $last_links = $paginator->currentPage() +1;

                                    }
                            @endphp
                            @if ($paginator->lastPage() > 1)
                                <ul class="pagination">
                                    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }} page-item">
                                        <a class="page-link" href="{{ $paginator->url(1) }}">?????????? </a>
                                    </li>
                                    @for ($i = $link; $i <= $last_links; $i++)
                                        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }} page-item">
                                            <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }} page-item">
                                        <a class="page-link"
                                           href="{{ $paginator->url($paginator->lastPage()) }}">????????????</a>
                                    </li>
                                </ul>
                            @endif

                        </nav>
                    </div>
                    <!--end: Datatable-->
                </div>

                {{--                <h3>???????????? ?????????????????? : @inject('AllUsers','App\Models\User') {{$AllUsers->count()}} </h3>--}}
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>


    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{__('lang.Users_Create')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="px-10" novalidate="novalidate" id="kt_form"  method="post" action="{{url('create-invoices')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>?????? ????????????</label>
                                    <input type="text" class="form-control form-control-solid" name="client_name" required placeholder="?????? ????????????" >
                                </div>
                                <div class="form-group">
                                    <label>???????? ????????????</label>
                                    <input type="number" class="form-control form-control-solid" name="client_phone" required placeholder="???????? ????????????" >
                                </div>

                                <div class="form-group">
                                    <label>?????????? ????????????</label>
                                    <input type="text" class="form-control form-control-solid" name="client_address" placeholder="?????????? ????????????" >
                                </div>

                                <div class="form-group">
                                    <label>????????????????</label>
                                    <input type="text" class="form-control form-control-solid" name="client_state" placeholder="????????????????" >
                                </div>

                                <div class="form-group">
                                    <label>??????????????</label>
                                    <input type="text" class="form-control form-control-solid" name="client_city" placeholder="??????????????" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>??????????????</label>
                                    <input type="date" class="form-control form-control-solid" name="date" placeholder="??????????????" >
                                </div>
                                <div class="form-group">
                                    <label>?????????? ??????????????</label>
                                    <input type="date" class="form-control form-control-solid" name="issue_date" placeholder="?????????? ??????????????" >
                                </div>
                                <div class="form-group">
                                    <label>?????????? ??????????????????</label>
                                    <input type="date" class="form-control form-control-solid" name="due_date" placeholder="?????????? ??????????????????" >
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-info add_button" style="width: 41px;height: 34px;">
                            <i class="fas fa-plus"></i> </button>
                        <hr>
                        <div class="field_wrapper">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>?????????? AR</label>
                                        <input type="text" class="form-control form-control-solid" name="description_ar[]" required placeholder="?????????? AR" >
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>?????????? EN</label>
                                        <input type="text" class="form-control form-control-solid" name="description_en[]" required placeholder="?????????? EN" >
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>????????????</label>
                                        <input type="number" class="form-control form-control-solid" name="quantity[]" required placeholder="????????????" >
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>??????????</label>
                                        <input type="number" class="form-control form-control-solid" name="price[]" required placeholder="??????????" >
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label>??????????????</label>
                                        <input type="number" class="form-control form-control-solid" name="vat[]" required placeholder="??????????????" >
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-edit-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content card card-outline-info">
                <div class="modal-header card-header">
                    <h3 class="modal-title" id="myLargeModalLabel">{{__('lang.Users_Edit')}}</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
                </div>
                <div class="modal-body">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- /.modal -->

@section('js')
    <script src="{{asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/file-upload/image-input.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>

    <script>
        //DataTable
        var table = $('#kt_tdata').DataTable({
            dom: 'Bfrtip',
            "ordering":false,
            buttons: [
                'copy', 'excel', 'print'
            ],
            @if(session('lang') != 'en')

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
            }
            @endif
        });

        $( document ).ready(function() {

            $(".headerr").attr("style",'font-weight: bold!important;');

        });
    </script>
    <!--begin::Page scripts(used by this page) -->
    <script type="text/javascript">
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML = '<div class="row">';
            fieldHTML +=     '<div class="col-3">';
            fieldHTML +=         '<div class="form-group">';
            fieldHTML +=             '<label>?????????? AR</label>';
            fieldHTML +=          '<input type="text" class="form-control form-control-solid" name="description_ar[]" required placeholder="?????????? AR" >';
            fieldHTML +=         '</div>';
            fieldHTML +=     '</div>';
            fieldHTML +=     '<div class="col-2">';
            fieldHTML +=         '<div class="form-group">';
            fieldHTML +=             '<label>?????????? EN</label>';
            fieldHTML +=             '<input type="text" class="form-control form-control-solid" name="description_en[]" required placeholder="?????????? EN" >';
            fieldHTML +=         '</div>';
            fieldHTML +=     '</div>';
            fieldHTML +=     '<div class="col-2">';
            fieldHTML +=         '<div class="form-group">';
            fieldHTML +=             '<label>????????????</label>';
            fieldHTML +=             '<input type="number" class="form-control form-control-solid" name="quantity[]" required placeholder="????????????" >';
            fieldHTML +=         '</div>';
            fieldHTML +=     '</div>';
            fieldHTML +=     '<div class="col-2">';
            fieldHTML +=         '<div class="form-group">';
            fieldHTML +=             '<label>??????????</label>';
            fieldHTML +=             '<input type="number" class="form-control form-control-solid" name="price[]" required placeholder="??????????" >';
            fieldHTML +=         '</div>';
            fieldHTML +=     '</div>';
            fieldHTML +=     '<div class="col-2">';
            fieldHTML +=         '<div class="form-group">';
            fieldHTML +=             '<label>??????????????</label>';
            fieldHTML +=             '<input type="number" class="form-control form-control-solid" name="vat[]" required placeholder="??????????????" >';
            fieldHTML +=         '</div>';
            fieldHTML +=     '</div>';
            fieldHTML +=     '<div class="col-1">';
            fieldHTML +=          '<label><label></label></label>';
            fieldHTML +=         '<button type="button" class="btn btn-danger remove_button" style="width: 41px;height: 34px;">';
            fieldHTML +=             '';
            fieldHTML +=                '<i class="fas fa-trash"></i>'
            fieldHTML +=             ' </button>';
            fieldHTML +=     '</div>';
            fieldHTML += '</div>'; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
    <!--begin::Page scripts(used by this page) -->
    <script>

        $("#MainCategory").click(function(){
            var wahda = $(this).val();

            if(wahda != ''){

                $.get("{{ URL::to('/GetSubCategory')}}"+'/'+wahda , function($data){
                    console.log($data)

                    var outs = "";
                    $.each($data , function(name , id){

                        outs +='<option value="'+id+'">'+name+'</option>'

                    });
                    $('#SubCategory').html(outs);


                });
            }
        });
        $('#kt_tdata tbody').on( 'click', 'tr', function () {
            if (event.ctrlKey) {
                $(this).toggleClass('selected');
                @if(session('lang') == 'en')
                $('#delete').text('Delete '+ table.rows('.selected').data().length +' row');
                @else
                $('#delete').text('?????? '+ table.rows('.selected').data().length +' ??????');
                @endif
            }else{
                var isselected = false
                var numSelected= table.rows('.selected').data().length
                if($(this).hasClass('selected') && numSelected==1){
                    isselected = true
                }
                $('#myTable tbody tr').removeClass('selected');
                if(!isselected){
                    $(this).toggleClass('selected');
                }
                @if(session('lang') == 'en')
                $('#delete').text('Delete '+ table.rows('.selected').data().length +' row');
                @else
                $('#delete').text('?????? '+ table.rows('.selected').data().length +' ??????');
                @endif            }
        });

        $('#kt_select2_101').select2({
            placeholder: ""
        });
        $('#kt_select2_11').select2({
            placeholder: ""
        });
        //Delete Row
        $("body").on("click", "#delete", function () {
            var dataList;
            $("#kt_tdata .selected").each(function(index) {
                dataList = $(this).find('td:first').text()
            })

            if(dataList.length >0){
                Swal.fire({
                    title: "{{__('lang.warrning')}}",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f64e60",
                    confirmButtonText: "{{__('lang.btn_yes')}}",
                    cancelButtonText: "{{__('lang.btn_no')}}",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (result) {
                    if (result.value) {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url:'{{url("delete-invoices")}}',
                            type:"get",
                            data:{'id':dataList,_token: CSRF_TOKEN},
                            dataType:"JSON",
                            success: function (data) {
                                if(data.message == "Success")
                                {
                                    $("#kt_datatable .selected").hide();
                                    @if(session('lang') == 'ar')

                                    $('#delete').text('?????????? 0 ??????');
                                    @else
                                    $('#delete').text('Delete 0 row');
                                    @endif
                                    Swal.fire("{{__('lang.Success')}}", "{{__('lang.Success_text')}}", "success");
                                    location.reload();
                                }else{
                                    Swal.fire("{{__('lang.Sorry')}}", data.message, "error");
                                }
                            },
                            fail: function(xhrerrorThrown){
                                Swal.fire("{{__('lang.Sorry')}}", "{{__('lang.Message_Fail_Delete')}}", "error");
                            }
                        });
                        // result.dismiss can be 'cancel', 'overlay',
                        // 'close', and 'timer'
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire("{{__('lang.Cancelled')}}", "???? ?????????? ?????????? ????????????????", "error");
                    }
                });
            }
        });

        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });



        $(".switchery-demo").click(function(){
            var id=$(this).data('id')
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: "get",
                url: "{{url('UpdateStatusProduct')}}",
                data: {"id":id,_token:CSRF_TOKEN},
                success: function (data) {
                    Swal.fire("@if(Request::segment(1) == 'ar' ) ????  @else Success @endif ", "@if(Request::segment(1) == 'ar' ) ???? ?????????????? ??????????   @else Successfully changed @endif", "success");

                }
            })
        })
    </script>

    <?php
    $message=session()->get("message");
    ?>

    @if( session()->has("message"))
        @if( $message == "Success")
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{__('lang.Success')}}",
                    text: "{{__('lang.Success_text')}}",
                    type:"success" ,
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
                    type:"error" ,
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
                    text: "???????? ?????? ???????????? ?????????? ????????????",
                    type:"error" ,
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
                    text: "???????? ???????????? ???????????????????? ?????????? ????????????",
                    type:"error" ,
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
                    text: "???????? ?????? ?????????????? ?????????? ????????????",
                    type:"error" ,
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
                    text: "???????? ?????? ?????????? ?????????? ????????????",
                    type:"error" ,
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        @endif
    @endif

@endsection

@endsection

