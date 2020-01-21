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
		border: 1px solid lightblue;
	}
	td {
		text-align: center;
		font-family: arial;
		font-size: 8px;
		border: 1px inset red;
		padding: 5px;
		margin: 5px;
	}
	.avatar {
		width: 32px;
		height: 32px;
	}

	.box {
		display: inline;
		width: 20%;
		margin: 0px 0px 20px 15px;
		padding: 5px;
		border: 1px dotted black;
		border-collapse: collapse;
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
			<td>
				<?php if (!empty($ar->avatar)): ?>
					<img class="avatar" src="<?= site_url("photos/$ar->avatar") ?>">
							<?php else: ?> <img class="avatar" src="<?= site_url("photos/no_avatar.png") ?> ">
							<?php endif ?>
								</td>
			<td><?= $ar->nama_user ?></td>
			<td><?= $ar->no_ruangan ?></td>
			<td><?= $ar->codefication ?>
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
