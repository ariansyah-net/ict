<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hardware Codefication</title>
</head>
<style>
		.box {
			width: 20%;
			margin: 0;
			padding-bottom: 5px;
			text-align: center;
			border: 1px dotted black;
			border-collapse: collapse;
			border-radius: 5px;
			font-family: arial;
			font-size: 8px;
		}
		.barcode {
			text-align: center;
			display: block;
			width: 95px;
			height: auto;
		}
</style>
<body>
	<?php $i = 0 ?>
	<?php $code ?>

	<div class="box">
		<br><?= $code->hw_codefication ?>
		<br><img class="barcode" src="<?= site_url('ar/img/bar.png')?>">
		<br>ICT Management Asset
		<br>www.itfarmasi.univpancasila.ac.id
	</div>

	<?php ?>
</body>
</html>
