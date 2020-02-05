<div class="container">
		<?= form_open($form_action) ?>
		<?= isset($input->id_jobprogram) ? form_hidden('id_jobprogram', $input->id_jobprogram) : '' ?>

<div class="row">
	<!--Quality Objectives-->
	<?= form_label('Quality Objectives :', 'quality_objectives', ['class' => 'col-3']) ?>
	<?= form_textarea(array('name' => 'quality_objectives', 'rows' => 1, 'cols' => 65, 'class' => 'col-9'), $input->quality_objectives) ?>
	<div id="font-error"><?= form_error('quality_objectives') ?></div>
</div><!--end row-->

<div class="row">
	<!--Target-->
	<?= form_label('Target :', 'target', ['class' => 'col-3']) ?>
	<?= form_textarea(array('name' => 'target', 'rows' => 1, 'cols' => 65, 'class' => 'col-9'), $input->target) ?>
	<div id="font-error"><?= form_error('target') ?></div>
</div><!--end row-->

<div class="row">
	<!--jobname1-->
	<?= form_label('Job Program :', 'jobname1', ['class' => 'col-3']) ?>
	<?= form_textarea(array('name' => 'jobname1', 'rows' => 1, 'cols' => 65, 'class' => 'col-6'), $input->jobname1) ?>
	<div id="font-error"><?= form_error('jobname1') ?></div>
	<!--implementation1-->
	<div class="right">
	<?php $bangarie = 'id="picker" placeholder="Implementation Date "';
	echo form_input('implementation1', $input->implementation1, $bangarie); ?>
	<div id="font-error"><?= form_error('implementation1') ?></div>
	</div><!--End right-->
</div><!--end row-->

<div class="row">
	<!--jobname2-->
	<?= form_label('Job Program :', 'jobname2', ['class' => 'col-3']) ?>
	<?= form_textarea(array('name' => 'jobname2', 'rows' => 1, 'cols' => 65, 'class' => 'col-6'), $input->jobname2) ?>
	<!--implementation2-->
	<div class="right">
	<?php $bangarie = 'id="picker2" placeholder="Implementation Date "';
	echo form_input('implementation2', $input->implementation2, $bangarie); ?>
	</div>
</div><!--end row-->

<div class="row">
	<!--jobname3-->
	<?= form_label('Job Program :', 'jobname3', ['class' => 'col-3']) ?>
	<?= form_textarea(array('name' => 'jobname3', 'rows' => 1, 'cols' => 65, 'class' => 'col-6'), $input->jobname3) ?>
	<!--implementation3-->
	<div class="right">
	<?php $bangarie = 'id="picker3" placeholder="Implementation Date "';
	echo form_input('implementation3', $input->implementation3, $bangarie); ?></div>
</div><!--end row-->

<div class="row">
	<!--Price-->
	<div class="col-3"><?= form_label('Price / Period / Status :', 'planning_price') ?></div>
	<div class="col-4"><?= form_input('planning_price', $input->planning_price) ?></div>
	<div id="font-error"><?= form_error('planning_price') ?></div>

<div class="right col-2">
	<!--period-->
	<?= form_dropdown('period', getDropdownList('years', ['year_name', 'year_name']), $input->period) ?>
<div id="font-error"><?= form_error('period') ?></div></div>


<div class="right">
	<!--status-->
	<label class="radiostyle">Solved
	<?= form_radio('status', '<span class="btn btn-info"> Solved</span>', isset($input->status) && ($input->status == '<span class="btn btn-info"> Solved</span>') ? true : false) ?>
	<span class="checkmark"></span></label>
	<label class="radiostyle"> Process
	<?= form_radio('status', '<span class="btn btn-warning"> On-Process</span>', isset($input->status) && ($input->status == '<span class="btn btn-warning"> On-Process</span>') ? true : false) ?>
	<span class="checkmark"></span></label>
	<div id="font-error"><?= form_error('status') ?></div>
</div>
</div><!--end row-->

<div class="row">
	<div class="col-3"><?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?></div>
	<div class="col-9"><?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'col-2 btn btn-primary']) ?></div>
</div>

<?= form_close() ?>

</div><!--end container-->
