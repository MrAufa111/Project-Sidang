<!-- <section class="wrapper">
    <div class="content-wrapper">
        <form action="<?= base_url('leads/edit/' . $data_client['id']); ?>" method="post">
            <input type="hidden" value="<?= $data_client['id']; ?>">
            <div class="card mt-2 ml-1 mr-1">
                <div class="card mt-3 ml-2 mr-2">
                    <div class="row">
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <input type="text" class="form-control" placeholder="Nama Kampus" name="namakampus" value="<?= $data_client['name']; ?>">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="kota" id="kota" class="form-control">
                                    <option value="">Pilih Kab/Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $data_client['alamat']; ?>">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="jenispt" id="jenispt" class="form-control">
                                    <option disabled>Pilih Jenis PT</option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option value="<?= $j['id']; ?>" <?php if ($j['id'] == $data_client['JenisPT']) echo 'selected'; ?>>
                                            <?= $j['name_pt']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <input type="text" class="form-control" placeholder="PIC" name="pic" value="<?= $data_client['pic']; ?>">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <input type="number" class="form-control" placeholder="Whatsapp" name="whatsapp" value="<?= $data_client['whatsapp']; ?>">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $data_client['email']; ?>">
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="status" id="status" class="form-control">
                                    <option disabled>Pilih Status</option>
                                    <?php foreach ($status as $s) : ?>
                                        <option value="<?= $s['id']; ?>" <?php if ($s['id'] == $data_client['status_member']) echo 'selected'; ?>>
                                            <?= $s['name_mem']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="sph" id="sph" class="form-control">
                                    <option selected disabled>SPH </option>
                                    <?php foreach ($sph as $sp) : ?>
                                        <option value="<?= $sp['id']; ?>" <?php if ($sp['id'] == $data_client['sph']) echo 'selected'; ?>>
                                            <?= $sp['name_sp']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="spk" id="spk" class="form-control">
                                    <option disabled>SPK</option>
                                    <?php foreach ($stat as $st) : ?>
                                        <option value="<?= $st['id']; ?>" <?php if ($st['id'] == $data_client['spk']) echo 'selected'; ?>>
                                            <?= $st['name_sur']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="sla" id="sla" class="form-control">
                                    <option selected disabled>SLA</option>
                                    <?php foreach ($sla as $sl) : ?>
                                        <option value="<?= $sl['id']; ?>" <?php if ($sl['id'] == $data_client['sla']) echo 'selected'; ?>>
                                            <?= $sl['name_sl']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="instalasi" id="instalasi" class="form-control">
                                    <option disabled>Instalasi</option>
                                    <?php foreach ($instal as $i) : ?>
                                        <option value="<?= $i['id']; ?>" <?php if ($i['id'] == $data_client['instalasi']) echo 'selected'; ?>>
                                            <?= $i['name_inst']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="input-group col-12">
                                <select name="migrasi" id="migrasi" class="form-control">
                                    <option selected disabled>Migrasi</option>
                                    <?php foreach ($migrasi as $m) : ?>
                                        <option value="<?= $m['id']; ?>" <?php if ($m['id'] == $data_client['migrasi_data']) echo 'selected'; ?>>
                                            <?= $m['name_mig']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-3 mb-3">
                            <div class="input-group col-12">
                                <select name="pelatihan" id="pelatihan" class="form-control">
                                    <option selected disabled>Pelatihan</option>
                                    <?php foreach ($pelatih as $p) : ?>
                                        <option value="<?= $p['id']; ?>" <?php if ($p['id'] == $data_client['pelatihan']) echo 'selected'; ?>>
                                            <?= $p['name_pelat']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mt-2 mb-3">
                            <div class="input-group col-12">
                                <select name="invoice" id="invoice" class="form-control">
                                    <option disabled>Select Invoice</option>
                                    <?php foreach ($invo as $in) : ?>
                                        <option value="<?= $in['id']; ?>" <?php if ($in['id'] == $data_client['invoice']) echo 'selected'; ?>>
                                            <?= $in['name_inv']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url('leads'); ?>" class="btn btn-danger btn-sm mb-2 mr-2">Back</a>
                        <button class="btn btn-primary btn-sm mb-2 mr-2" type="submit" id="submitBtn">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section> -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Tables</h1>
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
                        <h5 class="card-title"> </h5>
                        <form action="<?= base_url('leads/edit/' . $data_client['id']); ?>" method="post">
                            <input type="hidden" value="<?= $data_client['id']; ?>">

                            <div class="row">
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <input type="text" class="form-control" placeholder="Nama Kampus" name="namakampus" value="<?= $data_client['name_client']; ?>">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="provinsi" id="provinsi" class="form-control">
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="kota" id="kota" class="form-control">
                                            <option value="">Pilih Kab/Kota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $data_client['alamat']; ?>">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="jenispt" id="jenispt" class="form-control">
                                            <option disabled>Pilih Jenis PT</option>
                                            <?php foreach ($jenis as $j) : ?>
                                                <option value="<?= $j['id']; ?>" <?php if ($j['id'] == $data_client['JenisPT']) echo 'selected'; ?>>
                                                    <?= $j['name_pt']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <input type="text" class="form-control" placeholder="PIC" name="pic" value="<?= $data_client['pic']; ?>">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <input type="number" class="form-control" placeholder="Whatsapp" name="whatsapp" value="<?= $data_client['whatsapp']; ?>">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?= $data_client['email']; ?>">
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="status" id="status" class="form-control">
                                            <option disabled>Pilih Status</option>
                                            <?php foreach ($status as $s) : ?>
                                                <option value="<?= $s['id']; ?>" <?php if ($s['id'] == $data_client['status_member']) echo 'selected'; ?>>
                                                    <?= $s['name_mem']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="sph" id="sph" class="form-control">
                                            <option selected disabled>SPH </option>
                                            <?php foreach ($sph as $sp) : ?>
                                                <option value="<?= $sp['id']; ?>" <?php if ($sp['id'] == $data_client['sph']) echo 'selected'; ?>>
                                                    <?= $sp['name_sp']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="spk" id="spk" class="form-control">
                                            <option disabled>SPK</option>
                                            <?php foreach ($stat as $st) : ?>
                                                <option value="<?= $st['id']; ?>" <?php if ($st['id'] == $data_client['spk']) echo 'selected'; ?>>
                                                    <?= $st['name_sur']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="sla" id="sla" class="form-control">
                                            <option selected disabled>SLA</option>
                                            <?php foreach ($sla as $sl) : ?>
                                                <option value="<?= $sl['id']; ?>" <?php if ($sl['id'] == $data_client['sla']) echo 'selected'; ?>>
                                                    <?= $sl['name_sl']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="instalasi" id="instalasi" class="form-control">
                                            <option disabled>Instalasi</option>
                                            <?php foreach ($instal as $i) : ?>
                                                <option value="<?= $i['id']; ?>" <?php if ($i['id'] == $data_client['instalasi']) echo 'selected'; ?>>
                                                    <?= $i['name_inst']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3">
                                    <div class="input-group col-12">
                                        <select name="migrasi" id="migrasi" class="form-control">
                                            <option selected disabled>Migrasi</option>
                                            <?php foreach ($migrasi as $m) : ?>
                                                <option value="<?= $m['id']; ?>" <?php if ($m['id'] == $data_client['migrasi_data']) echo 'selected'; ?>>
                                                    <?= $m['name_mig']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-3 mb-3">
                                    <div class="input-group col-12">
                                        <select name="pelatihan" id="pelatihan" class="form-control">
                                            <option selected disabled>Pelatihan</option>
                                            <?php foreach ($pelatih as $p) : ?>
                                                <option value="<?= $p['id']; ?>" <?php if ($p['id'] == $data_client['pelatihan']) echo 'selected'; ?>>
                                                    <?= $p['name_pelat']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mt-2 mb-3">
                                    <div class="input-group col-12">
                                        <select name="invoice" id="invoice" class="form-control">
                                            <option disabled>Select Invoice</option>
                                            <?php foreach ($invo as $in) : ?>
                                                <option value="<?= $in['id']; ?>" <?php if ($in['id'] == $data_client['invoice']) echo 'selected'; ?>>
                                                    <?= $in['name_inv']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="<?= base_url('leads'); ?>" class="btn btn-danger btn-sm mb-2 mr-2">Back</a>
                                <button class="btn btn-primary btn-sm mb-2 mr-2" type="submit" id="submitBtn">Submit</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>

