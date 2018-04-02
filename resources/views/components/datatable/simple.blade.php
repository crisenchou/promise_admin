@if( !empty($fields))
    <!-- search -->
    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main">
                        <form class="form-inline" type="get" action="{{route($route.'.index')}}">
                            <select class="form-control" name="field">
                                @foreach($fields as $keyword=>$desc)
                                    <option value="{{$keyword}}"
                                            @if($keyword == request()->get('field'))  selected @endif>
                                        {{$desc}}
                                    </option>
                                @endforeach
                            </select>
                            <input type="text" name="keyword" class="form-control" placeholder="请输入关键字"
                                   value="{{old('keyword')}}">
                            <button type="submit" class="btn btn-info btn-sm">
                                <i class="ace-icon fa fa-search icon-on-right bigger-110"></i>查找
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /search -->
@endif


<div class="hr hr-18 dotted hr-double"></div>
<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table id="simple" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th>操作</th>
                    @foreach($headers as $header)
                        <th>{{$header}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($list as $key=>$model)
                    <tr>
                        <td>
                            <div class="action-buttons">
                                <a class="green" href="{{route($route.'.edit',['id'=>$model->id])}}">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                                <a class="red modal-delete" href="#"
                                   data-action="{{route($route.'.destroy',$model->id)}}"
                                   data-toggle="modal"
                                   data-target="#deleteModal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>
                        </td>
                        {{--<td class="center">--}}
                        {{--<div class="action-buttons">--}}
                        {{--<a href="#" class="green bigger-140 show-details-btn" title="Show Details">--}}
                        {{--<i class="ace-icon fa fa-angle-double-down"></i>--}}
                        {{--<span class="sr-only">Details</span>--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</td>--}}

                        @foreach($properties as $property)
                            <td>{{$model->$property}}</td>
                        @endforeach
                    </tr>
                    {{--<tr class="detail-row">--}}
                    {{--<td colspan="13">--}}
                    {{--<div class="table-detail">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-xs-6 col-sm-3">--}}
                    {{--<div class="space visible-xs"></div>--}}
                    {{--<div class="profile-user-info profile-user-info-striped">--}}
                    {{--<div class="profile-info-row">--}}
                    {{--<div class="profile-info-name"> 用户名</div>--}}
                    {{--<div class="profile-info-value">--}}
                    {{--<span>{{$user->username}}</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="profile-info-row">--}}
                    {{--<div class="profile-info-name"> 用户钱包</div>--}}
                    {{--<div class="profile-info-value">--}}
                    {{--<span>{{$user->money}}</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="profile-info-row">--}}
                    {{--<div class="profile-info-name"> 邮箱</div>--}}
                    {{--<div class="profile-info-value">--}}
                    {{--<span>{{$user->email}}</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="profile-info-row">--}}
                    {{--<div class="profile-info-name"> 手机号</div>--}}
                    {{--<div class="profile-info-value">--}}
                    {{--<span>{{$user->phone}}</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /.span -->
</div><!-- /.row -->

{{ method_exists($list, 'links')  &&  $list->links()}}
@include('components.widget.delete-modal')
@push('scripts')
    <!-- page specific plugin scripts -->

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
        jQuery(function ($) {
            //And for the first simple table, which doesn't have TableTools or dataTables
            //select/deselect all rows according to table header checkbox
            var active_class = 'active';
            $('#simple > thead > tr > th input[type=checkbox]').eq(0).on('click', function () {
                var th_checked = this.checked;//checkbox inside "TH" table header

                $(this).closest('table').find('tbody > tr').each(function () {
                    var row = this;
                    if (th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
                    else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
                });
            });

            //select/deselect a row when the checkbox is checked/unchecked
            $('#simple').on('click', 'td input[type=checkbox]', function () {
                var $row = $(this).closest('tr');
                if ($row.is('.detail-row ')) return;
                if (this.checked) $row.addClass(active_class);
                else $row.removeClass(active_class);
            });

            /***************
             $('.show-details-btn').on('click', function (e) {
                e.preventDefault();
                $(this).closest('tr').next().toggleClass('open');
                $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
            });
             ***************/


            /**
             //add horizontal scrollbars to a simple table
             $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
             {
               horizontal: true,
               styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
               size: 2000,
               mouseWheelLock: true
             }
             ).css('padding-top', '12px');
             */


        })
    </script>
@endpush