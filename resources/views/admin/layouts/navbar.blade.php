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
                    <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Create</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('product.manage') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('product.manage') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Manage</span>
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

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-profile.html">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Sign In</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="pages-sign-up.html">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Sign
                        Up</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a class="sidebar-link" href="pages-blank.html">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Blank</span>
                </a>
            </li>

            <li class="sidebar-header">
                Tools & Components
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i> <span class="align-middle">Buttons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Forms</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Cards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-typography.html">
                    <i class="align-middle" data-feather="align-left"></i> <span class="align-middle">Typography</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div>
    </div>
</nav>