<!-- ======= Sidebar ======= -->
<style>
    /* Sidebar background & style */
    .sidebar {
        background-color: #fff8f0;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        height: 100vh;
        padding-top: 1rem;
    }

    /* Sidebar nav */
    .sidebar-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    /* Sidebar nav links */
    .sidebar .nav-link {
        color: #6f4e37;
        padding: 0.75rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        transition: background-color 0.3s, color 0.3s;
        font-size: 0.95rem;
    }

    .sidebar .nav-link:hover {
        background-color: #f1e9db;
        color: #5a3c2d;
        text-decoration: none;
    }

    /* Active link */
    .sidebar .nav-link:not(.collapsed) {
        background-color: #f1e9db;
        font-weight: 600;
        color: #5a3c2d;
    }

    /* Icons */
    .sidebar .bi {
        font-size: 1.2rem;
        color: inherit;
    }

    /* Submenu (collapse) styling */
    .sidebar .nav-content {
        padding-left: 1.5rem;
        margin-top: 0.5rem;
    }

    .sidebar .nav-content a {
        color: #6f4e37;
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar .nav-content a:hover {
        background-color: #f8ede3;
        color: #5a3c2d;
        text-decoration: none;
    }

    .sidebar .nav-content a:not(.collapsed) {
        background-color: #f1e9db;
        font-weight: 500;
    }
</style>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <!-- Dashboard / Stok Barang -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>
                    @anyrole(['Kasir', 'Pimpinan'])
                    Stok Barang
                @endrole

                @role('Administrator')
                    Dashboard
                @endrole
            </span>
        </a>
    </li>

    <!-- Kasir Role -->
    @role('Kasir')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('pos-sale') ? '' : 'collapsed' }}" href="/pos-sale">
                <i class="bi bi-bag"></i>
                <span>Kasir</span>
            </a>
        </li>
    @endrole

    <!-- Pimpinan Role -->
    @role('Pimpinan')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('pos') ? '' : 'collapsed' }}" href="/pos">
                <i class="bi bi-bar-chart"></i>
                <span>Laporan Penjualan</span>
            </a>
        </li>
    @endrole

    <!-- Administrator Role -->
    @role('Administrator')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('category*', 'user', 'product') ? '' : 'collapsed' }}"
                data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav"
                class="nav-content collapse {{ Request::is('category*', 'user*', 'product') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ Request::is('category*') ? '' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Category</span>
                    </a>
                </li>
                <li>
                    <a href="/users" class="nav-link {{ Request::is('user') ? '' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="/product" class="nav-link {{ Request::is('product') ? '' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('pos', 'pos-sale') ? '' : 'collapsed' }}" data-bs-target="#forms-nav"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Pos Manage</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse {{ Request::is('pos', 'pos-sale') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/pos-sale" class="nav-link {{ Request::is('pos-sale') ? '' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>Pos Sale</span>
                    </a>
                </li>
                <li>
                    <a href="/pos" class="nav-link {{ Request::is('pos') ? '' : 'collapsed' }}">
                        <i class="bi bi-circle"></i><span>POS</span>
                    </a>
                </li>
            </ul>
        </li>
    @endrole

</ul>

</aside><!-- End Sidebar-->
