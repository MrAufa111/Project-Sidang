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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
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
            <h3 class="card-title">Menu Management</h3>

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
            <button type="button" class="btn btn-primary mb-3" id="btnadd">
                Add Sub Menu
            </button>
            <a href=" <?= base_url('menu'); ?>" class="btn btn-secondary mb-3">Back</a>

            <div class="table table-responsive">
                <table class="table" id="dataTable">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>Nama Sub Menu</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($subMenu as $m) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $m['title']; ?></td>
                                <td><?= $m['menu']; ?></td>
                                <td><?= $m['url']; ?></td>
                                <td><?= $m['icon']; ?></td>
                                <td><?= $m['name']; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class=" btn btn-secondary btn-subedit" data-id="<?= $m['id']; ?>" data-title="<?= $m['title']; ?>" data-menu_id="<?= $m['menu_id']; ?>" data-url="<?= $m['url']; ?>" data-icon="<?= $m['icon']; ?>" data-active="<?= $m['is_active']; ?>"><i class="fas fa-pen"></i></a></a>
                                        <a href="<?= base_url(); ?>submenu/deletemenu/<?= $m['id']; ?>" class=" btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Sub Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('submenu/save'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control <?= form_error('title') ? 'is-invalid' : ''; ?>" name="title" id="title" type="text" placeholder="Enter Sub menu">
                                <div class="invalid-feedback">
                                    <?= form_error('menu'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="menu_id" class="form-control form-select">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= form_error('url') ? 'is-invalid' : ''; ?>" name="url" id="url" type="text" placeholder="Enter Url Sub Menu">
                                <div class="invalid-feedback">
                                    <?= form_error('url'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= form_error('icon') ? 'is-invalid' : ''; ?>" name="icon" id="icon" type="text" placeholder="Enter Icon Sub Menu">
                                <div class="invalid-feedback">
                                    <?= form_error('icon'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="Active" name="is_active" value="1">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Publis?</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editSubmenuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSubmenuModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Sub Menu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('submenu/updateSubmenu'); ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="editId" id="editId">
                                <input class="form-control <?= form_error('title') ? 'is-invalid' : ''; ?>" name="title" id="editTitle" type="text" placeholder="Enter Sub menu" value="">
                                <div class="invalid-feedback">
                                    <?= form_error('title'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name="menu_id" id="editMenu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= form_error('url') ? 'is-invalid' : ''; ?>" name="url" id="editUrl" type="text" placeholder="Enter Url Sub Menu">
                                <div class="invalid-feedback">
                                    <?= form_error('url'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="form-control <?= form_error('icon') ? 'is-invalid' : ''; ?>" name="icon" id="editIcon" type="text" placeholder="Enter Icon Sub Menu">
                                <div class="invalid-feedback">
                                    <?= form_error('icon'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="editIs_active" name="is_active" value="1">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Publis?</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->


</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    var table = $("#dataTable").DataTable();

    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>