@if(count($menu->submenu))
    {{-- 带子菜单--}}
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa {{$menu->icon}}"></i>
            <span class="menu-text">
                {{$menu->name}}
            </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            @each('components.widget.menus.item',$menu->submenu,'menu')
        </ul>
    </li>
@else
    {{--不带子菜单--}}
    <li class="">
        <a href="{{$menu->url}}">
            <i class="menu-icon fa {{$menu->icon}}"></i>
            <span class="menu-text">
            {{$menu->name}}
        </span>
        </a>
        <b class="arrow"></b>
    </li>
@endif