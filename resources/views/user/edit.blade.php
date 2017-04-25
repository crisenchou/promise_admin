@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            用户管理
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                编辑用户
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{method_field('put')}}
            {{ Form::bsText('name', '用户名称',$model->name )}}
            {{ Form::bsText('url', '邮箱',$model->url )}}
            {{ Form::bsButton() }}

            {!! Form::close() !!}
        </div>
    </div>
@endsection