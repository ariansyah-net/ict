<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Change Rooms</h6>
      </a>
<div class="collapse show" id="collapseCardExample">
  <div class="card-body">


<?= form_open('dashboard/change_schedule') ?>
<input type='hidden' name='id' value='<?= $ar['id_schedule'] ?>'>

<!-- ROOMS NAME -->
  <div class="form-group row">
  <?= form_label('Select Room', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
  <div class="col-sm-5">
  <?= form_dropdown('a', getDropdownList('it_rooms', ['id_room', 'room_name']), $ar['id_room'], array('class' => 'selectone custom-select mr-sm-2','required'=>'required')) ?>
  </div>
  </div>

<!-- MONTH NAME -->
  <div class="form-group row">
  <?= form_label('Month Name', 'b', ['class' => 'col-sm-2 col-form-label']) ?>
  <div class="col-sm-8">
    <!-- <?= form_multiselect('b[]', getDropdownList('it_month', ['month_name', 'month_name']), unserialize($ar['month_name']), array('class' => 'selectone form-control', 'required' => 'required')) ?> -->
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
