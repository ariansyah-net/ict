<!--Main Layout-->
<main>

  <div class="container">

    <section class="text-center wow fadeIn" data-wow-delay="0.3s">
      <h1 class="font-weight-bold text-center h1 my-5">Layanan</h1>
      <p class="text-center grey-text mb-5 mx-auto w-responsive lead">
        Untuk memberikan kemudahan dalam mendapatkan informasi yang di inginkan, kami dari tim IT menyediakan beberapa menu layanan yang bisa anda gunakan.
      </p>

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
            <a href="<?=base_url('home/helpdesk')?>" class="btn btn-primary btn-sm ml-0">Buat Tiket Bantuan</a>
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
            <a href="<?=base_url('home/device_tracking')?>" class="btn btn-deep-orange btn-sm ml-0">Lacak Perangkat</a>
          </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 mb-4">
          <div class="col-1 col-md-2 float-left">
            <i class="fas fa-tachometer-alt fa-2x purple-text"></i>
          </div>
          <div class="col-10 col-md-9 col-lg-10 float-right">
            <h4 class="font-weight-bold mb-4">Gudang Software</h4>
            <p class="grey-text">Kami menyediakan daftar perangkat lunak <em>(Software)</em> yang umum digunakan dalam pekerjaan sehari-hari, software tersebut dapat di download disini.</p>
            <a href="<?=base_url('home/downloads')?>" class="btn btn-secondary btn-sm ml-0">Download Software</a>
          </div>
        </div><!--Grid column-->
      </div><!--Grid row-->
    </section>

<hr class="my-5">
</div><!--end container-->


  <!-- Streak Section -->

  <!-- Streak -->
      <div class="streak streak-photo streak-md" style="background-image: url('<?=base_url('arians/img/section.jpg')?>');">
        <div class="flex-center mask rgba-indigo-strong">
          <div class="text-center white-text">
            <h4 class="h4-responsive mb-4"><i class="fas fa-quote-left" aria-hidden="true"></i>
              Tugas utama seorang IT staff adalah merawat software / hardware / komputer yang ada di Instansi / Perusahaan, melakukan perbaikan jika ada yang rusak, memastikan semua hardware dan komputer berfungsi optimal, dan mengevaluasi serta meningkatkan kinerja sistem IT.
              <i class="fas fa-quote-right" aria-hidden="true"></i></h4>
            <h5 class="text-center font-italic wow fadeIn" data-wow-delay="3m">~ IT TEAM</h5>
          </div>
        </div>
      </div>
      <!-- Streak -->


    <!-- <div class="streak streak-lg streak-photo" style="background-image:url('./arians/home/img/architecture.jpg'); no-repeat; background-size: cover; background-position: center center;">
      <div class="flex-center white-text rgba-purple-strong pattern-0">
        <ul class="mb-0 list-unstyled">
          <li>
          <h1 class="h1-responsive font-weight-bold text-center white-text h1 my-4">Apa Tugas IT?</h1>
          <p class="text-center white-text mx-auto w-responsive lead">
          Tugas utama seorang IT staff adalah merawat software/hardware/komputer yang ada di instansi/perusahaan, melakukan perbaikan jika ada yang rusak, memastikan semua hardware dan komputer berfungsi optimal, dan mengevaluasi serta meningkatkan kinerja sistem IT.
          </p>
        </li></ul>
      </div>

</div> -->

<!-- /.Streak Section -->



