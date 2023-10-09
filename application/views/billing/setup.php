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
            <a href="<?= base_url('setup_billing/tambah'); ?>" class="btn btn-primary mb-2 btn-add" id="btnadd">
                Buat Invoice
            </a>
            <div class="card">
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Nama Kampus</th>
                                    <th width="15%">Email Kampus</th>
                                    <th width="10%">Status Aktif</th>
                                    <th width="8%">Nominal Tagihan</th>
                                    <th>Potongan</th>
                                    <th width="10%">Total Tagihan</th>
                                    <th width="13%">Tanggal Awal</th>
                                    <th width="13%">Tanggal Akhir</th>
                                    <th width="10%">Periode Penagihan</th>
                                    <th width="5%">Status Penagihan</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($billing as $b) : ?>

                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $b['name_client']; ?></td>
                                        <td><?= $b['email']; ?></td>
                                        <td><?= $b['name_ak']; ?></td>
                                        <td><?= $b['nominal_tagihan']; ?></td>
                                        <td><?= $b['potongan']; ?></td>
                                        <td><?= $b['total_tagihan']; ?></td>
                                        <td><?= date_format(new DateTime($b['tanngal_awal']), "D d-M-Y "); ?></td>
                                        <td><?= date_format(new DateTime($b['tanggal_akhir']), "D d-M-Y "); ?></td>
                                        <td><?= $b['name_periode']; ?></td>
                                        <td><?= $b['name_pen']; ?></td>
                                        <td><?= $b['name_in']; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="<?= base_url('Setup_billing/edit/' . $b['id']); ?>" class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('Setup_billing/delete/' . $b['id']); ?>" class="btn btn-danger btn-hapus"><i class="fas fa-trash"></i></a>
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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    let table = $("#dataTable").DataTable();

    $("#dataTable tbody").on("click", "tr", function() {
        let data = table.row(this).data();
    });
</script>