@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            {{$title}}
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <a href="{{route($route.'.create')}}">新建</a>
            </small>
        </h1>
    </div><!-- /.page-header -->



    @include('admin.components.datatable.simple',[
        'headers' => ['邮箱','名字','加入时间','用户状态'],
        'properties' => ['email','name','created_at','status'],
        'list' => $list
    ])

@endsection