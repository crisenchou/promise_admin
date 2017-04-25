{{--<div class="form-group">--}}
{{--{{ Form::label($trans, null, ['class' => 'col-sm-3 control-label no-padding-right']) }}--}}
{{--{{ Form::text($name, $value, array_merge(['class' => 'col-xs-10 col-sm-5'], $attributes)) }}--}}
{{--</div>--}}

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="{{$name}}"> {{$trans}} </label>
    <div class="col-sm-9">
        <input type="text" id="{{$name}}" name="{{$name}}" placeholder="{{$trans}}" value="{{$value}}"
               class="col-xs-10 col-sm-5"/>
    </div>
</div>