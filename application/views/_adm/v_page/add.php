<div class="card shadow mb-4">
<a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Add Post Page</h6>
</a>
<div class="collapse show" id="collapseCard">
<div class="card-body">

<?= form_open('dashboard/add_page') ?>


<!-- PAGE TITLE -->
    <div class="form-group row">
    <?= form_label('Post Title', 'page_title', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <?= form_input('a', '', ['class' => 'form-control','required'=>'required']) ?>
    </div>
    </div>

<!-- CONTENT -->
    <div class="form-group row">
    <?= form_label('Content', 'b', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <textarea class="form-control" id="mytextarea" rows="15" name="b"></textarea>
    </div>
    </div>

<!-- CATEGORIES -->
    <div class="form-group row">
    <?= form_label('Categories', 'id_categories', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_dropdown('f', getDropdownList('it_categories', ['id_categories', 'cate_name']), set_value('f'), array('class' => 'custom-select mr-sm-2','required'=>'required')) ?>
    </div>
    </div>

<!-- TAG CONTENT -->
    <div class="form-group row">
    <?= form_label('Tags', 'tag', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <select multiple="multiple" class="multiselect form-control" name="e[]">
    <?php foreach ($tags as $r): ?>
    <option value="<?=$r->tag_name?>"><?= $r->tag_name ?></option>
    <?php endforeach; ?>
    </select>

    </div>
    </div>

<!-- PAGE ACTIVE-->
    <div class="form-group row">
    <?= form_label('Page Status', 'page_active', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="1" id="1" name="c" class="custom-control-input" required>
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="0" id="0" name="c" class="custom-control-input" required>
    <?= form_label('Non Active', '0', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- PAGE -->
    <div class="form-group row">
    <?= form_label('Page Hits', 'page_hits', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-3">
    <?= form_input('d', '', ['class' => 'form-control']) ?>
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
<?= form_close() ?>
</div>
  </div>
