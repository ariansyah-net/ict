<div class="container">
	<div class="form">
		<div class="row">
			<?= form_open($form_action) ?>
				<?= isset($input->id_hardware) ? form_hidden('id_hardware', $input->id_hardware) : '' ?>
<!--Hardware Name-->
				<div class="input-group col-5">
			<?= form_label('<strong>Hardware Name :</strong>', 'hw_name') ?>
		<?= form_input('hw_name', $input->hw_name, ['class' => 'col-12', 'placeholder' => 'Name..']) ?>
	<span id="font-error" class="col-12"> <?= form_error('hw_name');?> </span>
</div>
<!--Hardware Type-->
<div class="input-group col-5">
	<?= form_label('<strong>Hardware Type :</strong>', 'hw_type') ?>
		<?= form_input('hw_type', $input->hw_type, ['class' => 'col-12', 'placeholder' => 'G02L2']) ?>
			<span id="font-error" class="col-12"><?= form_error('hw_type');?></span>
				</div>

<!--Hardware Category-->
				<div class="input-group col-5">
			<?= form_label('<strong>Category :</strong>', 'id_assetcategory') ?>
		<?= form_dropdown('id_assetcategory', getDropdownList('asset_category', ['id_assetcategory', 'asset_cat_name']), $input->id_assetcategory, 'class="col-12"') ?>
	<i id="font-error" class="col-12"><?= form_error('id_assetcategory') ?></i>
</div>
<!--Room-->
<div class="input-group col-5">
	<?= form_label('<strong>Locations :</strong>', 'id_room') ?>
		<?= form_dropdown('id_room', getDropdownList('room', ['id_room', 'room_name']), $input->id_room, 'class="col-12"') ?>
			<i id="font-error" class="col-12"><?= form_error('id_assetcategory') ?></i>
				</div>
<!--User Selected-->
				<div class="input-group col-5">
			<?= form_label('<strong>Users :</strong>', 'id_users') ?>
		<?= form_dropdown('id_users', getDropdownList('users', ['id_users', 'nama_user']), $input->id_users, 'class="col-12"') ?>
	<i id="font-error" class="col-12"><?= form_error('id_users') ?></i>
</div>
<!--Codefication-->
<div class="input-group col-5">
	<?= form_label('<strong>Hardware Codefication :</strong>', 'hw_codefication') ?>
		<?= form_input('hw_codefication', $input->hw_codefication, ['class' => 'col-12', 'placeholder' => ': : :']) ?>
			<i id="font-error" class="col-12"><?= form_error('hw_codefication');?></i>
				</div>
<!--Product-->
				<div class="input-group col-5">
			<?= form_label('<strong>Product :</strong>', 'hw_product') ?>
		<?= form_input('hw_product', $input->hw_product, ['class' => 'col-12', 'placeholder' => 'Hp, Ubiquiti, etc.']) ?>
	<i id="font-error" class="col-12"><?= form_error('hw_product');?></i>
</div>
<!--Price-->
<div class="input-group col-5">
	<?= form_label('<strong>Price :</strong>', 'hw_price') ?>
		<?= form_input('hw_price', $input->hw_price, ['class' => 'col-8', 'placeholder' => 'Rp.']) ?>
			<i id="font-error" class="col-12"><?= form_error('hw_price');?></i>
				</div>
<!--Manufacturer Serial Number-->
				<div class="input-group col-5">
			<?= form_label('<strong>S-N Manufacturer :</strong>', 'hw_manufacturer_sn') ?>
		<?= form_textarea(array('name' => 'hw_manufacturer_sn', 'rows' => 2, 'class' => 'col-12', 'placeholder' => 'Manufacturer Serial Number'), $input->hw_manufacturer_sn) ?>
	<i id="font-error" class="col-12"><?= form_error('hw_manufacturer_sn') ?></i>
</div>
<!--Original Serial Number-->
<div class="input-group col-5">
	<?= form_label('<strong>Original S-N :</strong>', 'hw_original_sn') ?>
		<?= form_textarea(array('name' => 'hw_original_sn', 'rows' => 2, 'class' => 'col-12', 'placeholder' => 'Original Serial Number'), $input->hw_original_sn) ?>
			<i id="font-error" class="col-12"><?= form_error('hw_original_sn') ?></i>
				</div>
<!--Year Procurement-->
				<div class="input-group col-5">
			<?= form_label('<strong>Procurement Year:</strong>', 'hw_procurement_year') ?>
		<?= form_input('hw_procurement_year', $input->hw_procurement_year, ['class' => 'col-4', 'placeholder' => '2018']) ?>
	<i id="font-error" class="col-12"><?= form_error('hw_procurement_year');?></i>
</div>
<!--Status-->
<div class="input-group col-5">
	<?= form_label('<strong>Status :</strong>', 'hw_status') ?>
		<?= form_radio('hw_status', 'active', isset($input->hw_status) && ($input->hw_status == 'active') ? true : false) ?> Active
			<?= form_radio('hw_status', 'stock', isset($input->hw_status) && ($input->hw_status == 'stock') ? true : false) ?> Stock
				<i id="font-error" class="col-12"><?= form_error('hw_status') ?></i>
					</div>
						</div><!--end row-->
<!--Actions-->
							<hr class="dashboard">
						<div class="row">
					<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'btn btn-primary']) ?>
				</div><!--end row-->
			<?= form_close() ?>
		</div><!--end form-->
	<?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
</div><!--end container-->
