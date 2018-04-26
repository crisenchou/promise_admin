@extends('layouts.auth')
@section('title','login')
@section('box')
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{route('login')}}" method="post">
                    {{csrf_field()}}
                    <h1>{{__('pagination.login_form')}}</h1>
                    <div>
                        <input type="text" name="email" class="form-control" placeholder="{{__('pagination.username')}}"
                               required=""/>
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control"
                               placeholder="{{__('pagination.password')}}" required=""/>
                    </div>

                    {{--<div class="form-group">--}}
                    {{--<span> {{__('pagination.remember_me')}}</span>--}}
                    {{--<input type="checkbox" class="form-control" name="remember"/>--}}
                    {{--</div>--}}


                    <div>
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

