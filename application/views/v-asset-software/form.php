<div class="container">

  <div class="form">
    <div class="row">
      <?= form_open($form_action) ?>
        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

<!--Asset Category-->
<div class="input-group col-5">
  <?= form_label('<strong>Asset Category :</strong>', 'id_assetcategory') ?>
    <?= form_dropdown('id_assetcategory', getDropdownList('asset_category', ['id_assetcategory', 'asset_cat_name']), $input->id_assetcategory, 'class="col-12"') ?>
      <i id="font-error"><?= form_error('id_assetcategory') ?></i>
        </div>
<!--Software Name-->
<div class="input-group col-5">
  <?= form_label('<strong>Software Name :</strong>', 'sf_name') ?>
    <?= form_input('sf_name', $input->sf_name, ['class' => 'col-12']) ?>
      <span id="font-error"> <?= form_error('sf_name');?></span>
        </div>
<!--Vendor-->
<div class="input-group col-5">
  <?= form_label('<strong>Vendor :</strong>', 'sf_vendor') ?>
    <?= form_input('sf_vendor', $input->sf_vendor, ['class' => 'col-12']) ?>
      <span id="font-error"> <?= form_error('sf_vendor');?></span>
        </div>
<!--Lisence-->
<div class="input-group col-5">
  <?= form_label('<strong>Lisence :</strong>', 'id_lisence') ?>
    <?= form_dropdown('id_lisence', getDropdownList('lisence', ['id_lisence', 'lisence_name']), $input->id_lisence, 'class="col-12"') ?>
      <span id="font-error"><?= form_error('id_lisence') ?></span>
        </div>
<!--Lisence Key-->
<div class="input-group col-5">
  <?= form_label('<strong>Lisence Key :</strong>', 'sf_lisence_key') ?>
    <?= form_input('sf_lisence_key', $input->sf_lisence_key, ['class' => 'col-12', 'placeholder' => '. . .']) ?>
      <span id="font-error"> <?= form_error('sf_lisence_key');?></span>
        </div>
<!--Acquisition-->
<div class="input-group col-5">
  <?= form_label('<strong>Acquisition Date :</strong>', 'sf_acquisition_date') ?>
    <?php $bangarie = 'id="picker" class="col-12" placeholder=". . ."';
      echo form_input('sf_acquisition_date', $input->sf_acquisition_date, $bangarie); ?>
        <span id="font-error"><?= form_error('sf_acquisition_date') ?></span>
          </div>
<!--Expiry Date-->
<div class="input-group col-5">
  <?= form_label('<strong>Expiry Date :</strong>', 'sf_expiry_date') ?>
    <?php $expiry = 'id="picker2" class="col-12" placeholder=". . ."';
      echo form_input('sf_expiry_date', $input->sf_expiry_date, $expiry); ?>
        <span id="font-error"><?= form_error('sf_expiry_date') ?></span>
          </div>
<!--Price-->
<div class="input-group col-5">
  <?= form_label('<strong>Price:</strong>', 'sf_price') ?>
    <?= form_input('sf_price', $input->sf_price, ['class' => 'col-8', 'placeholder' => 'Rp.']) ?>
      <span id="font-error"> <?= form_error('sf_price');?></span>
        </div>
<!--Serial Number-->
<div class="input-group col-5">
  <?= form_label('<strong>Serial Number :</strong>', 'sf_serial_number') ?>
    <?= form_textarea(array('name' => 'sf_serial_number', 'rows' => 2, 'class' => 'col-12'), $input->sf_serial_number) ?>
      <i id="font-error"><?= form_error('sf_serial_number') ?></i>
        </div>
          </div><!--end row-->
            <hr class="dashboard">
<!--Actions-->
<div class="row">
  <?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp;Save', 'class' => 'col-3 btn btn-primary']) ?>
    </div><!--end row-->
      <?= form_close() ?>
        </div><!--end container-->
          <?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
