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
            <button class="btn btn-primary mb-3" id="btnadd">Add Level</button>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="table-resposive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;text-align: center;">No</th>
                                    <th style="width: 80%;">Nama Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($level as $l) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++; ?></td>
                                        <td><a href="<?= base_url('level_akses/roleakses/' . $l['id'])  ?>" class="btn-action" data-id="<?= $l['role'] ?>" style="text-decoration: none; color:black;"><?= $l['role']; ?></a></td>
                                        <td>
                                             <a href="" class="btn btn-secondary"><i class="fas fa-pen"></i></a>|<a href="" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></a> 
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-secondary btn-leveledit" data-id="<?= $l['id']; ?>" data-role="<?= $l['role']; ?>"><i class="fas fa-pen"></i></a>
                                                <a class="btn btn-danger btn-hapus" href="<?= base_url('level/deleterole/'); ?><?= $l['id']; ?>"><i class="fas fa-trash-alt"></i></a>
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
                        <h5 class="card-title"></h5>

                        <!-- Table with stripped rows -->
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;text-align: center;">No</th>
                                    <th style="width: 80%;">Nama Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($level as $l) : ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++; ?></td>
                                        <td><a href="<?= base_url('level_akses/roleakses/' . $l['id'])  ?>" class="btn-action" data-id="<?= $l['role'] ?>" style="text-decoration: none; color:black;"><?= $l['role']; ?></a></td>
                                        <td>
                                            <!-- <a href="" class="btn btn-secondary"><i class="fas fa-pen"></i></a>|<a href="" class="btn btn-danger btn-hapus"><i class="fas fa-trash-alt"></i></a> -->
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a type="button" class="btn btn-secondary btn-leveledit" data-id="<?= $l['id']; ?>" data-role="<?= $l['role']; ?>"><i class="fas fa-pen"></i></a>
                                                <a class="btn btn-danger btn-hapus" href="<?= base_url('level/deleterole/'); ?><?= $l['id']; ?>"><i class="fas fa-trash-alt"></i></a>
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
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('level/addrole'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-label">Name Role</label>
                        <input type="text" class="form-control" name="role" id="role">
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
<div class="modal fade" id="EditLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('level/updaterole'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="EditId" name="id">
                        <label for="" class="form-label">Name Role</label>
                        <input type="text" class="form-control" name="role" id="EditRole">
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


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();

    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>