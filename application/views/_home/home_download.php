<?php if($ar): ?>
<?php $i = 0; ?>
<main class="my-5">
  <div class="container">
<table class="table table-striped table-responsive-sm btn-table">
  <thead class="">
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Size</th>
      <th>Descriptions</th>
      <th>Push</th>
      <th>Hits</th>
      <th>Download</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($ar as $r): ?>
        <?= ($i & 1) ? '<tr>' : '<tr>'; ?>
        <td align="center"><?= ++$i ?></td>
        <td><?= $r->down_title ?></td>
			  <td class="text-center"><?= $r['down_typefile'] ?></td>
				<td><?=$date = tanggal($r->down_date); ?></td>
				<td class="text-center"><a class="btn btn-outline-default btn-sm"><?= $r->down_hits ?></a></td>
				<td class="text-center"><a class="btn btn-success btn-sm" title="Click to download" href="<?= base_url('download/files/'.$r->down_filename) ?>"> &nbsp;&nbsp;&nbsp;<i class='fas fa-download'>&nbsp;&nbsp;</i></a></td>
      <?php endforeach ?>

      </tbody>
    </table>

<?php else: ?>
<div class="container my-5 text-center text-danger">
  <i class="fas fa-exclamation-circle"></i> Sorry, no file available yet to download.</div>
<?php endif ?>
</div>
</main>
