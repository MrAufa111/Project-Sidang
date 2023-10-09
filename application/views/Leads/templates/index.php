<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('Leads/templates/head'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= base_url(); ?>assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->
        <!-- Navbar -->
        <?php $this->load->view('Leads/templates/topbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('Leads/templates/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view($abc); ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php $this->load->view('Leads/templates/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->

    <script src="<?= base_url(); ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?= base_url(); ?>assets/js/adminlte.js"></script>
    <!-- OPTIONAL SCRIPTS -->
    <!-- <script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url(); ?>assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="<?= base_url(); ?>assets/dist/js/pages/dashboard3.js"></script> -->
</body>

</html>