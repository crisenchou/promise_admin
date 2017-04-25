<div class="form-group">
    <label for="{{$name}}" class="col-sm-3 control-label no-padding-right">{{$trans}}</label>
    <div class="col-sm-9">
        <select class="col-xs-10 col-sm-5" name="{{$name}}" id="{{$name}}">
                @foreach($select as $key=>$val)
                    <option value="{{$key}}" @if($key == $default) selected @endif>{{$val}}</option>
                @endforeach
        </select>
    </div>
</div>