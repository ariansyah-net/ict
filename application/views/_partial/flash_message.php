<?php
	$success = $this->session->flashdata('success');
	$info = $this->session->flashdata('info');
	$warning = $this->session->flashdata('warning');
	$danger = $this->session->flashdata('danger');

	if ($info) {
		$message_status = 'info';
		$alert = $info;
	}
	if ($warning) {
		$message_status = 'warning';
		$alert = $warning;
	}
	if ($success) {
		$message_status = 'success';
		$alert = $success;
	}
	if ($danger){
		$message_status = 'danger';
		$alert = $danger;
	}
?>
<?php if ($info || $warning || $success || $danger): ?>
<div id="flash">
	<div class="alert alert-<?= $message_status ?>" role="alert">
		<span class="closebtn" onclick="this.parentElement.style.display='none';"><i class="fa fa-close"></i> </span>
			<?= $alert ?>
				</div>
					</div>
<?php endif ?>
