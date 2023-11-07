<section class="wrapper">
    <div class="content-wrapper">
        <div class="card ml-2 mr-2 mt-5 shadow">
            <div class="row">
                <div class="card-body">
                    <div class="table table-responsive">
                        <b>Tambah Data Client</b>
                    </div>
                    <div class="mt-2">
                        <form action="<?= base_url('Setup_document/tambah'); ?>" method="post">
                            <div class="col-5">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="client_id" name="client_id" placeholder="Client Id">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <input required type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <select name="jenis_document" id="jenis_document" class="form-select form-control">
                                        <option value="SPK">SPK</option>
                                        <option value="SPH">SPH</option>
                                        <option value="SLA">SLA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <select name="file" id="file" class="form-select form-control">
                                        <option value="PDF">PDF</option>
                                        <option value="DOC">DOC</option>
                                        <option value="XLS">XLS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    Tanggal Pembuatan
                                    <input class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" required type="date">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    Tanggal Pengiriman
                                    <input class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" required type="date">
                                </div>
                            </div>
                            <div class="col-5">
                                <textarea id="summernote"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-success">Add Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>


<script>
    $(function() {
        $('#summernote').summernote();
    });
</script>