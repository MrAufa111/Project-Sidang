<!-- Content Header (Page header) -->
<div class="content-header"></div>

<div class="container-fluid ">
    <div class="ml-4 mr-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <p style="font-weight: bold;" class="h4">Diagram Client</p>
                        </div>
                        <canvas id="chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-center mt-2">
                                    <p style="font-weight: bold;" class="h4">Diagram Client</p>
                                </div>
                                <canvas id="pie"></canvas>
                            </div>
                            <div class="col-6">
                                <div class="text-center mt-2">
                                    <p style="font-weight: bold;" class="h4">Diagram Client</p>
                                </div>
                                <canvas id="pie1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-6 d-flex justify-content-center">
                                <?php foreach (array_slice($dashboard, 0, 3) as $d) : ?>
                                    <div class="col-4 ml-1">
                                        <a href="<?= base_url($d['link']); ?>">
                                            <div class="card shadow">
                                                <div class="card-body d-flex justify-content-center align-content-center" style="height: 70%">
                                                    <div>
                                                        <img src="<?= base_url(); ?>assets/img/menu/<?= $d['image']; ?>" alt="" class="img-fluid" width="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <p><?= $d['name']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class=" col-lg-6 d-flex justify-content-center">
                                <?php foreach (array_slice($dashboard, 3, 3) as $d) : ?>
                                    <div class="col-4 ml-1">
                                        <a href="<?= base_url(); ?><?= $d['link']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body d-flex justify-content-center align-content-center" style="height: 70%">
                                                    <div>
                                                        <img src="<?= base_url(); ?>assets/img/menu/<?= $d['image']; ?>" class="img-fluid" alt="" width="100">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="text-center">
                                            <p><?= $d['name']; ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- /.content -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    const cfg = document.getElementById('chart');
    const cgf = document.getElementById('chart2');
    const ctx = document.getElementById('pie');
    const cxt = document.getElementById('pie1');

    new Chart(cfg, {
        type: 'line',
        data: {
            labels: [
                'Nanggroe ',
                'Sumatera ',
                'Sumatera ',
                'Sumatera ',
                'Bengkulu ',
                'Riau ',
                'Kepulauan ',
                'Jambi ',
                'Lampung ',
                'Bangka ',
                'Kalimantan ',
                'Banten ',
                'Kalimantan ',
                'Banten ',
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100, 20, 50, 40, 30, 500, 30],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }],
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }

    });
    new Chart(cgf, {
        type: 'line',
        data: {
            labels: [
                'Nanggroe ',
                'Sumatera ',
                'Sumatera ',
                'Sumatera ',
                'Bengkulu ',
                'Riau ',
                'Kepulauan ',
                'Jambi ',
                'Lampung ',
                'Bangka ',
                'Kalimantan ',
                'Banten ',
                'Kalimantan ',
                'Banten ',
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100, 20, 50, 40, 30, 500, 30],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }],
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            }
        }

    });
    new Chart(ctx, {
        type: 'pie',
        data: {

            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100, 20, 50, 40, 30, 500, 30],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },

    });
    new Chart(cxt, {
        type: 'pie',
        data: {

            datasets: [{
                label: 'My First Dataset',
                data: [300, 50, 100, 20, 50, 40, 30, 500, 30],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        },

    });
</script>