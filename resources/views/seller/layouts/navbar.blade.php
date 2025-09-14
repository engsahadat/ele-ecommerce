<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Ele-Ecommerce</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor.order.history') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor.order.history') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="list">Order History</span>
                </a>
            </li>
            <li class="sidebar-header">
                Store
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor.store.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor.store.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor.store.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor.store.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-header">
                Product
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor.product.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor.product.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('vendor.product.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('vendor.product.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
        </ul>
    </div>
</nav>