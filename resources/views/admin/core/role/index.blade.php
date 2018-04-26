@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            角色管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <a href="{{route($route.'.create')}}">新建</a>
            </small>
        </h1>
    </div><!-- /.page-header -->


    @include('admin.components.datatable.simple',[
        'headers' => ['名称','描述'],
        'properties' => ['name','desc'],
        'list' => $list
    ])
@endsection