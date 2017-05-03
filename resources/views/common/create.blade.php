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
            @foreach($fields as $field=>$type)

                {{ Form::$type($field, trans($field), old($field))}}
            @endforeach
            {{Form::bsButton()}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection