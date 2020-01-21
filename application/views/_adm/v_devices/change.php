<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-server"></i> Change Devices</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">

<?= form_open('dashboard/change_devices') ?>
<input type='hidden' name='id' value='<?= $ar['id_device'] ?>'>

<!--CATEGORY-->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Device Category', 'a') ?>
       <?= form_dropdown('a', getDropdownList('it_asset_category', ['id_asset_category','asset_category_name']),$ar['id_asset_category'], array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
         </div>
     <!-- NAME -->
       <div class="form-group col-md-4">
        <?= form_label('Name', 'b') ?>
          <?= form_input('b', $ar['d_name'], ['class' => 'form-control']) ?>
            </div>
          <!-- BRAND -->
           <div class="form-group col-md-4">
             <?= form_label('Brand', 'c') ?>
              <?= form_input('c', $ar['d_brand'], ['class' => 'form-control']) ?>
                </div>
                  </div>
<div class="form-row">
  <!-- TYPE -->
   <div class="form-group col-md-4">
     <?= form_label('Type / Model', 'd') ?>
      <?= form_input('d', $ar['d_type'], ['class' => 'form-control']) ?>
        </div>
        <!-- SERIAL NUMBER -->
         <div class="form-group col-md-4">
           <?= form_label('Serial Number', 'e') ?>
            <?= form_input('e', $ar['d_serialnumber'], ['class' => 'form-control']) ?>
              </div>
          <!-- CODEFICATION -->
             <div class="form-group col-md-4">
                <?= form_label('Codefication', 'f') ?>
                  <?= form_input('f', $ar['d_codefication'], ['class' => 'form-control']) ?>
                    </div>
                      </div>

<div class="form-row">
  <!-- ACQUISITION -->
       <div class="form-group col-md-4">
        <?= form_label('Acquisition', 'g') ?>
          <?= form_input('g', $ar['d_acquisition'], ['class' => 'form-control']) ?>
            </div>
      <!-- ROOM LOCATION -->
           <div class="form-group col-md-4">
             <?= form_label('Room / Location', 'h') ?>
             <?= form_dropdown('h', getDropdownList('it_rooms', ['id_room','room_name']),$ar['id_room'], array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
                </div>

         <!-- ACTIVE STATUS -->
             <div class="form-group col-md-4">
               <?= form_label('Status', 'i') ?>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                <!-- <input type="radio" value="Y" id="Y" name="i" class="custom-control-input"> -->
                <?= form_radio(['class'=>'custom-control-input', 'name'=>'i', 'id'=>'Y'], 'Y', isset($ar['d_active']) && ($ar['d_active'] == 'Y') ? true : false) ?>
                <?= form_label('Active', 'Y', ['class' => 'custom-control-label']) ?>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <!-- <input type="radio" value="N" id="N" name="i" class="custom-control-input"> -->
                <?= form_radio(['class'=>'custom-control-input', 'name'=>'i', 'id'=>'N'], 'N', isset($ar['d_active']) && ($ar['d_active'] == 'N') ? true : false) ?>
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
        <button type='submit' name='submit' class='btn btn-primary'><i class='fa fa-save'></i> Update Data</button>
          </div>
            </div>
              <?= form_close() ?>
                </div>
                    </div>
