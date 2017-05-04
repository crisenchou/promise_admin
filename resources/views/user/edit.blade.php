@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route('user.index')}}"> {{$title}} </a>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                编辑
            </small>
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{method_field('put')}}
            {{ Form::bsText('name', '用户名称',$model->name )}}
            {{ Form::bsText('email', '邮箱',$model->email )}}
            {{ Form::bsSelectMuliple('role_id', '角色','',$roles )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection