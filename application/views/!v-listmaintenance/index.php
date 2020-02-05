<?php
$perPage = 20;
//$keywords = $this->input->get('keywords');
$keywords = $this->input->get(array('selected1', 'selected2', 'selected3', 'keywords'), TRUE);
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
						<legend>Search by user</legend>
							<?= form_open('listmaintenance/search', ['method' => 'GET']) ?>
							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
							<?= form_close() ?>
					</fieldset>

					<fieldset><legend>Get by Room</legend>
				    <?= form_open('listmaintenance/getroom', ['method' => 'GET']) ?>
						<?= form_dropdown('keywords', getDropdownList('room', ['room_name', 'room_name']), 'id="selected3"') ?>
						<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
				    <?= form_close() ?>&nbsp; &nbsp;
					</fieldset>

				<p>

					<fieldset>
						<legend>Double Selected</legend>
							<?= form_open('listmaintenance/get', ['method' => 'GET']) ?>
							<?= form_dropdown('selected1', getDropdownList('listmaintenance', ['l_month', 'l_month']), 'id="selected1"') ?>
							<p><p>
						  <?= form_dropdown('selected2', getDropdownList('listmaintenance', ['l_year', 'l_year']), 'id="selected2"') ?></p>
							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i> Find Selected', 'class' => 'btn btn-danger']) ?>
				      <?= form_close() ?>
					</fieldset>
				<p>
					<hr class="dashboard">
					&nbsp;
					<?= anchor("listmaintenance/create", '<i class="fa fa-pencil"></i> Create New', ['class' => 'btn btn-primary']) ?>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?= anchor("listmaintenance/printall", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
				</div> <!--id panelMenu -->
		</div><!--searching-->
		<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
	<div class="clear"></div>
</div><!--end heading-->

<?= form_open('listmaintenance/deleteselected'); ?>
<!-- <input type="submit" value="Remove" onclick="return confirm('Are you sure can remove selected data?')"> -->

<div class='panel-body'>
		<?php if($list): ?>
		<div style="overflow-x:auto;">
			<table id="myTable">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkAll" name="checkAll"></th>
						<th>No.</th>
						<th><i class="fa fa-unlink"></i> Rooms</th>
						<th>Month</th>
						<th>Period</th>
						<th>Users / Computers Name</th>
						<th>Fieldwork</th>
						<th><i class="fa fa-tv"></i> Status</th>
						<th><i class="fa fa-comment"></i> Note</th>
						<th><i class="fa fa-user-secret"></i> Author</th>
						<th colspan="3"><i class="fa fa-sitemap"></i></th>
					</tr>
				</thead>
			<tbody>
				<?php foreach ($list as $ar): ?>
					<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
						<td align="center" style="width:10px"><input type="checkbox" name="l_id_list[]" value="<?= $ar->l_id_list ?>"></td>
						<td align="center"><?= ++$i ?></td>
						<td><?= $ar->room_name ?></td>
						<td style="text-align:center"><?= $ar->l_month ?></td>
						<td style="text-align:center"><?= $ar->l_year ?></td>
						<td>
							<?
							if($ar->unique_user == 'Y') {
								echo "<span class='result success'><i class='fa fa-tv'></i> $ar->l_pcname</span>";
							}else {
								echo "$ar->nama_user";
							}
							?>
						</td>
						<td><?= $ar->fieldwork_name ?></td>
						<td style="text-align:center"><?= $ar->status == 'Ok' ? '<span class="result success"><i class="fa fa-smile-o"></i> Good</span>' : '<span class="result repair"><i class="fa fa-exclamation"></i> Repaired</span>' ?></td>
						<td style="text-align:center">
							<?
							if($ar->note == '') {
								echo "<span class='result success'><i class='fa fa-check'></i> already checked</span>";
							}else {
								echo "<span class='result warning'><i class='fa fa-info'></i> $ar->note </span>";
								// echo "$ar->note ";
							}
							?>
						</td>


						<td style="text-align:center"><?= $ar->author ?></td>
						<td align="center"><?= anchor("listmaintenance/edit/".sha1($ar->l_id_list), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
						<td align="center"><?= anchor("listmaintenance/delete/".sha1($ar->l_id_list), '&nbsp;&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
		<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-trash"></i> Remove Selected', 'class' => 'btn danger', 'onclick' => 'return confirm("Are you sure can remove thiss selected data?")']) ?>
<?= form_close() ?> <!-- end button remove all-->



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


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
  		$(document).ready(function() {
  			$("input[name='checkAll']").click(function() {
  				var checked = $(this).attr("checked");
  				$("#myTable tr td input:checkbox").attr("checked", checked);
  			});
  		});
	</script>
