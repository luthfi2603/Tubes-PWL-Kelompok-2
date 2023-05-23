<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mt-3">
                <a class="nav-link {{ Request::is('admin') ? 'active' : ''}}" aria-current="page" href="/admin">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/users*') ? 'active' : ''}}" href="/admin/users">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/products*') ? 'active' : ''}}" href="/admin/products">
                    <span data-feather="package" class="align-text-bottom"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/pesanan*') ? 'active' : ''}}" href="/admin/pesanan">
                    <span data-feather="shopping-bag" class="align-text-bottom"></span>
                    Pesanan
                </a>
            </li>
        </ul>
    </div>
</nav>