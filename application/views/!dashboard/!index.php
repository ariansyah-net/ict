<?php
	$is_login = $this->session->userdata('is_login');
	$username = $this->session->userdata('username');
	$nama_admin = $this->session->userdata('nama_admin');
	$level = $this->session->userdata('level');
?>
<?php if ($is_login) : ?>

<?php $this->load->view('sidebar') ?>

				<?= anchor("users", '<i class="dashboard-icon fa fa-users fa-3x"></i>', array('title' => 'User Data')) ?>
				<?= anchor("computers", '<i class="dashboard-icon fa fa-tv fa-3x"></i>', array('title' => 'Computers Data')) ?>
				<?= anchor("schedule", '<i class="dashboard-icon fa fa-calendar-check-o fa-3x"></i>', array('title' => 'Schedule')) ?>
				<?= anchor("listmaintenance", '<i class="dashboard-icon fa fa-vcard-o fa-3x"></i>', array('title' => 'List Maintenance')) ?>
				<?= anchor("problem", '<i class="dashboard-icon fa fa-comments-o fa-3x"></i>', array('title' => 'Problem User')) ?>
				<?= anchor("asset_hardware", '<i class="dashboard-icon fa fa-usb fa-3x"></i>', array('title' => 'Hardware')) ?>
				<?= anchor("asset_software", '<i class="dashboard-icon fa fa-code fa-3x"></i>', array('title' => 'Software')) ?>
				<?= anchor("report", '<i class="dashboard-icon fa fa-file-pdf-o fa-3x"></i>', array('title' => 'Report')) ?>
				<?= anchor("setting", '<i class="dashboard-icon fa fa-gears fa-3x"></i>', array('title' => 'Settings')) ?>
				<?= anchor("userguide", '<i class="dashboard-icon fa fa-book fa-3x"></i>', array('title' => 'User Guide')) ?>
				<?= anchor("codefications", '<i class="dashboard-icon fa fa-barcode fa-3x"></i>', array('title' => 'Codefications')) ?>

				<hr class="dashboard">

				<div id='panelmaster'>
					<ul>
						<li><?= anchor("jobprogram", 'Job Program', array('style' => 'color:#000;', 'title' => 'Job Program')) ?></li>
						<li><?= anchor("jobdesc", 'Job Description', array('style' => 'color:#000;', 'title' => 'Job Description')) ?></li>
						<li><?= anchor("jobinstruction", 'Job Instruction', array('style' => 'color:#000;', 'title' => 'Job Instruction')) ?></li>
						<li><?= anchor("procedureprocess", 'Procedure Process', array('style' => 'color:#000;', 'title' => 'Procedure Process')) ?></li>
						<li><?= anchor("ndf", 'News Delivery Form', array('style' => 'color:#000;', 'title' => 'News Delivery Form')) ?></li>
						<li><?= anchor("networktopology", 'Network Topology', array('style' => 'color:#000;', 'title' => 'Network Topology')) ?></li>
						<li><?= anchor("administrator-accounts", 'Administrator Accounts', array('style' => 'color:#000;', 'title' => 'Administrator Accounts')) ?></li>
						<li><?= anchor("formrequest", 'ICT Form Request', array('style' => 'color:#000;', 'title' => 'ICT Form Request')) ?></li>
						<li><?= anchor("lisencedsoftware", 'List of Lisenced Software', array('style' => 'color:#000;', 'title' => 'List of Lisenced Software')) ?></li>
					</ul>
				</div>

				<div id='panelconfig'>
					<ul>
					 <li><?= anchor("users", 'Configuration Users List', array('style' => 'color:#000;', 'title' => 'Config Users List')) ?></li>
					 <li><?= anchor("fieldwork", 'Configuration Field Work', array('style' => 'color:#000;', 'title' => 'Config Field Work')) ?></li>
					 <li><?= anchor("computertypes", 'Computers Types', array('style' => 'color:#000;', 'title' => 'Computer Types')) ?></li>
					 <li><?= anchor("room", 'Configuration Rooms', array('style' => 'color:#000;', 'title' => 'Config Rooms')) ?></li>
					 <li><?= anchor("locations", 'Configuration Location', array('style' => 'color:#000;', 'title' => 'Config Locations')) ?></li>
					 <li><?= anchor("years", 'Configuration Years', array('style' => 'color:#000;', 'title' => 'Config Years')) ?></li>
				 </ul>
			</div>

			<div id="panelaset">
				<ul>
				 <li><?= anchor("", 'Server', array('style' => 'color:#000;', 'title' => 'Server')) ?></li>
				 <li><?= anchor("", 'Router', array('style' => 'color:#000;', 'title' => 'Router')) ?></li>
				 <li><?= anchor("", 'Switch', array('style' => 'color:#000;', 'title' => 'Switch')) ?></li>
				 <li><?= anchor("", 'HUB', array('style' => 'color:#000;', 'title' => 'HUB')) ?></li>
				 <li><?= anchor("", 'Access Point', array('style' => 'color:#000;', 'title' => 'Access Point')) ?></li>
				 <li><?= anchor("", 'Laptop', array('style' => 'color:#000;', 'title' => 'Laptop')) ?></li>
				 <li><?= anchor("", 'UPS', array('style' => 'color:#000;', 'title' => 'UPS')) ?></li>
				 <li><?= anchor("", 'Printer', array('style' => 'color:#000;', 'title' => 'Printer')) ?></li>
				 <li><?= anchor("", 'Rack', array('style' => 'color:#000;', 'title' => 'Rack')) ?></li>
				 <li><?= anchor("", 'Firewall', array('style' => 'color:#000;', 'title' => 'Firewall')) ?></li>

			 </ul>
			</div>

<?php else: ?>
<!-- ************************************************************************************************ -->

<?= redirect('login') ?>
<?php endif ?>
