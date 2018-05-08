@extends('layouts.auth')
@section('title','login')
@section('box')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="{{route('login')}}">
                    {{csrf_field()}}
                    <h1>{{__('pagination.login_form')}}</h1>
                    <div class="form-group">
                        @if($errors->count()) <span>{{$errors->first()}}</span> @endif
                        <input type="text" name="email" class="form-control" placeholder="{{__('pagination.username')}}"
                               required="" value="{{old('email')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"
                               placeholder="{{__('pagination.password')}}" required="" value="{{old('email')}}"/>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default submit" href="#">{{__('pagination.log_in')}}</button>
                        <a class="reset_pass" href="#">{{__('pagination.lost_password')}}</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">
                        <p class="change_link">{{__('pagination.new_member')}}
                            <a href="{{route('register')}}" class="to_register"> {{__('pagination.register_form')}}</a>
                        </p>
                        <div class="clearfix"></div>
                        <br/>
                        <div>
                            <h1><i class="fa fa-paw"></i> {{config('app.name')}}</h1>
                            <p>{{config('app.description')}}</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection

