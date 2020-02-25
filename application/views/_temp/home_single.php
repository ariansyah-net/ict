<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link rel='shortcut icon' href='<?=base_url('arians/img/favicon.svg')?>'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="<?=base_url('arians/home/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?=base_url('arians/home/css/mdb.min.css')?>" rel="stylesheet">
  <style>
    html,
        body,
        header{
          height: 80px;
        }

        @media (max-width: 740px) {
          html,
          body,
          header {
            height: 75px;
          }
        }

        @media (min-width: 800px) and (max-width: 1030px) {
          html,
          body,
          header{
            height: 80px;
          }
        }

        .intro-2 {
            background: url("../arians/home/img/architecture.jpg")no-repeat center center;
            background-size: cover;
        }

        /* .top-nav-collapse {
            background-color: #929fba !important;
        } */
        /*.navbar:not(.top-nav-collapse) {
            background: #929fba !important;
        }*/
        /*@media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #929fba !important;
            }
        }*/
        h6 {
            line-height: 1.7;
        }
        .rgba-gradient {
            background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(50, 189, 229, 0.6) 100%);
            background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(50, 189, 229, 0.6) 100%);
            background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.6)), to(rgba(50, 189, 229, 0.6)));
            background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.6), rgba(50, 189, 229, 0.6) 100%);
            background: linear-gradient(to 45deg, rgba(42, 27, 161, 0.6), rgba(50, 189, 229, 0.6) 100%);
        }
        @media (max-width: 450px) {
          .margins {
              margin-right: 1rem;
              margin-left: 1rem;
          }
        }
        
    </style>
</head>

<body>

<header>
<?php $this->load->view('_temp/home_navbar')?>
</header>

<?php $this->load->view($main_view)?>

<?php $this->load->view('_temp/home_footer')?>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/jquery-3.4.1.min.js');?>"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/popper.min.js');?>"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/bootstrap.min.js')?>"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?=base_url('arians/home/js/mdb.min.js')?>"></script>
  <script>new WOW().init();</script>
  <script>
  $(function() {
     $('#flash').delay(500).slideDown('normal', function() {
        $(this).delay(3500).slideUp();
     });
  });
// popovers Initialization
$(function () {
$('[data-toggle="popover"]').popover()
});
  </script>
</body>
</html>
