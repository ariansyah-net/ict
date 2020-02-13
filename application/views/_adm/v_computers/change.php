<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="tab-pc" data-toggle="tab" href="#hardware" role="tab" aria-controls="hardware" aria-selected="true">Hardware</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="topnav-tab" data-toggle="tab" href="#topnav" role="tab" aria-controls="topnav" aria-selected="false">Network & Config</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="help-tab" data-toggle="tab" href="#help" role="tab" aria-controls="help" aria-selected="false">Help</a>
  </li>
</ul>
<!-- =========================TAB 1=================================== -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="hardware" role="tabpanel" aria-labelledby="tab-pc">
<!-- IN TAB -->
    <div class="card shadow mb-4">
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-tv"></i> Add New Computer</h6>
      </a>
    <div class="collapse show" id="collapseCardExample">
    <div class="card-body">



<?= form_open('dashboard/change_computers') ?>
<input type='hidden' name='id' value='<?= $ar['id_computers'] ?>'>

<!-- USER NAME -->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Computer User :', 'a') ?>
       <?= form_dropdown('a', getDropdownList('it_users', ['id_users', 'first_name']), $ar['id_users'], array('class' => 'custom-select mr-sm-2', 'required' => 'required')) ?>
         </div>
<!-- COMPUTER NAME -->
 <div class="form-group col-md-4">
   <?= form_label('PC Name :', 'pcname') ?>
     <?= form_input('pcname', $ar['pcname'], ['class' => 'form-control']) ?>
       </div>
<!-- COMPUTER CASING -->
 <div class="form-group col-md-4">
  <?= form_label('Computer Casing :', 'b') ?>
    <?= form_input('b', $ar['casing'], ['class' => 'form-control']) ?>
      </div>
        </div>

<!-- MONITOR -->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Monitor :', 'c') ?>
        <?= form_input('c', $ar['monitor'], ['class' => 'form-control']) ?>
         </div>
     <!-- KEYBOARD -->
       <div class="form-group col-md-4">
        <?= form_label('Keyboard :', 'd') ?>
          <?= form_input('d', $ar['keyboard'], ['class' => 'form-control']) ?>
            </div>
          <!-- MOUSE -->
           <div class="form-group col-md-4">
             <?= form_label('Mouse :', 'e') ?>
              <?= form_input('e', $ar['mouse'], ['class' => 'form-control']) ?>
                </div>
                  </div>

<!-- MAINBOARD -->
<div class="form-row">
   <div class="form-group col-md-4">
     <?= form_label('Mainboard :', 'f') ?>
        <?= form_input('f', $ar['mainboard'], ['class' => 'form-control']) ?>
         </div>
     <!-- PROCESSOR -->
       <div class="form-group col-md-4">
        <?= form_label('Processor :', 'g') ?>
          <?= form_input('g', $ar['processor'], ['class' => 'form-control']) ?>
            </div>
          <!-- HARDDRIVE -->
           <div class="form-group col-md-4">
             <?= form_label('Hard Drive :', 'h') ?>
              <?= form_input('h', $ar['harddrive'], ['class' => 'form-control']) ?>
                </div>
                  </div>

<!-- RAM -->
  <div class="form-row">
     <div class="form-group col-md-4">
       <?= form_label('R A M :', 'i') ?>
          <?= form_input('i', $ar['ram'], ['class' => 'form-control']) ?>
           </div>
       <!-- VGA -->
         <div class="form-group col-md-4">
          <?= form_label('VGA :', 'j') ?>
            <?= form_input('j', $ar['vga'], ['class' => 'form-control']) ?>
              </div>
            <!-- CD-ROOM -->
             <div class="form-group col-md-4">
               <?= form_label('CD-Room :', 'k') ?>
                <?= form_input('k', $ar['cdroom'], ['class' => 'form-control']) ?>
                  </div>
                    </div>

<!-- LANCARD -->
  <div class="form-row">
     <div class="form-group col-md-4">
       <?= form_label('LAN Card :', 'l') ?>
          <?= form_input('l', $ar['lancard'], ['class' => 'form-control']) ?>
           </div>
       <!-- FAN -->
         <div class="form-group col-md-4">
          <?= form_label('FAN :', 'm') ?>
            <?= form_input('m', $ar['fan'], ['class' => 'form-control']) ?>
              </div>
            <!-- POWER SUPPLY -->
             <div class="form-group col-md-4">
               <?= form_label('Power Supply :', 'n') ?>
                <?= form_input('n', $ar['powersupply'], ['class' => 'form-control']) ?>
                  </div>
                    </div>

<!--
PRINTER
<div class="form-row">
 <div class="form-group col-md-4">
   <?= form_label('Printer :', 'o') ?>
    <?= form_input('o', $ar['printer'], ['class' => 'form-control']) ?>
      </div>
      SCANNER
         <div class="form-group col-md-4">
          <?= form_label('Scanner :', 'p') ?>
            <?= form_input('p', $ar['scanner'], ['class' => 'form-control']) ?>
              </div>
            UPS
              <div class="form-group col-md-4">
               <?= form_label('U P S :', 'ups') ?>
                 <?= form_input('ups', '', ['class' => 'form-control']) ?>
                   </div>
                     </div>
                      -->

    </div><!--end card-body-->
  </div><!--end collapse-->
</div><!--end shadow-->

</div><!--end tab hardware-->


<!-- ==========================TAB 2====================================== -->

