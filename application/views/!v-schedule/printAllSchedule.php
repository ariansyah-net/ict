<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>User Problem List</title>

<style type="text/css">

h2 {
	position: relative;
	font-family: dejavusanscondensedb, arial;
	font-size: 14px;
	margin: 3px auto;
}
.copyright {
	position: absolute;
	font-family: hysmyeongjostdmedium;
	font-size: 11px;
	text-align: right;
	display: inline-block;
	width: 100%;
}

.copyright span {
	display: inlne-block;
	text-align: center;
}

table {
  padding: 5px;
  font-size: 11px;
  border: 1px solid green;
  margin-top: auto;
  border-collapse: collapse;
}
th {
  font-family: dejavusanscondensed, arial, serif;
  font-size: 12px;
  background-color: lightblue;
  padding: 10px;
  text-align: center;
  border-bottom: 2px solid green;
}
td {
  font-family: dejavusanscondensed, arial, serif;
  font-size: 11px;
  color: #000;
  padding: 5px;
  border: 1px solid lightblue;
  border-style: solid;
  border-collapse: collapse;
}

</style>
</head>

<body>
<h2>Schedule Maintenance</h2>
<div class="copyright">Powered by IT Management Assets <br><span>http://itfarmasi.univpancasila.ac.id </span> </div>

<?php $i = 0 ?>
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Month</th>
			<th>Room & location</th>
		</tr>
	</thead>
		<tbody>
			<?php foreach ($sched as $ar): ?>
				<?= ($i & 1) ? '<tr>' : '<tr>'; ?>
				<td align="center"><?= ++$i ?></td>
				<td><b><?= $ar->month_name ?></b></td>
				<td><?= $ar->room_name ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
