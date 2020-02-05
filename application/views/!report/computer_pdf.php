<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>Daftar Users</title>

<!-- here for css style your report -->
<style type="text/css">

h2 {
	text-align: left;
	font-size: 18px;
}

table{
	font-family: arial, helvetica, sans-serif;
	font-size: 11px;
	border-collapse: collapse;
}

.zebra {
	background-color: #CCCCCC;
}

th {
	text-align: center;
	background-color: #EEE;
	padding: 4px 2px;
	height: 10px;
	border: 1px solid #CCC;
}

td {
	padding: 4px 2px;
	height: 10px;
	border: 1px solid #DDD;
}

th, tfoot tr td {
	padding: 4px 2px;
	border: 1px solid #CCC;
}

</style>

</head>
<body>

	<h2>Computer Specifications</h2>
	<?php $i = 0 ?>

	<table width="600">
	<thead>
		<tr>
			<th width="15">No.</th>
			<th width="150">Nama Users</th>
			<th width="50">Casing</th>
			<th width="50">Monitor</th>
			<th width="100">Keyboard</th>
			<th width="50">Mouse</th>
			<th width="100">Mainboard</th>
			<th width="100">Processor</th>
			<th width="80">HardDrive</th>
			<th width="80">RAM</th>
			<th width="80">VGA</th>
			<th width="80">CD-Room</th>
			<th width="50">Lan-Card</th>
			<th width="50">Type</th>

		</tr>
	</thead>
		<tbody>
			<?php foreach ($spec as $ar): ?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
			<td width="15" align="center"><?= ++$i ?></td>
			<td width="150"><?= $ar->nama_user ?></td>
			<td width="50"><?= $ar->cpu_casing ?></td>
			<td width="50"><?= $ar->monitor ?></td>
			<td width="100"><?= $ar->keyboard ?></td>
			<td width="50"><?= $ar->mouse ?></td>
			<td width="100"><?= $ar->mainboard ?></td>
			<td width="100"><?= $ar->processor ?></td>
			<td width="80"><?= $ar->harddrive ?></td>
			<td width="80"><?= $ar->ram ?></td>
			<td width="80"><?= $ar->vga ?></td>
			<td width="80"><?= $ar->cdroom ?></td>
			<td width="50"><?= $ar->lancard ?></td>
			<td width="50" align="center"><?= $ar->computer_type ?></td>


			</tr>
		<?php endforeach ?>
		</tbody>
<!--
		<tfoot>
			<tr>
				<td colspan="1"><strong>Total user ada
				<?= $total ?></strong></td>
			</tr>
		</tfoot>
-->
	</table>

</body>
</html>
