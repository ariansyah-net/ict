<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Change Location</h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <div class="card-body">


<?= form_open('dashboard/change_locations') ?>
<input type='hidden' name='id' value='<?= $ar['id_locations'] ?>'>

<!-- FIELDWORK NAME -->
  <div class="form-group row">
  <?= form_label('Locations Name :', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
  <div class="col-sm-8">
  <?= form_input('a', $ar['locations_name'], ['class' => 'form-control']) ?>
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
