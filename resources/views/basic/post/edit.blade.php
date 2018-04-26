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

    @include('admin.components.message.validate')
    <div class="row">
        <div class="col-xs-12">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal','files' => true]) !!}
            {{method_field('put')}}
            {{ Form::bsText('title', '标题',$model->title )}}
            {{ Form::bsText('summary', '简介',$model->summary )}}
            {{ Form::bsImage('cover', '封面',$model->cover )}}
            {{ Form::bsTextarea('content', '内容',$model->title )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection