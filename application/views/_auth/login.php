<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
  
  <div class="card o-hidden border-0 shadow-lg my-4">
  <h5 class="card-header primary-color white-text text-center py-4"><strong>Sign in</strong></h5>
  <?php $this->load->view('_partial/flash_message') ?>
  <div class="card-body px-lg-5 pt-0">

      <?= form_open('auth', ['class'=>'text-center']); ?>
      <div class="md-form">
        <?= form_input('username', '', array('class' => 'form-control','id'=>'username')) ?>
        <?= form_label('Username', '')?>
      </div>

      <div class="md-form">
        <?= form_password('password', '', array('class' => 'form-control','id'=>'password')) ?>
        <?= form_label('Password', '')?>
      </div>

      <div class="d-flex justify-content-around">
        <div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="rm">
            <label class="form-check-label" for="rm">Remember me</label>
          </div>
        </div>
      <div>

          <a href="<?=base_url('auth/forgot')?>">Forgot password?</a>
        </div>
      </div>
    <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

      <!-- Register -->
      <p>Not a member?<a href="<?=base_url('auth/register')?>">Register</a></p>

      <!-- Social login -->
      <p>or sign in with:</p>
      <a type="button" class="btn-floating btn-fb btn-sm"><i class="fab fa-facebook-f"></i></a>
      <a type="button" class="btn-floating btn-tw btn-sm"><i class="fab fa-twitter"></i></a>
      <a type="button" class="btn-floating btn-li btn-sm"><i class="fab fa-linkedin-in"></i></a>
      <a type="button" class="btn-floating btn-git btn-sm"><i class="fab fa-github"></i></a>

    <?= form_close()?>

  </div>

</div>

</div><!--end col-->
</div><!--end row-->
</div><!--end container-->
