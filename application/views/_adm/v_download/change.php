<div class="card shadow mb-4">
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-arrow-down"></i> Add New File</h6>
      </a>
<div class="collapse show" id="collapseCardExample">
  <div class="card-body">
    <?= form_open_multipart('dashboard/change_downloads') ?>
    <input type='hidden' name='id' value='<?= $ar['id_download'] ?>'>

<!-- FILE NAME -->
    <div class="form-group row">
    <?= form_label('File Title', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-8">
    <?= form_input('a', $ar['down_title'], ['class' => 'form-control','required'=>'required']) ?>
    </div>
    </div>

<!-- UPLOAD FILE -->
    <div class="form-group row">
    <?= form_label('Upload', 'down_filename', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="b">
    <?= form_label('Choose file..', 'b', ['class' => 'custom-file-label', 'id' => 'customFile']) ?>
    <small class="form-text text-danger">Note: max 5GB file to upload</small>
    </div>
    </div>
    </div>

<!-- DOWNLOAD ACTIVE-->
    <div class="form-group row">
    <?= form_label('Status', 'c', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <!-- <input type="radio" value="1" id="1" name="c" class="custom-control-input" required> -->
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'c', 'id'=>'1'], '1', isset($ar['down_active']) && ($ar['down_active'] == '1') ? true : false) ?>
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <!-- <input type="radio" value="0" id="0" name="c" class="custom-control-input" required> -->
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'c', 'id'=>'0'], '0', isset($ar['down_active']) && ($ar['down_active'] == '0') ? true : false) ?>
    <?= form_label('Non Active', '0', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!--DESC FILE-->
    <div class="form-group row">
    <?= form_label('Descriptions', 'd', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <textarea class="form-control" id="mytextarea" rows="10" name="d"><?= $ar['down_desc']?></textarea>
    </div>
    </div>

<!--CONTENT BUTTON-->
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
