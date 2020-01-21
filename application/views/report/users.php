<?php $i = 0 ?>
<div class="konten">

<div class="row">
<?= anchor("print-report-users", 'Print Table Users', ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
</div>

<?php $this->load->view('_partial/flash_message'); ?>

	<?php if ($pengguna): ?>
	<div style="overflow-x:auto;">
	<table>
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">User Computer</th>
				<th scope="col">Code User</th>
				<th scope="col">Phone/Extension</th>
				<th scope="col">Job Position</th>
				<th scope="col">Location</th>
				<th scope="col">Room</th>
				<th scope="col">Position</th>
				<th scope="col">Active User?</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($pengguna as $users): ?>
				<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
				<td><?= ++$i ?></td>
				<td><?= $users->nama_user ?></td>
				<td align="center"><?= $users->code_user ?></td>
				<td><?= $users->no_hp ?></td>
				<td align="center"><?= $users->jabatan ?></td>
				<td align="center"><?= $users->lokasi ?></td>
				<td align="center"><?= $users->no_ruangan ?></td>
				<td><?= $users->bagian ?></td>
				<td align="center"><?= $users->is_active == 'Y' ? 'Ya' : 'Tidak' ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>


		<tfoot><tr></tr></tfoot>
		</table>
		</div><!--end overflow-x-->

		<div class="pagination">
		<strong> Total Entry : <?= isset($jumlah_total) ? $jumlah_total : '' ?></strong>
		</div>

		<?php else: ?>
		<div class="no_result">Empty result in database, please create new for showing table.</div>
		<?php endif ?>

	</div> <!-- end konten -->
