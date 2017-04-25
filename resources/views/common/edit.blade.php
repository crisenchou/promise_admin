@extends('layouts.app')
@section('page-content')
    <div class="page-header">
        <h1>
            编辑
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-6">
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}

            {{method_field('put')}}
            @foreach($fillable as $key=>$val)
               {{ Form::bsText($key, $val)}}
            @endforeach

            {{Form::bsButton()}}

            {!! Form::close() !!}
        </div>
    </div>
@endsection