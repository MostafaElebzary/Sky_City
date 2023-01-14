

<link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">



<form class="px-10" novalidate="novalidate" id="kt_form2"  method="post" action='{{url('Update_Receipt')}}' enctype="multipart/form-data">
    <!--begin: Wizard Step 1-->
    @csrf    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label" >{{__('lang.price')}} </label>
        <div class="col-lg-9 col-xl-9">
            <input type="number" class="form-control form-control-solid" value="{{$User->price}}" name="price" required placeholder="{{__('lang.price')}}" >
            <input type="hidden" class="form-control form-control-solid" value="{{$User->id}}" name="id" required placeholder="{{__('lang.price')}}" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.type')}}</label>
        <div class="col-lg-9 col-xl-9">
            <select name="type" class="form-control">
                @foreach(\App\Models\ReceiptType::all() as $ReceiptType)
                    <option value="{{$ReceiptType->id}}">{{$ReceiptType->title}}</option>
                    @endif
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.pay_type')}}</label>
        <div class="col-lg-9 col-xl-9">
            <select name="pay_type" id="pay_type" class="form-control">
                <option  @if($User->pay_type == 'outcome') selected @endif  value="cash">{{__('lang.cash')}}</option>
                <option  @if($User->pay_type == 'network') selected @endif value="network">{{__('lang.network')}}</option>
                <option  @if($User->pay_type == 'transfer') selected @endif value="transfer">{{__('lang.transfer')}}</option>
                <option  @if($User->pay_type == 'check') selected @endif value="check">{{__('lang.check')}}</option>
            </select>
        </div>
    </div>
    <div id="networkInputs" style="display: none;">
        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.date')}}</label>
            <div class="col-lg-9 col-xl-9">
                <input type="date" class="form-control form-control-solid" value="{{$User->date}}" name="network_date"  placeholder="{{__('lang.date')}}" >
            </div>
        </div>

        <div class="form-group row">
            <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.network_num')}}</label>
            <div class="col-lg-9 col-xl-9">
                <input type="text" class="form-control form-control-solid" name="network_date" value="{{$User->network_num}}"  placeholder="{{__('lang.network_num')}}" >
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label"> {{__('lang.note')}}</label>
        <div class="col-lg-9 col-xl-9">
     <textarea rows="6" class="form-control" name="note">{{$User->note}}</textarea>
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
