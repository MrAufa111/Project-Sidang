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
                        <h5 class="card-title">Setup Billing</h5>

                        <form>
                            <div class="row">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Kampus</label>
                                    <select name="namakampus" required class="form-select" id="namakampus">
                                        <option selected>select kampus</option>
                                        <?php foreach ($client as $c) : ?>
                                            <option value="<?= $c['id'] ?>"><?= $c['name_client'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="" class="form-label">Email Kampus</label>
                                        <input type="text" readonly name="emailkampus" id="emailkampus" class="form-control" placeholder="Email Kampus..">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Awal</label>
                                        <input type="date" required name="tanggalawal" id="tanggalawal" class="form-control" placeholder="Nama Kampus..">
                                    </div>
                                    <div class="form-group">
                                        <label for="statusaktif" class="form-label">Status Aktif</label>
                                        <select name="statusaktif" required id="statusaktif" class="form-select">
                                            <option selected>Select Status</option>
                                            <?php foreach ($statusa as $s) : ?>
                                                <option value="<?= $s['id']; ?>"><?= $s['name_ak']; ?></option>
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
                                        <input type="date" required name="tanggalakhir" id="tanggalakhir" class="form-control" placeholder="Email Kampus..">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Periode Penagihan</label>
                                        <select name="periode" required id="periode" class="form-select">
                                            <option selected>Select Periode</option>
                                            <?php foreach ($periode as $p) : ?>
                                                <option value="<?= $p['id']; ?>"><?= $p['name_periode']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Status Penagihan</label>
                                        <select name="statuspen" required id="statuspen" class="form-select">
                                            <option selected>Select Status</option>
                                            <?php foreach ($statusp as $s) : ?>
                                                <option value="<?= $s['id']; ?>"><?= $s['name_pen']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <label for="harga" class="form-label">Harga</label>
                                    <div class="form-group d-flex col-lg-11 ">
                                        <input type="text" class="form-control col-md-4" id="harga" name="harga" placeholder="harga">
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

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Potongan</label>
                                        <input type="text" required name="potongan" id="potongan" class="form-control" placeholder="Potongan">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nominal Tagihan</label>
                                        <input type="text" required name="nominaltagihan" readonly id="nominaltagihan" class="form-control" placeholder="Nominal Tagihan">
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="" class="form-label">Total Tagihan</label>
                                        <input type="text" required name="totaltagihan" id="totaltagihan" readonly class="form-control" placeholder="Total Tagihan">
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
        $('table tbody tr').each(function() {
            let row = {};
            row.name_barang = $(this).find('.name_barang').text();
            row.harga = $(this).find('.harga').text();
            data.push(row);
        });
        let kampusname = $('#namakampus').val();
        let tanggalawal = $('#tanggalawal').val();
        let nominaltagihan = $('#nominaltagihan').val();
        let potongan = $('#potongan').val();
        let totaltagihan = $('#totaltagihan').val();
        let emailkampus = $('#emailkampus').val();
        let tanggalakhir = $('#tanggalakhir').val();
        let periode = $('#periode').val();
        let statusaktif = $('#statusaktif').val();
        let statuspen = $('#statuspen').val();
        let harga = $('#harga').val();
        $.ajax({
            url: '<?= base_url('Setup_billing/insertData') ?>',
            method: 'POST',
            data: {
                namakampus: kampusname,
                tanggalawal: tanggalawal,
                nominaltagihan: nominaltagihan,
                potongan: potongan,
                totaltagihan: totaltagihan,
                emailkampus: emailkampus,
                tanggalakhir: tanggalakhir,
                periode: periode,
                statusaktif: statusaktif,
                statuspen: statuspen,
                data: JSON.stringify(data)
            },
            success: function(response) {

                console.log(response);
            },
            error: function(error) {
                console.log('Gagal menyimpan data ke database.');
            }
        });
    });
    let potongan = $('#potongan');
    potongan.on('input', function(e) {
        potongan.val(formatRupiah(this.value));
    });
    $('#namakampus').on('change', function() {
        var selectedValue = $(this).val();
        $.ajax({
            url: '<?= base_url('Setup_billing/getclient') ?>',
            method: 'POST',
            data: {
                selectedValue: selectedValue
            },
            success: function(data) {
                var responseObj = JSON.parse(data);

                var email = responseObj.email;

                $('#emailkampus').val(email);
            },
            error: function(error) {
                console.log(error);
            }
        });

    });

    $('#button').click(function() {
        let rows = $('#tabletambah tr');
        let rowCount = rows.length;
        let barang = $('#barang').val();
        let harga = $('#harga').val();

        harga = harga.replace(/[^0-9]/g, '');

        if (!isNaN(harga)) {
            $('#tabletambah').append('<tr><td>' + (rowCount + 1) + '</td><td class="name_barang">' + barang + '</td><td class="harga">' + formatRupiah(harga) + '</td><td><a class="btn btn-danger delval"><i class="bi bi-trash"></i></a></td></tr>');
            let totalHarga = 0;
            $('.harga').each(function() {
                let hargaStr = $(this).text();
                hargaStr = hargaStr.replace(/[^0-9]/g, '');
                totalHarga += parseFloat(hargaStr);
            });

            $('#nominaltagihan').val(formatRupiah(totalHarga));

            $('#barang').val('');
            $('#harga').val('');
        }

    });

    $('#tabletambah').on('click', '.delval', function() {
        console.log('ok');
        $(this).closest('tr').remove();
    });

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

    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value);
    });


    function formatRupiah(angka, prefix) {
        // Pastikan angka adalah string
        angka = angka.toString();

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
        return nilai.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&.');
    }
    $(function() {
        $("#summernote").summernote();
    });
    $(function() {
        $("#summernotee").summernote();
    });
</script>