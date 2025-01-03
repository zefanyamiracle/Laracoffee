<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            @can("is_admin")
            <div class="sb-sidenav-menu-heading">Administrator</div>
            <a class="nav-link" href="/home">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="/home/customers">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-solid fa-users"></i></div>
                Customers
            </a>
            <a class="nav-link" href="/transaction">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-dollar-sign"></i></div>
                Transaksi
            </a>
            <a class="nav-link" href="/broadcast">
                <div class="sb-nav-link-icon"><i class="bi bi-broadcast"></i></div>
                Broadcast
            </a>
            
            @else
            <div class="sb-sidenav-menu-heading">Customer</div>
            <a class="nav-link" href="/home">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-home-alt"></i></i></div>
                Beranda
            </a>
            <a class="nav-link" href="/point/user_point">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-paw"></i></div>
                Loyalty Point
            </a>
            @endcan

            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link" href="/product">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-fw fa-dumpster"></i></div>
                Produk
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
              aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-fw fa-columns"></i></div>
                Pesan
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-fw fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/order/order_data">Daftar Pesanan</a>
                    <a class="nav-link" href="/order/order_history">Riwayat Pesanan</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Anda login sebagai:</div>
        {{ auth()->user()->role->role_name }}
    </div>
</nav>