<section class="wrapper">
    <div class="content-wrapper">
        <h1>Ngoding Juga a?</h1>
        <div class="card ml-2 mr-2 mt-5 shadow">
            <div class="card-body">
                <div class="table table-responsive">
                    <a href="<?= base_url('crud/tamdoc')?>" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Add Data Document</a>
                    <a href="<?= base_url('server/save'); ?>" class="btn btn-info mb-3"><i class="fas fa-save"></i> SaveDc</a>
                    <table id="dataTable" class="table">
                        <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Client Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Document</th>
                            <th scope="col">Content</th>
                            <th scope="col">File</th>
                            <th scope="col">Tanggal Pembuatan</th>
                            <th scope="col">Tanggal Pengiriman</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php
                            foreach ($Document as $dc) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $dc['client_id']; ?></td>
                                    <td><?= $dc['name']; ?></td>
                                    <td><?= $dc['jenis_document']; ?></td>
                                    <td><?= $dc['content']; ?></td>
                                    <td><?= $dc['file']; ?></td>
                                    <td><?= $dc['tanggal_pembuatan']; ?></td>
                                    <td><?= $dc['tanggal_pengiriman']; ?></td>
                                    <td>
                                        <button class="btn btn-success btn-edit" data-toggle="modal" data-target="#NewDocumenttEditModal<?= $dc['id']; ?>"><i class="fas fa-fw fa-pen"></i></button>
                                        <a href="<?= base_url('dash/print/'); ?>" class="btn btn-warning btn-kirim"><i class="fas fa-file-upload"></i></a>
                                        <a href="<?= base_url('crud/hapusdoc/' . $dc['id']); ?>" class="btn btn-danger btn-hapus mt-1" onclick="return confirm('Apa yakin akan di hapus?');"><i class="fas fa-fw fa-trash"></i></a>
                                        <?php $i++; ?>
                                    <?php endforeach;
                                    ?>
                        </tbody>
                    </table>
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
<!-- akhir modal -->
<?php foreach ($Document as $dc) : ?>
    <div class="modal fade" id="NewDocumenttEditModal<?= $dc['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="NewDocumenttEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewDocumentEditModalLabel">Edit Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Crud/editdoc/' . $dc['id']); ?>" method="post">
                    <input type="hidden" value="<?= $dc['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="client_id" name="client_id" placeholder="Client Id" value="<?= $dc['client_id'] ?>">
                        </div>
                        <div class="form-group">
                            <input required type="text" class="form-control" id="name" name="name" placeholder="Nama" value="<?= $dc['name'] ?>">
                        </div>
                        <div class="form-group">
                            <select required name="jenis_document" id="jenis_document" class="form-control">
                                <option disabled value="">Select Menu</option>
                                <option <?php if ($dc['jenis_document'] == 'SPH') {
                                            echo 'selected';
                                        } ?> value="SPH">SPH</option>
                                <option <?php if ($dc['jenis_document'] == 'SPK') {
                                            echo 'selected';
                                        } ?> value="SPK">SPK</option>
                                <option <?php if ($dc['jenis_document'] == 'SLA') {
                                            echo 'selected';
                                        } ?> value="SLA">SLA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input required type="text" class="form-control" id="content" name="content" placeholder="content" value="<?= $dc['content'] ?>">
                        </div>
                        <div class="form-group">
                            <select required name="file" id="file" class="form-control">
                                <option disabled value="">Select Menu</option>
                                <option <?php if ($dc['file'] == 'PDF') {
                                            echo 'selected';
                                        } ?> value="PDF">PDF</option>
                                <option <?php if ($dc['file'] == 'DOC') {
                                            echo 'selected';
                                        } ?> value="DOC">DOC</option>
                                <option <?php if ($dc['file'] == 'XLS') {
                                            echo 'selected';
                                        } ?> value="XLS">XLS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input required type="date" class="form-control" id="tanggal_pembuatan" name="tanggal_pembuatan" placeholder="tanggal_pembuatan" value="<?= $dc['tanggal_pembuatan'] ?>">
                        </div>
                        <div class="form-group">
                            <input required type="date" class="form-control" id="tanggal_pengiriman" name="tanggal_pengiriman" placeholder="tanggal_pengiriman" value="<?= $dc['tanggal_pengiriman'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-subedit">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- akhir modal -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
    var table = $("#dataTable").DataTable();
    $("#dataTable tbody").on("click", "tr", function() {
        var data = table.row(this).data();
    });
</script>