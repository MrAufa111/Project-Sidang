<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
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
                        <a href="<?= base_url('document/tamdata') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Data Document</a>
                        <a href="<?= base_url('server/save'); ?>" class="btn btn-info mb-3"><i class="fas fa-save"></i> SaveDc</a>
                        <div class="table table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <th scope="col">Id</th>
                                    <th scope="col">Client Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Document</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Tanggal Pembuatan</th>
                                    <th scope="col">Tanggal Pengiriman</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php
                                    foreach ($Document as $dc) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $dc['client_id']; ?></td>
                                            <td><?= $dc['name']; ?></td>
                                            <td><?= $dc['jenis_document']; ?></td>
                                            <td><?= $dc['content']; ?></td>
                                            <td><?= $dc['file']; ?></td>
                                            <td><?= $dc['tanggal_pembuatan']; ?></td>
                                            <td><?= $dc['tanggal_pengiriman']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                                    </button>
                                                    <ul class="dropdown-menu ">
                                                        <li><a href="<?= base_url('document/editdoc/' . $dc['id']); ?>" class="dropdown-item btn-edit"><i class="bi bi-pencil-square"></i>Edit</a></li>
                                                        <li><a href="<?= base_url('dash/print/'); ?>" class="dropdown-item btn-kirim"><i class="bi bi-printer"></i>Print</a></li>
                                                        <li><a href="<?= base_url('crud/hapusdoc/' . $dc['id']); ?>" class="dropdown-item btn-hapus mt-1" onclick="return confirm('Apa yakin akan di hapus?');"><i class="bi bi-trash"></i>Delete</a>
                                                    </ul>
                                                </div>
                                            <?php endforeach; ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>