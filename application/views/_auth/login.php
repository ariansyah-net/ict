<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
  
  <div class="card o-hidden border-0 shadow-lg my-5">
  <!-- <h5 class="card-header primary-color white-text text-center py-4"><strong>Sign in</strong></h5> -->

  <div class="card-body px-lg-4 pt-4">

    <div class="form-header primary-color">
    <h5 class="white-text text-center py-1"><i class="fas fa-sign-in-alt"></i> Silahkan Masuk</h5>
    </div>
  <?php $this->load->view('_partial/flash_message') ?>

      <?= form_open('auth', ['class'=>'text-center']); ?>
      <div class="md-form">
        <i class="fas fa-envelope prefix grey-text d-flex"></i>
        <?= form_input('email', set_value('email'), array('class' => 'form-control')) ?>
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
        <?= form_label('Email', '')?>
      </div>

      <div class="md-form">
        <i class="fas fa-lock prefix grey-text d-flex"></i>
        <?= form_password('password', '', array('class' => 'form-control')) ?>
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        <?= form_label('Password', '')?>
      </div>

      <div class="d-flex justify-content-around">
        <div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rm">
            <label class="form-check-label text-muted" for="rm">Ingatkan Saya</label>
          </div>
        </div>
      <div>
          <a href="<?=base_url('auth/forgotPassword')?>">Lupa Password?</a>
        </div>
      </div>
    <button class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Masuk Aplikasi</button>
    <p class="text-muted">Belum punya akun? <a href="<?=base_url('auth/registration')?>"> Daftar dulu</a></p>
    <!-- Social login -->
    <p class="text-muted">Masuk melalui:</p>
    <a type="button" class="btn-floating btn-fb btn-sm" data-toggle="popover" data-placement="left" title="Sorry !" data-content="This feature is under development, please try again later."><i class="fab fa-facebook-f"></i></a>
    <a type="button" class="btn-floating btn-tw btn-sm" data-toggle="popover" data-placement="top" title="Sorry !" data-content="This feature is under development, please try again later."><i class="fab fa-twitter"></i></a>
    <a type="button" class="btn-floating btn-li btn-sm" data-toggle="popover" data-placement="bottom" title="Sorry !" data-content="This feature is under development, please try again later."><i class="fab fa-linkedin-in"></i></a>
    <a type="button" class="btn-floating btn-gplus btn-sm" data-toggle="popover" data-placement="right" title="Sorry !" data-content="This feature is under development, please try again later."><i class="fab fa-google"></i></a>

    <?= form_close()?>
  </div>
</div>
</div><!--end col-->
</div><!--end row-->
</div><!--end container-->
