<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#menus" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Add Site Menu</h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="menus">
    <div class="card-body">


<?= form_open('dashboard/add_navmenu') ?>

<!--MENU NAME-->
    <div class="form-group row">
    <?= form_label('Menu Name :', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('a', set_value('a'), ['class' => 'form-control','required'=>'required']) ?>
    </div>
    </div>

<!--PARENT MENU-->
    <div class="form-group row">
    <?= form_label('Parent Menu :', 'b', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_dropdown('b', getDropdownList('it_navmenu', ['id_menu', 'menu_name']), set_value('b'), array('class' => 'custom-select mr-sm-2')) ?>
    <small class="form-text text-grey">To set primary menu, leave it blank.</small>

    </div>
    </div>

<!--MENU ICONS-->
    <div class="form-group row">
    <?= form_label('Menu Icon :', 'c', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('c', set_value('c'), ['class' => 'form-control']) ?>
    </div>
    </div>
<!--MENU LINK-->
    <div class="form-group row">
    <?= form_label('Menu Link :', 'd', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('d', set_value('d'), ['class' => 'form-control']) ?>
    </div>
    </div>
<!--MENU ORDER-->
    <div class="form-group row">
    <?= form_label('Menu Order :', 'e', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('e', set_value('e'), ['class' => 'form-control','required'=>'required']) ?>
    </div>
    </div>
<!--MENU ACTIVE-->
    <div class="form-group row">
    <?= form_label('Active Status :', 'f', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="1" id="1" name="f" class="custom-control-input" required="required">
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="0" id="0" name="f" class="custom-control-input" required="required">
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