</main>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script>
    $(document).ready(function() {
        // Fetch province data from the API
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                var selectElement = $('#provinsi');
                selectElement.empty(); // Clear existing options

                // Add the default option
                selectElement.append('<option value="">Pilih Provinsi</option>');

                // Loop through the API data and add options
                provinces.forEach(province => {
                    selectElement.append(`<option value="${province.name}">${province.name}</option>`);
                });

                // Fetch selected province value from the database (replace with your database retrieval code)
                var selectedProvinceValue = '<?= $data_client['provinsi']; ?>';

                // Set the selected option based on the value from the database
                selectElement.val(selectedProvinceValue);
            })
            .catch(error => {
                console.error('Failed to fetch data from the API:', error);
            });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        var selectProvinsi = $('#provinsi');
        var selectKota = $('#kota');
        var selectedProvinsiValue = '<?= $data_client['provinsi']; ?>'; // Ambil data provinsi yang telah dipilih sebelumnya
        var selectedKotaValue = '<?= $data_client['kota']; ?>'; // Ambil data kota yang telah dipilih sebelumnya

        // Fetch province data from the API
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                selectProvinsi.empty(); // Clear existing options
                selectKota.empty(); // Clear existing options

                // Add the default options
                selectProvinsi.append('<option value="">Pilih Provinsi</option>');
                selectKota.append('<option value="">Pilih Kab/Kota</option>');

                // Loop through the API data and add options to the "Provinsi" dropdown
                provinces.forEach(province => {
                    var option = `<option value="${province.name}">${province.name}</option>`;
                    selectProvinsi.append(option);
                });

                // Set the selected option for "Provinsi" based on the value from before
                selectProvinsi.val(selectedProvinsiValue);

                // Event listener for when "Provinsi" is selected
                selectProvinsi.on('change', function() {
                    var selectedProvince = $(this).val();
                    // Clear existing options in "Kota" dropdown

                    // Fetch city data from the API based on the selected province
                    if (selectedProvince !== "") {
                        var selectedProvinceData = provinces.find(province => province.name === selectedProvince);
                        var selectedProvinceId = selectedProvinceData.id;
                        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`)
                            .then(response => response.json())
                            .then(cities => {
                                // Add the default option to "Kota" dropdown
                                selectKota.append('<option value="">Pilih Kab/Kota</option>');

                                // Loop through the API data and add options to the "Kota" dropdown
                                cities.forEach(city => {
                                    var option = `<option value="${city.name}">${city.name}</option>`;
                                    selectKota.append(option);
                                });

                                // Set the selected option for "Kota" based on the value from before
                                selectKota.val(selectedKotaValue);
                            })
                            .catch(error => {
                                console.error('Failed to fetch city data from the API:', error);
                            });
                    }
                });
            })
            .catch(error => {
                console.error('Failed to fetch province data from the API:', error);
            });
    });
</script> -->

<!-- <script>
    $(document).ready(function() {
        var selectProvinsi = $('#provinsi');
        var selectKota = $('#kota');
        var selectedProvinsiValue = '<?= $data_client['provinsi']; ?>'; // Ambil data provinsi yang telah dipilih sebelumnya
        var selectedKotaValue = '<?= $data_client['kota']; ?>'; // Ambil data kota yang telah dipilih sebelumnya

        // Fetch province data from the API
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                selectProvinsi.empty(); // Clear existing options
                selectKota.empty(); // Clear existing options

                // Add the default options
                selectProvinsi.append('<option value="">Pilih Provinsi</option>');
                selectKota.append('<option value="">Pilih Kab/Kota</option>');

                // Loop through the API data and add options to the "Provinsi" dropdown
                provinces.forEach(province => {
                    var option = `<option value="${province.name}">${province.name}</option>`;
                    selectProvinsi.append(option);
                });

                // Set the selected option for "Provinsi" based on the value from before
                selectProvinsi.val(selectedProvinsiValue);

                // Event listener for when "Provinsi" is selected
                selectProvinsi.on('change', function() {
                    var selectedProvince = $(this).val();
                    selectKota.empty(); // Clear existing options in "Kota" dropdown

                    // Fetch city data from the API based on the selected province
                    if (selectedProvince !== "") {
                        var selectedProvinceData = provinces.find(province => province.name === selectedProvince);
                        var selectedProvinceId = selectedProvinceData.id;
                        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`)
                            .then(response => response.json())
                            .then(cities => {
                                // Add the default option to "Kota" dropdown
                                selectKota.append('<option value="">Pilih Kab/Kota</option>');

                                // Loop through the API data and add options to the "Kota" dropdown
                                cities.forEach(city => {
                                    var option = `<option value="${city.name}">${city.name}</option>`;
                                    selectKota.append(option);
                                });

                                // Set the selected option for "Kota" based on the value from before
                                selectKota.val(selectedKotaValue);
                            })
                            .catch(error => {
                                console.error('Failed to fetch city data from the API:', error);
                            });
                    }
                });
            })
            .catch(error => {
                console.error('Failed to fetch province data from the API:', error);
            });
    });
