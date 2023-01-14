<link rel="stylesheet" href="{{asset('dashboard/dropify/dist/css/dropify.min.css')}}">

<form class="px-10" novalidate="novalidate" id="kt_form2"  method="post" action="{{url('update-city')}}" enctype="multipart/form-data">
                <!--begin: Wizard Step 1-->
                @csrf
                <div class="form-group">
                    <label> المعرف </label>
                    <input type="text" class="form-control form-control-solid" value="{{$User->key}}" name="key" required placeholder="المعرف" >
                    <input type="hidden" class="form-control form-control-solid" value="{{$User->id}}" name="id" required  >
                </div>
                <div class="form-group">
                    <label>القيمة </label>
                    <input type="text" class="form-control form-control-solid" name="value" value="{{$User->value}}"  required placeholder="القيمة" >
                </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@if(session('lang') == 'en')   image @else
                الصورة @endif <span style="color: red"> *</span>  </label>
        <div class="col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title"></h4>
                    <div class="controls">
                        <input type="file" id="input-file-now" class="dropify" name="image"
                               data-default-file="{{$User->image}}" required
                               data-validation-required-message="{{trans('word.This field is required')}}"/>
                    </div>
                </div>
            </div>
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
    $("#MainCategory2").click(function(){
        var wahda = $(this).val();

        if(wahda != ''){

            $.get("{{ URL::to('/GetSubCategory')}}"+'/'+wahda , function($data){
                console.log($data)

                var outs = "";
                $.each($data , function(name , id){

                    outs +='<option value="'+id+'">'+name+'</option>'

                });
                $('#SubCategory2').html(outs);


            });
        }
    });

</script>
