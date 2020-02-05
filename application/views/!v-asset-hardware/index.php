<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this hardware from list?');}
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
						<legend>Search Name or Type</legend>
							<?= form_open('asset_hardware/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
					<p>
						<hr class="dashboard">&nbsp;
						<?= anchor("asset_hardware/create", '<i class="fa fa-edit"></i> Add New', ['class' => 'btn btn-primary']) ?>
						<?= anchor("asset_hardware/printAll", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>

						<p></p>&nbsp;
						<?= anchor("asset_category", '<i class="fa fa-arrow-circle-left"></i> Category', ['class' => 'btn btn-danger']) ?>

					</div> <!--id panelMenu -->

				</div><!--searching-->
				<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
			<div class="clear"></div>
		</div><!--end heading-->


<div class='panel-body'>
<?php if($asset_hardware): ?>
	<div style="overflow-x:auto;">
		<table><thead>
		<tr>
		<th>No.</th>
		<th>Hardware Name</th>
		<th>Hardware Type</th>
		<th><i class="fa fa-unlink"></i> Asset Category</th>
		<th>Product</th>
		<th>Original S-N</th>
		<th>Manufacturer S-N</th>
		<th><i class="fa fa-unlink"></i> Locations</th>
		<th><i class="fa fa-calendar"></i> Procurement</th>
		<th><i class="fa fa-usd"></i> Price</th>
		<th>Asset Status</th>
		<th colspan="3"><i class="fa fa-sitemap"></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($asset_hardware as $ar): ?>
		<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
		<td><?= ++$i ?></td>
		<td><?= $ar->hw_name ?></td>
		<td><?= $ar->hw_type ?></td>
		<td><?= $ar->asset_cat_name ?></td>
		<td><?= $ar->hw_product ?></td>
		<td><?= $ar->hw_original_sn ?></td>
		<td><?= $ar->hw_manufacturer_sn ?></td>
		<td><?= $ar->room_name ?></td>
		<td align="center"><?= $ar->hw_procurement_year ?></td>
		<td><?= $ar->hw_price ?></td>
		<td align="center"><?= $ar->hw_status ?></td>

		<td align="center"><?= anchor("asset_hardware/edit/".sha1($ar->id_hardware), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
		<!--
		<td align="center"><?= anchor("asset_hardware/print/".sha1($ar->id_hardware), '&nbsp;&nbsp;', ['class' => 'btn btn-print', 'target' => '_blank', 'title' => 'Print']) ?></td>
		-->
		<td align="center"><?= anchor("asset_hardware/delete/".sha1($ar->id_hardware), '&nbsp;&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
