@extends('layouts.auth')
@section('title','forgot')
@section('box')
    <div class="position-relative">
        <div id="forgot-box" class="forgot-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header red lighter bigger">
                        <i class="ace-icon fa fa-key"></i>
                        重置密码
                    </h4>
                    <div class="space-6"></div>

                    @include('admin.components.message.validate')
                    <p>
                        填写邮箱并接受消息
                    </p>
                    <form method="post" action="{{route('password.email')}}">
                        {{csrf_field()}}
                        <fieldset>
                            <label class="block clearfix">
                                <span class="block input-icon input-icon-right">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                           value="{{old('email')}}"/>
                                    <i class="ace-icon fa fa-envelope"></i>
                                </span>
                            </label>

                            <div class="clearfix">
                                <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                                    <i class="ace-icon fa fa-lightbulb-o"></i>
                                    <span class="bigger-110">发送</span>
                                </button>
                            </div>
                        </fieldset>
                    </form>
                </div><!-- /.widget-main -->

                <div class="toolbar center">
                    <a href="{{route('login')}}" class="back-to-login-link">
                        返回登陆
                        <i class="ace-icon fa fa-arrow-right"></i>
                    </a>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.forgot-box -->
    </div>
@endsection