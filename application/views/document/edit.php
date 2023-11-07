<section class="wrapper">
    <div class="content-wrapper">
        <div class="card ml-2 mr-2 mt-5 shadow">
            <div class="row">
                <div class="card-body">
                    <div class="table table-responsive">
                        <b>Edit Data Client</b>
                    </div>
                    <div class="mt-2">

                        <form class="row g-3">
                            <div class="col-md-6 mt-3">
                                <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Client Id" value="<?= $document['client_id'] ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="text" class="form-control" id="name" name="name" placeholder="Nama" value="<?= $document['name'] ?>">
                            </div>
                            <div class="col-6 mt-3">
                                <select required name="jenis_document" id="jenis_document" class="form-control">
                                    <option disabled value="">Select Menu</option>
                                    <option <?php if ($document['jenis_document'] == 'SPH') {
                                                echo 'selected';
                                            } ?> value="SPH">SPH</option>
                                    <option <?php if ($document['jenis_document'] == 'SPK') {
                                                echo 'selected';
                                            } ?> value="SPK">SPK</option>
                                    <option <?php if ($document['jenis_document'] == 'SLA') {
                                                echo 'selected';
                                            } ?> value="SLA">SLA</option>
                                </select>
                            </div>
                            <div class="col-6 mt-3">
                                <select required name="file" id="file" class="form-control">
                                    <option disabled value="">Select Menu</option>
                                    <option <?php if ($document['file'] == 'PDF') {
                                                echo 'selected';
                                            } ?> value="PDF">PDF</option>
                                    <option <?php if ($document['file'] == 'DOC') {
                                                echo 'selected';
                                            } ?> value="DOC">DOC</option>
                                    <option <?php if ($document['file'] == 'XLS') {
                                                echo 'selected';
                                            } ?> value="XLS">XLS</option>
                                </select>
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" placeholder="tanggal_pembuatan" value="<?= $document['tanggal_pembuatan'] ?>">
                            </div>
                            <div class="col-md-6 mt-3">
                                <input required type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder="tanggal_pengiriman" value="<?= $document['tanggal_pengiriman'] ?>">
                            </div>
                            <div class="form-group mt-3 col-12">
                                <textarea id="summernote" name="content"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-subedit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= base_url(); ?>assets/plugins/jquery/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/summernote/summernote-bs5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>


<script>
    $(function() {
        $("#summernote").summernote();
    })
    // $('#summernote').summernote({
    //     height: 50,
    //     toolbar: [
    //         ['style', ['bold', 'italic', 'underline', 'clear']],
    //         ['para', ['ul', 'ol']],
    //         ['insert', ['link', 'picture']],
    //     ]
    // });
</script>