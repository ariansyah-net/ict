<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

	<title>Daftar Pengguna Komputer</title>

<style type="text/css">

table{

	font-family: arial, helvetica, sans-serif;
	font-size: 11px;
	border: 1px solid #CCC;
	width: 100%;
}

th {
	text-align: center;
	background-color: #EEE;
	padding: 4px 2px;
	height: 10px;
	border: 1px solid #CCC;
}

td {
	padding: 4px 5px;
	height: 10px;
	border: 1px solid #CCC dotted;
}


div.relative {
	position: relative;
	width: 102px;
	height: auto;
	border: 0px solid #CCC;
}

div.absolute {
	position: absolute;
	display: block;
	left: 110px;
	height: auto;
	border: 0px solid #CCC;
}

hr.style {
	float: right;
	border-top: 0px;
}

.zebra {
	background-color: #CCCCCC;
}

.footer{
	top: 100%;
	bottom: 1%;
	background-color: #EEE;
	color: #AAA;
	text-align: left;
	padding: 5px;
	font-size: 11px;
	font-family: arial, helvetica;
	position: absolute;
	width: 100%;
}

</style>
</head>


<body>

<div class="relative">
<img src="<?= base_url('ar/img/up.jpg');?>" width="100" height="90">
</div>

<div class="absolute">
<h3>UNIVERSITAS PANCASILA<br>FAKULTAS FARMASI</h3>
Srengseng Sawah, Jagakarsa, Jakarta - 12640 ---------------------------
</div>
<hr class="style">
<p>
<div align="right">
<?php echo date('l, F Y h:i:s A'); ?>
</div>
</p>
<p align="center"><strong>Informations Communications Technology</strong></p>

<p></p>

<?php $i = 0 ?>
<table>

<?php $user ?>
<thead>
<tr><th colspan="3">Detail User</th>
</tr>
</thead>

<tr>
<td rowspan="8" align="center"><?php if ($user->avatar): ?>
<img src="<?= site_url("photos/$user->avatar") ?>">
<?php else: ?>
<img src="<?= site_url("photos/whois.png") ?>">
<?php endif ?>
</td></tr>

<tr>
<td width="100">Full Name : </td>
<td width="350"><?= $user->nama_user ?></td></tr>
<tr>	
<td width="100">User Code : </td>
<td width="350"><?= $user->code_user ?></td></tr>
<tr>	
<td width="100">Phone Number : </td>
<td width="350"><?= $user->no_hp ?></td></tr>
<tr>	
<td width="100">Position : </td>
<td width="350"><?= $user->jabatan ?></td></tr>
<tr>	
<td width="100">Location : </td>
<td width="350"><?= $user->lokasi ?></td></tr>
<tr>	
<td width="100">Room : </td>
<td width="350"><?= $user->no_ruangan ?></td></tr>
<tr>	
<td width="100">Field Work : </td>
<td width="350"><?= $user->bagian ?></td></tr>
<tr>	
<td align="center" width="100"><?= $user->avatar ?></td>
<td width="100">Last Update : </td>
<td><?= $user->time_update ?></td>
</tr>

<tr>
<td></td>
<td>User Active :</td>
<td><?= $user->is_active ?></td>
</tr>

<?php ?>
</table>

<p></p><p></p>

<div class="footer">
Copyright &copy; <?php echo date('Y'); ?> Information Communications Technology - FFUP 
</div>

</body>
</html>