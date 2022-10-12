<ul>
    @foreach ($menuData as $menu)
        <li class="{{ Route::currentRouteName() === $menu->slug ? 'active' : '' }} ">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}">

                {!! $menu->icon ?? '<i class="ti-angle-double-right"></i>' !!}

                <span class="menu-title text-truncate">{{ $menu->name }}</span>
            </a>
            @if (isset($menu->submenu))
                <x-site.dashboard.sub-menu :menuData="$menu->submenu" />
            @endif
        </li>
    @endforeach
</ul>
