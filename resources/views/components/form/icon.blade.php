@php
    $icons = config('icon');
@endphp

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">{{$trans}}</label>
    <div class="col-sm-9">
        @foreach($icons as $icon)
            <label class="col-xs-1 col-sm-1">
                <input name="{{$name}}" type="radio" @if($icon == $default)checked @endif class="ace"
                       value="{{$icon}}"/>
                <span class="lbl middle"><i class="menu-icon fa {{$icon}}"></i></span>
            </label>
        @endforeach
    </div>
</div>