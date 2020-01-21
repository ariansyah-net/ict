<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $title ?></title>
  <link rel='shortcut icon' href='<?=base_url('arians/img/favicon.svg')?>'>
  <link href="<?= base_url('arians/adm/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url('arians/adm/css/style.css') ?>" rel="stylesheet">
  <link href="<?= base_url('arians/adm/css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('arians/adm/vendor/datepicker/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('arians/adm/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
  <script src="<?= base_url('arians/adm/vendor/jquery/jquery.min.js')?>"></script>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php $this->load->view('_temp/sidebar')?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <?php $this->load->view('_temp/navbar')?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?php $this->load->view('_partial/flash_message') ?>
          <?php $this->load->view($main_view) ?>
        </div><!-- /.container-fluid -->
      </div><!-- End of Main Content -->
      <?php $this->load->view('_temp/footer')?>
    </div><!-- End of Content Wrapper -->
  </div><!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <!-- <script src="<?= base_url('arians/adm/vendor/jquery/jquery.min.js')?>"></script> -->
  <script src="<?= base_url('arians/adm/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

  <!-- Datepicker -->
  <script src="<?= base_url('arians/adm/vendor/datepicker/js/bootstrap-datepicker.min.js')?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('arians/adm/vendor/jquery-easing/jquery.easing.min.js')?>"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('arians/adm/js/sb-admin-2.min.js')?>"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('arians/adm/vendor/datatables/jquery.dataTables.min.js')?>"></script>
  <!-- <script src="<?= base_url('arians/adm/vendor/chart.js/Chart.min.js')?>"></script> -->
  <!-- Page level custom scripts -->
  <script src="<?= base_url('arians/adm/js/demo/datatables-demo.js')?>"></script>
  <script src="<?= base_url('arians/adm/vendor/datatables/dataTables.bootstrap4.min.js')?>"></script>
  <!-- <script src="<?= base_url('arians/adm/js/demo/chart-area-demo.js')?>"></script> -->
  <!-- <script src="<?= base_url('arians/adm/js/demo/chart-pie-demo.js')?>"></script> -->
  <!-- <script src="<?= base_url('arians/adm/js/upload.js')?>"></script> -->
  <script src="<?= base_url('arians/adm/vendor/tinymce/tinymce.min.js')?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <!-- Show time -->
  <script>
  function showTime() {
     var a_p = ""; var today = new Date(); var curr_hour = today.getHours(); var curr_minute = today.getMinutes(); var curr_second = today.getSeconds();
     if (curr_hour < 12) { a_p = "AM"; } else { a_p = "PM"; }
     if (curr_hour == 0) { curr_hour = 12; }
     if (curr_hour > 12) { curr_hour = curr_hour - 12; }
     curr_hour = checkTime(curr_hour); curr_minute = checkTime(curr_minute); curr_second = checkTime(curr_second);
     document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
     }
  function checkTime(i) {
     if (i < 10) { i = "0" + i;}
     return i;
  }
  setInterval(showTime, 500);
  })
  </script>


<script>
  tinymce.init({
    selector: '#mytextarea',
    plugins: 'print preview fullpage paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ]
  });
//flash message status
$(function() {
   $('#flash').delay(500).slideDown('normal', function() {
      $(this).delay(2500).slideUp();
   });
// Datepicker
   $('.datepicker1').datepicker({
       format: "dd M yyyy"
   });
});
</script>
<script>
$(document).ready(function() {
    $('.multiselect').select2(),
    $('.selectone').select2();
});
</script>




</body>
</html>
