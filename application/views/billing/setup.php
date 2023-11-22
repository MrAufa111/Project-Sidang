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
                        <h5 class="card-title justify-content-end d-flex"><a href="<?= base_url('Setup_billing/Spreadsheet_export'); ?>" class="btn btn-success mb-3">Download Excel</a></h5>
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
                                                <!-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                    <a href="<?= base_url('Setup_billing/edit/' . $b['id']); ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="<?= base_url('Setup_billing/delete/' . $b['id']); ?>" class="btn btn-danger btn-hapus"><i class="bi bi-trash"></i></a>
                                                    <a class="btn btn-primary btn-email" data-email="<?= $b['email'] ?>" data-username="<?= $b['name_client'] ?>"><i class="ri-mail-check-fill "></i></a>
                                                </div> -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="<?= base_url('Setup_billing/edit/' . $b['id']); ?>"><i class="bi bi-pencil-square"></i>Edit</a></li>
                                                        <li><a class="dropdown-item btn-hapus" href="<?= base_url('Setup_billing/delete/' . $b['id']); ?>"><i class="bi bi-trash"></i>Delete</a></li>
                                                        <li><a class="dropdown-item btn-email" style="cursor: pointer;" data-email="<?= $b['email'] ?>" data-username="<?= $b['name_client'] ?>"><i class="ri-mail-check-fill "></i>Kirim Email</a></li>

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

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        let table = $("#dataTable").DataTable();
    });

    $(document).on("click", ".btn-email", function(e) {
        e.preventDefault();
        const href = $(this).attr("href");

        Swal.fire({
            title: 'Apakah Kamu akan Mengirim invoice?',
            text: "Pastikan semua nya sudah benar",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kirim!'
        }).then((result) => {
            if (result.isConfirmed) {
                let email = $('.btn-email').data('email');
                let username = $('.btn-email').data('username');
                $.ajax({
                    url: "<?= base_url('Setup_billing/kirimemail') ?>",
                    type: 'POST',
                    data: {
                        username: username,
                        email: email
                    },
                    success: (function() {
                        console.log('success');
                    }),
                    error: (function(error) {
                        console.log(error)
                    })
                })
            }
        });
    });
</script>