

<link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">



<form class="px-10" novalidate="novalidate" id="kt_form2"  method="post" action='{{url('Update_faq')}}' enctype="multipart/form-data">
    <!--begin: Wizard Step 1-->
    @csrf
         <input type="hidden" class="form-control form-control-solid" value="{{$User->id}}" name="id" required placeholder="{{__('lang.name')}}" >

    <div class="form-group">
        <label>{{__('lang.ar_title')}} </label>
        <input type="text" class="form-control form-control-solid" name="ar_title" required
               placeholder="{{__('lang.ar_title')}}"  value="{{$User->ar_title}}">
    </div>
    <div class="form-group">
        <label>{{__('lang.en_title')}} </label>
        <input type="text" class="form-control form-control-solid" name="en_title" required
               placeholder="{{__('lang.en_title')}}" value="{{$User->en_title}}">
    </div>
    <div class="form-group">
        <label>{{__('lang.ar_description')}} </label>

        <textarea name="ar_description" class="form-control form-control-solid" dir="rtl">
												{!! $User->ar_description !!}
												 	</textarea>
    </div>
    <div class="form-group">
        <label>{{__('lang.en_description')}} </label>

        <textarea name="en_description" class="form-control form-control-solid" dir="ltr">
												{!! $User->en_description !!}
												 	</textarea>
    </div>
    <div class="form-group">
        <label>{{__('lang.sort')}} </label>
        <input type="number" class="form-control form-control-solid" name="sort" required
               placeholder="{{__('lang.sort')}}" value="{{$User->sort}}">
    </div>

    <div class="form-group">
        <label>{{__('lang.ad')}} </label>
        <select  class="form-control form-control-solid " name="advertising_id" id=""  required>
            <option value="" selected>{{trans('lang.none')}}</option>
            @foreach(\App\Models\Advertising::all() as $item)
                <option @if($User->advertising_id == $item->id ) selected @endif value="{{$item->id}}">{{$item->ar_title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>{{__('lang.is_visible')}} </label>
        <div class="row">
            <label class="form-control form-control-solid col-6"
                   for="no">{{__('lang.un_active')}}</label>
            <input type="radio" class="form-control form-control-solid col-6" id="no"
                   name="is_visible" value="0" @if($User->is_visible == 0 ) checked @endif>
        </div>
        <div class="row">
            <label class="form-control form-control-solid col-6"
                   for="yes">{{__('lang.active')}}</label>
            <input type="radio" class="form-control form-control-solid col-6" id="yes" name="is_visible"
                   value="1" @if($User->is_visible == 1 ) checked @endif>


        </div>
    </div>



        <!--end: Wizard Actions-->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
            <button type="submit" class="btn btn-primary">{{__('lang.save')}}</button>
        </div>
</form>


<script src="{{asset('dashboard/assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script src="{{asset('dashboard/assets/js/pages/features/miscellaneous/dropify.min.js')}}"></script>

<!--begin::Page scripts(used by this page) -->
<script>

    var KTCkeditor = function () {
        // Private functions
        var demos = function () {
            ClassicEditor
                .create(document.querySelector('#kt-ckeditor-6'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        return {
            // public functions
            init: function () {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function () {
        KTCkeditor.init();
    });

    var KTCkeditors = function () {
        // Private functions
        var demos = function () {
            ClassicEditor
                .create(document.querySelector('#kt-ckeditor-7'))
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        return {
            // public functions
            init: function () {
                demos();
            }
        };
    }();

    // Initialization
    jQuery(document).ready(function () {
        KTCkeditors.init();
    });

    $('#kt_select4').select2({
        placeholder: ""
    });
    $('#kt_select5').select2({
        placeholder: ""
    });
</script>
<!--begin::Page scripts(used by this page) -->
<script type="text/javascript">
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


    $(function () {

        initHijrDatePicker();

        //initHijrDatePickerDefault();

        $('.disable-date').hijriDatePicker({

            minDate:"2020-01-01",
            maxDate:"2021-01-01",
            viewMode:"years",
            hijri:true,
            debug:true
        });

    });

    function initHijrDatePicker() {

        $(".hijri-date-input").hijriDatePicker({
            locale: "ar-sa",
            format: "DD-MM-YYYY",
            hijriFormat:"iYYYY-iMM-iDD",
            dayViewHeaderFormat: "MMMM YYYY",
            hijriDayViewHeaderFormat: "iMMMM iYYYY",
            showSwitcher: true,
            allowInputToggle: true,
            showTodayButton: false,
            useCurrent: true,
            isRTL: false,
            viewMode:'months',
            keepOpen: false,
            hijri: false,
            debug: true,
            showClear: true,
            showTodayButton: true,
            showClose: true
        });
    }

    function initHijrDatePickerDefault() {

        $(".hijri-date-input").hijriDatePicker();
    }


</script>
