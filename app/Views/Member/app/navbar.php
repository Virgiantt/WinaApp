<!-- Topbar -->
<div class="bg-orange">
    <div class="container">
        <nav class="navbar navbar-expand navbar-light bg-orange topbar mb-4 static-top" style="background: #f3a819">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->

            <img src="<?= base_url("assets/img/logo winaya laksa.png") ?>" width="180">
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-lg-inline text-white small">
                            <?= session()->get('nama_siswa') ?? 'Guest'; ?>
                        </span>
                        <i class="fas fa-user text-white p-3"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
    </div>
</div>
<!-- End of Topbar -->