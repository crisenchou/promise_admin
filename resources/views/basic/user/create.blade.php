@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route($route.'.index')}}"> {{$title}} </a>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                新建
            </small>
        </h1>
    </div><!-- /.page-header -->

    @include('components.message.validate')
    <div class="row">
        <div class="col-xs-6">
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal']) !!}
            {{ Form::bsText('name', '用户名称',old('name') )}}
            {{ Form::bsText('email', '邮箱',old('email') )}}
            {{ Form::bsText('password', '密码',old('password') )}}
            {{ Form::bsSelectMuliple('role_id', '角色',old('role_id'),$roles )}}
            {{ Form::bsSwitch('status','允许登陆',old('status') )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection