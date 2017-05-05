@push('css')
<!-- page specific plugin styles -->
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}"/>
@endpush


<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="{{$name}}"> {{$trans}} </label>
    <div class="col-sm-9">
        <input multiple="" type="file" id="image" name="{{$name}}" class="col-xs-10 col-sm-5"/>
    </div>
</div>

@push('scripts')
<!--[if lte IE 8]>
<script src="{{asset('assets/js/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('assets/js/jquery-ui.custom.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>


<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {

        $('#image').ace_file_input({
            style: 'well',
            btn_choose: 'Drop images here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-picture-o',
            whitelist_ext: ["jpeg", "jpg", "png", "gif", "bmp"],
            whitelist_mime: ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"],
            droppable: true,
            thumbnail: 'small'//large | fit
            //,icon_remove:null//set null, to hide remove/reset button
            /**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
            /**,before_remove : function() {
						return true;
					}*/
            ,
            preview_error: function (filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function () {
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });


    });
</script>
@endpush