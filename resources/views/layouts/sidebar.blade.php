<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/images/logo-notext.png') }}" alt="logo" width="32px">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">{{ config('app.name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('prices') ? 'active' : '' }}">
            <a href="{{ route('prices.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-coin"></i>
                <div data-i18n="Harga">Harga</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('stocks') ? 'active' : '' }}">
            <a href="{{ route('stocks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-warehouse"></i>
                <div data-i18n="Persediaan">Persediaan</div>
            </a>
        </li>
        @if (auth()->user()->role === 1)
            <li class="menu-item {{ request()->is('commodities') ? 'active' : '' }}">
                <a href="{{ route('commodities.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-leaf"></i>
                    <div data-i18n="Komoditas">Komoditas</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('markets') ? 'active' : '' }}">
                <a href="{{ route('markets.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building-store"></i>
                    <div data-i18n="Pasar">Pasar</div>
                </a>
            </li>
            <li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div data-i18n="Pengguna">Pengguna</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
