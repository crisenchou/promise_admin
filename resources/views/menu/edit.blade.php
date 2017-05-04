@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route('menu.index')}}"> {{$title}} </a>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                新建
            </small>
        </h1>
    </div><!-- /.page-header -->

    
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{method_field('put')}}
            {{ Form::bsText('name', '菜单名称',$model->name )}}
            {{ Form::bsText('url', '菜单链接',$model->url )}}
            {{ Form::bsSelect('permission_id', '绑定权限',$model->permission_id,$permissions)}}
            {{ Form::bsSelect('parent_id', '父结点',$model->parent_id,$menus)}}
            {{ Form::bsRadio('target', '打开方式' ,$model->target ,['_self'=>'当前窗口','_blank'=>'新窗口'])}}
            {{ Form::bsSwitch('status','菜单状态',$model->status )}}
            {{ Form::bsIcon('icon', '菜单图标' ,$model->icon ,$icons)}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection