@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker3.min.css')}}"/>
@endpush
@section('page-content')
    <div class="page-header">
        <h1>
            个人中心
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <div id="user-profile-3" class="user-profile row">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="tabbable">
                        <ul class="nav nav-tabs padding-16">
                            <li class="active">
                                <a data-toggle="tab" href="#edit-basic">
                                    <i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
                                    个人信息
                                </a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#edit-password">
                                    <i class="blue ace-icon fa fa-key bigger-125"></i>
                                    密码
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content profile-edit-tab-content">
                            <div id="edit-basic" class="tab-pane in active">
                                <form class="form-horizontal" {{route('profile.save')}} method="post">
                                    {{csrf_field()}}
                                    <h4 class="header blue bolder smaller">基本信息</h4>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-8">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right"
                                                       for="form-field-username">昵称</label>
                                                <div class="col-sm-8">
                                                    <input name="nickname" type="text"
                                                           id="form-field-username" placeholder="昵称"
                                                           value="{{$userInfo->nickname or ''}}"/>
                                                </div>
                                            </div>
                                            <div class="space-4"></div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right"
                                                       for="age">年龄</label>
                                                <div class="col-sm-8">
                                                    <input name="age" type="text" id="name"
                                                           placeholder="年龄" value="{{$userInfo->age or ''}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-date">生日</label>

                                        <div class="col-sm-9">
                                            <div class="input-medium">
                                                <div class="input-group">
                                                    <input class="input-medium date-picker"
                                                           type="text" name="birthday" data-date-format="yyyy-mm-dd"
                                                           placeholder="yyyy-mm-dd"
                                                           value="{{$userInfo->birthday or ''}}"/>
                                                    <span class="input-group-addon">
                                                        <i class="ace-icon fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right">性别</label>

                                        <div class="col-sm-9">
                                            <label class="inline">
                                                <input name="gender" type="radio" class="ace" value="1"
                                                       @if($userInfo->gender ==1) checked @endif/>
                                                <span class="lbl middle"> 男</span>
                                            </label>

                                            &nbsp; &nbsp; &nbsp;
                                            <label class="inline">
                                                <input name="gender" type="radio" class="ace" value="0"
                                                       @if($userInfo->gender ==0) checked @endif/>
                                                <span class="lbl middle"> 女</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="space-4"></div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-comment">个人简介</label>

                                        <div class="col-sm-9">
                                            <textarea id="form-field-comment"
                                                      name="comment">{{$userInfo->comment or ''}}</textarea>
                                        </div>
                                    </div>

                                    <div class="space"></div>
                                    {{--<h4 class="header blue bolder smaller">联系方式</h4>--}}

                                    {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-3 control-label no-padding-right"--}}
                                    {{--for="form-field-email">github</label>--}}
                                    {{--<div class="col-sm-9">--}}
                                    {{--<span class="input-icon input-icon-right">--}}
                                    {{--<input type="url" name="github" value=""/>--}}
                                    {{--<i class="ace-icon fa fa-envelope"></i>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="space-4"></div>--}}

                                    {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-3 control-label no-padding-right"--}}
                                    {{--for="form-field-website">个人主页</label>--}}
                                    {{--<div class="col-sm-9">--}}
                                    {{--<span class="input-icon input-icon-right">--}}
                                    {{--<input type="url" name="homepage" id="form-field-website"--}}
                                    {{--value=""/>--}}
                                    {{--<i class="ace-icon fa fa-globe"></i>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="space-4"></div>--}}

                                    {{--<div class="form-group">--}}
                                    {{--<label class="col-sm-3 control-label no-padding-right"--}}
                                    {{--for="form-field-phone">手机</label>--}}

                                    {{--<div class="col-sm-9">--}}
                                    {{--<span class="input-icon input-icon-right">--}}
                                    {{--<input class="input-medium input-mask-phone"--}}
                                    {{--type="text" name="phone" id="form-field-phone"/>--}}
                                    {{--<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>--}}
                                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{Form::bsButton()}}

                                    {{--<div class="clearfix form-actions">--}}
                                    {{--<div class="col-md-offset-3 col-md-9">--}}
                                    {{--<button class="btn btn-info" type="submit">--}}
                                    {{--<i class="ace-icon fa fa-check bigger-110"></i>--}}
                                    {{--Save--}}
                                    {{--</button>--}}

                                    {{--&nbsp; &nbsp;--}}
                                    {{--<button class="btn" type="reset">--}}
                                    {{--<i class="ace-icon fa fa-undo bigger-110"></i>--}}
                                    {{--Reset--}}
                                    {{--</button>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                </form>
                            </div>

                            <div id="edit-password" class="tab-pane">
                                <form class="form-horizontal" action="{{route('password.change')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="space-10"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-pass1">新密码</label>

                                        <div class="col-sm-9">
                                            <input type="password" id="form-field-pass1" name="password"/>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right"
                                               for="form-field-pass2">确认密码</label>

                                        <div class="col-sm-9">
                                            <input type="password" id="form-field-pass2" name="password_conformation"/>
                                        </div>
                                    </div>
                                    {{Form::bsButton()}}
                                </form>
                            </div>
                        </div>
                    </div>
                    </form>
                </div><!-- /.span -->
            </div><!-- /.user-profile -->
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
@push('scripts')
<script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    jQuery(function ($) {

        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        })
    });
</script>
@endpush