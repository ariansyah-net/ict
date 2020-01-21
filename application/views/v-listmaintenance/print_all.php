<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>Computer List Codefication</title>

<style type="text/css">

h2 {
  font-family: dejavusanscondensedb;
	text-align: center;
	font-size: 18px;
}

table{
	font-family: dejavusanscondensed;
	font-size: 11px;
  border: 1px solid #CCC;
	border-collapse: separate;
	border-spacing: 70px;
  border-collapse: collapse;
}

th {
	text-align: center;
	background-color: #EEE;
	padding: 4px 2px;
	height: 10px;
	border: 1px solid #CCC;
}

td {
  font-family: hysmyeongjostdmedium;
  font-size: 10px;
	border: 1px solid #DDD;
	padding: 5px;
}

</style>
</head>

<body>
<h2>Computers List Maintenance</h2>

<?php $i = 0 ?>
<table>
	<thead>
		<tr>
			<th width="15">No.</th>
			<th width="10">Name</th>
			<th width="60">User Code</th>
			<th width="70">IP Address</th>
			<th width="90">MAC Address</th>
			<th width="135">Codefications</th>
      <th width="20">Month</th>
      <th width="20">Year</th>
      <th width="30">Status </th>

		</tr>
	</thead>
		<tbody>
			<?php foreach ($list as $ar): ?>
			<?= ($i & 1) ? '<tr>' : '<tr>'; ?>
			<td align="center"><?= ++$i ?></td>
			<td><?= $ar->nama_user ?></td>
			<td align="center"><?= $ar->code_user ?></td>
			<td><?= $ar->ipaddress ?></td>
			<td><?= $ar->macaddress ?></td>
			<td><?= $ar->codefication ?></td>
      <td><?= $ar->l_month ?></td>
      <td><?= $ar->l_year ?></td>
      <td align="center"><?= $ar->status ?></td>

      </tr>
		<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
