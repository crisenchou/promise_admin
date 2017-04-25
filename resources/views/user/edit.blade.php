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

    {!! Form::model($user, ['route' => ['user.update', $user->id]]) !!}

    {{method_field('put')}}

    {{ Form::text('email', old('email'))}}

    {!! Form::close() !!}
@endsection