<div class="tab-pane fade" id="topnav" role="tabpanel" aria-labelledby="topnav-tab">

  <div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-cog"></i> Config Sofware & Network</h6>
    </a>
  <div class="collapse show" id="collapseCardExample">
  <div class="card-body">


<!-- IP ADDRESS -->
  <div class="form-row">
     <div class="form-group col-md-4">
       <?= form_label('IP Address :', 'q') ?>
          <?= form_input('q', $ar['ipaddress'], ['class' => 'form-control']) ?>
           </div>
       <!-- NETMASK -->
         <div class="form-group col-md-4">
          <?= form_label('Netmask :', 'r') ?>
            <?= form_input('r', $ar['netmask'], ['class' => 'form-control']) ?>
              </div>
            <!-- GATEWAY -->
              <div class="form-group col-md-4">
               <?= form_label('Gateway :', 's') ?>
                 <?= form_input('s', $ar['gateway'], ['class' => 'form-control']) ?>
                   </div>
                    </div>

<!-- DNS SERVER -->
  <div class="form-row">
     <div class="form-group col-md-4">
       <?= form_label('DNS Server :', 't') ?>
          <?= form_input('t', $ar['dnsserver'], ['class' => 'form-control']) ?>
           </div>
       <!-- MAC ADDRESS -->
         <div class="form-group col-md-4">
          <?= form_label('MAC Address :', 'u') ?>
            <?= form_input('u', $ar['macaddress'], ['class' => 'form-control']) ?>
              </div>
            <!-- PLATFORM -->
              <div class="form-group col-md-4">
                <?= form_label('Platform :', 'v') ?>
                   <select class="custom-select mr-sm-2" name="v">
                    <option><?=$ar['platform']?></option>
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
         <?= form_label('OS Name :', 'w') ?>
           <?= form_input('w', $ar['osname'], ['class' => 'form-control']) ?>
             </div>
           <!-- SOFTWARE -->
             <div class="form-group col-md-4">
              <?= form_label('Software :', 'x') ?>
                <?= form_input('x', $ar['software'], ['class' => 'form-control']) ?>
                  </div>
                <!-- ACQUISITION  -->
                  <div class="form-group col-md-4">
                    <?= form_label('Acquisition :', 'y') ?>
                       <?= form_input('y', $ar['acquisition'], ['class' => 'form-control']) ?>
                        </div>
                          </div>


 <div class="form-row">

      <!-- CODEFICATIONS -->
        <div class="form-group col-md-4">
         <?= form_label('Codefications :', 'z') ?>
           <?= form_input('z', $ar['codefication'], ['class' => 'form-control']) ?>
             </div>
           <!-- COMPUTER TYPE -->
             <div class="form-group col-md-4">
              <?= form_label('Computer Type :', 'ct') ?>
                <select class="custom-select mr-sm-2" name="ct">
                 <option><?=$ar['computer_type']?></option>
                 <option value="Personal">Personal</option>
                 <option value="Public">Public</option>
                 <option value="Absence">Absence</option>
                 <option value="Laboratorium">Laboratorium</option>
                 <option value="Server">Server</option>

               </select>
                  </div>
                <!-- ACTIVE STATUS-->
                <div class="form-group col-md-4">
                    <?= form_label('Status', 'act') ?>
                     <div class="col-sm-10">
                     <div class="custom-control custom-radio custom-control-inline">
                     <?= form_radio(['class'=>'custom-control-input','name'=>'act','id'=>'Y'], 'Y', isset($ar['pc_active']) && ($ar['pc_active'] == 'Y') ? true : false) ?>
                     <?= form_label('Active', 'Y', ['class' => 'custom-control-label']) ?>
                     </div>
                     <div class="custom-control custom-radio custom-control-inline">
                     <?= form_radio(['class'=>'custom-control-input','name'=>'act','id'=>'N'], 'N', isset($ar['pc_active']) && ($ar['pc_active'] == 'N') ? true : false) ?>
                     <?= form_label('Non Active', 'N', ['class' => 'custom-control-label']) ?>
                   </div>
                  </div>
                 </div>

               </div>

<!-- DESCRIPTIONS -->
<div class="form-row">
      <div class="form-group col-md-8">
       <?= form_label('Descriptions :', 'desc') ?>
          <textarea class="form-control" rows="2" name="desc"><?= $ar['description'] ?></textarea>
           </div>
         </div>

</div><!--end card-body-->
</div><!--end shadow-->
</div><!--end tab network-->

</div><!--end tab topnav-->

<!-- ===========================TAB 3==================================== -->
<div class="tab-pane fade" id="help" role="tabpanel" aria-labelledby="help-tab">

<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-terminal"></i> App Info</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">

  <div class="card text-white bg-dark">
    <div class="card-body">
      <h6 class="card-title"><strong>New Release A1 </strong></h6>
      <p class="card-text">You can see documentation on button link bellow..</p>
      <a target="_blank" href="https://ariansyah.net/it-operations" class="btn btn-info"><i class="fas fa-book"></i> View Docs</a>
    </div>
  </div>


</div><!--end card-body-->
</div><!--end collapse-->
</div><!--end shadow-->

</div><!--end tab help-->

</div>



<!-- ====================ACTION========================== -->

<div class="card mb-4">

<!--BUTTON-->
    <div class="form-group row">
    <?= form_label('', '', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-12 text-center">
    <button type='submit' name='submit' class='btn btn-primary'>
    <i class='fas fa-save'></i> Save Data</button>
    </div>
    </div>

</div>
<?= form_close() ?>
