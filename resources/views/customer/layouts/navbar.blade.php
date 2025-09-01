<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Ele-Ecommerce</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('customer.history') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('customer.history') }}">
                    <i class="align-middle" data-feather="clipboard"></i> <span class="list">Order History</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('customer.affiliate') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('customer.affiliate') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="list">Affiliate</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('customer.payment') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('customer.payment') }}">
                    <i class="align-middle" data-feather="credit-card"></i> <span class="list">Payment</span>
                </a>
            </li>
        </ul>
    </div>
</nav>