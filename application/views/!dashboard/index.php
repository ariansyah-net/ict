<?php
	$is_login = $this->session->userdata('is_login');
	$username = $this->session->userdata('username');
	$nama_admin = $this->session->userdata('nama_admin');
	$level = $this->session->userdata('level');
?>
<?php if ($is_login) : ?>

ADMIN DASHBOARD

<?php else: ?>
<!-- ************************************************************************************************ -->
<?= redirect('login') ?>
<?php endif ?>
