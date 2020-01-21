<div class="container">
<center>
	<table id="table0">
	<th colspan="7"><i class="fa fa-line-chart"></i> &nbsp;Administrator Data</th>

		<?= form_open_multipart($form_action) ?>
		<?= isset($input->id_admin) ? form_hidden('id_admin', $input->id_admin) : '' ?>

		<tr>
		<td rowspan="6">
		<?php if (!empty($input->avatar)): ?>
		<center><img src="<?= site_url("photos/$input->avatar") ?>" alt="<?= $input->nama_admin ?>"></center>
		<?php endif ?>
		</td>
		</tr>

		<tr>
		<td align="right"><?= form_label('Administrator Name :', 'nama_admin', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_input('nama_admin', $input->nama_admin) ?>
		<div id="font-error"><?= form_error('nama_admin');?></div></td>

		<td align="right"><?= form_label('Start Work Date :', 'since', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_input('since', $input->since) ?>
		<div id="font-error"><?= form_error('since');?></div></td>
		</tr>

<!-- ## -->
		<tr>
		<td align="right"><?= form_label('Username :', 'username', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_input('username', $input->username) ?>
		<div id="font-error"><?= form_error('username');?></div></td>

		<td align="right"><?= form_label('Password :', 'password', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_password('password', $input->password) ?>
		<div id="font-error"><?= form_error('password');?></div>
		</tr>

<!-- ## -->
		<tr>
		<td align="right"><?= form_label('Field Work :','fieldwork', ['class' => 'label']) ?></div></td>
		<td><?= form_dropdown('fieldwork', getDropdownList('fieldwork',['nama_bagian', 'nama_bagian']), $input->fieldwork, 'id="users"') ?>
		<div id="font-error"><?= form_error('fieldwork') ?></div></td>
		
		<td align="center">
		<div class="tooltip"><?= anchor('fieldwork', '<i class="fa fa-exchange"></i>', ['class' => 'btn btn-action']) ?><span class="tooltiptext">Add new if nothing field work from the list</span>
		</div></td>

		<td align="right"><?= form_label('Level :','level', ['class' => 'label']) ?></div></td>
		<td><?= form_dropdown('level', getDropdownList('admin', ['level', 'level']), $input->level, 'id="level"') ?>
		<div id="font-error"><?= form_error('level') ?></div>
		</tr>

<!-- ## -->
		
		<tr>
		<td align="right"><?= form_label('Phone Number :', 'phone', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_password('phone', $input->phone) ?>
		<div id="font-error"><?= form_error('phone');?></div>
		
		<td align="right"><?= form_label('Active User :', 'is_blokir', ['class' => 'label']) ?></td>
		<td colspan="2">
		<label class="block-label"><?= form_radio('is_blokir', 'Y', isset($input->is_blokir) && ($input->is_blokir == 'Y') ? true : false) ?> Aktive</label> &nbsp;
		<label class="block-label"><?= form_radio('is_blokir', 'N', isset($input->is_blokir) && ($input->is_blokir == 'N') ? true : false) ?> Blocker</label>
		<div id="font-error"><?= form_error('is_blokir') ?></div>
		</tr>

		<tr>
		<td align="right"><?= form_label('Upload Avatar :', 'avatar', ['class' => 'label']) ?></div></td>
		<td colspan="2"><?= form_upload('avatar') ?>
		<div id="font-error"><?= fileFormError('avatar', '<p class="form_error">', '</p>');?></div></td>

		</tr>

		<tr><td></td></tr>
		
<!-- That's something went wrong 


		<tr>
		<td colspan="2" align="center">
		<div id="font-error"><?= ($input->avatar) ?><br />
		Last update : <?= ($input->avatar) ?>
		<?= form_error('time_update') ?>
		</div></td>
		</tr>
-->
		<tfoot>
		<td><?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?></td>
		<td colspan="7" align="right">
		<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'btn btn-primary col-2']) ?>
		</td>
	</tfoot>
		<?= form_close() ?>
	</table>

</center>


</div> <!-- end konten -->