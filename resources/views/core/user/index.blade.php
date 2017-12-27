@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            {{$title}}
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <a href="{{route($route.'.create')}}">新建</a>
            </small>
        </h1>
    </div><!-- /.page-header -->


    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">
                                <label class="pos-rel">
                                    <input type="checkbox" class="ace"/>
                                    <span class="lbl"></span>
                                </label>
                            </th>
                            <th>邮箱</th>
                            <th>名字</th>
                            <th><i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>加入时间</th>
                            <th class="hidden-480">用户状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $user)
                            <tr>
                                <td class="center">
                                    <label class="pos-rel">
                                        <input type="checkbox" class="ace"/>
                                        <span class="lbl"></span>
                                    </label>
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>{{$user->name}}</td>
                                <td class="hidden-480">{{$user->created_at}}</td>
                                <td><span class="label label-sm label-warning">{{$user->humanStatus}}</span></td>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="{{route($route.'.edit',['id'=>$user->id])}}"
                                           class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120">编辑</i>
                                        </a>

                                        <button class="btn btn-xs btn-danger"
                                                data-action="{{route($route.'.destroy',$user->id)}}" data-toggle="modal"
                                                data-target="#deleteModal">
                                            <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
                                        </button>
                                    </div>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <form action="{{route('user.status',['id'=>$user->id])}}" method="post">
                                            <button class="btn btn-xs btn-info" type="submit">
                                                <i class="ace-icon fa fa-flag bigger-120">激活</i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.span -->
            </div><!-- /.row -->
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    @include('components.widget.delete-modal')

@endsection
@push('scripts')
<!-- page specific plugin scripts -->
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.select.min.js')}}"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function ($) {
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
            var th_checked = this.checked;//checkbox inside "TH" table header

            $(this).closest('table').find('tbody > tr').each(function () {
                var row = this;
                if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
            });
        });

        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]', function () {
            var $row = $(this).closest('tr');
            if ($row.is('.detail-row ')) return;
            if (this.checked) $row.addClass(active_class);
            else $row.removeClass(active_class);
        });

        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

        //tooltip placement on right or left
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
            return 'left';
        }

    })
</script>
@endpush