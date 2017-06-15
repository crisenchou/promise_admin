<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">对话框</h4>
            </div>
            <form id="delete-form" action="" method="post">
                {{csrf_field()}}
                {{method_field('delete')}}
                <div class="modal-body">
                    <div class="alert alert-info bigger-110">
                        删除了无法恢复,确定要执行该操作么？
                    </div>
                    <div class="space-6"></div>
                    <p class="bigger-110 bolder center grey">
                        <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
                        Are you sure?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">确定</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

@push('scripts')
<script>
    $('.btn-danger').on('click',function(){
        var action = $(this).data('action')
        $('#delete-form').attr('action',action);
    })
</script>
@endpush