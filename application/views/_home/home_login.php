<main>
<div class="container my-5">

  <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-12 col-md-9">


<div class="card">
  <h5 class="card-header secondary-color white-text text-center py-4">
    <strong>Silahkan Masuk</strong>
  </h5>
  <?php $this->load->view('_partial/flash_message') ?>
  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

      <?= form_open('login'); ?>

      <!--Username -->
      <div class="md-form">
        <?= form_input('username', $input->username, array('class' => 'form-control','id'=>'username')) ?>
        <label for="username">Username</label>
      </div>

      <!-- Password -->
      <div class="md-form">
        <?= form_password('password', $input->password, array('class' => 'form-control', 'id' => 'password')) ?>
        <label for="password">Password</label>
      </div>

      <button class="btn btn-outline-danger btn-rounded btn-block my-4 waves-effect z-depth-0 my-5" type="submit">Masuk Aplikasi</button>

        <div class="d-flex justify-content-around mt-5">
          <p><a href="">Daftar</a></span></p>
          <p><a href="#" data-toggle="modal" data-target="#logoutModal">Lupa Password?</a></span></p>
      </div>

      <?= form_close(); ?>

  </div>
</div>


</div>
</div>
</div>

</div>
</main>


<!--Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Ada masalah saat login? Anda dapat menghubungi kami melalui menu contact dibawah ini. </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="<?= base_url('home/contact')?>">Contact Us <i class="fas fa-arrow-right ml-3"></i></a>
        </div>
      </div>
    </div>
  </div>
