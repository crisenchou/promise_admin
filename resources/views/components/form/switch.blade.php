<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">{{$trans}}</label>

    <div class="col-sm-9">
        <label>
            <input name="{{$name}}" class="ace ace-switch ace-switch-3" @if($default) checked @endif type="checkbox"
                   value="1"/>
            <span class="lbl"></span>
        </label>
    </div>
</div>