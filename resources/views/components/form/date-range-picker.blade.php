@push('css')
<link rel="stylesheet" href="{{asset('assets/css/daterangepicker.min.css')}}"/>
@endpush

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="date-range-picker">{{$trans}}</label>
    <div class="col-sm-9">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
            </span>
            <input class="form-control" type="text"
                   id="date-range-picker" data-today="{{date("Y-m-d 00:00:00")}}"
                   data-start="{{$default['start']}}"
                   data-end="{{$default['end']}}"/>
            <input type="hidden" name="{{$name['start']}}" id="date-range-picker-start" value="{{$default['start']}}">
            <input type="hidden" name="{{$name['end']}}" id="date-range-picker-end" value="{{$default['start']}}">
        </div>
    </div>
</div>

@push('scripts')

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/daterangepicker.min.js')}}"></script>


<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        var picker = $('#date-range-picker');
        var today = picker.attr('data-today');
        var defaultStart = picker.attr('data-start') || today;
        var defaultEnd = picker.attr('data-end') || today;
        picker.daterangepicker({
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": true,
            'applyClass': 'btn-sm btn-success',
            'cancelClass': 'btn-sm btn-default',
            "startDate": defaultStart,
            "endDate": defaultEnd,
            "locale": {
                "format": "YYYY-MM-DD HH:mm:ss",
                "separator": " 至 ",
                "applyLabel": "确定",
                "cancelLabel": "取消",
                "fromLabel": "从",
                "toLabel": "到",
                "customRangeLabel": "Custom",
                "weekLabel": "W",
                "daysOfWeek": [
                    "日",
                    "一",
                    "二",
                    "三",
                    "四",
                    "五",
                    "六"
                ],
                "monthNames": [
                    "1月",
                    "2月",
                    "3月",
                    "4月",
                    "5月",
                    "6月",
                    "7月",
                    "8月",
                    "9月",
                    "10月",
                    "11月",
                    "12月"
                ],
                "firstDay": 1
            }
        }, function (start, end) {
            $("#date-range-picker-start").val(start.format('YYYY-MM-DD HH:mm:ss'));
            $("#date-range-picker-end").val(end.format('YYYY-MM-DD HH:mm:ss'));
        }).prev().on(ace.click_event, function () {
            $(this).next().focus();
        });


    });
</script>
@endpush