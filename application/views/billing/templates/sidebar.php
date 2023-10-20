<aside id="sidebar" class="sidebar">
    <?php
    $role_id = $this->session->userdata('role_id');
    $this->db->select('user_menu.id, menu, icon, url, Active, kategori');
    $this->db->from('user_menu');
    $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
    $this->db->where('user_access_menu.role_id', $role_id);
    $this->db->order_by('user_menu.urut', 'ASC');
    $menu = $this->db->get()->result_array();
    ?>
    <ul class="sidebar-nav" id="sidebar-nav">
        <?php foreach ($menu as $m) :
        ?>
            <?php if ($m['Active'] == 1 && $m['kategori'] == 'Billing') : ?>
                <li class="nav-item">
                    <?php if (!empty($m['url'])) : ?>
                        <a href="<?= base_url($m['url']) ?>" class="nav-link collapsed" data-bs-target="#_<?= $m['id'] ?>">
                        <?php else : ?>
                            <a href="#" class="nav-link collapsed" data-bs-target="#_<?= $m['id'] ?>" data-bs-toggle="collapse">
                            <?php endif ?>

                            <i class="<?= $m['icon'] ?>"></i><span><?= $m['menu']; ?></span>
                            <?php if (empty($m['url'])) : ?>
                                <i class="bi bi-chevron-down ms-auto"></i>
                            <?php endif; ?>
                            </a>
                            <?php
                            $menuId = $m['id'];
                            $this->db->select('user_sub_menu.* ');
                            $this->db->from('user_sub_menu');
                            $this->db->where('menu_id', $menuId);
                            $this->db->where('is_active', 1);
                            $subMenu = $this->db->get()->result_array();
                            foreach ($subMenu as $sm) : ?>
                                <ul id="_<?= $sm['menu_id']; ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                    <li>
                                        <a href="<?= base_url($sm['url']); ?>">
                                            <i class="bi bi-circle"></i><span><?= $sm['title']; ?></span>
                                        </a>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>

</aside><!-- End Sidebar-->