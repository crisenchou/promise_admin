@if(isset($menusTree) && count($menusTree))
    <ul class="nav nav-list">
        @foreach($menusTree as $menu)
            <li @if($menu->active) class="active" @endif>
                @if(count($menu->subMenu))
                    <a href="{{$menu->url}}" class="dropdown-toggle">
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
                                @if(count($submenu->subMenu))
                                    <li>
                                        <a href="{{$submenu->url}}" class="dropdown-toggle">
                                            <i class="menu-icon fa {{$submenu->icon or 'fa-tachometer'}}"></i>
                                            <span class="menu-text">	{{$submenu->name}}</span>
                                            <b class="arrow fa fa-angle-down"></b>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{$submenu->url}}">
                                            <i class="menu-icon fa {{$submenu->icon or 'fa-tachometer'}}"></i>
                                            <span class="menu-text">	{{$submenu->name}}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                @else
                    <a href="{{$menu->url}}">
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
