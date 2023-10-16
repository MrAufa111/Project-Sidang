<?php
// $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); 
$this->db->select('user.* , user_role.role');
$this->db->from('user');
$this->db->join('user_role', 'user_role.id = user.role_id');
$this->db->where('username', $this->session->userdata('username'));
$user = $this->db->get()->row_array();

// var_dump($user);
// die;
?>
<!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown dropdown-hover">
            <span class="mr-2"><?= $user['username']; ?> |</span>
            <span class="mr-4" data-toggle="dropdown"><img src="<?= base_url(); ?>assets/img/profile.png" class="img-fluid" alt="" width="40"></span>

            <div class="dropdown-menu  dropdown-menu-right">
                <a class="nav-link dropdown-item" href="<?= base_url(); ?>auth/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>

            </div>
        </li>
    </ul>
</nav> -->

<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="<?= base_url('Dashboard') ?>" class="logo d-flex align-items-center">
            <img src="<?= base_url() ?>assets/img/Asset 14.png" alt="">
            <span class="d-none d-lg-block">SIMPEL</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['username']; ?> </span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $user['role']; ?> </h6>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="<?= base_url(); ?>auth/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->