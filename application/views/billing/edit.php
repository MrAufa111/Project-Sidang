<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>

<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $title ?></h1>
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
                        <form action="<?= base_url(); ?>Setup_billing/update" method="POST">
                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Kampus</label>
                                    <input type="hidden" name="id" id="id" value="<?= $bill['id']; ?>">
                                    <select name="namakampus" class="form-select" id="namakampus">
                                        <option selected>select kampus</option>
                                        <?php foreach ($client as $c) : ?>
                                            <option <?= $c['id'] == $bill['client_id'] ? 'selected' : '' ?> value="<?= $c['id'] ?>"><?= $c['name_client'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Email Kampus</label>
                                        <input type="text" readonly name="emailkampus" id="emailkampus" value="<?= $bill['email'] ?>" class="form-control" placeholder="Email Kampus..">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Awal</label>
                                        <input type="date" name="tanggalawal" id="tanggalawal" value="<?= $bill['tanngal_awal']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="statusaktif" class="form-label">Status Aktif</label>
                                        <select name="statusaktif" id="statusaktif" class="form-select">
                                            <option selected>Select Status</option>
                                            <?php foreach ($statusa as $s) : ?>
                                                <option <?= $s['id'] == $bill['status_aktif'] ? 'selected' : '' ?> value="<?= $s['id']; ?>"><?= $s['name_ak']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="barang" id="barang" placeholder="Masukan Barang">
                                    </div>
                                    <div id="element2" class="form-group"></div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Akhir</label>
                                        <input type="date" name="tanggalakhir" value="<?= $bill['tanggal_akhir'] ?>" id="tanggalakhir" class="form-control" placeholder="Email Kampus..">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Periode Penagihan</label>
                                        <select name="periode" id="periode" class="form-select">
                                            <option selected>Select Periode</option>
                                            <?php foreach ($periode as $p) : ?>
                                                <option <?= $p['id'] == $bill['periode_penagihan'] ? 'selected' : '' ?> value="<?= $p['id']; ?>"><?= $p['name_periode']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Status Penagihan</label>
                                        <select name="statuspen" id="statuspen" class="form-select">
                                            <option selected>Select Status</option>
                                            <?php foreach ($statusp as $s) : ?>
                                                <option <?= $s['id'] == $bill['status_penagihan'] ? 'selected' : '' ?> value="<?= $s['id']; ?>"><?= $s['name_pen']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="form-group d-flex col-lg-11 ">
                                        <input type="text" class="form-control col-md-4" id="harga" name="harga" placeholder="Harga">
                                        <a id="button" class="btn btn-success ms-3"><i class="bi bi-plus-circle"></i></a>
                                    </div>
                                    <div id="element" class="form-group"></div>
                                </div>

                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" id="dataTable">
                                    <thead class="table-bordered">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="70%">Desc</th>
                                            <th width="16%">Harga</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="tabletambah">
                                        <?php $i = 1; ?>
                                        <?php foreach ($bill2 as $b) : ?>
                                            <input type="hidden" id="idbar" name="idbar" value="<?= $b['id']; ?>">
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $b['name_barang']; ?></td>
                                                <td class="harga"><?= $b['harga']; ?></td>
                                                <td>
                                                    <div class="">
                                                        <a style="color: red;pointer-events: auto;" class="btn-deletebarang d-flex align-items-center justify-content-center"><i class="bi bi-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Potongan</label>
                                        <input type="text" name="potongan" id="potongan" value="<?= $bill['potongan'] ?>" class="form-control" placeholder="Potongan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nominal Tagihan</label>
                                        <input type="text" name="nominaltagihan" readonly id="nominaltagihan" class="form-control" placeholder="Nominal Tagihan">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Total Tagihan</label>
                                        <input type="text" name="totaltagihan" id="totaltagihan" readonly class="form-control" placeholder="Total Tagihan">
                                    </div>
                                </div>
                            </div>
                            <div class="justify-content-end d-flex mt-3">
                                <!-- <div class="me-1">
                                    <div class="form-switch mt-2 me-3">
                                        <label class="form-check-label me-5" for="flexSwitchCheckDefault">UnPaid</label>
                                        <input class="form-check-input me-2" type="checkbox" id="flexSwitchCheckDefault" name="invoice" value="1">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Paid</label>
                                    </div>
                                </div> -->
                                <div class="me-1">
                                    <input type="checkbox" <?= $bill['status_invoice'] == 1 ? 'checked' : ''; ?> value="1" name="sinvoice" data-toggle="switchbutton" id="switchd" data-color="success" data-off-color="default" data-onlabel="PAID" data-offlabel="UNPAID" data-size="normal">
                                </div>
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
    $(document).ready(function() {
        $('#button').click(function() {
            let id = $('#id').val();
            let barang = document.getElementById('barang').value;
            let harga = document.getElementById('harga').value;
            $.ajax({
                url: "<?= base_url('Setup_billing/addbarang'); ?>",
                type: 'POST',
                data: {
                    id: id,
                    barang: barang,
                    harga: harga
                },
                success: function() {
                    Swal.fire(
                        'Success',
                        'Tambah Barang',
                        'success'
                    )
                    $('#dataTable').append('<tr><td><?= $i++; ?></td><td>' + barang + '</td><td class="harga">' + harga + '</td> <td><div class=""><a style="color: red;" class="btn-deletebarang d-flex align-items-center justify-content-center"><i class="fas fa-trash"></i></a></div></td>')
                },
            })


        })
    })
    $(document).ready(function() {
        $('.btn-deletebarang').click(function() {
            let idd = document.getElementById('id').value;;
            let id = document.getElementById('idbar').value;
            $.ajax({
                url: "<?= base_url('Setup_billing/deletebarang/'); ?>" + id,
                type: "POST",
                data: {
                    id: id
                },
                success: function() {
                    Swal.fire(
                        'Success',
                        'Delete Barang',
                        'success'
                    ).then((result) => {

                        document.location.href = "<?= base_url('Setup_billing/edit/'); ?>" + idd;

                    });

                }
            })
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
        $('#nominaltagihan').val(formatRupiah(totalHarga));


        let potongan = $('#potongan').val();
        let nominaltagihan = $('#nominaltagihan').val();

        potongan = potongan.replace(/[^0-9,-]/g, '');
        nominaltagihan = nominaltagihan.replace(/[^0-9,-]/g, '');

        let total_tagihan = nominaltagihan -= potongan;

        $('#totaltagihan').val(formatRupiah(total_tagihan));
    });

    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value);
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

    const nominalTagihanInput = document.getElementById("nominaltagihan");
    const potonganInput = document.getElementById("potongan");
    const totalTagihanInput = document.getElementById("totaltagihan");

    nominalTagihanInput.addEventListener("input", hitungTotalTagihan);
    potonganInput.addEventListener("input", hitungTotalTagihan);

    function hitungTotalTagihan() {
        const nominalTagihan = parseFloat(nominalTagihanInput.value.replace(/\./g, "").replace(/,/g, ".")) || 0;
        const potongan = parseFloat(potonganInput.value.replace(/\./g, "").replace(/,/g, ".")) || 0;
        const totalTagihan = nominalTagihan - potongan;

        totalTagihanInput.value = formatMataUang(totalTagihan);
    }

    function formatMataUang(nilai) {
        return nilai.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.');
    }
    $(function() {
        $("#summernote").summernote();
    });
    $(function() {
        $("#summernotee").summernote();
    });
</script>