<section class="wrapper">
    <div class="content-wrapper">
        <form action="<?= base_url('leads/insert'); ?>" method="post">
            <div class="card mt-4 ml-2">
                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <input type="text" class="form-control" placeholder="Nama Kampus" name="namakampus">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option>Pilih Provinsi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="kota" id="kota" class="form-control">
                                <option>Pilih Kab/Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="jenispt" id="jenispt" class="form-control">
                                <option selected disabled>Pilih Jenis PT</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option value="<?= $j['id']; ?>"><?= $j['name_pt']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <input type="text" class="form-control" placeholder="PIC" name="pic">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <input type="number" class="form-control" placeholder="Whatsapp" name="whatsapp">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="status" id="status" class="form-control">
                                <option selected disabled>Pilih Status</option>
                                <?php foreach ($status as $s) : ?>
                                    <option value="<?= $s['id']; ?>"><?= $s['name_mem']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="sph" id="sph" class="form-control">
                                <option selected disabled>SPH </option>
                                <?php foreach ($sph as $sp) : ?>
                                    <option value="<?= $sp['id']; ?>"><?= $sp['name_sp']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="spk" id="spk" class="form-control">
                                <option selected disabled>SPK</option>
                                <?php foreach ($stat as $st) : ?>
                                    <option value="<?= $st['id']; ?>"><?= $st['name_sur']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="sla" id="sla" class="form-control">
                                <option selected disabled>SLA</option>
                                <?php foreach ($sla as $sl) : ?>
                                    <option value="<?= $sl['id']; ?>"><?= $sl['name_sl']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="instalasi" id="instalasi" class="form-control">
                                <option selected disabled>Instalasi</option>
                                <?php foreach ($instal as $i) : ?>
                                    <option value="<?= $i['id']; ?>"><?= $i['name_inst']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="input-group col-12">
                            <select name="migrasi" id="migrasi" class="form-control">
                                <option selected disabled>Migrasi</option>
                                <?php foreach ($migrasi as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['name_mig']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-3 mb-3">
                        <div class="input-group col-12">
                            <select name="pelatihan" id="pelatihan" class="form-control">
                                <option selected disabled>Pelatihan</option>
                                <?php foreach ($pelatih as $p) : ?>
                                    <option value="<?= $p['id']; ?>"><?= $p['name_pelat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 mt-2 mb-3">
                        <div class="input-group col-12">
                            <select name="invoice" id="invoice" class="form-control">
                                <option selected disabled>Invoice</option>
                                <?php foreach ($invo as $in) : ?>
                                    <option value="<?= $in['id']; ?>"><?= $in['name_inv']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ml-2">
                    <button class="btn btn-primary btn-sm mb-2" type="submit" id="submitBtn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
            var data = provinces;
            var tampung = '<option>Pilih Provinsi</option>';
            data.forEach(element => {
                tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById('provinsi').innerHTML = tampung;
        });
    // document.getElementById('submitBtn').addEventListener('click', function() {
    //     var selectedProvinsi = document.getElementById('provinsi').value;
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?= base_url(); ?>leads/insert',
    //         data: {
    //             provinsi: selectedProvinsi
    //         },
    //         success: function(response) {
    //             alert('Data berhasil disimpan ke database.');
    //         },
    //         error: function() {
    //             alert('Terjadi kesalahan saat menyimpan data ke database.');
    //         }
    //     });
    // });
</script>
<script>
    const selectProvinsi = document.getElementById('provinsi');
    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then(response => response.json())
            .then(regencies => {
                var data = regencies;
                var tampung = '<option>Pilih Kab/Kota</option>';
                data.forEach(element => {
                    tampung += `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kota').innerHTML = tampung;
            });
    });
</script>