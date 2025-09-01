<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">Ele-Ecommerce</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Main
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-header">
                Category
            </li>
            <li class="sidebar-item {{ request()->routeIs('category.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('category.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('category.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('category.manage') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-header">
               Sub Category
            </li>
            <li class="sidebar-item {{ request()->routeIs('subcategory.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('subcategory.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('subcategory.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('subcategory.manage') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-header">
               Product
            </li>
            <li class="sidebar-item {{ request()->routeIs('product.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('product.create') }}">
                    <i class="align-middle" data-feather="star"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('product.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('product.manage') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('product.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('product.manage') }}">
                    <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Manage Review</span>
                </a>
            </li>
             <li class="sidebar-header">
               History
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.cart.history') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.cart.history') }}">
                    <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Cart</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.order.history') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.order.history') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Order</span>
                </a>
            </li>
            <li class="sidebar-header">
               Attributes
            </li>
            <li class="sidebar-item {{ request()->routeIs('productattributes.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('productattributes.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('productattributes.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('productattributes.manage') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-header">
               Discount
            </li>
            <li class="sidebar-item {{ request()->routeIs('discount.create') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('discount.create') }}">
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('discount.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('discount.manage') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('admin.setting') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.setting') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Settings</span>
                </a>
            </li>
        </ul>
    </div>
</nav>