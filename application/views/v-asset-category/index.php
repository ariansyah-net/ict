
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
		<button type="button" class="showsearch"><i class="fa fa-arrow-circle-right fa-3x"></i> </button>
			<div class="searching">
				<div class="searching-inner">

					<?= form_open('asset_category/search', ['method' => 'GET', 'class' => 'selection']) ?>
					<?= anchor("asset_category/create", '<i class="fa fa-pencil"></i> Create New', ['class' => 'btn btn-primary']) ?>
				<!--
					<?= anchor("#", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
				-->
					<div class="tooltip">
					<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
					<span class="tooltiptext">search category</span></div>
					<?= form_button(['type' => 'submit', 'content' => 'Search', 'class' => 'btn btn-default']) ?>
					<?= form_close() ?>
			</div><!--searching-inner-->
		</div><!--searching-->
  <div class="clear"></div>
</div><!--end heading-->


<div class='panel-body'>
<?php if($asset_category): ?>
	<div style="overflow-x:auto;">
    <table><thead>
		<tr>
		<th>No.</th>
		<th>Type</th>
		<th>Category Name</th>
		<th><i class="fa fa-clock"></i> Last Update</th>
		<th colspan="2"><i class="fa fa-sitemap"></th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($asset_category as $ar): ?>
		<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
		<td align="center"><?= ++$i ?></td>
		<td><?= $ar->asset_type_category ?></td>
		<td><?= $ar->asset_cat_name ?></td>
		<td align="center"><?= $ar->last_update ?></td>
		<td align="center"><?= anchor("asset_category/edit/".sha1($ar->id_assetcategory), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
		<td align="center"><?= anchor("asset_category/delete/".sha1($ar->id_assetcategory), '&nbsp;&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