</script> -->

<script>
    $(document).ready(function() {
        // Fetch province data from the API
        fetch('https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json')
            .then(response => response.json())
            .then(provinces => {
                var selectProvinsi = $('#provinsi');
                selectProvinsi.empty(); // Clear existing options

                // Add the default option
                selectProvinsi.append('<option value="">Pilih Provinsi</option>');

                // Loop through the API data and add options
                provinces.forEach(province => {
                    selectProvinsi.append(`<option value="${province.name}">${province.name}</option>`);
                });

                // Fetch selected province value from the database (replace with your database retrieval code)
                var selectedProvinceValue = '<?= $data_client['provinsi']; ?>';

                // Set the selected option based on the value from the database
                selectProvinsi.val(selectedProvinceValue);

                // Fetch city data from the API based on the selected province
                var selectedProvinceId = provinces.find(province => province.name === selectedProvinceValue).id;
                fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${selectedProvinceId}.json`)
                    .then(response => response.json())
                    .then(cities => {
                        var selectKota = $('#kota');
                        selectKota.empty(); // Clear existing options

                        // Add the default option
                        selectKota.append('<option value="">Pilih Kab/Kota</option>');

                        // Loop through the API data and add options
                        cities.forEach(city => {
                            selectKota.append(`<option value="${city.name}">${city.name}</option>`);
                        });

                        // Fetch selected city value from the database (replace with your database retrieval code)
                        var selectedCityValue = '<?= $data_client['kota']; ?>';

                        // Set the selected option based on the value from the database
                        selectKota.val(selectedCityValue);
                    })
                    .catch(error => {
                        console.error('Failed to fetch city data from the API:', error);
                    });
            })
            .catch(error => {
                console.error('Failed to fetch province data from the API:', error);
            });
    });
</script>