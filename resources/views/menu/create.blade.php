@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            新建
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-6">
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal']) !!}
            {{ Form::bsText('name', '菜单名称',old('name') )}}
            {{ Form::bsText('url', '菜单链接',old('url') )}}
            {{ Form::bsText('permission_id', '绑定权限',old('permission_id'))}}
            {{ Form::bsText('parent_id', '父菜单' ,old('parent_id'))}}
            {{ Form::bsText('target', '打开方式',old('target') )}}
            {{ Form::bsText('icon', '菜单图标',old('icon')  )}}
            {{Form::bsButton()}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection