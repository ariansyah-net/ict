<?php
    $is_login       = $this->session->userdata('is_login');
    // $id_users       = $this->session->userdata('id_users');
    // $first_name     = $this->session->userdata('first_name');
    // $email          = $this->session->userdata('email');
    // $phone          = $this->session->userdata('phone');
?>

<?php if(!$is_login) : ?>
	
<div class="container my-5">
<section class="contact-section my-5">
    <h4 class="h3 text-center text-muted my-3"><i class="fas fa-tools ml-4"></i> SCHEDULE MAINTENANCE </h4>
    <p class="grey-text text-center py-2">Maaf, anda harus masuk dulu sebelum melihat jadwal maintenance, silahkan klik tombol dibawah ini :</p>
    <p class="text-center grey-text my-1">
    <a href="<?=base_url('auth')?>" class="btn btn-rounded btn-primary btn-md"><i class="fas fa-sign-in-alt"></i> MASUK</a>
    atau
    <a href="<?=base_url('auth/registration')?>" class="btn btn-rounded btn-success btn-md"><i class="fas fa-users"></i> DAFTAR</a>
    </p>
</section>
</div>  

<?php else: ?>

<main>
  <section class="purple-gradient">
      <div class="container">
        <!-- Grid row -->
        <div class="row align-items-center py-5">

          <!-- Grid column -->
          <div class="col-lg-6">

            <h2 class="font-weight-bold white-text pb-2">SCHEDULE MAINTENANCE <i class="fas fa-tools ml-4"></i></h2>
            <p class="lead pt-2 white-text mb-5">
            	Kami memberlakukan jadwal maintenance per-3 bulan sekali, artinya setiap perangkat komputer mendapatkan 4 kali maintenance setiap tahun`nya.
            </p>
            <form class="col-md-9 input-green pl-0" action="" method="post" target="_blank">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-0 z-depth-0" placeholder="..." aria-label="checking"
                  aria-describedby="checking">
                <div class="input-group-append">
                  <a type="button" class="btn btn-md btn-mdb-color m-0 px-3 py-2 z-depth-0" id="checking" data-toggle="popover" data-placement="right" title="Sorry !" data-content="This feature is under development, please try again tomorrow."><i class="far fa-calendar-alt pr-2"></i> Check Schedule</a>
                </div>
              </div>
            </form>
          </div><!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4 offset-lg-2 wow fadeIn" data-wow-delay=".2s">
            <img src="<?=base_url('arians/img/pc.png')?>" alt="IT Operations" class="img-fluid">
          </div><!-- Grid column -->
        </div>
        <!-- Grid row -->

      </div>

  </section>
</main>
<?php endif; ?>