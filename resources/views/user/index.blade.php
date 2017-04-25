@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            用户管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                用户列表
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
                            <th class="detail-col">详情</th>
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

                                <td class="center">
                                    <div class="action-buttons">
                                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                            <i class="ace-icon fa fa-angle-double-down"></i>
                                            <span class="sr-only">Details</span>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    {{$user->email}}
                                </td>
                                <td>{{$user->name}}</td>
                                <td class="hidden-480">{{$user->created_at}}</td>
                                <td><span class="label label-sm label-warning">{{$user->status}}</span></td>
                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <!--<button class="btn btn-xs btn-success">
                                            <i class="ace-icon fa fa-check bigger-120"></i>
                                        </button>-->

                                        <a href="{{url('user/'.$user->id.'/edit')}}" class="btn btn-xs btn-info">
                                            <i class="ace-icon fa fa-pencil bigger-120">编辑</i>
                                        </a>

                                        <button class="btn btn-xs btn-danger">
                                            <i class="ace-icon fa fa-trash-o bigger-120">删除</i>
                                        </button>

                                        <!--<button class="btn btn-xs btn-warning">
                                            <i class="ace-icon fa fa-flag bigger-120">删除</i>
                                        </button>-->
                                    </div>

                                    <div class="hidden-md hidden-lg">
                                        <div class="inline pos-rel">
                                            <button class="btn btn-minier btn-primary dropdown-toggle"
                                                    data-toggle="dropdown" data-position="auto">
                                                <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr class="detail-row">
                                <td colspan="8">
                                    <div class="table-detail">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-2">
                                                <div class="text-center">
                                                    <img height="150" class="thumbnail inline no-margin-bottom"
                                                         alt="Domain Owner's Avatar"
                                                         src="{{asset('assets/images/avatars/profile-pic.jpg')}}"/>
                                                    <br/>
                                                    <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                                                        <div class="inline position-relative">
                                                            <a class="user-title-label" href="#">
                                                                <i class="ace-icon fa fa-circle light-green"></i>
                                                                &nbsp;
                                                                <span class="white">{{$user->name}}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-7">
                                                <div class="space visible-xs"></div>

                                                <div class="profile-user-info profile-user-info-striped">
                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> 名字</div>
                                                        <div class="profile-info-value">
                                                            <span>{{$user->name}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> 位置</div>

                                                        <div class="profile-info-value">
                                                            <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                            <span>Netherlands, Amsterdam</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> 年龄</div>

                                                        <div class="profile-info-value">
                                                            <span>{{$user->age}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> 加入时间</div>

                                                        <div class="profile-info-value">
                                                            <span>{{$user->created_at}}</span>
                                                        </div>
                                                    </div>

                                                    <div class="profile-info-row">
                                                        <div class="profile-info-name"> 最后登陆</div>

                                                        <div class="profile-info-value">
                                                            <span>{{$user->lastLogin}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-3">
                                                <div class="space visible-xs"></div>
                                                <h4 class="header blue lighter less-margin">发送邮件</h4>
                                                <div class="space-6"></div>
                                                <form>
                                                    <fieldset>
                                                    <textarea class="width-100" resize="none"
                                                              placeholder="请输入"></textarea>
                                                    </fieldset>

                                                    <div class="hr hr-dotted"></div>

                                                    <div class="clearfix">
                                                        <label class="pull-left">
                                                            <input type="checkbox" class="ace"/>
                                                            <span class="lbl"> 给我发送一份拷贝</span>
                                                        </label>

                                                        <button class="pull-right btn btn-sm btn-primary btn-white btn-round"
                                                                type="button">
                                                            提交
                                                            <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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


    <div id="dialog-confirm" class="hide">
        <div class="alert alert-info bigger-110">
            These items will be permanently deleted and cannot be recovered.
        </div>

        <div class="space-6"></div>

        <p class="bigger-110 bolder center grey">
            <i class="ace-icon fa fa-hand-o-right blue bigger-120"></i>
            Are you sure?
        </p>
    </div><!-- #dialog-confirm -->

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

        /***************/
        $('.show-details-btn').on('click', function (e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });

    })
</script>
@endpush