<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
  
  <div class="card o-hidden border-0 shadow-lg my-5">
  <!-- <h5 class="card-header primary-color white-text text-center py-4"><strong>Sign in</strong></h5> -->
  <?php $this->load->view('_partial/flash_message') ?>
  <div class="card-body px-lg-4 pt-4">

    <div class="form-header secondary-color">
    <h5 class="white-text text-center py-1"><i class="fas fa-ban"></i> Forgot Password?</h5>
    </div>
    <p class="text-center text-muted">
      We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!
    </p>

      <?= form_open('auth/forgotpassword', ['class'=>'text-center']); ?>
      <div class="md-form">
        <i class="fas fa-envelope prefix grey-text d-flex"></i>
        <?= form_input('email', '', array('class' => 'form-control','id'=>'email')) ?>
        <?= form_label('Email', '')?>
      </div>
      
    <button class="btn btn-secondary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Send</button>
    <!-- Social login -->
    <p class="text-muted">or sign in with</p>
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
