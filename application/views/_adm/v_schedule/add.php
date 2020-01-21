

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
  <!-- Card Header - Accordion -->
  <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-plus"></i> Add Rooms</h6>
  </a>
  <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample">
    <div class="card-body">


<?= form_open('dashboard/add_schedule') ?>


<!-- ROOMS NAME -->
  <div class="form-group row">
  <?= form_label('Select Room', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
  <div class="col-sm-5">
  <?= form_dropdown('a', getDropdownList('it_rooms', ['id_room', 'room_name']), '', array('class' => 'selectone custom-select mr-sm-2','required'=>'required')) ?>
  </div>
  </div>

<!-- MONTH NAME -->
  <div class="form-group row">
  <?= form_label('Month Name', 'b', ['class' => 'col-sm-2 col-form-label']) ?>
  <div class="col-sm-8">
  <select multiple="multiple" class="multiselect form-control" name="b[]">
     <option value="January">January</option>
     <option value="February">February</option>
     <option value="March">March</option>
     <option value="April">April</option>
     <option value="May">May</option>
     <option value="June">June</option>
     <option value="July">July</option>
     <option value="August">August</option>
     <option value="September">September</option>
     <option value="October">October</option>
     <option value="November">November</option>
     <option value="December">December</option>
   </select>

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
