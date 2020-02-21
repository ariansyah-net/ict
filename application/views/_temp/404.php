<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="<?=base_url('arians/home/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?=base_url('arians/home/css/mdb.min.css')?>" rel="stylesheet">
  <style>
    html,
        body,
        header,
        .view {
          height: 100px;
        }

        @media (max-width: 740px) {
          html,
          body,
          header,
          .view {
            height: 100px;
          }
        }

        @media (min-width: 800px) and (max-width: 1030px) {
          html,
          body,
          header,
          .view  {
            height: 650px;
          }
        }

        .intro-2 {
            background: url("../arians/home/img/architecture.jpg")no-repeat center center;
            background-size: cover;
        }

        /* .top-nav-collapse {
            background-color: #929fba !important;
        } */
        .navbar:not(.top-nav-collapse) {
            background: #929fba !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #929fba !important;

            }
        }
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

<main>
  <div class="container">

    <section class="text-center pt-5 wow fadeIn" data-wow-delay="0.3s">
        
      <img src="<?= base_url('arians/img/panda.png')?>">
      <h4 class="font-weight-bold text-center text-danger h4 my-2">Yaahh.. Ga Ada..</h4>
      <p class="text-center grey-text mx-auto w-responsive">Khmm.. halaman yang anda cari tidak ditemukan, pastikan url yang anda tuju sudah benar.</p>
      <p><a href="<?=base_url()?>" class="btn btn-secondary btn-rounded btn-sm"><i class="fas fa-arrow-left mr-2"></i> Kembali</a></p>
      <hr class="my-5">
        <!--Grid row-->
        <div class="row text-left">
          <!--Grid column-->
          <div class="col-md-4 mb-4">
            <div class="col-1 col-md-2 float-left">
              <i class="fas fa-bullhorn fa-2x blue-text"></i>
            </div>
            <div class="col-10 col-md-9 col-lg-10 float-right">
              <h4 class="font-weight-bold mb-4">Tiket Bantuan</h4>
              <p class="grey-text">Punya keluhan terhadap pelayanan dibidang IT? atau punya masalah pada perangkat komputer anda? buat tiket bantuan disini, dan kami akan membantu anda.</p>
              <a class="btn btn-primary btn-sm ml-0">Buat Tiket Bantuan</a>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">
            <div class="col-1 col-md-2 float-left">
              <i class="fas fa-chalkboard-teacher fa-2x orange-text"></i>
            </div>
            <div class="col-10 col-md-9 col-lg-10 float-right">
              <h4 class="font-weight-bold mb-4">Lacak Perangkat</h4>
              <p class="grey-text">Setiap perangkat keras IT <em>(Hardware)</em> memiliki barcode yang dapat di ketahui jenis dan spesifikasinya, anda bisa mengetahui hal itu dengan melacaknya disini.</p>
              <a class="btn btn-deep-orange btn-sm ml-0">Lacak Perangkat</a>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-4 mb-4">
            <div class="col-1 col-md-2 float-left">
              <i class="fas fa-tachometer-alt fa-2x purple-text"></i>
            </div>
            <div class="col-10 col-md-9 col-lg-10 float-right">
              <h4 class="font-weight-bold mb-4">Download Software</h4>
              <p class="grey-text">Kami menyediakan daftar perangkat lunak <em>(Software)</em> yang umum digunakan dalam pekerjaan sehari-hari, software tersebut dapat di download disini.</p>
              <a class="btn btn-secondary btn-sm ml-0">Download Software</a>
            </div>
          </div><!--Grid column-->
        </div><!--Grid row-->
      </section>

</div>
  </main>


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
</body>
</html>
