<!-- ======= Header ======= -->
<style>
    /* Header background */
    .header {
        background-color: #4b3621 !important;
        /* espresso brown */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    /* Logo text */
    .header .logo span {
        color: #fff;
        font-weight: 600;
        font-size: 1.2rem;
    }

    /* Toggle sidebar icon */
    .toggle-sidebar-btn {
        color: #fff;
        font-size: 1.4rem;
    }

    /* Profile area text */
    .header .nav-profile span {
        color: #fff;
    }

    .header .nav-profile a {
        color: #ffd9b3;
        /* soft orange-ish for logout */
        text-decoration: none;
        font-weight: 500;
    }

    .header .nav-profile a:hover {
        color: #ffc266;
    }

    /* Optional: Logo img size */
    .header .logo img {
        height: 32px;
        margin-right: 8px;
    }

    .toggle-sidebar-btn {
        color: #ffffff !important;
        /* Putih */
        font-size: 1.5rem;
        cursor: pointer;
    }
</style>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block"> ☕ Cafe Ghibli</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <div class="nav-link nav-profile d-flex align-items-center pe-3">
            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
            <span class=" d-block">
                @if (auth()->check())
                    Hi Selamat Datang, {{ auth()->user()->name }}
                    <a href="/logout" class="ms-2">
                        <i class="bi bi-box-arrow-in-left"></i>
                    </a>
                @else
                    Guest
                @endif
            </span>
        </div>
    </nav>


</header>
<!-- End Header -->
