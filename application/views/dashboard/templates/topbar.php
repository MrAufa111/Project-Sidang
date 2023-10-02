<?php $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); ?>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="navbar">
        <a href="#" class="navbar-brand  ml-4">
            <img src="<?= base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        </a>

    </div>
    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto align-items-end d-flex justify-content-end">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown-hover">

        </li>
        <li class="nav-item dropdown dropdown-hover">
            <span class="mr-2"><?= $user['username']; ?> |</span>
            <span class="mr-4" data-toggle="dropdown"><img src="<?= base_url(); ?>assets/img/profile.png" class="img-fluid" alt="" width="40"></span>

            <div class="dropdown-menu  dropdown-menu-right">
                <a class="nav-link dropdown-item" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
    </ul>
</nav>