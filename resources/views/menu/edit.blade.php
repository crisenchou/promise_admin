@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            编辑
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{method_field('put')}}
            {{ Form::bsText('name', '菜单名称',$model->name )}}
            {{ Form::bsText('url', '菜单链接',$model->url )}}
            {{ Form::bsSelect('permission_id', '绑定权限',$permissions,$model->permission_id)}}
            {{ Form::bsSelect('parent_id', '父结点',$menus,$model->parent_id)}}
            {{ Form::bsText('target', '打开方式' )}}
            {{ Form::bsText('icon', '菜单图标' )}}
            {{Form::bsButton()}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection