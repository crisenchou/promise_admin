@if(isset($menusTree) && count($menusTree))
    <ul class="nav nav-list">
        @foreach($menusTree as $menu)
            <li class="active">
                <a href="{{$menu->url}}" @if($menu->subMenu) class="dropdown-toggle" @endif>
                    <i class="menu-icon fa {{$menu->icon or 'fa-tachometer'}}"></i>
                    <span class="menu-text">
								{{$menu->name}}
							</span>
                    @if($menu->subMenu)
                        <b class="arrow fa fa-angle-down"></b>
                    @endif
                </a>
                <b class="arrow"></b>
                @if($menu->subMenu)
                    <ul class="submenu">
                        @foreach($menu->subMenu as $submenu)
                            <li class="">
                                <a href="{{$submenu->url}}" @if($submenu->submenu) class="dropdown-toggle" @endif>
                                    <i class="menu-icon fa {{$submenu->icon or 'fa-tachometer'}}"></i>
                                    <span class="menu-text">	{{$submenu->name}}</span>
                                    @if($submenu->submenu)
                                        <b class="arrow fa fa-angle-down"></b>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul><!-- /.nav-list -->
@endif
