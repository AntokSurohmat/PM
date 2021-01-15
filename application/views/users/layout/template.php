<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>dist/css/skins/_all-skins.min.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
   <!-- Select2 -->
   <link rel="stylesheet" href="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/select2/dist/css/select2.min.css">
   <!-- Me -->
   <link rel="stylesheet" href="<?= base_url('assets/PM/');?>css/me.css">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style type="text/css">
  .form-horizontal .control-label {
    padding-top: 7px;
    margin-bottom: 0;
    text-align: left;
  }
</style>
<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <?php include "header.php"?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <?php include "sidebar.php"?>
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?= $contents; ?>
    </div>


    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <?php include "footer.php"?> 
    </footer>

    <!-- Logout Modal-->
    <div class="modal fade" id="logOutModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-red">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ready to Leave?</h4>
            </div>
            <div class="modal-body">
              <p>Select "Logout" below if you are ready to end your current session.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left " data-dismiss="modal"><i class="fa fa-times"></i>&ensp;Close</button>
              <a class="btn btn-primary " href="<?php echo base_url('auth/logout')?>"><i class="fa fa-sign-out"></i>&ensp;Logout</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery Knob Chart -->
    <!--     <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
    <!-- daterangepicker -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
    <!--     <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script> -->
    <!-- Select2 -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('assets/AdminLTE-2.4.18/');?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script>
      $(function () {
        $('#example1').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example2').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example3').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example4').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example5').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example6').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('#example7').DataTable({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        $('.select2').select2({

          paging : true,
          responsive: true,
          autoWidth: true,
          info: true,
          ordering: true,
          lengthChange: true

        });
        var timeout = 5000; 
        $('.alert').delay(timeout).fadeOut(500);
      })

    </script>
  </body>
  </html>
