<?php
	$is_login = $this->session->userdata('is_login');
	$username = $this->session->userdata('username');
	$nama_admin = $this->session->userdata('nama_admin');
	$level = $this->session->userdata('level');
?>

<div class='panel-ari panel-admin'>
	<div class='ari-heading' id="side1"><i class="fa fa-gears"></i> <?= $level ?> Information </div>
		<div class='panel-body'>
			<img src="<?= site_url("/ar/img/male.png") ?>" alt="<?= $nama_admin; ?>">
				<hr class="dashboard">
					<div id='paneladmin'>
						<img src="data-jstree='{"icon":"//localhost/ict/ar/img/icon_name.png"}'">
						<ul align="center">
							<li data-jstree='{"icon":"//localhost/ict/ar/img/icon_name.png"}'>Name : <?= $nama_admin ?></li>
							<li data-jstree='{"icon":"//localhost/ict/ar/img/icon_browser.png"}'>Browser : <?= $browser; ?></li>
							<li data-jstree='{"icon":"//localhost/ict/ar/img/icon_os.png"}'>Platform : <?= $os; ?></li>
							<li data-jstree='{"icon":"//localhost/ict/ar/img/icon_ip.png"}'>IP Address : <?= $ip; ?></li>
							<li data-jstree='{"icon":"//localhost/ict/ar/img/icon_time.png"}'>Time : <span id="clock"></span></li>
						</ul>
				</div>
		</div>
</div>
