<script type="text/javascript">
	function del() {return confirm('Are you sure to remove this problem from database?');}
</script>

<?php
$perPage 	= 20;
$keywords 	= $this->input->get('keywords');
	if (isset($keywords)) {
		$page = $this->uri->segment(3);
	} else {
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

			<p><fieldset>
					<legend>Write by Target Spesific</legend>
						<?= form_open('problem/search', ['method' => 'GET']) ?>
						<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
						<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
						<?= form_close() ?>
				</fieldset></p>
				<p><fieldset>
					<legend>Period Selection</legend>
						<?= form_open('problem/getproblem', ['method' => 'GET']) ?>
						<?= form_dropdown('keywords', getDropdownList('problem', ['period', 'period']), 'id="keywords"') ?>
						<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
						<?= form_close() ?>
					</fieldset></p>
				<p><fieldset>
					<legend>Result Selection</legend>
						<?= form_open('problem/getresult', ['method' => 'GET']) ?>
						<?= form_dropdown('keywords', getDropdownList('problem', ['result', 'result']), 'id="keywords"') ?>
						<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-danger']) ?>
						<?= form_close() ?>
					</fieldset></p>
				<p>
					<hr class="dashboard">&nbsp;
						<?= anchor("problem/create", '<i class="fa fa-pencil"></i> Create New', ['class' => 'btn btn-primary']) ?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?= anchor("problem/printall", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>
				</div> <!--id panelMenu -->
			</div><!--searching-->
			<button type="button" class="circle success" onclick="openPM()"><i class="fa fa-folder-open fa-2x"></i></button>
		<div class="clear"></div>
</div><!--end heading-->


<div class='panel-body'>
	<?php if ($problem): ?>
		<div style="overflow-x:auto;">
		<table><thead>
			<tr>
			<th>No</th>
			<th>Date</th>
			<th>User Name / Device Name</th>
			<th>Problem</th>
			<th>Follow Up</th>
			<th>Result</th>
			<th>Period</th>
			<th>Author</th>
			<th colspan="3"><i class="fa fa-sitemap"></i></th>
			</tr>
		</thead>
	<tbody>
		<?php foreach ($problem as $prob) : ?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
							<td align="center"><?= ++$i ?></td>
							<td><?= $prob->date ?></td>
							<td>
								<?
								if($prob->unique_user == 'Y') {
									echo "<span class='result success'> $prob->other_user</span>";
								}else {
									echo "$prob->nama_user";
								}
								?>
							</td>
							<td><?= $prob->title_problem = substr($prob->title_problem, 0,45) ?></td>
							<td><?= $prob->followup  = substr($prob->followup, 0,45)?></td>
							<td align="center"><?= $prob->result == 'success' ? '<span class="result success"><i class="fa fa-check"></i> Solved</span>' : '<span class="result repair"><i class="fa fa-exclamation"></i> Repaired</span>' ?></td>
							<td align="center"><?= $prob->period ?></td>
							<td><?= $prob->author ?></td>
							<td align="center"><?= anchor("problem/edit/" .sha1($prob->id_problem), '&nbsp;', array('class' => 'btn btn-detail', 'title' => 'Detail')) ?></td>
							<td align="center"><?= anchor("problem/delete/" .sha1($prob->id_problem), '&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
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
		document.body.style.backgroundColor = "red";
	}
	function closePM() {
		document.getElementById("panelMenu").style.width = "0";
		document.body.style.backgroundColor = "white";
	}
</script>
