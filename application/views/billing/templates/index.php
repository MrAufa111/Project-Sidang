<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="icon" href="<?= base_url() ?>assets/img/Asset 14.png">
    <link href="<?= base_url() ?>assets/img/Asset 14.png" rel="apple-touch-icon">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.4.0/css/bootstrap-colorpicker.css" integrity="sha512-HcfKB3Y0Dvf+k1XOwAD6d0LXRFpCnwsapllBQIvvLtO2KMTa0nI5MtuTv3DuawpsiA0ztTeu690DnMux/SuXJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/fullcalendar/main.css"> -->
    <!-- <link href="<?= base_url(); ?>assets/vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css" integrity="sha512-8vq2g5nHE062j3xor4XxPeZiPjmRDh6wlufQlfC6pdQ/9urJkU07NM0tEREeymP++NczacJ/Q59ul+/K2eYvcg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
    
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/plugins/select2/css/select2.min.css">
    <link href="<?= base_url(); ?>assets/css/bootstrap-switch-button.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="<?= base_url(); ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url(); ?>assets/css/style copy.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('billing/templates/topbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- /.sidebar -->
        <?php $this->load->view('billing/templates/sidebar') ?>

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

        <?php $this->load->view('billing/templates/footer.php'); ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <!--<script src="<?= base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/adminlte.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script> -->

    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap-switch-button.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>
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

    <!-- Template Main JS File -->
    <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
    <script src="<?= base_url(); ?>assets/js/js/main.js"></script>

</body>
<script>
    function Previewimgmenu() {
        const menu_image = document.querySelector('#menu_image');
        const imgPreview = document.querySelector('.img-preview-menu');

        const fileImage = new FileReader();
        fileImage.readAsDataURL(menu_image.files[0]);

        fileImage.onload = function(e) {
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