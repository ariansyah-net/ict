<div class="container">
	<div class="form-users">
		<div align="right">
			<?php if (!empty($input->avatar)): ?>
				<img src="<?= site_url("photos/$input->avatar") ?>">
					<?php else: ?> <img src="<?= site_url("photos/no_avatar.png") ?>">
						<?php endif ?>
							</div>
<?= form_open_multipart($form_action) ?>
<?= isset($input->id_users) ? form_hidden('id_users', $input->id_users) : '' ?>
<?= isset($input->id_room) ? form_input(['type' => 'hidden', 'name' => 'id_room', 'id' => 'id-room', 'value' => $input->id_room]) : '' ?>

<div class="form-user grid">
<!--Full Name-->
	<?= form_label('Full Name :', 'nama_user') ?>
		<div>
			<?= form_input('nama_user', $input->nama_user, array('class' => 'field', 'placeholder' => 'Full Name')) ?>
				<span id="font-error"><?= form_error('nama_user') ?></span>
					</div>
<!--User Code-->
						<?= form_label('User Code :', 'code_user') ?>
							<div>
								<?= form_input('code_user', $input->code_user, array('class' => 'field', 'placeholder' => 'Code User')) ?>
									<span id="font-error"><?= form_error('code_user') ?></span>
										</div>
<!--Job Position-->
											<?= form_label('Job Position:', 'jabatan') ?>
												<div>
													<?= form_input('jabatan', $input->jabatan, array('class' => 'field', 'placeholder' => 'Job Position')) ?>
														<span id="font-error"><?= form_error('jabatan') ?></span>
															</div>
<!--Locations-->
																<?= form_label('Locations :', 'Locations') ?>
															<div>
														<?= form_dropdown('lokasi', getDropdownList('locations', ['nama_lokasi', 'nama_lokasi']), $input->lokasi, array('class' => 'field')) ?>
													<span id="font-error"><?= form_error('lokasi') ?></span>
												</div>


<!--Select Room-->
		<?= form_label('Select Room :', 'id_room') ?>
			<div>
				<input type="text" class="col-12" name="search_room" value="<?= $input->room_name ?>" id="search_room" onkeyup="roomAC()" placeholder="write something", required="required">
					<ul id="list_room" class="live-search-list"></ul>
						<span id="font-error"><?= form_error('id_room') ?></span>
							</div>


<!--Fieldwork-->
					<?= form_label('Fieldwork :', 'fieldwork_name') ?>
				<div>
			<?= form_dropdown('fieldwork_name', getDropdownList('fieldwork', ['fieldwork_name', 'fieldwork_name']), $input->fieldwork_name, array('class' => 'field')) ?>
		<span id="font-error"><?= form_error('fieldwork_name') ?></span>
	</div>
<!--Phone-->
		<?= form_label('Phone :', 'no_hp') ?>
			<div>
				<?= form_input('no_hp', $input->no_hp, array('class' => 'field', 'placeholder' => 'Phone')) ?>
					<span id="font-error"><?= form_error('no_hp') ?></span>
						</div>
<!--Active User-->
							<?= form_label('Active User :', 'is_active') ?>
								<div>
									<?= form_radio('is_active', 'Y', isset($input->is_active) && ($input->is_active == 'Y') ? true : false) ?> Active
										<?= form_radio('is_active', 'N', isset($input->is_active) && ($input->is_active == 'N') ? true : false) ?> Deactive
											<span id="font-error"><?= form_error('is_active') ?></span>
												</div>
<!--Avatar-->
													<?= form_label('Avatar :', 'avatar') ?>
														<div>
															<?= form_upload('avatar') ?>
																<div id="font-error"><?= fileFormError('avatar', '<p class="form_error">', '</p>');?></div>
																	</div>
																</div><!--end grid-->
															<hr class="dashboard"></hr>
<!--Action-->
														<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> Save Data', 'class' => 'btn btn-primary']) ?>
													<?=form_close() ?>
												</div><!--end form-users-->
		<?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-danger', 'onclick' => 'back()')) ?>
</div><!--end container-->
