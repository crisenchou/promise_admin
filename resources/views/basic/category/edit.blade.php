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


    <div class="row">
        <div class="col-xs-6">
            @inject('menuPresenter','App\Http\Presenters\CategoryPresenter')
            {!! Form::model($model, ['route' => [$route.'.update', $model->id],'class'=>'form-horizontal']) !!}
            {{csrf_field()}}
            {{method_field('put')}}
            {{ Form::bsText('name', '分类名称',$model->name )}}
            {{ Form::bsSelect('parent_id', '父结点',$model->parent_id,$menuPresenter->fillCategories($categories))}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection