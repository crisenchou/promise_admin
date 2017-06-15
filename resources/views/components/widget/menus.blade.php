@if(isset($menusTree) && count($menusTree))
    <ul class="nav nav-list">
        <li class="hover">
            <a href="{{url('/')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> 控制台 </span>
            </a>
            <b class="arrow"></b>
        </li>
        @foreach($menusTree as $menu)
            <li @if($menu->active) class="active" @endif>
                @if(count($menu->subMenu))
                    <a href="{{url($menu->url)}}" class="dropdown-toggle">
                        <i class="menu-icon fa {{$menu->icon or 'fa-tachometer'}}"></i>
                        <span class="menu-text">
								{{$menu->name}}
							</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>
                    <b class="arrow"></b>
                    @if(count($menu->subMenu))
                        <ul class="submenu">
                            @foreach($menu->subMenu as $submenu)
                                <li>
                                    <a href="{{url($submenu->url)}}" target="{{$submenu->target}}">
                                        <i class="menu-icon fa {{$submenu->icon or 'fa-tachometer'}}"></i>
                                        <span class="menu-text">	{{$submenu->name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @else
                    <a href="{{url($menu->url)}}" target="{{$menu->target}}">
                        <i class="menu-icon fa {{$menu->icon or 'fa-tachometer'}}"></i>
                        <span class="menu-text">
								{{$menu->name}}
                        </span>
                    </a>
                @endif
            </li>
        @endforeach
    </ul><!-- /.nav-list -->
@endif
