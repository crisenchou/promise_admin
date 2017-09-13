@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route($route.'.index')}}"> {{$title}} </a>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                新建
            </small>
        </h1>
    </div><!-- /.page-header -->

    @include('components.message.validate')
    <div class="row">
        <div class="col-xs-6">
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal' ,'files' => true]) !!}
            {{ Form::bsText('title', '标题',old('title') )}}
            {{ Form::bsText('summary', '简介',old('summary') )}}
            {{ Form::bsImage('cover', '封面',old('cover') )}}
            {{ Form::bsTextarea('content', '内容',old('content') )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection