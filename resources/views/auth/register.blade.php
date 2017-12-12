@extends('layouts.auth')
@section('title','register')
@section('box')
    <div class="position-relative">
        <div id="signup-box" class="signup-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header green lighter bigger">
                        <i class="ace-icon fa fa-users blue"></i>
                        注册新用户
                    </h4>
                    <div class="space-6"></div>
                    @include('components.message.validate')
                    <form method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" name="name" class="form-control" placeholder="姓名"
                                           value="{{old('name')}}"/>
                                    <i class="ace-icon fa fa-user"></i>
                                </span>
                            </label>
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

                            <label class="block">
                                <input type="checkbox" class="ace"/>
                                <span class="lbl">
                                    我接受
                                    <a href="#">用户协议许可</a>
                                </span>
                            </label>

                            <div class="space-24"></div>

                            <div class="clearfix">
                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                    <i class="ace-icon fa fa-refresh"></i>
                                    <span class="bigger-110">重置</span>
                                </button>

                                <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                    <span class="bigger-110">注册</span>

                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div>

                <div class="toolbar center">
                    <a href="{{route('login')}}" class="back-to-login-link">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        返回登录
                    </a>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.signup-box -->
    </div>
@endsection