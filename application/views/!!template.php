<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>IT Management Asset</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('arians/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?= base_url('arians/css/mdb.min.css')?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= base_url('arians/css/style.css')?>" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
  <?php $this->load->view('_partial/flash_message') ?>

  <div class="d-flex" id="wrapper">
    <?php $this->load->view('sidebar') ?>
    <div id="page-content-wrapper"> <!-- Page Content -->
      <?php $this->load->view('navbar') ?>
          <?php $this->load->view($main_view) ?>
        </div>
      </div>


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?= base_url('arians/js/jquery-3.4.1.min.js')?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?= base_url('arians/js/popper.min.js')?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?= base_url('arians/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?= base_url('arians/js/mdb.min.js')?>"></script>


  <!-- Menu Toggle Script -->
  <!-- <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script> -->

  <script type="text/javascript">
      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
              $(this).toggleClass('active');
          });
      });
  </script>

</body>
</html>
