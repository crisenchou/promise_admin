@extends('layouts.app')
@section('title','home')
@section('page-content')
    <div class="row">
        <div class="col-md-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="panel panel-default">
                <div class="panel-heading">尊敬的{{$user->name or 'user'}}</div>
                <div class="panel-body">
                    欢迎登陆本后台管理系统
                </div>
            </div>
        </div>
    </div>
@endsection