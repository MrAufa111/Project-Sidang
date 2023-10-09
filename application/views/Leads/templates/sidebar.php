<?php
$this->session->set_userdata(['email' => $this->input->post('email')]);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            $this->db->select('*');
            $this->db->from('user_sub_menu');
            $this->db->join('user_menu','user_sub_menu.menu_id = user_menu.id');
            $submenu = $this->db->get()->result_array();
            // var_dump($submenu);
            // exit;
            ?>

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php foreach ($submenu as $sm) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url($sm['url']) ; ?>" class="nav-link">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <p>
                                <?= $sm['title']; ?>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</aside>