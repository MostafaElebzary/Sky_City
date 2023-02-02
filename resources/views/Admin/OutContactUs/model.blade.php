<div class="form-group">
    <label>{{__('lang.name')}} </label>
    <input type="text" class="form-control form-control-solid" value="{{$User->name}}" name="name" readonly
           placeholder="{{__('lang.name')}}">
</div>

<div class="form-group">
    <label>{{__('lang.phone')}} </label>
    <input type="text" class="form-control form-control-solid" value="{{$User->phone}}" name="phone" readonly
           placeholder="{{__('lang.phone')}}">
</div>
    <div class="form-group">
        <label>{{__('lang.type')}} </label>
        <input type="text" class="form-control" name="email" value="{{trans('lang.'.$User->type)}} " readonly>
    </div>
</div>
{{--<div class="form-group">--}}
{{--    <label>{{__('lang.ad')}} </label>--}}
{{--    @if($User->advertising) <a target="_blank"--}}
{{--        href="{{url('Advertising/'.$User->advertising->id)}}"> {{$User->advertising->title}}</a>@else--}}
{{--        --- @endif--}}
{{--</div>--}}

<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('lang.Jobs_Close')}}</button>
</div>



