<div class="card shadow mb-4">
<a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Add Post Page</h6>
</a>
<div class="collapse show" id="collapseCard">
<div class="card-body">

<?= form_open_multipart('dashboard/change_page') ?>
<input type='hidden' name='id' value='<?= $ar['id_page'] ?>'>

<!-- PAGE TITLE -->
    <div class="form-group row">
    <?= form_label('Post Title', 'page_title', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <?= form_input('a', $ar['page_title'], ['class' => 'form-control']) ?>
    </div>
    </div>

<!-- CONTENT -->
    <div class="form-group row">
    <?= form_label('Content', 'b', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <textarea class="form-control" id="mytextarea" rows="15" name="b"><?= $ar['page_content']?></textarea>
    </div>
    </div>

<!-- CATEGORIES -->
    <div class="form-group row">
    <?= form_label('Categories', 'id_categories', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_dropdown('c', getDropdownList('it_categories', ['id_categories', 'cate_name']), $ar['id_categories'], array('class' => 'custom-select mr-sm-2')) ?>
    </div>
    <div class="col-sm-1">
    <a class="text-secondary" target="blank" title="add new categories" href="<?=base_url('dashboard/categories')?>">
    <i class="far fa-question-circle"></i></a>
    </div>
    </div>

<!-- TAG CONTENT -->
    <div class="form-group row">
    <?= form_label('Tags', 'tag', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_multiselect('d[]', getDropdownList('it_tags', ['tag_name', 'tag_name']), unserialize($ar['tag']), array('class' => 'multiselect form-control')) ?>
    </div>
    <div class="col-sm-1">
    <a class="text-secondary" target="blank" title="add new tags" href="<?=base_url('dashboard/tags')?>">
    <i class="far fa-question-circle"></i></a>
    </div>
    </div>

<!-- PAGE ACTIVE-->
    <div class="form-group row">
    <?= form_label('Page Status', 'page_active', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'1'], '1', isset($ar['page_active']) && ($ar['page_active'] == '1') ? true : false) ?>
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'0'], '0', isset($ar['page_active']) && ($ar['page_active'] == '0') ? true : false) ?>
    <?= form_label('Non Active', '0', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- PAGE IMAGE -->
    <div class="form-group row">
    <?= form_label('Image', 'image', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-6">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="f">
    <?= form_label('Choose file..', 'f', ['class' => 'custom-file-label', 'id' => 'customFile']) ?>
    <small class="form-text text-muted">Max 2mb file to upload</small>
    </div>
    </div>
    </div>

<!-- PAGE -->
    <div class="form-group row">
    <?= form_label('Page Hits', 'page_hits', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-3">
    <?= form_input('g', $ar['page_hits'], ['class' => 'form-control']) ?>
    </div>
    </div>

  </div><!--end card-body-->
  </div><!--end collapse-->

<!--ACTION BUTTON-->
<div class="card-footer">
  <div class="form-row">
    <div class="form-group col-md-12">
        <button type='submit' name='submit' class='btn btn-primary'><i class='fa fa-save'></i> Save Data</button>
          </div>
            </div>

</div>
  </div>
