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
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
                </ol>
            </div>
        </div>
    </div>
</section> -->

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
            <button type="button" class="btn btn-primary mb-2 btn-add" id="btnadd">
                Add Menu
            </button>
            <div class="table-responsive mt-2">
                <table class="table" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th style="width: 5%;text-align: center;">NO</th>
                            <th style="width:60%;">Nama Sub Menu</th>
                            <th style="width: 10%;">Url</th>
                            <th style="width: 10%;">Status</th>
                            <th style="width: 8%;">Icon</th>
                            <th style="text-align: center;width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($menu as $m) : ?>
                            <tr>
                                <td style="text-align: center;"><?= $i++; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>submenu/index/<?= $m['id']; ?>" style="text-decoration: none; color: gray;"><?= $m['menu']; ?></a>
                                </td>
                                <td><?= $m['url']; ?></td>
                                <td><?= $m['name']; ?></td>
                                <td><?= $m['icon']; ?></td>
                                <td class="d-flex justify-content-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a type="button" class="btn btn-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#editMenuModal" data-kategori="<?= $m['kategori']; ?>" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>" data-url="<?= $m['url']; ?>" data-active="<?= $m['Active']; ?>" data-icon="<?= $m['icon']; ?>"><i class="fas fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section> -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <button type="button" class="btn btn-primary mb-2 btn-add" id="btnadd">
                                Add Menu
                            </button></h5>
                        <table class="table" id="dataTable" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;text-align: center;">NO</th>
                                    <th style="width:60%;">Nama Sub Menu</th>
                                    <th style="width: 10%;">Url</th>
                                    <th style="width: 10%;">Status</th>
                                    <th style="text-align: center;width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>submenu/index/<?= $m['id']; ?>" style="text-decoration: none; color: gray;"><?= $m['menu']; ?></a>
                                        </td>
                                        <td><?= $m['url']; ?></td>
                                        <td><?= $m['name']; ?></td>
                                        <td class="d-flex justify-content-center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-secondary btn-edit" data-bs-toggle="modal" data-bs-target="#editMenuModal" data-kategori="<?= $m['kategori']; ?>" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>" data-url="<?= $m['url']; ?>" data-active="<?= $m['Active']; ?>" data-icon="<?= $m['icon']; ?>"><i class="bi bi-pencil-square"></i></a>
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

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Menu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('menu/save'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editMenuName" class="form-label fs-6">Menu Name</label>
                        <input class="form-control <?= form_error('menu') ? 'is-invalid' : ''; ?>" name="menu" id="menu" type="text" placeholder="Enter name menu">
                        <div class="invalid-feedback">
                            <?= form_error('menu'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="form-label">Url</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Url...">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="Editkategori">
                            <option Selected>Select Kategori</option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Icon</label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="toggleUrlInput">
                            <label class="form-check-label" for="toggleUrlInput">
                                Url??
                            </label>
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="Active" name="is_active" value="1">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Publis?</label>
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

<!-- Modal untuk edit menu -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/editMenu'); ?>" method="POST">
                    <div class="form-group">
                        <!-- Periksa atribut name pada input hidden -->
                        <input type="hidden" name="editId" id="editId" value="">
                        <label for="editMenuName" class="form-label">Menu Name</label>
                        <!-- Periksa atribut name pada input teks -->
                        <input type="text" class="form-control" id="editMenuName" name="editMenuName">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Url</label>
                        <input type="text" class="form-control" name="url" id="Editurl" placeholder="Url...">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="Editkategori">
                            <option value=""></option>
                            <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['name']; ?>"><?= $k['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Icon</label>
                        <input type="text" class="form-control" name="icon" id="EditIcon" placeholder="Icon...">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="toggleUrlInpute">
                            <label class="form-check-label" for="toggleUrlInput">
                                Url??
                            </label>
                        </div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="EditActive" name="is_active" value="Publish">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Publis?</label>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    var table = $("#dataTable").DataTable();

    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
    document.addEventListener("DOMContentLoaded", function() {
        const toggleUrlInput = document.getElementById("toggleUrlInput");
        const urlInput = document.getElementById("url");

        toggleUrlInput.addEventListener("change", function() {
            urlInput.readOnly = !toggleUrlInput.checked;
        });

        urlInput.readOnly = !toggleUrlInput.checked;
    });
    document.addEventListener("DOMContentLoaded", function() {
        const toggleUrlInput = document.getElementById("toggleUrlInpute");
        const urlInput = document.getElementById("Editurl");

        toggleUrlInput.addEventListener("change", function() {
            urlInput.readOnly = !toggleUrlInput.checked;
        });

        urlInput.readOnly = !toggleUrlInput.checked;
    });

    document.addEventListener("DOMContentLoaded", function() {
        const toggleUrlInput = document.getElementById("toggleUrlInput");
        const toggleActiveSwitch = document.getElementById("toggleActiveSwitch");

        toggleUrlInput.addEventListener("change", function() {
            // ...
        });

        toggleActiveSwitch.addEventListener("change", function() {
            if (toggleActiveSwitch.checked) {
                toggleActiveSwitch.value = 'Publish';
            } else {
                toggleActiveSwitch.value = 'Not Publish';
            }
        });

        toggleActiveSwitch.value = 'Not Publish';
        toggleActiveSwitch.checked = false;
    });
</script>