@extends('layouts.auth')
@section('title','login')
@section('box')
    <div class="position-relative">
        <div id="login-box" class="login-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        登录
                    </h4>
                    <div class="space-6"></div>
                    @include('components.message.validate')
                    @include('components.message.message')
                    <form method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="text" name="email" class="form-control" placeholder="邮箱"
                                           value="{{old('email')}}"/>
                                    <i class="ace-icon fa fa-user"></i>
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
                                    <input type="text" name="captcha" class="form-control" placeholder="验证码"/>
                                    <i class="ace-icon fa fa-bolt"></i>
                                </span>
                            </label>

                            <label class="block clearfix">
                                <img id="captcha" src="{{captcha_src()}}">
                            </label>
                            <div class="space"></div>

                            <div class="clearfix">
                                <label class="inline">
                                    <input type="checkbox" class="ace" name="remember"/>
                                    <span class="lbl"> 记住我</span>
                                </label>

                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                    <i class="ace-icon fa fa-key"></i>
                                    <span class="bigger-110">登录</span>
                                </button>
                            </div>

                            <div class="space-4"></div>
                        </fieldset>
                    </form>

                    <!--<div class="social-or-login center">
                        <span class="bigger-110">使用其他账户登陆</span>
                    </div>

                    <div class="space-6"></div>

                    <div class="social-login center">
                        <a class="btn btn-primary">
                            <i class="ace-icon fa fa-facebook"></i>
                        </a>

                        <a class="btn btn-info">
                            <i class="ace-icon fa fa-twitter"></i>
                        </a>

                        <a class="btn btn-danger">
                            <i class="ace-icon fa fa-google-plus"></i>
                        </a>
                    </div>-->
                </div><!-- /.widget-main -->

                <div class="toolbar clearfix">
                    <div>
                        <a href="{{route('password.request')}}" class="forgot-password-link">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            忘记密码
                        </a>
                    </div>

                    <div>
                        <a href="{{route('register')}}" class="user-signup-link">
                            注册
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.login-box -->
    </div>
@endsection