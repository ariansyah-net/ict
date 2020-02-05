          <div class="container">
        <div class="form">
      <div class="row">
    <?= form_open($form_action) ?>
  <?= isset($input->id_assetcategory) ? form_hidden('id_assetcategory', $input->id_assetcategory) : '' ?>

<!--Category Name-->
<div class="input-group col-5">
  <?= form_label('<strong>Category Name :</strong>', 'asset_cat_name') ?>
    <?= form_input('asset_cat_name', $input->asset_cat_name, ['class' => 'col-12', 'placeholder' => 'Name..']) ?>
      <div id="font-error"> <?= form_error('asset_cat_name');?> </div>
        </div>

<!--Type Category-->
            <div class="input-group col-5">
          <?= form_label('<strong>Type :</strong>', 'asset_type_category') ?>
        <?= form_radio('asset_type_category', 'Hardware', isset($input->asset_type_category) && ($input->asset_type_category == 'Hardware') ? true : false) ?> Hardware
      <?= form_radio('asset_type_category', 'Software', isset($input->asset_type_category) && ($input->asset_type_category == 'Software') ? true : false) ?> Software
    <i id="font-error"><?= form_error('asset_type_category') ?></i>
  </div>
</div><!--end row-->

<hr class="dashboard">
<!--action-->
<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'btn btn-primary']) ?>
  <?= form_close() ?>
    </div><!--end form-->
      <?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
        </div><!--end container-->
