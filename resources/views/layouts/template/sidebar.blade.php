<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="{{ asset('theme/starter-kit/ltr/vertical-menu-template/') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('assets/images/logo-sikepokting.png') }}" alt="logo">
                    </span>
                    <h2 class="brand-text">{{ config('app.name', 'Laravel') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->is('prices') ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('prices.index') }}">
                    <i data-feather='dollar-sign'></i><span class="menu-title text-truncate"
                        data-i18n="Home">Harga</span>
                </a>
            </li>
            @if (auth()->user()->role === 1)
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Data Master</span><i
                        data-feather="more-horizontal"></i>
                </li>
                <li class="nav-item {{ request()->is('commodities') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('commodities.index') }}">
                        <i data-feather="tag"></i><span class="menu-title text-truncate"
                            data-i18n="Home">Komoditas</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('markets') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('markets.index') }}">
                        <i data-feather='shopping-cart'></i><span class="menu-title text-truncate"
                            data-i18n="Home">Pasar</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('users') ? 'active' : '' }}">
                    <a class="d-flex align-items-center" href="{{ route('users.index') }}">
                        <i data-feather='users'></i><span class="menu-title text-truncate"
                            data-i18n="Home">Pengguna</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
