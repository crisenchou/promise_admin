<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="{{$name}}"> {{$trans}} </label>
    <div class="col-sm-9">
        <textarea name="{{$name}}" data-provide="markdown" data-iconlibrary="fa" rows="10"></textarea>
    </div>
</div>

@push('scripts')
<script src="{{asset('assets/js/markdown.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-markdown.min.js')}}"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {

        $('textarea[data-provide="markdown"]').each(function () {
            var $this = $(this);
            if ($this.data('markdown')) {
                $this.data('markdown').showEditor();
            }
            else $this.markdown()
            $this.parent().find('.btn').addClass('btn-white');
        })
    });
</script>
@endpush