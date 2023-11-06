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

                        <form action="<?= base_url('setupPengeluaran/editPengeluaran') ?>" method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <input type="hidden" id="id" name="id" value="<?= $pengeluaran['id'] ?>">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <div class="d-flex">
                                            <select name="kategori" id="kategori" class="form-select">
                                                <option selected>Pilih Kategori</option>
                                                <?php foreach ($kategori as $k) : ?>
                                                    <option <?= $k['id'] == $pengeluaran['kategori_pengeluaran'] ? 'selected' : '' ?> value="<?= $k['id'] ?>"><?= $k['name_kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <a href="<?= base_url('setupPengeluaran/kategori') ?>" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" value="<?= $pengeluaran['tanggal'] ?>" name="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="penanggung" class="form-label">Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="penanggung" value="<?= $pengeluaran['penanggung_jawab'] ?>" placeholder="penanggung Jawab" name="penanggung">
                                    </div>
                                    <div class="form-group">
                                        <label for="toko">Nama Toko</label>
                                        <input type="text" class="form-control" id="toko" value="<?= $pengeluaran['name_toko'] ?>" placeholder="Nama Toko" name="toko">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="barang" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" id="barang" placeholder="Nama Barang" name="barang">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="Qyt" class="form-label">Kuantitas</label>
                                                <input type="text" class="form-control" id="kuantitas" placeholder="Kuantias">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="harga" class="form-label">Harga Per Barang</label>
                                            <div class="form-group d-flex ">
                                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Per Barang">
                                                <a id="button" class="btn btn-success ms-3"><i class="bi bi-plus-circle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead class="table-bordered">
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="50%">Desc</th>
                                                    <th width="10%">QTY</th>
                                                    <th width="10%">Harga Satuan</th>
                                                    <th width="16%">Total</th>
                                                    <th width="10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-bordered" id="tabletambah">
                                                <?php $i = 1 ?>
                                                <?php foreach ($barang as $b) : ?>
                                                    <?php if ($b['id_pengeluaran'] == $pengeluaran['id']) : ?>
                                                        <input type="hidden" id="idbar" name="idbar" value="<?= $b['id']; ?>">
                                                        <tr>
                                                            <td><?= $i++ ?></td>
                                                            <td><?= $b['barang'] ?></td>
                                                            <td><?= $b['qyt'] ?></td>
                                                            <td><?= $b['harga_satuan'] ?></td>
                                                            <td class="harga"><?= $b['total_barang'] ?></td>
                                                            <td><a style="color: red;pointer-events: auto;" class="btn-deletebarang d-flex align-items-center justify-content-center"><i class="bi bi-trash"></i></a></td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="text" id="total" name="total" class="form-control">
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

<script>
    function formatRupiah(angka, prefix) {
        // Pastikan angka adalah string
        angka = angka.toString();

        // Hapus tanda ribuan dalam bentuk titik
        angka = angka.replace(/\./g, '');

        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
    }
    $('#button').click(function() {
        let id = $('#id').val();
        let barang = $('#barang').val();
        let harga = $('#harga').val();
        let kuantitas = $('#kuantitas').val();
        harga = harga.replace(/[^0-9]/g, '');
        let total_tagihan = harga * kuantitas;
        let totalTagihanRupiah = formatRupiah(total_tagihan);
        let hargarupiah = formatRupiah(harga);
        console.log(hargarupiah);
        $.ajax({
            url: "<?= base_url('SetupPengeluaran/addbarang'); ?>",
            type: 'POST',
            data: {
                id: id,
                barang: barang,
                kuantitas: kuantitas,
                total_tagihan: totalTagihanRupiah,
                harga: hargarupiah,
            },
            success: function() {

                location.reload();

            },
        })


    })
    $(document).ready(function() {
        let data = [];
        $('#tabletambah tr').each(function() {
            let row = {};
            let hargaRupiah = $(this).find('.harga').text(); // Ambil harga dalam format rupiah
            let hargaAngka = parseFloat(hargaRupiah.replace(/[^0-9,-]/g, '').replace(',', '.')); // Konversi ke format angka
            row.harga = hargaAngka;
            data.push(row);
        });


        let totalHarga = 0;

        data.forEach(function(row) {


            totalHarga += parseFloat(row.harga);
        });

        $('#total').val(formatRupiah(totalHarga));
        console.log(totalHarga)
        let rupiah = $('#harga');
        rupiah.on('input', function(e) {
            rupiah.val(formatRupiah(this.value));
        });
    });

    $(document).ready(function() {
        $('.btn-deletebarang').click(function() {
            let idd = document.getElementById('id').value;;
            let id = document.getElementById('idbar').value;
            $.ajax({
                url: "<?= base_url('setupPengeluaran/deletebarang/'); ?>" + id,
                type: "POST",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response)
                    location.reload();

                }
            })
        })
    })
</script>