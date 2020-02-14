<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-7">
  
  <div class="card o-hidden border-0 shadow-lg my-5">
  <!-- <h5 class="card-header primary-color white-text text-center py-4"><strong>Registration</strong></h5> -->
  <div class="card-body px-lg-4 pt-4">

  <?php $this->load->view('_partial/flash_message') ?>

    <div class="form-header danger-color">
    <h5 class="white-text text-center py-1"><i class="fas fa-users"></i> Registration</h5>
    </div>

      <?= form_open('auth/registration', ['class'=>'user text-center']); ?>

      <div class="form-row">
        <div class="col">
          <!-- First name -->
          <div class="md-form">
              <?= form_input('first_name', set_value('first_name'), array('class' => 'form-control')) ?>
              <?= form_error('first_name', '<small class="text-danger">', '</small>'); ?>
              <?= form_label('First Name', '')?>
          </div>
        </div>
        <div class="col">
          <!-- Last name -->
          <div class="md-form">
              <?= form_input('last_name', set_value('last_name'), array('class' => 'form-control')) ?>
              <?= form_error('last_name', '<small class="text-danger">', '</small>'); ?>
              <?= form_label('Last Name', '')?>
          </div>
        </div>
      </div>
      
      <div class="form-row">
        <div class="col">
          <!-- Phone -->
          <div class="md-form">
          <?= form_input('phone', set_value('phone'), array('class' => 'form-control')) ?>
          <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
          <?= form_label('Phone', '')?>
          </div>
        </div>
        <div class="col">
          <!-- E-mail -->
          <div class="md-form">
          <?= form_input('email', set_value('email'), array('class' => 'form-control')) ?>
          <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          <?= form_label('Email', '')?>
          </div>
        </div>
      </div>

      <div class="form-row">
        <div class="col">
          <!-- Password 1-->
          <div class="md-form">
            <?= form_password('password1', '', array('class'=>'form-control','id'=>'password1')) ?>
            <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
            <?= form_label('Password', '')?>
          </div>
        </div>
        <div class="col">
          <!-- Password 2 -->
          <div class="md-form">
            <?= form_password('password2', '', array('class'=>'form-control','id'=>'password2')) ?>
            <?= form_label('Repeat Password', '')?>
          </div>
        </div>
      </div>

    <button class="btn btn-danger btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign Up Now</button>

    <p class="text-muted">Already have an account? <br />
    <a class="btn btn-outline-danger font-weight-bold btn-sm btn-rounded waves-effect" href="<?=base_url('auth')?>"> Sign In <i class="fas fa-angle-double-right"></i></a></p>

    <?= form_close()?>

  </div>

</div>

</div><!--end col-->
</div><!--end row-->
</div><!--end container-->
