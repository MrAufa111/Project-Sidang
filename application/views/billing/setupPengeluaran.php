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
    </div>
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
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Setup Pengeluaran</h5>

                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <div class="d-flex">
                                            <select name="kategori" id="kategori" class="form-select">
                                                <option selected>Pilih Kategori</option>
                                                <?php foreach ($kategori as $k) : ?>
                                                    <option value="<?= $k['id'] ?>"><?= $k['name_kategori'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <a href="<?= base_url('setupPengeluaran/kategori') ?>" class="btn btn-success"><i class="bi bi-plus-circle"></i></a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="penanggung" class="form-label">Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="penanggung" placeholder="penanggung Jawab" name="penanggung">
                                    </div>
                                    <div class="form-group">
                                        <label for="toko">Nama Toko</label>
                                        <input type="text" class="form-control" id="toko" placeholder="Nama Toko" name="toko">
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
                                            </tbody>
                                            <tr>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan=""></td>
                                                <td colspan="2">
                                                    <h1 class="h5" id="total"></h1>
                                                </td>
                                            </tr>
                                        </table>
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
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
    $('#simpanData').on('click', function() {
        let data = [];
        $('#tabletambah tr').each(function() {
            let row = {};
            row.name_barang = $(this).find('.name_barang').text();
            row.qyt = $(this).find('.qyt').text();
            row.hargaSatuan = $(this).find('.hargaSatuan').text();
            row.harga = $(this).find('.harga').text();
            data.push(row);
        });
        let kategori = $('#kategori').val();
        let tanggal = $('#tanggal').val();
        let penanggung = $('#penanggung').val();
        let toko = $('#toko').val();
        let total = $('#total').text();
        total = total.replace('Rp.', '');
        console.log(data);
        $.ajax({
            url: '<?= base_url('setupPengeluaran/insert') ?>',
            method: 'POST',
            data: {
                kategori: kategori,
                tanggal: tanggal,
                penanggung: penanggung,
                toko: toko,
                total_tagihan: total,
                data: data
            },
            success: function() {
                Swal.fire(
                    'Success',
                    'Tambah Pengeluaran',
                    'success'
                ).then((result) => {
                    document.location.href = "<?= base_url('setupPengeluaran/tambah'); ?>";
                });
            },
            error: function(error) {
                console.log('Gagal menyimpan data ke database.');
            }
        });
    });
    $(document).ready(function() {

        let rupiah = $('#harga');
        rupiah.on('input', function(e) {
            rupiah.val(formatRupiah(this.value));
        });
    });

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
        let rows = $('#tabletambah tr');
        let rowCount = rows.length;
        let kuantitas = $('#kuantitas').val();
        let hargasatuan = $('#harga').val();
        let barang = $('#barang').val();
        let harga = $('#harga').val();
        harga = harga.replace(/[^0-9]/g, '');
        let total = kuantitas * harga;

        if (!isNaN(harga)) {
            $('#tabletambah').append('<tr><td>' + (rowCount + 1) + '</td><td class="name_barang">' + barang + '</td><td class="qyt">' + kuantitas + '</td><td class="hargaSatuan">' + hargasatuan + '</td><td class="harga">' + formatRupiah(total) + '</td><td><a class="btn btn-danger delval"><i class="bi bi-trash"></i></a></td></tr>');
            let totalHarga = 0;
            $('.harga').each(function() {
                let hargaStr = $(this).text();
                hargaStr = hargaStr.replace(/[^0-9]/g, '');
                totalHarga += parseFloat(hargaStr);
            });
            $('#total').text(formatRupiah(totalHarga, 'Rp.'));

            // $('#barang').val('');
            // $('#kuantitas').val('');
            // $('#harga').val('');
        }
    });
    $('#tabletambah').on('click', '.delval', function() {
        let row = $(this).closest('tr');
        let hargaStr = row.find('.harga').text();
        hargaStr = hargaStr.replace(/[^0-9]/g, ''); // Ambil nilai harga
        let harga = parseFloat(hargaStr);

        let totalHarga = parseFloat($('#total').text().replace(/[^0-9]/g, '')); // Ambil total harga saat ini
        totalHarga -= harga; // Kurangi total dengan harga elemen yang dihapus
        $('#total').text(formatRupiah(totalHarga)); // Update total yang sudah diformat

        row.remove(); // Hapus elemen dari tabel
    });
</script>