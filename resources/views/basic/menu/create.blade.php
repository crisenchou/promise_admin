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
            @inject('menuPresenter','App\Http\Presenters\MenuPresenter')
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal']) !!}
            {{ Form::bsText('name', '菜单名称',old('name') )}}
            {{ Form::bsText('url', '菜单链接',old('url')  )}}
            {{ Form::bsSelect('permission_id', '绑定权限',old('permission_id') ,$menuPresenter->fillPermissions($permissions))}}
            {{ Form::bsSelect('parent_id', '父结点',old('parent_id'),$menuPresenter->fillMenus($menus))}}
            {{ Form::bsRadio('target', '打开方式' ,old('target') ,['_self'=>'当前窗口','_blank'=>'新窗口'])}}
            {{ Form::bsSwitch('status','菜单状态',old('status') )}}
            {{ Form::bsIcon('icon', '菜单图标' ,old('icon') )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection