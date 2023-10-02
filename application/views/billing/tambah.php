<div class="swal" data-swal="<?= $this->session->flashdata('notif'); ?>"></div>
<div class="swal-error" data-swalerror="<?= $this->session->flashdata('error'); ?>"></div>
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

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url(); ?>Setup_billing/create" method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Nama Kampus</label>
                                    <input type="text" name="namakampus" id="namakampus" class="form-control" placeholder="Nama Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Awal</label>
                                    <input type="date" name="tanggalawal" id="tanggalawal" class="form-control" placeholder="Nama Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Nominal Tagihan</label>
                                    <input type="text" name="nominaltagihan" id="nominaltagihan" class="form-control" placeholder="Nama Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Potongan</label>
                                    <input type="text" name="potongan" id="potongan" class="form-control" placeholder="Nama Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Total Tagihan</label>
                                    <input type="text" name="totaltagihan" id="totaltagihan" readonly class="form-control" placeholder="Nama Kampus..">
                                </div>
                                <input type="text" class="form-control" name="barang" id="barang" placeholder="Masukan Barang">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="" class="form-label">Email Kampus</label>
                                    <input type="text" readonly name="emailkampus" id="emailkampus" class="form-control" placeholder="Email Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Tanggal Akhir</label>
                                    <input type="date" name="tanggalakhir" id="tanggalakhir" class="form-control" placeholder="Email Kampus..">
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Periode Penagihan</label>
                                    <select name="periode" id="periode" class="form-select">
                                        <option selected>Select Periode</option>
                                        <?php foreach ($periode as $p) : ?>
                                            <option value="<?= $p['id']; ?>"><?= $p['name_periode']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Status Aktif</label>
                                    <select name="statusaktif" id="statusaktif" class="form-select">
                                        <option selected>Select Status</option>
                                        <?php foreach ($statusa as $s) : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['name_ak']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="form-label">Status Aktif</label>
                                    <select name="statuspen" id="statuspen" class="form-select">
                                        <option selected>Select Status</option>
                                        <?php foreach ($statusp as $s) : ?>
                                            <option value="<?= $s['id']; ?>"><?= $s['name_pen']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control col-lg-11" id="harga" name="harga" placeholder="harga">
                                    <a id="button" class="btn btn-success ms-4"><i class="fas fa-plus-circle"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="justify-content-end d-flex">
                            <div class="me-1">
                                <input type="checkbox" value="1" name="sinvoice" data-toggle="switchbutton" id="switchd" data-color="success" data-off-color="default" data-onlabel="PAID" data-offlabel="UNPAID" data-size="normal">
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script>
    $(document).ready(function() {
        $('#button').click(function() {


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

    var rupiah = document.getElementById('harga');
    rupiah.addEventListener('keyup', function(e) {
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    function formatRupiah(angka, prefix) {
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
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
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