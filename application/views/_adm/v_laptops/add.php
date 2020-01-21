<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tv"></i> Add Laptop</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">

<?= form_open('dashboard/add_laptops') ?>
<!-- DEVISION/FIELDWORK -->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Select Devision :', 'a') ?>
       <?= form_dropdown('a', getDropdownList('it_fieldwork', ['id_fieldwork','fieldwork_name']),'', array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
         </div>
     <!-- BRAND -->
       <div class="form-group col-md-4">
        <?= form_label('Brand :', 'b') ?>
          <?= form_input('b', '', ['class' => 'form-control']) ?>
            </div>
          <!-- TYPE -->
           <div class="form-group col-md-4">
             <?= form_label('Type :', 'c') ?>
              <?= form_input('c', '', ['class' => 'form-control']) ?>
                </div>
                  </div>
<div class="form-row">
  <!-- COLOR -->
   <div class="form-group col-md-4">
     <?= form_label('Color :', 'd') ?>
      <?= form_input('d', '', ['class' => 'form-control']) ?>
        </div>
        <!-- SERIAL NUMBER -->
         <div class="form-group col-md-4">
           <?= form_label('Serial Number :', 'e') ?>
            <?= form_input('e', '', ['class' => 'form-control']) ?>
              </div>
          <!-- PLATFORM -->
            <div class="form-group col-md-4">
              <?= form_label('Platform :', 'f') ?>
                 <select class="custom-select mr-sm-2" name="f">
                    <option value="">- Options -</option>
                      <option value="Linux">Linux</option>
                        <option value="Windows">Windows</option>
                          <option value="Macos">Mac OS</option>
                            <option value="Other">Other</option>
                              </select>
                                </div>
                                  </div>
<div class="form-row">
  <!-- OS NAME -->
       <div class="form-group col-md-4">
        <?= form_label('OS Name :', 'g') ?>
          <?= form_input('g', '', ['class' => 'form-control']) ?>
            </div>
      <!-- CPU -->
           <div class="form-group col-md-4">
             <?= form_label('CPU Processor :', 'h') ?>
              <?= form_input('h', '', ['class' => 'form-control']) ?>
                </div>
  <!-- MEMORY -->
   <div class="form-group col-md-4">
     <?= form_label('Memory :', 'i') ?>
       <?= form_input('i', '', ['class' => 'form-control']) ?>
          </div>
             </div>
<div class="form-row">
  <!-- H D D -->
    <div class="form-group col-md-4">
     <?= form_label('Hard Drive :', 'j') ?>
       <?= form_input('j', '', ['class' => 'form-control']) ?>
         </div>
       <!-- VGA -->
        <div class="form-group col-md-4">
          <?= form_label('VGA :', 'k') ?>
           <?= form_input('k', '', ['class' => 'form-control']) ?>
             </div>
  <!-- ACQUISITION -->
   <div class="form-group col-md-4">
     <?= form_label('Acquisition :', 'l') ?>
       <?= form_input('l', '', ['class' => 'form-control']) ?>
          </div>
            </div>
<div class="form-row">
  <!-- COMPLETENESS -->
   <div class="form-group col-md-4">
     <?= form_label('Completeness :', 'm') ?>
       <textarea class="form-control" rows="2" name="m"></textarea>
         </div>
  <!-- CODEFICATIONS-->
    <div class="form-group col-md-4">
     <?= form_label('Codefication:', 'n') ?>
       <?= form_input('n', '', ['class' => 'form-control']) ?>
         </div>

         <!-- ACTIVE -->
             <div class="form-group col-md-4">
               <?= form_label('Status', 'o') ?>
                <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="Y" id="Y" name="o" class="custom-control-input">
                <?= form_label('Active', 'Y', ['class' => 'custom-control-label']) ?>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" value="N" id="N" name="o" class="custom-control-input">
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
