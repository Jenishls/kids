<nav class="menu">
    <ul class="mainmenu">
        @foreach ($menus as $key => $menu)
        {{-- {{dd($menu->childMenus)}} --}}
            @if (count($menu->childMenus)>0)
                <li class=" @if($key === 0) current @endif dropdown-trigger"><a href="#"><span class="{{$menu->icon_class}}"></span>{{ucwords($menu->name)}}</a>
                    <ul class="dropdown-content">
                        @foreach ($menu->childMenus as $childMenu)
                            @if (strtolower($menu->name) === 'home')
                                <li><a class="load_home" onclick="location.reload();">{{ucwords($childMenu->name)}}</a></li>
                            @else
                                <li><a class="load_pages" data-route="{{$childMenu->route}}">{{ucwords($childMenu->name)}}</a></li>
                            @endif
                            
                        @endforeach
                        {{-- <li><a class="load_pages" data-route="/netlifytemp/home2">home two</a></li>
                        <li><a >home three</a></li> --}}
                    </ul>
                </li>
            @else
                <li><a class="load_pages" data-route="{{$menu->route}}"> <span class="{{$menu->icon_class}}"></span>{{ucwords($menu->name)}}</a></li>
            @endif
        @endforeach
        
    </ul>
</nav>