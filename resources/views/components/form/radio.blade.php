<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">{{$trans}}</label>

    <div class="col-sm-9">
        @foreach($radio as $key=>$val)
            <label class="inline">
                <input name="{{$name}}" type="radio"     @if($key == $default)checked @endif   class="ace" value="{{$key}}"/>
                <span class="lbl middle"> {{$val}}</span>
            </label>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        @endforeach
    </div>
</div>