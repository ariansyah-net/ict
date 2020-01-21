<div class="container">
	<div class="form-one">
		<fieldset>
			<legend>User Package</legend>
				<div class="row">
					<?= form_open($form_action) ?>
						<?= isset($input->id_computers) ? form_hidden('id_computers', $input->id_computers) : '' ?>
							<?= isset($input->id_users) ? form_input(['type' => 'hidden', 'name' => 'id_users', 'id' => 'id-compac', 'value' => $input->id_users]) : '' ?>
<!--Select User-->
<div class="input-group col-5">
	<?= form_label('<strong>Select Users :</strong>', 'id_users') ?>
			<input type="text" class="col-12" name="search_compac" value="<?= $input->nama_user ?>" id="search_compac" onkeyup="compAC()" placeholder="write something", required="required">
				<ul id="compac_list" class="live-search-list"></ul>
					<span id="font-error"><?= form_error('id_users') ?></span>
						</div>
<!--Code User -->
							<div class="input-group col-5">
								<?= form_label('<strong>User Code :</strong>', 'code_user') ?>
									<?= form_input('code_user', $input->code_user, ['class' => 'col-6']) ?>
										<span id="font-error"><?= form_error('code_user') ?></span>
											</div>
<!--CPU Casing-->
										<div class="input-group col-5">
									<?= form_label('<strong>CPU Casing :</strong>', 'cpu_casing') ?>
								<?= form_input('cpu_casing', $input->cpu_casing, ['class' => 'col-12']) ?>
							<span id="font-error"><?= form_error('cpu_casing') ?></span>
						</div>
<!--Monitor-->
				<div class="input-group col-5">
			<?= form_label('<strong>Monitor :</strong>', 'monitor') ?>
		<?= form_input('monitor', $input->monitor, ['class' => 'col-12']) ?>
	<span id="font-error"><?= form_error('monitor') ?></span>
</div>
<!--Keyboard-->
	<div class="input-group col-5">
		<?= form_label('<strong>Keyboard :</strong>', 'keyboard') ?>
			<?= form_input('keyboard', $input->keyboard, ['class' => 'col-12']) ?>
				<span id="font-error"><?= form_error('keyboard') ?></span>
					</div>
<!--Mouse-->
						<div class="input-group col-5">
							<?= form_label('<strong>Mouse :</strong>', 'mouse') ?>
								<?= form_input('mouse', $input->keyboard, ['class' => 'col-12']) ?>
									<span id="font-error"><?= form_error('mouse') ?></span>
										</div>
<!--Mainboard-->
										<div class="input-group col-5">
									<?= form_label('<strong>Mainboard :</strong>', 'mainboard') ?>
								<?= form_input('mainboard', $input->mainboard, ['class' => 'col-12']) ?>
							<span id="font-error"><?= form_error('mainboard') ?></span>
						</div>
<!--Processor-->
				<div class="input-group col-5">
			<?= form_label('<strong>Processor :</strong>', 'processor') ?>
		<?= form_input('processor', $input->processor, ['class' => 'col-12']) ?>
	<span id="font-error"><?= form_error('processor') ?></span>
