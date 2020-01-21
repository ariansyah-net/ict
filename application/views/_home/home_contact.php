<div class="container my-5">
<section class="contact-section my-5">
  <div class="card">
  <?php $this->load->view('_partial/flash_message') ?>
    <div class="row">
      <div class="col-lg-8">
        <div class="card-body form">
          <?= form_open('home/cek') ?>
          <h3 class="mt-4"><i class="fas fa-envelope pr-2"></i>Write to us:</h3>

            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="name" name="a" class="form-control" value="<?= set_value('a') ?>" required>
                  <label for="name" class="">Nama Anda</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="email" id="email" name="b" class="form-control" value="<?= set_value('b') ?>" required>
                  <label for="email" class="">Email Anda</label>
                </div>
              </div>
            </div><!-- Grid row -->

            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" id="subject" name="c" class="form-control" value="<?= set_value('c') ?>" required>
                  <label for="subject" class="">Subjek</label>
                </div>
              </div>
            </div><!-- Grid row -->

            <!-- Grid row -->
            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <textarea type="text" id="message" name="d" rows="2" class="form-control md-textarea" required><?= set_value('d') ?></textarea>
                  <!-- <textarea type="text" id="form-contact-message" class="form-control md-textarea" rows="2"></textarea> -->
                  <label for="message">Pesan Anda</label>
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
                  <label for="captcha">Captcha</label>
                  <button type='submit' name='submit' class='btn btn-lg btn-floating blue p-0' title='Sent Message'><i class="far fa-paper-plane"></i></button>
                </div>
              </div>
            </div><!-- Grid row -->
              <?= form_close() ?>
          </div>
        </div><!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4">
          <div class="card-body contact text-center h-100 white-text light-blue darken-2">
            <h3 class="my-4 pb-2">Contact information</h3>
            <ul class="text-lg-left list-unstyled ml-4">
              <li><p><i class="fas fa-map-marker-alt pr-2 white-text"></i>Jakarta, 12640 Indonesia</p></li>
              <li><p><i class="fas fa-phone pr-2 white-text"></i>+62-217-864-727 / Ext : 581</p></li>
              <li><p><i class="fas fa-envelope pr-2 white-text"></i>ict@ffup.org</p></li>
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
