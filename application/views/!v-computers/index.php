<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this computer from database?');}
</script>

<?php
$perPage = 20;
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
						<legend>Search Name or IP Address</legend>
							<?= form_open('computers/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
					<p>
						<hr class="dashboard">&nbsp;
						<?= anchor("computers/create", '<i class="fa fa-edit"></i> Add New', ['class' => 'btn btn-primary']) ?>
						<?= anchor("print-report-spec", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
						<p></p>&nbsp;
						<?= anchor("asset_category", '<i class="fa fa-arrow-circle-left"></i> Category', ['class' => 'btn btn-danger']) ?>
					</div> <!--id panelMenu -->
				</div><!--searching-->
				<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
			<div class="clear"></div>
		</div><!--end heading-->

<div class='panel-body'>
<?php if($computers): ?>
	<div style="overflow-x:auto">
	<table>
		<thead>
			<tr>
				<!-- <th><i class="fa fa-check"></i> </th> -->
				<th>No.</th>
				<th><i class="fa fa-unlink"></i> Computer Name</th>
				<th>Codefications</th>
				<th>IP Address</th>
				<th>Mac Address</th>
				<th>Platform</th>
				<th>OS Name</th>
				<th>Acquisition</th>
				<th colspan="3"><i class="fa fa-sitemap"></i></th>
			</tr>
		</thead>
	<tbody>
			<?php foreach ($computers as $ar): ?>
				<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
					<td align="center"><?= ++$i ?></td>
					<td><?= $ar->nama_user ?></td>
					<td><?= $ar->codefication ?></td>
					<td><?= $ar->ipaddress ?></td>
					<td><?= $ar->macaddress ?></td>
					<td><?= $ar->platform ?></td>
					<td><?= $ar->os ?></td>
					<td align="center"><?= $ar->acquisition ?></td>
					<td align="center"><?= anchor("computers/edit/".sha1($ar->id_computers), '&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
					<td align="center"><?= anchor("computers/print_spec/".sha1($ar->id_computers), '&nbsp;', ['class' => 'btn btn-print', 'target' => '_blank', 'title' => 'Print']) ?></td>
					<td align="center"><?= anchor("computers/delete/".sha1($ar->id_computers), '&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
	</div></div></div>

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
