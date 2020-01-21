<!DOCTYPE html PUBLIC> "-//W3C//DTD XHTML 1.0
Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>All Codefication Computers</title>
</head>
<style>

	table {
		width: auto;
		padding: 0; margin: 0;
		border-collapse: collapse;
		border: 1px solid black;
	}
	td {
		text-align: center;
		font-family: arial;
		font-size: 8px;
		border: 1px dotted black;
		padding: 5px;
		margin: 5px;
	}
  .box {
    display: inline;
    width: 20%;
    padding: 5px;
    border: 1px dotted black;
    border-radius: 5px;
    font-family: arial;
    font-size: 8px;
  }
	.barcode {
		text-align: center;
		width: 95px;
	}
</style>
<body>
	<?php $i = 0 ?>
	<table>
		<tbody>
			<?php foreach ($code as $ar): ?>
			<?= ($i & 0) ? '<tr>' : '<tr>'; ?>
			<td><?= ++$i ?></td>
			<td><?= $ar->hw_name ?></td>
			<td>
        <?= $ar->hw_codefication ?>
        <br><img class="barcode" src="<?= site_url('ar/img/bar.png')?>">
  			<br>IT Management Asset
  			<br>www.itfarmasi.univpancasila.ac.id
      </td>
	</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>
