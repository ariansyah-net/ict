<script type="text/javascript">function del() {return confirm('Are you sure to remove this Job Program from list?');}</script>
<?php
$perPage = 10;
$selected = $this->input->get(array('selected'), TRUE);
if (isset($selected)) {
$page = $this->uri->segment(3);
}else{
$page = $this->uri->segment(2);
}
$i = isset($page) ? $page * $perPage - $perPage : 0;
?>

<div class="panel panel-default">
<div class="panel-heading">
		<div class="searching">
			<div id="panelMenu" class="abcd">
				<a href="javascript:void(0)" class="closebtn rotation" onclick="closePM()"> &times; </a>
					<p></p>
			<p>
			<fieldset>
				<legend>Write by Target spesific</legend>
				<?= form_open('jobprogram/searchkeywords', ['method' => 'GET']) ?>
				<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
				<?= form_close() ?>
			</fieldset>

			<fieldset>
				<legend>Selected by Period</legend>
				<?= form_open('jobprogram/get_period', ['method' => 'GET']) ?>
				<?= form_dropdown('selected', getDropdownList('jobprogram', ['period', 'period']), 'id="selected"') ?>
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-success']) ?>
				<?= form_close() ?>
			</fieldset>

			<fieldset>
				<legend>Selected by Status</legend>
				<?= form_open('jobprogram/get_status', ['method' => 'GET']) ?>
				<?= form_dropdown('selected', getDropdownList('jobprogram', ['status', 'status']), 'id="selected"') ?>
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
				<?= form_close() ?>
			</fieldset>
			<p>
				<hr class="dashboard">
				&nbsp;
				<?= anchor("jobprogram/create", '<i class="fa fa-pencil"></i> Add New', ['class' => 'btn btn-primary']) ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?= anchor("#", '<i class="fa fa-print"></i> Print All', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>

				</div> <!--id panelMenu -->
			</div><!--searching-->
		<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>

	<div class="clear"></div>
</div><!--end heading-->


<div class="panel-body">
	<div style="overflow-x:auto;">
<table>
	<?php if($jobprogram): ?>
	<thead>
		<tr>
			<th scope="col">No.</th>
			<th scope="col">Quality Objectives</th>
			<th scope="col">Target</th>
			<th scope="col">Program 1</th>
			<th scope="col"><i class="fa fa-calendar"></i></th>
			<th scope="col">Program 2</th>
			<th scope="col"><i class="fa fa-calendar"></i></th>
			<th scope="col">Program 3</th>
			<th scope="col"><i class="fa fa-calendar"></i></th>
			<th scope="col">Status</th>
			<th scope="col" colspan="3"><i class="fa fa-sitemap"></i></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($jobprogram as $ar): ?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
			<td align="center"><?= ++$i ?></td>
			<td><?= $ar->quality_objectives ?></td>
			<td><?= $ar->target ?></td>
			<td><?= $ar->jobname1 ?></td>
			<td><?= $ar->implementation1 ?></td>
			<td><?= $ar->jobname2 ?></td>
			<td><?= $ar->implementation2 ?></td>
			<td><?= $ar->jobname3 ?></td>
			<td><?= $ar->implementation3 ?></td>
			<td><?= $ar->status ?></td>
			<td align="center"><?= anchor("jobprogram/edit/".sha1($ar->id_jobprogram), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
			<td align="center"><?= anchor("jobprogram/print-single-jobprogram/".sha1($ar->id_jobprogram), '&nbsp;&nbsp;', ['class' => 'btn btn-print', 'target' => '_blank', 'title' => 'Print']) ?></td>
			<td align="center"><?= anchor("jobprogram/delete/".sha1($ar->id_jobprogram), '&nbsp;&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