</div>
<!--Harddrive-->
<div class="input-group col-5">
	<?= form_label('<strong>Drive :</strong>', 'harddrive') ?>
		<?= form_input('harddrive', $input->harddrive, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('harddrive') ?></span>
				</div>
<!--RAM-->
					<div class="input-group col-5">
						<?= form_label('<strong>RAM :</strong>', 'ram') ?>
							<?= form_input('ram', $input->ram, ['class' => 'col-12']) ?>
								<span id="font-error"><?= form_error('ram') ?></span>
									</div>
<!--VGA-->
										<div class="input-group col-5">
									<?= form_label('<strong>VGA :</strong>', 'vga') ?>
								<?= form_input('vga', $input->vga, ['class' => 'col-12']) ?>
							<span id="font-error"><?= form_error('vga') ?></span>
						</div>
<!--CD ROOM-->
					<div class="input-group col-5">
				<?= form_label('<strong>CD-Room :</strong>', 'cdroom') ?>
			<?= form_input('cdroom', $input->cdroom, ['class' => 'col-12']) ?>
		<span id="font-error"><?= form_error('cdroom') ?></span>
</div>
<!--LAN CARD-->
<div class="input-group col-5">
	<?= form_label('<strong>LAN Card :</strong>', 'lancard') ?>
		<?= form_input('lancard', $input->lancard, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('lancard') ?></span>
				</div>
<!--Computer Type-->
					<div class="input-group col-5">
						<?= form_label('<strong>Type Computer :</strong>', 'computer_type') ?>
							<?= form_dropdown('computer_type', getDropdownList('computertypes', ['nama_type', 'nama_type']), $input->computer_type, array('class' => 'col-12', 'required' => 'required')) ?>
								<span id="font-error"><?= form_error('computer_type') ?></span>
									</div>
<!--PAN-->
									<div class="input-group col-5">
								<?= form_label('<strong>PAN :</strong>', 'pan') ?>
							<?= form_input('pan', $input->pan, ['class' => 'col-12']) ?>
						<span id="font-error"><?= form_error('pan') ?></span>
					</div>
<!--Power Suplly-->
				<div class="input-group col-5">
			<?= form_label('<strong>Power Supply :</strong>', 'powersupply') ?>
		<?= form_input('powersupply', $input->powersupply, ['class' => 'col-12']) ?>
	<span id="font-error"><?= form_error('powersupply') ?></span>
</div>
<!--Printer-->
<div class="input-group col-5">
	<?= form_label('<strong>Printer :</strong>', 'printer') ?>
		<?= form_input('printer', $input->printer, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('printer') ?></span>
				</div>
<!--Printer-->
					<div class="input-group col-5">
						<?= form_label('<strong>Scanner :</strong>', 'scanner') ?>
							<?= form_input('scanner', $input->scanner, ['class' => 'col-12']) ?>
								<span id="font-error"><?= form_error('scanner') ?></span>
									</div>
<!--Acquisition Year-->
									<div class="input-group col-5">
								<?= form_label('<strong>Year of Acquisition:</strong>', 'acquisition') ?>
							<?= form_input('acquisition', $input->acquisition, ['class' => 'col-6', 'placeholder' => '2018']) ?>
						<span id="font-error"><?= form_error('acquisition') ?></span>
					</div>
<!--Codefications-->
					<div class="input-group col-5">
				<?= form_label('<strong>Codefication :</strong>', 'codefication') ?>
			<?= form_input('codefication', $input->codefication, ['class' => 'col-12', 'required' => 'required']) ?>
		<span id="font-error"><?= form_error('codefication') ?></span>
	</div>
</div><!--end row-->
</fieldset><!--end fieldset-->
</div><!--end form-one-->

<!-- =================== FORM RIGHT ==================== -->
<div class="form-two">
	<fieldset>
		<legend>Networking</legend>
<!--IP Address-->
			<div class="row">
				<div class="input-group col-5">
					<?= form_label('<strong>IP Address :</strong>', 'ipaddress') ?>
						<?= form_input('ipaddress', $input->ipaddress, ['class' => 'col-12', 'required' => 'required']) ?>
							<span id="font-error"><?= form_error('ipaddress') ?></span>
								</div>
<!--Netmask-->
									<div class="input-group col-5">
										<?= form_label('<strong>Netmask :</strong>', 'netmask') ?>
											<?= form_input('netmask', $input->netmask,  ['class' => 'col-12', 'placeholder' => '255.255.255.0']) ?>
												<span id="font-error"><?= form_error('netmask') ?></span>
													</div>
<!--Gateway-->
									<div class="input-group col-5">
								<?= form_label('<strong>Gateway :</strong>', 'gateway') ?>
							<?= form_input('gateway', $input->gateway, ['class' => 'col-12']) ?>
						<span id="font-error"><?= form_error('gateway') ?></span>
					</div>
<!--DNS Server-->
				<div class="input-group col-5">
			<?= form_label('<strong>DNS Server :</strong>', 'dnsserver') ?>
		<?= form_input('dnsserver', $input->dnsserver, ['class' => 'col-12']) ?>
	<span id="font-error"><?= form_error('dnsserver') ?></span>
</div>
<!--MAC Address-->
<div class="input-group col-5">
	<?= form_label('<strong>Mac Address:</strong>', 'macaddress') ?>
		<?= form_input('macaddress', $input->macaddress, ['class' => 'col-12', 'required' => 'required']) ?>
			<span id="font-error"><?= form_error('macaddress') ?></span>
				</div>
<!--Computer Type-->
						<div class="input-group col-5">
							<?= form_label('<strong>Type :</strong>', 'ip_type') ?>
								<?= form_radio('ip_type', 'Static', 'selected', isset($input->ip_type) && ($input->ip_type == 'Static') ? true : false) ?> Static
									<?= form_radio('ip_type', 'DHCP', isset($input->ip_type) && ($input->ip_type == 'DHCP') ? true : false) ?> DHCP
										<span id="font-error"><?= form_error('ip_type') ?></span>
											</div>
												</div><!--end row-->
													</fieldset><!--end fieldset-->
														<p></p>
														<hr class="dashboard"><p>
<!--*** SOFTWARE SYSTEM ********************************************************-->
<!--OS Name-->
													<fieldset>
												<legend>Software System</legend>
											<div class="row">
										<div class="input-group col-5">
									<?= form_label('<strong>OS Name :</strong>', 'os') ?>
								<?= form_input('os', $input->os, ['class' => 'col-12']) ?>
							<span id="font-error"><?= form_error('os') ?></span>
						</div>
<!--Platform-->
				<div class="input-group col-5">
			<?= form_label('<strong>Platform :</strong>', 'platform') ?>
		<?= form_dropdown('platform', getDropdownList('platform', ['platform_name', 'platform_name']), $input->platform, array('class' => 'col-12', 'required' => 'required')) ?>
	<span id="font-error"><?= form_error('platform') ?></span>
</div>

<!--Software-->
				<div class="input-group col-5">
			<?= form_label('<strong>Software :</strong>', 'software') ?>
		<?= form_input('software', $input->software, ['class' => 'col-12']) ?>
	<span id="font-error"><?= form_error('software') ?></span>
</div>
<!--Antivirus-->
<div class="input-group col-5">
	<?= form_label('<strong>Anti Virus :</strong>', 'antivirus') ?>
		<?= form_input('antivirus', $input->antivirus, ['class' => 'col-12']) ?>
			<span id="font-error"><?= form_error('antivirus') ?></span>
				</div>
<!--explanation-->
						<div class="input-group col-5">
							<?= form_label('<strong>Explanation :</strong>', 'explanation') ?>
								<?= form_textarea(array('name' => 'explanation', 'rows' => 2, 'class' => 'col-12'), $input->explanation) ?>
									<span id="font-error"><?= form_error('explanation') ?>
										</div>
											</div><!--end row-->
												</fieldset><!--end fieldset-->
<!--action-->
													<p></p>
												<hr class="dashboard">
											<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'col-3 btn btn-primary']) ?>
										</div><!--end form-two-->
									<?= form_close() ?>
								</div><!--end container-->
							<?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
