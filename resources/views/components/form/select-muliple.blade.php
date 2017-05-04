@push('css')
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}"/>
@endpush

<div class="form-group">
    <label for="{{$name}}" class="col-sm-3 control-label no-padding-right">{{$trans}}</label>
    <div class="col-sm-4">
        <select multiple="multiple" name="{{$name}}[]" id="{{$name}}" class="chosen-select  tag-input-style"
                data-placeholder="请选择">
            @foreach($select as $key=>$val)
                <option value="{{$key}}" @if($key == $default) selected @endif>{{$val}}</option>
            @endforeach
        </select>
    </div>
</div>
@push('scripts')
<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>
<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        if (!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect: true});
            //resize the chosen on window resize
            $(window)
                    .off('resize.chosen')
                    .on('resize.chosen', function () {
                        $('.chosen-select').each(function () {
                            var $this = $(this);
                            $this.next().css({'width': $this.parent().width()});
                        })
                    }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
                if (event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function () {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            });
        }
    });
</script>
@endpush