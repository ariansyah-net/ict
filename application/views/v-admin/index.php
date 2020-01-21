<script type="text/javascript">
	function del() {return confirm('Anda yakin akan menghapus data ini ?');}
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
						<legend>Search Username</legend>
							<?= form_open('admin/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
				<p>
					<hr class="dashboard">&nbsp;
					<?= anchor("admin/create", '<i class="fa fa-edit"></i> Add New', ['class' => 'btn btn-primary']) ?>
					<?= anchor("print-report-users", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
				</div><!--id panelMenu-->
			</div><!--searching-->
		<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
	<div class="clear"></div>
</div><!--end heading-->


<div class='panel-body'>
<?php if ($admin): ?>
		<div style="overflow-x:auto;">
		<table>
		<thead>
			<tr>
			<th>No</th>
			<th>Administrator Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Level</th>
			<th>Aktif ?</th>
			<th colspan="3"><i class="fa fa-sitemap"></i></th>
			</tr>
		</thead>
	<tbody>
		<?php foreach ($admin as $adm):?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
							<td align="center"><?= ++$i ?></td>
							<td><?= $adm->nama_admin ?></td>
							<td align="center"><?= $adm->username ?></td>
							<td><?= $adm->password ?></td>
							<td><?= $adm->level ?></td>
							<td align="center"><?= $adm->is_blokir == 'N' ? 'Active admin' : 'Terblokir' ?></td>
							<td align="center"><?= anchor("admin/edit/" .md5($adm->id_admin), '&nbsp;', array('class' => 'btn btn-detail', 'title' => 'Detail')) ?></td>
							<td align="center"><?= anchor("admin/print_user/" .md5($adm->id_admin), '&nbsp;', array('class' => 'btn btn-print', 'target' => '_blank', 'title' => 'Print')) ?></td>
							<td align="center"><?= anchor("admin/delete/" .md5($adm->id_admin), '&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
		</div></div>
</div> <!-- End Panel -->

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
