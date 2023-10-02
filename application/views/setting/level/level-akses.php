<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><?= $title; ?></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a style="text-decoration: none; color:black;" href="#">Home</a></li>
                    <li class="breadcrumb-item "><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">

                    <span class="h5">Role : <?= $role['role'] ?></span>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 80%;">Nama Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?= check_akses($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Show
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<script>
    $('.form-check-input').on('click', function() {
        var roleId = this.getAttribute("data-role");
        var menuId = this.getAttribute("data-menu");
        $.ajax({
            url: "<?= base_url('level_akses/ubahakses'); ?>",
            type: 'POST',
            data: {
                menuId: menuId,
                roleId: roleId,
            },
            success: function() {
                document.location.href = "<?= base_url('level_akses/roleakses/'); ?>" + roleId
            },
            error: function() {
                console.log('Error adding event');
            }

        });
    });
</script>