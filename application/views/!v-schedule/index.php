
<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this Schedule from list?');}
</script>

 <script>
//insert
  $( function() {
    $( "#showdialog" ).dialog({
      height: 259,
      width: 480,
      autoOpen: false,
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
$perPage = 20;
$keywords = $this->input->get('keywords');
if (isset($keywords)) {
$page = $this->uri->segment(3);
}else {
$page = $this->uri->segment(2);
}
$i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div class='panel panel-default'>
<div class='panel-heading'>

		<div class="searching">
			<div id="panelMenu" class="abcd">
				<a href="javascript:void(0)" class="closebtn rotation" onclick="closePM()"> &times; </a>

		<p></p><p>
			<fieldset><legend>what are'u look ?</legend>
				<?= form_open('schedule/searchkeywords', ['method' => 'GET']) ?>
		    <?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
		    <?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
				<?= form_close() ?>
			</fieldset>

			<fieldset><legend>Selected by Month</legend>
				<?= form_open('schedule/getmonth', ['method' => 'GET']) ?>
				<?= form_dropdown('keywords', getDropdownList('schedule', ['month_name', 'month_name']), 'id="keywords"') ?>
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
		    <?= form_close() ?>
			</fieldset>

			<fieldset><legend>Selected by Room</legend>
		    <?= form_open('schedule/getroom', ['method' => 'GET']) ?>
				<?= form_dropdown('keywords', getDropdownList('schedule', ['room_name', 'room_name']), 'id="keywords"') ?>
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
		    <?= form_close() ?>&nbsp; &nbsp;
			</fieldset>
			<hr class="dashboard">&nbsp;

				<?= form_button(['id' => 'opendialog', 'content' => '<i class="fa fa-edit fa-2x"></i>', 'class' => 'primary']) ?>
				<?= anchor("schedule/printall", '<i class="fa fa-print fa-2x"></i>', ['class' => 'circle btn btn-warning', 'target' => '_blank']) ?>
				</div><!--panelMenu-->
			</div><!--searching-->

		<button type="button" class="circle info" onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
  <div class="clear"></div>
</div><!--end heading-->

<div class='panel-body'>
<?php if ($schedule): ?>
	<div style="overflow-x:auto;">
	<table>
	<thead>
		<tr>
		<th align="center">No.</th>
		<th align="center">Room / Location</th>
		<th align="center">Schedule Month</th>
		<th align="center">Last Update</th>
		<th colspan="2" align="center"><i class="fa fa-sitemap"></i> </th>
		</tr></thead>

			<tbody>
			<?php foreach ($schedule as $jadwal):?>
				<?= ($i & 4) ? '<tr class="schedule">' : '<tr>'; ?>
					<td align="center"><?= ++$i ?></td>
					<td><?= $jadwal->room_name ?></td>
					<td><?= $jadwal->month_name ?></td>
					<td align="center"><?= $jadwal->time_update ?></td>
					<td align="center"><?= anchor("schedule/edit/". sha1($jadwal->id_schedule), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Update', 'id' => 'showedit']); ?></td>
					<td align="center"><?= anchor("schedule/delete/".sha1($jadwal->id_schedule), '&nbsp;&nbsp;', ['class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()']) ?></td>
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

<!--SHOW DIALOG-->
<div id="showdialog" title="&nbsp;" >
<fieldset>
	<legend>Select Schedule</legend>
	<?= form_open($form_action) ?>
	<?= isset($input->id_schedule) ? form_hidden('id_schedule', $input->id_schedule) : '' ?>
	<div class="row">
		<div class="input-group col-7">
			<?= form_label('Select Rooms :', 'room_name', ['class' => 'label']) ?>
			<?= form_dropdown('room_name', getDropdownList('room', ['room_name', 'room_name']), $input->room_name, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('room_name') ?></span>
		</div><!--end input-group-->

		<div class="input-group col-3">
			<?= form_label('Select Month :', 'month_name', ['class' => 'label']) ?>
			<?= form_dropdown('month_name', getDropdownList('month', ['month_name', 'month_name']), $input->month_name, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('month_name') ?></span>
		</div><!--end input-group-->
	</div><!--end row-->

<hr class="dashboard">
	<div class="row">
		<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'btn btn-primary']) ?>
			</div>
				<?= form_close() ?>
					</fieldset>
						</div><!--end dialog-->

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
