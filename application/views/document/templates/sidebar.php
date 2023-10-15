<?php $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Dashboard'); ?>" class="brand-link" style="text-decoration: none;">
        <img src="<?= base_url(); ?>/assets/img/adminLTE/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CMS</span>
    </a>
    <nav class="mt-2">
        <?php
        $kategori = $this->input->get('kategori');
        $role_id = $this->session->userdata('role_id');
        $this->db->select('user_menu.id, menu, icon, url, Active, kategori');
        $this->db->from('user_menu');
        $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
        $this->db->where('user_access_menu.role_id', $role_id);
        // $this->db->where('user_menu.kategori', $kategori);
        $this->db->order_by('user_access_menu.menu_id', 'ASC');
        $menu = $this->db->get()->result_array();

        ?>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <?php foreach ($menu as $m) :
            ?>
                <?php if ($m['Active'] == 1 && $m['kategori'] == 'Document') : ?>


                    <li class="nav-item">
                        <a href="<?= base_url($m['url']); ?>" class="nav-link">
                            <i class="nav-icon <?= $m['icon']; ?>"></i>
                            <p>
                                <?= $m['menu']; ?>
                                <?php if (empty($m['url'])) : ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif; ?>
                            </p>
                        </a>
                        <?php
                        $menuId = $m['id'];
                        $this->db->select('*');
                        $this->db->from('user_sub_menu');
                        $this->db->where('menu_id', $menuId);
                        $this->db->where('is_active', 1);
                        $subMenu = $this->db->get()->result_array();
                        foreach ($subMenu as $sm) : ?>

                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <p><?= $sm['title']; ?></p>
                                    </a>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </nav>

</aside>