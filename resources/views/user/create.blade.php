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
            {{ Form::bsText('name', '用户名称',old('name') )}}
            {{ Form::bsText('url', '邮箱',old('url') )}}
            {{ Form::bsSelectMuliple('role_id', '角色',old('role_id'),$roles )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection