<?php $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); ?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <!-- Right navbar links -->
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
</nav>