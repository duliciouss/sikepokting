<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('prices') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ route('prices.index') }}">
                <i data-feather='dollar-sign'></i><span class="menu-title text-truncate" data-i18n="Home">Harga</span>
            </a>
        </li>
        <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Data Master</span><i
                data-feather="more-horizontal"></i>
        </li>
        <li class="nav-item {{ request()->is('commodities') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ route('commodities.index') }}">
                <i data-feather="tag"></i><span class="menu-title text-truncate" data-i18n="Home">Komoditas</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('markets') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ route('markets.index') }}">
                <i data-feather='shopping-cart'></i><span class="menu-title text-truncate" data-i18n="Home">Pasar</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
            <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                <i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Home">Pengguna</span>
            </a>
        </li>
    </ul>
</div>
