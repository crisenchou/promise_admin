<div id="navbar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <div class="navbar-header pull-left">
            <a href="{{url('/')}}" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    {{config('app.name')}}
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                {{--@include('partial.task')--}}
                {{--@include('partial.notify')--}}
                {{--@include('partial.message')--}}
                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{url('assets/images/avatars/user.jpg')}}"
                             alt="Jason's Photo"/>
                        <span class="user-info">	<small>欢迎,</small> {{$user->name or ''}}</span>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="{{route('settings')}}">
                                <i class="ace-icon fa fa-cog"></i>
                                设置
                            </a>
                        </li>
                        <li>
                            <a href="{{route('profile')}}">
                                <i class="ace-icon fa fa-user"></i>
                                个人中心
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#" onclick="return $('#logout').submit()">
                                <form id="logout" action="{{route('logout')}}" type="post">
                                    {{csrf_field()}}
                                    <i class="ace-icon fa fa-power-off"></i>
                                    退出
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.navbar-container -->
</div>