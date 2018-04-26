<!--text-->
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{$label}}
        @if(array_get($attributes,'required'))
            <span class="required">*</span>
        @endif
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input required="required" class="form-control col-md-7 col-xs-12 parsley-error"
               data-parsley-id="5" name="{{$name}}" type="text" value="{{old($name,$default)}}">
        @if($errors->has($name))
            <ul class="parsley-errors-list filled">
                <li class="parsley-required">T{{$errors->first($name)}}</li>
            </ul>
        @endif
    </div>
</div>

<!--带图标text-->
{{--<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">--}}
{{--<input class="form-control has-feedback-left" id="inputSuccess2" placeholder="First Name" type="text">--}}
{{--<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>--}}
{{--</div>--}}