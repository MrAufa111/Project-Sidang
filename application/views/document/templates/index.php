<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $title; ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="icon" href="<?= base_url() ?>assets/img/Asset 14.png">
    <link href="<?= base_url() ?>assets/img/Asset 14.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="<?= base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('document/templates/topbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- /.sidebar -->
        <?php $this->load->view('document/templates/sidebar') ?>

        <div class="content-wrapper" id="content">
            <?php
            $directory = isset($page) ? dirname($page) : 'admin';
            $page = isset($page) ? basename($page) : 'index';
            $contentFile = APPPATH . 'views/' . $directory . '/' . $page . '.php';

            if (file_exists($contentFile)) {
                $this->load->view($directory . '/' . $page);
            } else {
                redirect(404);
            }
            ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php $this->load->view('document/templates/footer.php'); ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="<?= base_url(); ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/quill/quill.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>

    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    <!-- Template Main JS File -->

</body>
<script>
    function Previewimgmenu() {
        const menu_image = document.querySelector('#menu_image');
        const imgPreview = document.querySelector('.img-preview-menu');

        const fileImage = new FileReader();
        fileImage.readAsDataURL(menu_image.files[0]);

        fileImage.onload = function (e) {
            imgPreview.src = e.target.result;
        }
    }


    // function load_content(url) {

    //     var cek_logout;
    //     $(".loading").fadeIn('fast', function() {
    //         $.ajax({
    //             url: "<?= base_url() ?>welcome/coba",
    //             type: "POST",
    //             data: {
    //                 uri: url
    //             },
    //             dataType: "json",
    //             success: function(data) {
    //                 cek_logout = data;
    //             }
    //         }).done(function() {
    //             if (cek_logout.status == 'login') {
    //                 if (cek_logout.akses == 'TIDAK') {
    //                     url = 'c_block';
    //                 }

    //                 $(".content-wrapper").load("<?= base_url(); ?>index.php/" + url, function() {
    //                     $(".loading").fadeOut('fast');
    //                     var abc = $('.submenu').val();
    //                 });
    //             } else {
    //                 window.location.href = "<?= base_url() ?>";
    //             }
    //         });
    //     });
    //     if (url == 'dashboard') {
    //         $('body').addClass('bg-white');
    //     } else {
    //         $('body').removeClass('bg-white');
    //     }
    // }
</script>

</html>