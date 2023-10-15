<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<!-- <section class="content-header">
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
    </div>
</section> -->

<!-- Main content -->
<!-- <section class="content">
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
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 80%;">Nama Role</th>
                                    <th colspan="4" style="text-align: center;">Action</th>
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
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?= check_akses($role['id'], $m['id'],); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                <label class="form-check-label" for="showCheck_<?= $m['id'] ?>">
                                                    Show
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-input="input{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="inputCheck_<?= $m['id'] ?>">
                                                    Input
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-update="update{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="updateCheck_<?= $m['id'] ?>">
                                                    Update
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-delete="delete{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="deleteCheck_<?= $m['id'] ?>">
                                                    Delete
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button type="button" id="saveAccess" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <!-- Table with stripped rows -->
                        <table class="table" id="">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">No</th>
                                    <th style="width: 80%;">Nama Role</th>
                                    <th colspan="4" style="text-align: center;">Action</th>
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
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" <?= check_akses($role['id'], $m['id'],); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                                <label class="form-check-label" for="showCheck_<?= $m['id'] ?>">
                                                    Show
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-input="input{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="inputCheck_<?= $m['id'] ?>">
                                                    Input
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-update="update{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="updateCheck_<?= $m['id'] ?>">
                                                    Update
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>" data-delete="delete{<?= $m['id']; ?>}">
                                                <label class="form-check-label" for="deleteCheck_<?= $m['id'] ?>">
                                                    Delete
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();

    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
    $('.form-check-input').on('click', function() {
        let roleId = this.getAttribute("data-role");
        let menuId = this.getAttribute("data-menu");
        let input_acc = this.getAttribute("data-input");
        let update_acc = this.getAttribute("data-update");
        let delete_acc = this.getAttribute("data-delete");
        console.log(roleId, menuId, input_acc, update_acc, delete_acc);
        $.ajax({
            url: "<?= base_url('level_akses/ubahakses'); ?>",
            type: 'POST',
            data: {
                menuId: menuId,
                roleId: roleId,
                input_acc: input_acc,
                delete_acc: delete_acc,
                update_acc: update_acc,
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