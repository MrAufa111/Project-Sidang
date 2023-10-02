<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.css">
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


    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</body>

</html>