<aside class="main-sidebar sidebar-dark-success elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img
            src="{{ asset("vendor/adminlte/dist/img/AdminLTELogo.png") }}"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
        />
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                    src="{{ asset("vendor/adminlte/dist/img/AdminLTELogo.png") }}"
                    class="img-circle elevation-2"
                    alt="User Image"
                />
            </div>
            <div class="info">
                <a href="#" class="d-block">John Doe</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Car units
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route("car.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list"></i>
                                <p>Cars List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("unit.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>List Unit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Driver
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route("driver.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list"></i>
                                <p>Driver List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p>Disewakan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Administrasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.sewa") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Disewa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.selesai") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-check-circle"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
