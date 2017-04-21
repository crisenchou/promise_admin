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
            @foreach($fillable as $key=>$val)
                <div class="form-group">
                    {{ Form::label($key, $val, ['class' => 'col-sm-3 control-label no-padding-right'])}}
                    <div class="col-sm-9">
                        {{ Form::text($key, $model->key,['class'=>'col-xs-10 col-sm-5'])}}
                    </div>
                </div>
            @endforeach
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        提交
                    </button>
                    &nbsp; &nbsp; &nbsp;
                    <button class="btn" type="reset">
                        <i class="ace-icon fa fa-undo bigger-110"></i>
                        重置
                    </button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection