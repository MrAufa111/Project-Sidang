<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/img/Asset 14.png">
    <link href="<?= base_url() ?>assets/img/Asset 14.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.css"> -->

    <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

</head>

<body class="hold-transition login-page">

    <?php
    $directory = isset($page) ? dirname($page) : 'auth';
    $page = isset($page) ? basename($page) : 'login';
    $contentFile = APPPATH . 'views/' . $directory . '/' . $page . '.php';

    if (file_exists($contentFile)) {
        $this->load->view($directory . '/' . $page);
    } else {
        $this->load->view('content/default');
    }
    ?>


    <!-- <script src="<?= base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/js/js/main.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</body>

</html>