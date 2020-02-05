
<div class="container">
	<div class="form">
		<div class="row">
			<fieldset>
				<legend>Schedule</legend>

			<?= form_open($form_action) ?>
			<?= isset($input->id_schedule) ? form_hidden('id_schedule', $input->id_schedule) : '' ?>

		<div class="input-group col-12">
			<?= form_label('<strong>Room :</strong>', 'room_name', ['class' => 'label']) ?>
			<?php $ar = array('class' => 'col-5', 'id' => 'room'); ?>
	  	<?= form_dropdown('room_name', getDropdownList('room', ['room_name', 'room_name']), $input->room_name, $ar) ?>
			<span id="font-error"><?= form_error('room_name') ?></span>
		</div>

		<div class="input-group col-8">
			<?= form_label('<strong>Select Month :</strong>', 'month_name', ['class' => 'label']) ?>
			<? $ie = array('id' => 'month', 'multiple' => 'multiple'); ?>
			<?= form_multiselect('month_name', getDropdownList('month', ['month_name', 'month_name']), $input->month_name, $ie) ?>

			<span id="font-error"><?= form_error('month_name') ?></span>
		</div>

		<div class="input-group col-12">
				<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp; Save', 'class' => 'btn btn-primary']) ?>
		</div>

		<?= form_close() ?>
	</fieldset>

	<script type="text/javascript" src="<?= base_url('ar/select2/dist/js/select2.min.js'); ?>" ></script>

	<script>
	$(document).ready(function () {
	$("#room").select2({
		placeholder: "Select rooms"

	});

	$("#month").select2({
		placeholder: "Select Months"
		});
	});
	</script>
</div>
</div>
<?= form_button(' ', '<i class="fa fa-arrow-left"></i> Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
</div>
