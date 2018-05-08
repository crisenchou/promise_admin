@extends('layouts.auth')
@section('title','register')
@section('box')
    <div class="login_wrapper">
        <div class="animate form">
            <section class="login_content">
                <form method="post">
                    <h1>{{__('pagination.register_form')}}</h1>
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="{{__('pagination.username')}}"
                               required="" value="{{old('name')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{__('pagination.email')}}"
                               required="" value="{{old('email')}}"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control"
                               placeholder="{{__('pagination.password')}}"
                               required=""/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="{{__('pagination.password_again')}}"
                               required=""/>
                    </div>
                    {{--<div>--}}
                    {{--<input type="text" class="form-control" placeholder="{{__('pagination.captcha')}}" required=""/>--}}
                    {{--</div>--}}


                    <div class="form-group">
                        <button class="btn btn-default submit" href="#">{{__('pagination.register')}}</button>
                    </div>


                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="{{route('login')}}" class="to_register">{{__('pagination.sign_in')}}</a>
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

