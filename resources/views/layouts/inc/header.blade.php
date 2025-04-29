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
        color: #ffffff !important;
        /* FULL PUTIH */
        font-size: 1.8rem;
        cursor: pointer;
        margin-left: 20px;
        /* kasih jarak dikit dari logo */
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

    /* Running text wrapper */
    .running-text-wrapper {
        overflow: hidden;
        white-space: nowrap;
        flex-grow: 1;
        margin: 0 20px;
        /* kanan dan kiri jarak sedikit */
        position: relative;
    }

    /* Running text */
    .running-text {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 15s linear infinite;
        font-weight: 500;
        color: #ffffff;
        /* putih supaya kelihatan */
        font-size: 1rem;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0%);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    /* Logout icon */
    .logout-icon {
        font-size: 1.6rem;
        color: #ffd9b3;
        position: relative;
        z-index: 2;
    }

    .logout-icon:hover {
        color: #ffc266;
    }
</style>

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center">
        <a href="/" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">☕ Cafe Ghibli</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i> <!-- Sidebar icon, putih -->
    </div>

    <nav class="header-nav ms-auto d-flex align-items-center w-100">
        <div class="nav-link nav-profile d-flex align-items-center pe-3 w-100 position-relative">

            <!-- Running text -->
            <div class="running-text-wrapper">
                <div class="running-text">
                    @if (auth()->check())
                        Hallo {{ auth()->user()->name }} , Selamat Datang di Cafe Ghibli ✨
                    @else
                        Selamat Datang di Cafe Ghibli, Guest ✨
                    @endif
                </div>
            </div>

            <!-- Logout icon -->
            @if (auth()->check())
                <a href="/logout" class="logout-icon ms-auto">
                    <i class="bi bi-box-arrow-right"></i> <!-- Logout icon -->
                </a>
            @endif

        </div>
    </nav>

</header>
<!-- End Header -->
