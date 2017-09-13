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
            {!!  Form::open(['route' => $route.'.store','class'=> 'form-horizontal']) !!}
            {{csrf_field()}}
            {{ Form::bsText('name', '分类名称',old('name') )}}
            {{ Form::bsSelect('parent_id', '父结点',old('parent_id'),$menuPresenter->fillCategories($categories))}}
            {{ Form::bsButton() }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection