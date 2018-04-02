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
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal']) !!}
            {{ Form::bsText('name', '名称',old('name') )}}
            {{ Form::bsText('desc', '描述',old('desc') )}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection