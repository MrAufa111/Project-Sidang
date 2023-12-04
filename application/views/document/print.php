<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
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
                <li class="breadcrumb-item active">Export</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <form action="<?= base_url('Setup_document/tambah'); ?>" method="post" class="row g-3">
                            <div class="col-md-6">

                                <body onload="window.print()">
                                    <div>
                                        <div class="disp">
                                            <img class="logodisp" src="<?= base_url('assets/img/ran_1.png'); ?>" />
                                        </div>
                                        <div class="justify-content-end d-flex mt-3">
                                            <br>
                                            <p>Bandung, 04 Desember 2023</p>
                                            </br>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <div class="mt-2">
                                            <p>No :</p>
                                            <p>Lamp :-</p>
                                            <p>Hal : penawaran Harga</p>
                                        </div>
                                        <div class="mt-2">
                                            <td>Kepad Yth,</td>
                                            <br><b>Bapak/Ibu pimpinan</b></br>
                                            <td><b>Kampus ABCD</b></td>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <td>Dengan hormat,</td>
                                        </div>
                                        <div class="mt-3" style="text-align: justify;">
                                            <p>Menanggapi permintaan harga layanan Sistem Informasi Akademik Kampus
                                                Terintegrasi Cloud System untuk kampus <b>STAK Apollos Manado.</b>
                                                Ijinkan
                                                kami mengajukan penawaran harga sebagai berikut :</p>
                                        </div>
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th>Range Jumlah Mahasiswa</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table">
                                                <tr>
                                                    <td>201-300</td>
                                                    <td>Rp.1.050.000/bln</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="fs-6">Catatan : Harga dapat berubah sesuai dengan penambahan kapasitas
                                            server kemudian hari.</p>
                                        <div class="mt-3" style="text-align: justify;">
                                            <p>Adapun, jika ada pertanyaan atau keberatan mengenai harga server yang
                                                kami
                                                ajukan. Jangan
                                                ragu untuk menyampaikan kepada kami agar kami dapat segera memberikan
                                                solusi
                                                yang terbaik
                                                sesuai dengan kondisi kampus.
                                            </p>
                                            <p>Besar harapan kami melalui penawaran ini kita dapat bekerjasama . Atas
                                                perhatiannya kami
                                                ucapkan terima kasih.
                                            </p>
                                            <div class="col-md-6 mt-2">
                                                <td>Hormat Kami,</td>
                                            </div>
                                            <div class="col-md-6 mt-5">
                                                <p class="text-decoration-underline">Bakti Atma Wibowo</p>
                                                <p>VP of sales</p>
                                            </div>
                                            <div class="mb-5 mt-5">
                                                <tr>
                                                    <th><b>PT Edu Sinergi Informatika</b></th>
                                                    <br>Graha EDU DUTA Regency</br>
                                                    <p>Jl. Cihanjuang Blok A21 Bandung Barat</p>
                                                    Telp.022.20665633/ 081394888864
                                                </tr>
                                            </div>
                                        </div>
                                    </div>
                                </body>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="justify-content-end d-flex mt-3">
                    <a href="<?= base_url('Document/document'); ?> " class="btn btn-danger ms-2">Back</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = $("#dataTable").DataTable();
        $("#dataTable tbody").on("click", "tr", function () {
            var data = table.row(this).data();
        });