<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-server"></i> Add Devices</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">

<?= form_open('dashboard/add_devices') ?>
<!--CATEGORY-->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Device Category', 'a') ?>
       <?= form_dropdown('a', getDropdownList('it_asset_category', ['id_asset_category','asset_category_name']),'', array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
         </div>
     <!-- NAME -->
       <div class="form-group col-md-4">
        <?= form_label('Name', 'b') ?>
          <?= form_input('b', '', ['class' => 'form-control']) ?>
            </div>
          <!-- BRAND -->
           <div class="form-group col-md-4">
             <?= form_label('Brand', 'c') ?>
              <?= form_input('c', '', ['class' => 'form-control']) ?>
                </div>
                  </div>
<div class="form-row">
  <!-- TYPE -->
   <div class="form-group col-md-4">
     <?= form_label('Type / Model', 'd') ?>
      <?= form_input('d', '', ['class' => 'form-control']) ?>
        </div>
        <!-- SERIAL NUMBER -->
         <div class="form-group col-md-4">
           <?= form_label('Serial Number', 'e') ?>
            <?= form_input('e', '', ['class' => 'form-control']) ?>
              </div>
          <!-- CODEFICATION -->
             <div class="form-group col-md-4">
                <?= form_label('Codefication', 'f') ?>
                  <?= form_input('f', '', ['class' => 'form-control']) ?>
                    </div>
                      </div>

<div class="form-row">
  <!-- ACQUISITION -->
       <div class="form-group col-md-4">
        <?= form_label('Acquisition', 'g') ?>
          <?= form_input('g', '', ['class' => 'form-control']) ?>
            </div>
      <!-- ROOM LOCATION -->
           <div class="form-group col-md-4">
             <?= form_label('Room / Location', 'h') ?>
             <?= form_dropdown('h', getDropdownList('it_rooms', ['id_room','room_name']),'', array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
                </div>

         <!-- ACTIVE STATUS -->
             <div class="form-group col-md-4">
               <?= form_label('Status', 'i') ?>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="Y" id="Y" name="i" class="custom-control-input">
                <?= form_label('Active', 'Y', ['class' => 'custom-control-label']) ?>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="N" id="N" name="i" class="custom-control-input">
                <?= form_label('Non Active', 'N', ['class' => 'custom-control-label']) ?>
                </div>
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
              <?= form_close() ?>
                </div>
                    </div>
