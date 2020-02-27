<?php
    $is_login       = $this->session->userdata('is_login');
    $id_users       = $this->session->userdata('id_users');
    $first_name     = $this->session->userdata('first_name');
    $email          = $this->session->userdata('email');
    $phone          = $this->session->userdata('phone');
?>

<?php if(!$is_login) : ?>

<div class="container my-5">
<section class="contact-section my-5">
    <h4 class="h3 text-center text-muted my-3"><i class="fas fa-envelope pr-2"></i> TIKET BANTUAN</h4>
    <p class="grey-text text-center py-2">Maaf anda harus masuk dulu sebelum mengisi tiket bantuan, silahkan klik tombol dibawah ini :</p>
    <p class="text-center grey-text my-1">
    <a href="<?=base_url('auth')?>" class="btn btn-rounded btn-primary btn-md"><i class="fas fa-sign-in-alt"></i> MASUK</a>
    atau
    <a href="<?=base_url('auth/registration')?>" class="btn btn-rounded btn-success btn-md"><i class="fas fa-users"></i> DAFTAR</a>
    </p>
</section>
</div>    


<?php else: ?>

<div class="container-fluid my-4">
<section class="contact-section my-4">
  <div class="card mx-2">
  <?php $this->load->view('_partial/flash_message') ?>
    <div class="row">
      <div class="col-lg-8">
        <div class="card-body form">
          <?= form_open('home/helpdesk') ?>
          <!-- <h3 class="mt-4 text-secondary"><i class="fas fa-envelope pr-2"></i>Tiket Bantuan</h3> -->
           <h4 class="h3 text-center text-muted my-3"><i class="fas fa-envelope pr-2"></i> TIKET BANTUAN</h4>
           <p class="grey-text text-center pb-3">
              Selamat Datang di menu tiket bantuan,
              Untuk merampingkan permintaan bantuan dan melayani anda dengan lebih baik, kami menggunakan sistem tiket bantuan. Setiap permintaan bantuan mendapatkan nomor tiket unik yang dapat anda gunakan untuk melacak kemajuan dan tanggapan secara online. Untuk referensi anda, kami menyediakan arsip lengkap dan riwayat semua permintaan dukungan anda. Diperlukan alamat email yang valid untuk mengirimkan tiket. Silahkan lengkapi data dibawah ini
            </p>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="name" class="form-control text-muted" value="<?= $first_name ?>" readonly>
                  <?= form_hidden('id_users', $id_users); ?>
                  <label for="name" class="">Nama Anda</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="email" id="email" class="form-control text-muted" value="<?= $email ?>" readonly>
                  <label for="email" class="">Email Anda</label>
                </div>
              </div>
            </div><!-- Grid row -->

            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="phone" class="form-control text-muted" value="<?= $phone ?>" readonly>
                  <label for="phone" class="">Nomor HP</label>
                </div>
              </div>
            </div><!-- Grid row -->

            <!--Ringkasan Masalah-->
            <div class="row">
            <div class="col-md-12 wow fadeInUp">
            <div class="md-form mb-0">
            <input type="text" id="subject" name="a" class="form-control" value="<?= set_value('a') ?>" required>
            <label for="subject" class="">Judul Masalah</label>
            <?= form_error('a', '<small class="text-danger"><i class="fas fa-exclamation-triangle"></i> ', '</small>') ?>
            </div>
            </div>
            </div>

            <!-- Grid row -->
            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <textarea type="text" id="detail" name="b" rows="2" class="form-control md-textarea" required><?= set_value('b') ?></textarea>
                  <label for="detail">Detail Masalah Anda</label>
                  <?= form_error('b', '<small class="text-danger"> <i class="fas fa-exclamation-triangle"></i> ', '</small>') ?>
                </div>
              </div>
            </div><!-- Grid row -->

            <!-- Grid row -->
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <?php echo $img; ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <?= form_input('captcha', '', array('id'=>'captcha','class' => 'form-control','required' => 'required')) ?>
                  <label for="captcha">Masukan Angka</label>
                  <button type='submit' name='submit' class='btn btn-lg btn-floating blue p-0' title='Sent Message'><i class="far fa-paper-plane"></i></button>
                </div>
              </div>
            </div><!-- Grid row -->
              <?= form_close() ?>
          </div>
        </div><!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4">
          <div class="card-body contact text-center h-100 white-text secondary darken-2">
            <h3 class="my-4 pb-2">Frequently Asked Questions (FAQs)</h3>
            <ul class="text-lg-left list-unstyled ml-0">
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Berapa lama proses penanganan keluhan saya?</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Dimana saya dapat memantau keluhan saya?</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Apakah informasi yang saya masukan aman?</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Kapan jadwal maintenance di komputer saya?</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Saya lupa account OPIT saya</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Saya membutuhkan software yang saya inginkan</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Komputer saya tidak bisa konek ke internet</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Saya ingin berbagi printer dengan komputer lain</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Bagaimana melakukan update di Linux?</a></li>
                <li><a class="white-text" href=""><i class="fas fa-caret-right text-white"></i> Saya ingin memuat berita untuk ditampilkan di web</a></li>

              <!-- <li><p><i class="fas fa-map-marker-alt pr-2 white-text"></i>Jakarta, 12640 Indonesia</p></li>
              <li><p><i class="fas fa-phone pr-2 white-text"></i>+62-217-864-727 / Ext : 581</p></li>
              <li><p><i class="fas fa-envelope pr-2 white-text"></i>ict@ffup.org</p></li> -->
            </ul>
            <hr class="hr-light my-4">
            <ul class="list-inline text-center list-unstyled">
              
              <li class="list-inline-item">

                <a href="#" class="p2 fa-lg fb-ic"><i class="fab fa-facebook white-text"> </i></a>
              </li>

              <li class="list-inline-item">
                <a href="#" class="p2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="p2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="p2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>
              </li>
            </ul>

            </div>
          </div><!-- Grid column -->
        </div><!-- Grid row -->
      </div><!-- Form with header -->
    </section>
    <hr>
</div>


<?php endif; ?>