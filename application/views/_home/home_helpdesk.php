<div class="container my-5">
<div class="card mb-4">
  <div class="card-body">
    <?php $this->load->view('_partial/flash_message') ?>
      <h4 class="h3 text-center mb-5">PUSAT BANTUAN</h4>
      <p class="text-center grey-text mb-5 lead">
      Selamat Datang di pusat bantuan IT,
      Untuk merampingkan permintaan bantuan dan melayani Anda dengan lebih baik, kami menggunakan sistem tiket bantuan. Setiap permintaan bantuan mendapatkan nomor tiket unik yang dapat Anda gunakan untuk melacak kemajuan dan tanggapan secara online. Untuk referensi Anda, kami menyediakan arsip lengkap dan riwayat semua permintaan dukungan Anda. Diperlukan alamat email yang valid untuk mengirimkan tiket. <br>Silahkan lengkapi data dibawah ini
      </p>

<hr class="my-3">

        <div class="row">
          <div class="col-md-9 mb-md-0 mb-5">

              <?= form_open('home/helpdesk_process') ?>
                <div class="row">
                <!--Name-->
                <div class="col-md-6 wow fadeInUp">
                <div class="md-form mb-0">
                <input type="text" id="name" name="a" class="form-control" value="<?= set_value('a') ?>" required>
                <label for="name" class="">Nama</label>
                </div>
                </div>
                <!--Email-->
                <div class="col-md-6 wow fadeInUp">
                <div class="md-form mb-0">
                <input type="email" id="email" name="b" class="form-control" value="<?= set_value('b') ?>" required>
                <label for="email" class="">Email Anda</label>
                <small class="form-text text-muted">Email anda tidak akan ditampilkan ke publik</small>
                </div>
                </div>
                </div>

                <div class="row">
                <!--Phone-->
                <div class="col-md-6 wow fadeInUp">
                <div class="md-form mb-0">
                <input type="text" id="phone" name="c" class="form-control" value="<?= set_value('c') ?>" required>
                <label for="phone" class="">No. Telp</label>
                </div>
                </div>

                </div>

                <!--Ringkasan Masalah-->
                <div class="row">
                <div class="col-md-12 wow fadeInUp">
                <div class="md-form mb-0">
                <input type="text" id="subject" name="c" class="form-control" value="<?= set_value('c') ?>" required>
                <label for="subject" class="">Judul Masalah</label>
                </div>
                </div>
                </div>

                <!--Detail Problem-->
                <div class="row">
                <div class="col-md-12 wow fadeInUp">
                <div class="md-form">
                <textarea type="text" id="message" name="d" rows="4" class="form-control md-textarea" required><?= set_value('d') ?></textarea>
                <label for="message">Detail Masalah Anda</label>
                </div>
                </div>
                </div>

                <!--Captcha Image-->
                <div class="row">
                <div class="col-md-4">
                <div class="md-form">
                <?php echo $img; ?>
                </div>
                </div>
                <!--Captcha Form-->
                <div class="col-md-6 wow fadeInUp">
                <div class="md-form">
                <?= form_input('captcha', '', array('id'=>'captcha','class' => 'form-control','required' => 'required')) ?>
                <label for="captcha">Masukan Captcha</label>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-md-12 mt-4 wow fadeInLeft">
                <div class="text-left">
                <button type='submit' name='submit' class='btn btn-primary'>Kirim Tiket Bantuan <i class='fas fa-paper-plane ml-2'></i></button>
                </div>
                </div>
                </div>
                </div><!--Grid column-->
                <?= form_close() ?>

                <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                <li class="wow fadeInDown mt-5">
                <p class="mb-0"><a class="btn btn-primary btn-rounded"><i class="fas fa-list"></i> Daftar Tiket</a>
                </li>
                <li class="wow fadeInDown mt-5">
                <p class="mb-0"><a class="btn btn-info btn-rounded"><i class="fas fa-check"></i> Cek Tiket Anda</a>
                </li>
                <li class="wow fadeInUp mt-5">
                <p class="mb-0"><a href="<?=base_url('home/contact')?>" class="btn btn-danger btn-rounded"><i class="far fa-user"></i> Kontak Kami</a>
                </li>
                </ul>
                </div><!--Grid column-->
            </div>
        <!-- </section> -->
      </div>
    </div>
</div>
