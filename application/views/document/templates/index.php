<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('document/templates/header'); ?>
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php $this->load->view('document/templates/topbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('document/templates/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view($abc); ?>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <?php $this->load->view('document/templates/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url() ?>assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="<?= base_url() ?>assets/js/adminlte.js"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="<?= base_url() ?>assets/vendor/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url() ?>assets/js/pages/dashboard3.js"></script>
</body>

</html>