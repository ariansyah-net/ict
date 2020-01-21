<div class="card shadow mb-4">
<a href="#collapseCard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-cog"></i> Add User Problem</h6>
</a>
<div class="collapse show" id="collapseCard">
<div class="card-body">

<?= form_open('dashboard/add_problem') ?>

<!-- DATE -->
<div class="form-group row">
<?= form_label('Date', 'a', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-3">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="ar"><i class="fas fa-calendar-alt"></i></span>
</div>
<input type="text" name="a" class="form-control datepicker1" aria-describedby="ar">
</div>
</div>
</div>

<!-- SELECT USERS -->
<div class="form-group row">
<?= form_label('Select Users', 'b', ['class' => 'col-sm-2 col-form-label combostyle']) ?>
<div class="col-sm-5">
<?= form_dropdown('b', getDropdownList('it_users', ['id_users', 'first_name']), '', array('class' => 'custom-select mr-sm-2')) ?>
</div>
</div>

<!-- OTHER USERS -->
<div class="form-group row">
<?= form_label('Specific Users', 'email', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-5">
<?= form_input('c', '', ['class' => 'form-control']) ?>
</div>
</div>
<!-- PROBLEM -->
<div class="form-group row">
<?= form_label('Problem', 'd', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-5">
<textarea class="form-control" rows="2" name="d"></textarea>
</div>
</div>
<!-- FOLLOW UP -->
<div class="form-group row">
<?= form_label('Follow Up', 'e', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-5">
<textarea class="form-control" rows="2" name="e"></textarea>
</div>
</div>

<!-- RESULT STATUS -->
    <div class="form-group row">
    <?= form_label('Result', 'f', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['id'=>'success', 'onclick'=>'checkSuccess()', 'value'=>'success', 'class'=>'custom-control-input', 'name'=>'f']) ?>
    <!-- <input type="radio" value="success" id="success" name="f" class="custom-control-input" required> -->
    <?= form_label('Success', 'success', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['id'=>'repaired', 'onclick'=>'checkRepaired()', 'value'=>'repaired', 'class'=>'custom-control-input', 'name'=>'f']) ?>
    <!-- <input type="radio" value="repaired" id="repaired" name="f" class="custom-control-input" required> -->
    <?= form_label('Repaired', 'repaired', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- RESULT DATE -->
<div class="form-group row" id="resultDate">
<?= form_label('Result Date', 'g', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-3">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="arians"><i class="fas fa-calendar-alt"></i></span>
</div>
<input type="text" name="g" class="form-control datepicker1" aria-describedby="arians">
</div>
</div>
</div>

<!-- INFORMARTION -->
<div id="note" style="display:none">
<div class="form-group row">
<?= form_label('Note', 'h', ['class' => 'col-sm-2 col-form-label']) ?>
<div class="col-sm-5">
<textarea class="form-control" rows="2" name="h"></textarea>
</div>
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

          <?= form_hidden('author', $this->session->userdata('nama_admin')) ?>
						<input type="hidden" name="period" value="<?php echo date('Y'); ?>">
              <?= form_close() ?>
                </div>
                    </div>


<script>
function checkSuccess() {
  if(document.getElementById('success').checked == true){
    document.getElementById('resultDate').style.display = 'normal';
    document.getElementById('note').style.display = 'none';
  }else{
     document.getElementById('resultDate').style.display = 'normal';
  }
}
function checkRepaired() {
  if(document.getElementById('repaired').checked == true){
    document.getElementById('note').style.display = 'inline';
    // document.getElementById('resultDate').style.display = 'none';
  }else if(document.getElementById('repaired').checked == false){
   // document.getElementById('resultDate').style.display = 'inline';
   document.getElementById('noted').style.display = 'inline';
 }else{

 }
}
</script>
