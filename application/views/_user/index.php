<?php
	$is_login = $this->session->userdata('is_login');
	$first_name = $this->session->userdata('first_name');
	$last_name = $this->session->userdata('last_name');
	$role_id = $this->session->userdata('role_id');
	$date_created = $this->session->userdata('date_created');
?>
<?php if ($is_login) : ?>

<div class="row">

<!-- TOTAL USERS -->
<!-- <div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Active User</div>
<div class="h5 mb-0 font-weight-bold text-gray-800"><?= isset($active) ? $active : '' ?></div>
</div>
<div class="col-auto">
<i class="fas fa-users fa-2x text-gray-300"></i>
</div>
</div>
</div>
<a class="stretched-link" href=""></a>
</div>
</div>
 -->

</div><!-- end row -->
<!-- =========================================================================== -->

<div class="row">

<!-- Default Card Example -->
<div class="col-lg-6">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users"></i> New Activity</h6>
<div class="dropdown no-arrow">
	<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	</a>
		<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
		<a class="dropdown-item" href="#">Open New Tab </a>
		<a class="dropdown-item" href="#">Print Data</a>
		</div>
		</div>
		</div>
	<div class="card-body">
		<STRONG>Selamat datang <?= $this->session->userdata['first_name']; ?> <i class="far fa-smile"></i></STRONG><br>
		kami ucapkan terimakasih atas partisipasi anda di aplikasi OPIT, mohon maaf saat ini kami sedang dalam mode pengembangan, jadi untuk sementara aplikasi masih belum berjalan sebagaimana mestinya, namun tidak perlu khawatir kami akan pulih kembali secepatnya, mohon kembali lagi nanti.
	</div>
</div>
</div><!--col-lg-6-->


<div class="col-lg-6">
<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-id-card"></i> Login Identities</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">
<!-- Content -->

<?php if($this->session->userdata['avatar'] == '') : ?>
<img class="rounded mx-auto d-block mb-3" src="<?=base_url('arians/photos/whois.png')?>" style="height:115px" width="120px">
<?php else: ?>
<img class="rounded mx-auto d-block mb-3" src="<?=base_url('arians/photos/'.$this->session->userdata['avatar'].' ')?>" style="height:150px" width="120px">
<?php endif ?>

<table class="table">
	<tr><td><i class="far fa-id-badge"></i> Name</td><td> <?= $first_name ?> <?= $last_name ?></td></tr>
	<tr><td><i class="fab fa-ioxhost"></i> Platform</td><td> <?= $os; ?></td></tr>
	<tr><td><i class="fas fa-globe"></i> Browser</td><td> <?= $browser; ?></td></tr>
	<tr><td><i class="fas fa-map-marker-alt"></i> IP Address</td><td> <?= $ip; ?></td></tr>
	<tr><td><i class="far fa-clock"></i> Member Since</td><td> <?= date('d F Y', $date_created); ?></td></tr>
</table>
</div>
</div>
</div><!--col-lg-6-->
</div><!--end row-->

<?php else: ?>
<!-- ************************************************************************************************ -->
<?= redirect('auth') ?>
<?php endif ?>
