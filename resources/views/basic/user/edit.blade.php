@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route($route.'.index')}}"> {{$title}} </a>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                编辑
            </small>
        </h1>
    </div><!-- /.page-header -->

    @include('components.message.validate')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{method_field('put')}}
            {{ Form::bsText('name', '用户名称',$model->name )}}
            {{ Form::bsText('email', '邮箱',$model->email )}}
            {{ Form::bsSelectMuliple('role_id', '角色','',$roles )}}
            {{ Form::bsRadio('status', '用户状态' ,$model->status ,[0=>'未激活',1=>'正常'])}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection