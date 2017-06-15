@extends('layouts.auth')
@section('title','reset')
@section('box')
    <div class="position-relative">
        <div id="signup-box" class="signup-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header green lighter bigger">
                        <i class="ace-icon fa fa-users blue"></i>
                        重置密码
                    </h4>
                    <div class="space-6"></div>
                    @include('components.message.validate')
                    <form method="post" action="{{route('password.request')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <fieldset>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="email" name="email" class="form-control" placeholder="邮箱"
                                           value="{{old('email')}}"/>
                                    <i class="ace-icon fa fa-envelope"></i>
                                </span>
                            </label>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="password" name="password" class="form-control" placeholder="密码"
                                           value="{{old('password')}}"/>
                                    <i class="ace-icon fa fa-lock"></i>
                                </span>
                            </label>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="重复密码" value="{{old('password_confirmation')}}"/>
                                    <i class="ace-icon fa fa-retweet"></i>
                                </span>
                            </label>
                            <div class="space-24"></div>

                            <div class="clearfix">
                                <button type="submit" class="width-35 pull-right btn btn-sm btn-success">
                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                    <span class="bigger-110">提交</span>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="toolbar center">
                    <a href="{{url('login')}}" class="back-to-login-link">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        返回登录
                    </a>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.signup-box -->
    </div>
@endsection