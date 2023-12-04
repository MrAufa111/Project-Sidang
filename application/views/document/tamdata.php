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
                                <div class="form-group">
                                    <select name="client_id" required class="form-select" id="name">
                                        <option selected></option>
                                        <?php foreach ($client as $dc): ?>
                                            <option value="<?= $dc['id'] ?>">
                                                <?= $dc['name_client'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" required type="text"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="jenis_document" id="jenis_document" class="form-select form-control">
                                        <option value="SPK">SPK</option>
                                        <option value="SPH">SPH</option>
                                        <option value="SLA">SLA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select name="file" id="file" class="form-select form-control">
                                        <option value="PDF">PDF</option>
                                        <option value="DOC">DOC</option>
                                        <option value="XLS">XLS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    Tanggal Pembuatan
                                    <input class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" required
                                        type="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    Tanggal Pengiriman
                                    <input class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman"
                                        required type="date">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea name="content" id="summernote"></textarea>
                            </div>
                            <div class="justify-content-end d-flex mt-3">
                                <button type="submit" class="btn btn-success">Add Data</button>
                                <a href="<?= base_url('Document/document'); ?> " class="btn btn-danger ms-2">Back</a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
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