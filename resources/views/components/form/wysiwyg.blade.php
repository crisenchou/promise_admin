<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right">  {{$trans}}  </label>
    <div class="col-sm-9">
        <div class="wysiwyg-editor" id="editor1">{{$default}}</div>
        <input id="content" name="{{$name}}" type="hidden" value="{{$default}}">
    </div>
</div>
@push('scripts')

<script src="{{asset('assets/js/jquery.hotkeys.index.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{asset('assets/js/bootbox.js')}}"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {

        $("form").submit(function (e) {
            $('#content').val($('#editor1').html())
        });

        function showErrorAlert(reason, detail) {
            var msg = '';
            if (reason === 'unsupported-file-type') {
                msg = "Unsupported format " + detail;
            }
            else {
                //console.log("error uploading file", reason, detail);
            }
            $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                    '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
        }

        //$('#editor1').ace_wysiwyg();//this will create the default editor will all buttons

        //but we want to change a few buttons colors for the third style
        $('#editor1').ace_wysiwyg({
            toolbar: [
                'font',
                null,
                'fontSize',
                null,
                {name: 'bold', className: 'btn-info'},
                {name: 'italic', className: 'btn-info'},
                {name: 'strikethrough', className: 'btn-info'},
                {name: 'underline', className: 'btn-info'},
                null,
                {name: 'insertunorderedlist', className: 'btn-success'},
                {name: 'insertorderedlist', className: 'btn-success'},
                {name: 'outdent', className: 'btn-purple'},
                {name: 'indent', className: 'btn-purple'},
                null,
                {name: 'justifyleft', className: 'btn-primary'},
                {name: 'justifycenter', className: 'btn-primary'},
                {name: 'justifyright', className: 'btn-primary'},
                {name: 'justifyfull', className: 'btn-inverse'},
                null,
                {name: 'createLink', className: 'btn-pink'},
                {name: 'unlink', className: 'btn-pink'},
                null,
                {name: 'insertImage', className: 'btn-success'},
                null,
                'foreColor',
                null,
                {name: 'undo', className: 'btn-grey'},
                {name: 'redo', className: 'btn-grey'}
            ],
            'wysiwyg': {
                fileUploadError: showErrorAlert
            }
        }).prev().addClass('wysiwyg-style2');


    });
</script>
@endpush