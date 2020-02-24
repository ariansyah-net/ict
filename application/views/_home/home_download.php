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
    <h4 class="h3 text-center text-muted my-3"><i class="fas fa-download pr-2"></i> DOWNLOAD</h4>
    <p class="grey-text text-center py-2">Maaf anda harus masuk dulu sebelum download, silahkan klik tombol dibawah ini :</p>
    <p class="text-center grey-text my-1">
    <a href="<?=base_url('auth')?>" class="btn btn-rounded btn-primary btn-md"><i class="fas fa-sign-in-alt"></i> MASUK</a>
    atau
    <a href="<?=base_url('auth/registration')?>" class="btn btn-rounded btn-success btn-md"><i class="fas fa-users"></i> DAFTAR</a>
    </p>
  </section>
</div>

<?php else: ?>
  
<!-- ============================================== -->

<?php if($ar): ?>
<?php $i = 0; ?>
<main class="my-5">
  <div class="container">
<table class="table table-striped table-responsive-sm btn-table">
  <thead class="">
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Size</th>
      <th>Descriptions</th>
      <th>Push</th>
      <th>Hits</th>
      <th>Download</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($ar as $r): ?>
        <?= ($i & 1) ? '<tr>' : '<tr>'; ?>
        <td align="center"><?= ++$i ?></td>
        <td><?= $r->down_title ?></td>
			  <td class="text-center"><?= $r['down_typefile'] ?></td>
				<td><?=$date = tanggal($r->down_date); ?></td>
				<td class="text-center"><a class="btn btn-outline-default btn-sm"><?= $r->down_hits ?></a></td>
				<td class="text-center"><a class="btn btn-success btn-sm" title="Click to download" href="<?= base_url('download/files/'.$r->down_filename) ?>"> &nbsp;&nbsp;&nbsp;<i class='fas fa-download'>&nbsp;&nbsp;</i></a></td>
      <?php endforeach ?>

      </tbody>
    </table>

<?php else: ?>
<div class="container my-5 text-center text-danger wow fadeIn">
  <img src="<?= base_url('arians/img/panda.png')?>">
  <p><h5><i class="fas fa-exclamation-circle"></i> Maaf ya saat ini belum ada program yang dapat di download.</h5></p></div>
<?php endif ?>
</div>
</main>

<?php endif ?>