<div class="container">

    <hr class="my-5">


    <!--Section: Content-->
    <section class="text-center wow fadeIn" data-wow-delay="0.3s">
      <h1 class="font-weight-bold text-center h1 my-5">DATA IT</h1>
      <p class="text-center grey-text mb-5 mx-auto w-responsive lead">
        Kumpulan data ini bersifat dinamis, dirangkum dalam aplikasi OP'IT dapat berubah kapan saja.
      </p>

      <!--Grid row-->
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">
          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-users fa-lg primary-color z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <h5 class="text-uppercase text-muted mb-1"><small>Pengguna Terdaftar</small></h5>
                <h4 class="font-weight-bold mb-0"><?= isset($users) ? $users : '' ?>, -</h4>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="progress md-progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
                  aria-valuemax="100"></div>
              </div>
              <p class="card-text">Terdata pengguna aktif dan nonactive</p>
            </div>

          </div>
          <!-- Admin card -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-laptop-medical fa-lg teal z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <h5 class="text-uppercase text-muted mb-1"><small>Daftar Cek Perawatan</small></h5>
                <h4 class="font-weight-bold mb-0"><?= isset($lm) ? $lm : '' ?>,-th</h4>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="progress md-progress">
                <div class="progress-bar bg-info" role="progressbar" style="width: 40%" aria-valuenow="46" aria-valuemin="0"
                  aria-valuemax="100"></div>
              </div>
              <p class="card-text">Daftar Cek Perawatan Komputer Pengguna</p>
            </div>

          </div>
          <!-- Admin card -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-4 col-md-6 mb-4">

          <!-- Admin card -->
          <div class="card mt-3">

            <div class="">
              <i class="fas fa-chalkboard-teacher fa-lg purple z-depth-2 p-4 ml-3 mt-n3 rounded text-white"></i>
              <div class="float-right text-right p-3">
                <h5 class="text-uppercase text-muted mb-1"><small>Pemecahan Masalah</small></h5>
                <h4 class="font-weight-bold mb-0"><?= isset($ps) ? $ps : '' ?>,-th</h4>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="progress md-progress">
                <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="31" aria-valuemin="0"
                  aria-valuemax="100"></div>
              </div>
              <p class="card-text">Penyelesaian Masalah Dari Semua Pengguna</p>
            </div>

          </div>
          <!-- Admin card -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Content-->

    <div class="container pt-5 my-5 z-depth-1">
     <section class="p-md-3 mx-md-5">
       <div class="row">
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-tv indigo-text pr-2"></i> <?= isset($pc) ? $pc : '' ?> Personal Computer
           </h5>
           <p class="text-muted">
             Data komputer Pengguna dan Laboratorium Tahun Periode <?php echo date('Y') ?>
           </p>
         </div>
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-laptop green-text pr-2"></i> <?= isset($laptop) ? $laptop : '' ?> Laptop
           </h5>
           <p class="text-muted">
             Data Laptop yang tercatat pada aplikasi dan digunakan untuk kegiatan akademik
           </p>
         </div>
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-print amber-text pr-2"></i> <?= isset($printer) ? $printer : '' ?> Printer
           </h5>
           <p class="text-muted">
             Printer yang terdata dari berbagai jenis dan merk di setiap ruang.
           </p>
         </div>
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-network-wired red-text pr-2"></i> <?= isset($switch) ? $switch : '' ?> Switch Hub
           </h5>
           <p class="text-muted mb-lg-0">
             Perangkat Jaringan Switch Untuk Kebutuhan Jaringan Internet
           </p>
         </div>
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-wifi lime-text pr-2"></i> <?= isset($ap) ? $ap : '' ?> Access Point
           </h5>
           <p class="text-muted mb-lg-0">
             Perangkat Jaringan WiFi yang Mencakup Seluruh Gedung FFUP
           </p>
         </div>
         <div class="col-lg-4 col-md-6 mb-5">
           <h5 class="font-weight-bold mb-3">
             <i class="fas fa-server blue-text pr-2"></i> <?= isset($server) ? $server : '' ?> Server Host
           </h5>
           <p class="text-muted mb-lg-0">
             Termasuk PC Server dan Akademik Online untuk menunjang kebutuhan akademik
           </p>
         </div>
       </div>
     </section>
   </div>
   <hr class="my-5">
  </div><!--end container-->
</main><!--Main Layout-->
