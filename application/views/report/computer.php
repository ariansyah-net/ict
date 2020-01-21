<?php $i = 0 ?>


<div class="row">
<?= anchor("print-report-spec", 'Print Table Computers', ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
</div>

<?php $this->load->view('_partial/flash_message'); ?>

	<?php if ($spec): ?>

	<table>
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama</th>
				<th scope="col">CPU Casing</th>
				<th scope="col">Monitor</th>
				<th scope="col">Keyboard</th>
				<th scope="col">Mouse</th>
				<th scope="col">Mainboard</th>
				<th scope="col">Processor</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($spec as $ar): ?>
				<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
				<td><?= ++$i ?></td>
				<td><?= $ar->nama_user ?></td>
				<td><?= $ar->cpu_casing ?></td>
				<td><?= $ar->monitor ?></td>
				<td><?= $ar->keyboard ?></td>
				<td><?= $ar->mouse ?></td>
				<td><?= $ar->mainboard ?></td>
				<td><?= $ar->processor ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
		<tfoot><tr></tr></tfoot>
		</table>
		</div><!--end overflow-x-->

		<div class="pagination">
		<strong> Total Entry : <?= isset($total) ? $total : '' ?></strong>
		</div>

		<?php else: ?>
			<div class="no_result">Empty result in database, please create new for showing table.</div>
		<?php endif ?>
