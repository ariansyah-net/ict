<div class="card shadow mb-4">
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Change Tags</h6>
  </a>
  <div class="collapse show" id="collapseCardExample">
  <div class="card-body">
<?= form_open('dashboard/change_tags') ?>
<?= form_hidden('id', $ar['id_tag'])?>

<!-- TAG NAME -->
    <div class="form-group row">
    <?= form_label('Tags Name', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('a', $ar['tag_name'], ['class' => 'form-control']) ?>
    </div>
    </div>

<!-- TAG ACTIVE -->
    <div class="form-group row">
    <?= form_label('Status', 'cate_active', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'b', 'id'=>'1',  'required' => 'required'], '1', isset($ar['tag_active']) && ($ar['tag_active'] == '1') ? true : false) ?>
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'b', 'id'=>'0',  'required' => 'required'], '0', isset($ar['tag_active']) && ($ar['tag_active'] == '0') ? true : false) ?>
    <?= form_label('Non Active', '0', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!--ACTION BUTTON-->
    <div class="form-group row">
    <?= form_label('', '', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10 p-3">
    <button type='submit' name='submit' class='btn btn-primary'><i class='fa fa-save'></i> Save Data</button>
    </div>
    </div>

<?= form_close() ?>

    </div>
  </div>
</div>
