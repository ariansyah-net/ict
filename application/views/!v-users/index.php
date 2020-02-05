<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this user from database?');}
</script>

<?php
$perPage = 10;
$keywords = $this->input->get('keywords');
if (isset($keywords)) {
$page = $this->uri->segment(3);
}else{
$page = $this->uri->segment(2);
}
$i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div class='panel panel-default'>
	<div class='panel-heading'>

		<div class="searching">
			<div id="panelMenu" class="abcd">
				<a href="javascript:void(0)" class="closebtn rotation" onclick="closePM()"> &times; </a>
				<p></p>
				<p>
					<fieldset>
						<legend>Search Name or Code Users</legend>
							<?= form_open('users/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
					<fieldset>
						<legend>Sort By Room</legend>
						<?= form_open('users/getroom', ['method' => 'GET', 'class' => 'selection']) ?>
						<?= form_dropdown('keywords', getDropdownList('schedule', ['room_name', 'room_name']), 'id="keywords"') ?>
						<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
					</fieldset>
					<p>
						<hr class="dashboard">&nbsp;
						<?= anchor("users/create", '<i class="fa fa-edit"></i> Add New', ['class' => 'btn btn-primary']) ?>
						<?= anchor("print-report-users", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
					</div> <!--id panelMenu -->
				</div><!--searching-->
				<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
			<div class="clear"></div>
		</div><!--end heading-->

<div class='panel-body'>
	<?php if ($users): ?>
	<div style="overflow-x:auto;">
		<table>
		<thead>
			<tr>
			<th>No</th>
			<th>User Name</th>
			<th>Code User</th>
			<th>Phone</th>
			<th>Position</th>
			<th>Locations</th>
			<th>Room</th>
			<th>Field Work</th>
			<th>Active User</th>
			<th colspan="3"><i class="fa fa-sitemap"></i></th>
			</tr>
		</thead>
	<tbody>
		<?php foreach ($users as $usr):?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
							<td align="center"><?= ++$i ?></td>
							<td><?= $usr->nama_user ?></td>
							<td align="center"><?= $usr->code_user ?></td>
							<td><?= $usr->no_hp ?></td>
							<td><?= $usr->jabatan ?></td>
							<td align="center"><?= $usr->lokasi ?></td>
							<td><?= $usr->room_name ?></td>
							<td><?= $usr->fieldwork_name ?></td>
							<td align="center"><?= $usr->is_active == 'Y' ? 'Ya' : 'Tidak' ?></td>
							<td align="center"><?= anchor("users/edit/" .sha1($usr->id_users), '&nbsp;', array('class' => 'btn btn-detail', 'title' => 'Detail')) ?></td>
							<td align="center"><?= anchor("users/print_user/" .sha1($usr->id_users), '&nbsp;', array('class' => 'btn btn-print', 'target' => '_blank', 'title' => 'Print')) ?></td>
							<td align="center"><?= anchor("users/delete/" .sha1($usr->id_users), '&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
							</tr>
						<?php endforeach ?>
						</tbody>
						<tfoot><tr></tr></tfoot>
					</table>
					</div><!--end overflow-x-->

					<div class="pagination">
						<strong> Total Entry : <?= isset($jumlah) ? $jumlah : '' ?></strong>
						<?php if ($pagination): ?>
						<span class="right"><?= $pagination ?></span>
						<?php else: ?>&nbsp;<?php endif ?>
					</div>
					<?php else: ?>
				<div class="no_result">Empty result in database, please create new for showing table.</div>
			<?php endif ?>
		</div>
	</div>
</div>
<script>
	function openPM() {
		document.getElementById("panelMenu").style.width = "250px";
		document.body.style.backgroundColor = "orange";
	}
	function closePM() {
		document.getElementById("panelMenu").style.width = "0";
		document.body.style.backgroundColor = "white";
	}
</script>
