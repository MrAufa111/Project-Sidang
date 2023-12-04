<div class="swal" data-swal="<?= $this->session->flashdata('ingfo'); ?>"></div>
<div class="swal-notif" data-swalnotif="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>
            <?= $title ?>
        </h1>
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
                        <a href="<?= base_url('Document/tamdata') ?>" class="btn btn-primary mb-3"><i
                                class="fas fa-plus"></i> Add Data Document</a>
                        <div class="table table-responsive">
                            <table id="dataTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Client</th>
                                        <th>Jenis Document</th>
                                        <th>Content</th>
                                        <th>File</th>
                                        <th>Tanggal Pembuatan</th>
                                        <th>Tanggal Pengiriman</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1;
                                    foreach ($doc as $dc): ?>
                                        <tr>
                                            <td>
                                                <?= $id++ ?>
                                            </td>
                                            <td>
                                                <?= $dc->name_client ?>
                                            </td>
                                            <td>
                                                <?= $dc->jenis_document; ?>
                                            </td>
                                            <td>
                                            <?php
                                                $content =  $dc->content;
                                                if (strlen($content) > 50) {
                                                    $content = substr($content, 0, 50) . '...';
                                                        }
                                                 ?>
                                                  <?php echo $content; ?>

                                            </td>
                                            <td>
                                                <?= $dc->file; ?>
                                            </td>
                                            <td>
                                                <?= $dc->tanggal_pembuatan; ?>
                                            </td>
                                            <td>
                                                <?= $dc->tanggal_pengiriman; ?>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                    <ul class="dropdown-menu ">
                                                        <li><a href="<?= base_url('Document/editdc/' . $dc->id); ?>"
                                                                class="dropdown-item btn-edit"><i
                                                                    class="bi bi-pencil-square"></i>Edit</a></li>
                                                        <li><a href="<?= base_url('Setup_document/deletedata/' . $dc->id); ?>"
                                                                class="dropdown-item btn-delete mt-1"><i
                                                                    class="bi bi-trash"></i>Delete</a></li>
                                                        <li><a href="<?= base_url('Document/print/' . $dc->id); ?>"
                                                                class="dropdown-item btn-delete mt-1"><i class="bi bi-files"></i>Export</a></li>
                                                    </ul>
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
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        let table = $("#dataTable").DataTable();
    });
</script>