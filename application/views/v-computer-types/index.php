<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this Computer Types from list?');}

  $( function() {
    $( "#showdialog" ).dialog({
      height: 200,
      width: 425,
      autoOpen: true,
      show: {
        effect: "drop",
        duration: 700
      },
      hide: {
        effect: "clip",
        duration: 800
      }
    });
	$( "#opendialog" ).on( "click", function() {
  	$( "#showdialog" ).dialog( "open" );
  	});
  } );
</script>

<?php
$perPage = 10;
$ariansyah = $this->input->get('keywords');
if (isset($ariansyah)) {
$page = $this->uri->segment(3);
}else{
$page = $this->uri->segment(0);
}
$i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div class='panel panel-default'>
	<div class='panel-heading panel-title'>
		<div class="searching">
			<div id="panelMenu" class="abcd">
				<a href="javascript:void(0)" class="closebtn rotation" onclick="closePM()"> &times; </a>
				<p></p>
				<p>
					<fieldset>
						<legend>Search your Types</legend>
							<?= form_open('computertypes/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>
				<p>
						<hr class="dashboard">&nbsp;
						<?= form_button(['id' => 'opendialog', 'content' => '<i class="fa fa-edit fa-2x"></i>', 'class' => 'primary']) ?>
						<?= anchor("#", '<i class="fa fa-print fa-2x"></i>', ['class' => 'circle btn btn-warning', 'target' => '_blank']) ?>
				</div><!--id panelMenu-->
			</div><!--searching-->
		<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
	<div class="clear"></div>
</div><!--end heading-->

<div class='panel-body'>
<?php if ($computertypes): ?>
	<div style="overflow-x:auto;">
	<table>
	<thead>
		<tr>
		<th align="center">No.</th>
		<th align="center">Type Name</th>
		<th align="center">Last Update</th>
		<th colspan="2"align="center"><i class="fa fa-sitemap"></i> </th>
		</tr></thead>
	<tbody>
	<?php foreach ($computertypes as $type):?>
		<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
		<td align="center"><?= ++$i ?></td>
		<td><?= $type->nama_type ?></td>
		<td align="center"><?= $type->time_update ?></td>
		<td align="center"><?= anchor("computertypes/edit/". sha1($type->id_type), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Update', 'id' => 'showedit']); ?></td>
		<td align="center"><?= anchor("computertypes/delete/".sha1($type->id_type), '&nbsp;&nbsp;', ['class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()']) ?></td>
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

<div id="showdialog" title="&nbsp;" >
<?= form_open($form_action) ?>
<?= isset($input->id_type) ? form_hidden('id_type', $input->id_type) : '' ?>
<table>
<th colspan="3"><i class="panel-title fa fa-pencil"></i>&nbsp; Add New </th>
	<tr>
	<td align="right"><?= form_label('Type Name :', 'nama_type', ['class' => 'label']) ?></td>
	<td><?= form_input('nama_type', $input->nama_type) ?>
	<div id="font-error"><?= form_error('nama_type') ?></td>
	</tr>

	<td></td>
	<td colspan="2">
	<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'btn btn-primary']) ?>
	</td></tr>
	<?= form_close() ?>
</table>
</div>
</div><!--end panel-->

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
