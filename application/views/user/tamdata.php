<section class="wrapper">
    <div class="content-wrapper">
        <h1>Ngoding Juga a?</h1>
        <div class="card ml-2 mr-2 mt-5 shadow">
            <div class="card-body">
                <div class="table table-responsive">
                    TODNEGENTOD
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="NewDocumentModal" tabindex="-1" role="dialog" aria-labelledby="NewDocumentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NewDocumentModalLabel">Add Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Crud/tamdoc'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input required type="text" class="form-control" id="client_id" name="client_id" placeholder="Client Id">
                    </div>
                    <div class="form-group">
                        <input required type="text" class="form-control" id="name" name="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <select name="jenis_document" id="jenis_document" class="form-select form-control">
                            <?php foreach ($jenis as $j) : ?>
                                <option value="<?= $j['name']; ?>"><?= $j['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="content" id="content" placeholder="Content" cols="60" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <select name="file" id="file" class="form-select form-control">
                            <option value="PDF">PDF</option>
                            <option value="DOC">DOC</option>
                            <option value="XLS">XLS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        Tanggal Pembuatan
                        <input class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" required type="date">
                    </div>
                    <div class="form-group">
                        Tanggal Pengiriman
                        <input class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" required type="date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>