@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            <a href="{{route($route.'.index')}}"> {{$title}} </a>
            <small>
                编辑
            </small>
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal','files' => $upload]) !!}
            {{method_field('put')}}
            @foreach($fields as $field=>$type)
                {{ Form::$type($field, $field, $model->$field)}}
            @endforeach
            {{Form::bsButton()}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection