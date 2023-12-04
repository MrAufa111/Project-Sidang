<div class="swal" data-swal="<?= $this->session->flashdata('ingfo'); ?>"></div>
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
                        <form action="<?= base_url('Setup_document/update'); ?>" method="post" class="row g-3">
                            <div class="">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $document['id']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <select name="client" required class="form-select" id="name" placeholder="Nama">
                                    <option selected></option>
                                    <?php foreach ($client as $dc): ?>
                                        <option <?= $document['client_id'] == $dc->id ? 'selected' : ''; ?>
                                            value="<?= $dc->id ?>">
                                            <?= $dc->name_client ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="email" name="email"
                                        placeholder="Email" value="<?= $document['email'] ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select required name="jenis_document" id="jenis_document" class="form-select">
                                        <option disabled value="">Select Menu</option>
                                        <option <?php if ($document['jenis_document'] == 'SPH') {
                                            echo 'selected';
                                        } ?>   value="SPH">SPH</option>
                                        <option <?php if ($document['jenis_document'] == 'SPK') {
                                            echo 'selected';
                                        } ?>   value="SPK">SPK</option>
                                        <option <?php if ($document['jenis_document'] == 'SLA') {
                                            echo 'selected';
                                        } ?>   value="SLA">SLA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select required name="file" id="file" class="form-select">
                                        <option disabled value="">Select Menu</option>
                                        <option <?php if ($document['file'] == 'PDF') {
                                            echo 'selected';
                                        } ?>value="PDF">
                                            PDF</option>
                                        <option <?php if ($document['file'] == 'DOC') {
                                            echo 'selected';
                                        } ?>value="DOC">
                                            DOC</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    Tanggal Pembuatan
                                    <input required type="date" class="form-control" id="tanggal_pembuatan"
                                        name="tanggal_pembuatan" placeholder="tanggal_pembuatan"
                                        value="<?= $document['tanggal_pembuatan'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    Tanggal Pengiriman
                                    <input required type="date" class="form-control" id="tanggal_pengiriman"
                                        name="tanggal_pengiriman" placeholder="tanggal_pengiriman"
                                        value="<?= $document['tanggal_pengiriman'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                            <div class="col-12">
                                <textarea id="summernote" name="content"><?= $document['content']; ?></textarea>
                            </div>
                            <div class="justify-content-end d-flex mt-3">
                                <button type="submit" class="btn btn-success btn-subedit">Submit</button>
                                <a href="<?= base_url('Document/document'); ?> " class="btn btn-danger ms-2">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function () {
        var data = table.row(this).data();
    });
    $('#name').on('change', function () {
        var selectedValue = $(this).val();
        $.ajax({
            url: '<?= base_url('Document/getclient') ?>',
            method: 'POST',
            data: {
                selectedValue: selectedValue
            },
            success: function (data) {
                var responseObj = JSON.parse(data);

                var email = responseObj.email;

                $('#email').val(email);
            },
            error: function (error) {
                console.log(error);
            }
        });

    });
</script>


<script>
    $(function () {
        $('#summernote').summernote();
    });
</script>