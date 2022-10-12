<div class="d-navigation">
    <ul id="metismenu">

        @forelse ($menuData[auth()->user()->role]->menu as $menu)
            <li @class([
                'active' => Route::currentRouteName() === $menu->slug,
            ])>
                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                    @isset($menu->submenu)
                    class="has-arrow"
                    @endisset>
                    <i class="side-bar-icon">
                        {!! $menu->icon !!}
                    </i>
                    <span class="menu-title text-truncate">{{ $menu->name }}</span>
                </a>
                @if (isset($menu->submenu))
                    <x-site.dashboard.sub-menu :menuData="$menu->submenu" />
                @endif
            </li>
        @empty
        @endforelse
    </ul>
</div>
