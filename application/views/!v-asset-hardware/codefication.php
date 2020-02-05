<?php
$perPage = 10;
$ariansyah = $this->input->get('code');
if (isset($ariansyah)) {
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
						<legend>Search Codefications Hardware</legend>
							<?= form_open('asset_software/searchcode', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
					<p>
						<hr class="dashboard">&nbsp;
						<?= anchor("asset_hardware/print_all_hw_codefication", '<i class="fa fa-print"></i> Print All Codefications', ['class' => 'btn btn-primary', 'target' => '_blank']) ?>

					</div> <!--id panelMenu -->
				</div><!--searching-->
				<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
			<div class="clear"></div>
		</div><!--end heading-->


<div class='panel-body'>

<?php if ($asset_hardware): ?>
<div style="overflow-x:auto;">
	<table>
		<thead>
			<tr>
        <th>No.</th>
        <th>Hardware Name</th>
    		<th>Codefications</th>
    		<th><i class="fa fa-unlink"></i> Asset Category</th>
    		<th>Product</th>
    		<th>Original S-N</th>
    		<th>Manufacturer S-N</th>
    		<th><i class="fa fa-unlink"></i> Locations</th>
    		<th><i class="fa fa-calendar"></i> Procurement</th>
    		<th><i class="fa fa-usd"></i> Price</th>
				<th colspan="2"><i class="fa fa-sitemap"></i> </th>
			</tr>
		</thead>
	<tbody>
		<?php foreach ($asset_hardware as $ar): ?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
        <td><?= ++$i ?></td>
    		<td><?= $ar->hw_name ?></td>
    		<td><?= $ar->hw_codefication ?></td>
    		<td><?= $ar->asset_cat_name ?></td>
    		<td><?= $ar->hw_product ?></td>
    		<td><?= $ar->hw_original_sn ?></td>
    		<td><?= $ar->hw_manufacturer_sn ?></td>
    		<td><?= $ar->room_name ?></td>
    		<td align="center"><?= $ar->hw_procurement_year ?></td>
    		<td><?= $ar->hw_price ?></td>

			<td align="center"><?= anchor("asset_hardware/print_codefications/" .sha1($ar->id_hardware), 'Print', array('style' => 'color:#669;', 'target' => '_blank', 'title' => 'Print')) ?></td>
			<td align="center"><?= anchor("asset_hardware/edit/" .sha1($ar->id_hardware), 'Detail', array('style' => 'color:#669;', 'title' => 'Detail')) ?></td>
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
