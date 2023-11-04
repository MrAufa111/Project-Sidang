<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
<div class="swallow" data-swallow="<?= $this->session->flashdata('swallow'); ?>"></div>
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

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Home</a></li>
                <li class="breadcrumb-item">Setup</li>
                <li class="breadcrumb-item active">Setup Billing</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Setup Pengeluaran</h5>

                        <form action="<?= base_url() ?>setupPengeluaran/add" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" id="kategori" placeholder="kategori">
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-end d-flex mt-3">

                                <button class="btn btn-primary" id="simpanData" type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>