@push('css')
<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}"/>
@endpush
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">{{$trans}}</label>
    <div class="col-sm-9">
        <div class="input-daterange input-group">
            <input type="text" class="input-sm form-control" name="{{$name[0]}}" value="{{$default[0]}}"/>
            <span class="input-group-addon"><i class="fa fa-exchange"></i>
                </span>
            <input type="text" class="input-sm form-control" name="{{$name[1]}}" value="{{$default[1]}}"/>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>
<script type="text/javascript">
    //or change it into a date range picker
    $('.input-daterange').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd',
    });
</script>
@endpush