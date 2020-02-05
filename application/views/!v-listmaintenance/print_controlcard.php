<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>Daftar Spesifikasi Komputer</title>

<!-- here for css style your report -->
<style type="text/css">

h2 {
	text-align: center;
	font-size: 16px;
}

table{

	font-family: arial, helvetica, sans-serif;
	font-size: 11px;
	border: 1px solid #CCC;
	width: 100%;
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
	border: 1px solid #CCC dotted;
}

th, tfoot tr td {
	padding: 4px 2px;
	border: 0px solid #CCC;
}

.footer{
	bottom: 65%;
	background-color: #EEE;
	color: #AAA;
	text-align: left;
	padding: 5px;
	font-size: 11px;
	font-family: arial, helvetica;
}

</style>
</head>


<body>
<h2>Personal Specifications Computer</h2>

	<?php $i = 0 ?>

<table align="center">
<?php $controlcard ?>
<thead>
<tr><th colspan="2">Personality</th>
</tr>
</thead>
<tr>
<td width="100" align="right">Nama : </td>
<td width="350"><?= $controlcard->l_month ?></td></tr>
<tr>
<td width="100" align="right">CPU Casing : </td>
<td width="350"><?= $controlcard->cpu_casing ?></td></tr>
<tr>
<td width="100" align="right">Monitor : </td>
<td width="350"><?= $controlcard->monitor ?></td></tr>
<tr>
<td width="100" align="right">Keyboard : </td>
<td width="350"><?= $controlcard->keyboard ?></td></tr>
<tr>
<td width="100" align="right">Mouse : </td>
<td width="350"><?= $controlcard->mouse ?></td></tr>
<tr>
<td width="100" align="right">Mainboard : </td>
<td width="350"><?= $controlcard->mainboard ?></td></tr>
<tr>
<td width="100" align="right">Processor : </td>
<td width="350"><?= $controlcard->processor ?></td></tr>
</table>
<br>
<table align="center">

<thead>
<tr><th colspan="2">Network</th>
</tr>
</thead>
</table>


<div class="footer">
Copyright &copy; <?php echo date('Y'); ?> Information Communications Technology - FFUP
</div>

</body>
</html>
