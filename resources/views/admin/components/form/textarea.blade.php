<!--text area-->
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">{{$label}} <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <textarea class="form-control" name="{{$name}}" rows="3"
                  placeholder="rows=&quot;3&quot;">{{old($name,$default)}}</textarea>
        @if($errors->has($name))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">T{{$errors->first($name)}}</li>
            </ul>
        @endif
    </div>
</div>