@if(isset($menusTree) && count($menusTree))
    <ul class="nav nav-list">
        <li class="hover">
            <a href="{{route('home')}}">
                <i class="menu-icon fa fa-tachometer"></i>
                <span class="menu-text"> 控制台 </span>
            </a>
            <b class="arrow"></b>
        </li>

        @each('components.widget.menus.item',$menusTree,'menu')
    </ul><!-- /.nav-list -->
@endif