<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this computer from database?');}
</script>

<?php
$perPage = 10;
$keywords = $this->input->get('keywords');
if (isset($keywords)) {
	$page = $this->uri->segment(4);
}else{
	$page = $this->uri->segment(3);
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
						<legend>Write Name or IP Address</legend>
							<?= form_open('listmaintenance/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
					<p>
						<hr class="dashboard">&nbsp;
						<?= anchor("##", '<i class="fa fa-print"></i> Print All Control Card', ['class' => 'btn btn-danger', 'target' => '_blank']) ?>
					</div> <!--id panelMenu -->
			</div><!--searching-->
			<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
			<div class="clear"></div>
			</div><!--end heading-->

<div class='panel-body'>
<?php if($controlcard): ?>
	<div style="overflow-x:auto">
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th><i class="fa fa-unlink"></i> Computer Name</th>
				<th>Codefications</th>
				<th>IP Address</th>
				<th>Mac Address</th>
				<th>OS</th>
				<th>Processor</th>
				<th>Acquisition</th>
				<th colspan="3"><i class="fa fa-sitemap"></i></th>
			</tr>
		</thead>
	<tbody>
			<?php foreach ($controlcard as $ar): ?>
				<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
					<td><?= ++$i ?></td>
					<td><?= $ar->nama_user ?></td>
					<td><?= $ar->codefication ?></td>
					<td><?= $ar->ipaddress ?></td>
					<td><?= $ar->macaddress ?></td>
					<td><?= $ar->os ?></td>
					<td><?= $ar->processor ?></td>
					<td align="center"><?= $ar->acquisition ?></td>
          <td align="center"><?= anchor("listmaintenance/print_controlcard/" .sha1($ar->id_computers), 'Print', array('style' => 'color:#669;', 'target' => '_blank', 'title' => 'Print')) ?></td>
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
