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
	background-color: #f3f3f3;
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

	<h2>Daftar User</h2>
	<?php $i = 0 ?>

	<table width="600">
	<thead>
		<tr>
			<th width="25">No.</th>
			<th width="200">Users Name</th>
			<th width="70">Users Code</th>
			<th width="100">Phone Number</th>
			<th width="150">Job Position</th>
			<th width="40">Location</th>
			<th width="40">Room</th>	
			<th width="240">Field Works</th>
			
			<th width="30" align="center">Aktif?</th>
		</tr>
	</thead>
		<tbody>
			<?php foreach ($pengguna as $users): ?>
			<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
			<td width="25" align="center"><?= ++$i ?></td>
			<td width="200"><?= $users->nama_user ?></td>
			<td width="70" align="center"><?= $users->code_user ?></td>
			<td width="100"><?= $users->no_hp ?></td>
			<td width="150"><?= $users->jabatan ?></td>
			<td width="40"><?= $users->lokasi ?></td>
			<td width="30"><?= $users->no_ruangan ?></td>
			<td width="240"><?= $users->bagian ?></td>
			<td width="30" align="center"><?= $users->is_active ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="9"><strong>Total user ada
				<?= $jumlah_total ?></strong></td>
			</tr>
		</tfoot>
	</table>

</body>
</html>