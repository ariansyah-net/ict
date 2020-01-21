<div class="row">

<!--SELECTED ITEM-->
 <div class="col-xl-8 col-lg-7">
   <div class="card shadow mb-4">
     <!-- Card Header - Dropdown -->
     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
       <h6 class="m-0 font-weight-bold text-primary"><i class="far fa-edit"></i> Item Selected</h6>
       <div class="dropdown no-arrow">
         <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
         </a>
         <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
           <div class="dropdown-header">Settings</div>
           <a class="dropdown-item" href="#">View Detail Data</a>
         </div>
       </div>
     </div>
<!-- Card Body -->
<div class="card-body">
 <?= form_open('dashboard/change_listmaintenance') ?>
 <?= form_hidden('author', $this->session->userdata('nama_admin')) ?>
 <?= form_hidden('id', $ar['id_listmaintenance']) ?>

<div class="form-row">

<!-- CASING -->
    <div class="form-group col-md-4">
     <?= form_label('<strong><i class="far fa-check-square"></i> Casing</strong>', 'e') ?>
      <div class="col-sm-12">
      <div class="custom-control custom-radio custom-control-inline">
      <!-- <input type="radio" value="Good" id="egood" name="e" class="custom-control-input"> -->
      <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'egood'], 'Good', isset($ar['l_casing']) && ($ar['l_casing'] == 'Good') ? true : false) ?>
      <?= form_label('Good', 'egood', ['class' => 'custom-control-label']) ?>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <!-- <input type="radio" value="Problem" id="eproblem" name="e" class="custom-control-input"> -->
      <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'eproblem'], 'Problem', isset($ar['l_casing']) && ($ar['l_casing'] == 'Problem') ? true : false) ?>
      <?= form_label('Problem', 'eproblem', ['class' => 'custom-control-label']) ?>
      </div>
      </div>
    </div>
<!-- MONITOR -->
    <div class="form-group col-md-4">
      <?= form_label('<strong><i class="far fa-check-square"></i> Monitor</strong>', 'f') ?>
       <div class="col-sm-12">
       <div class="custom-control custom-radio custom-control-inline">
       <!-- <input type="radio" value="Good" id="fgood" name="f" class="custom-control-input"> -->
       <?= form_radio(['class'=>'custom-control-input', 'name'=>'f', 'id'=>'fgood'], 'Good', isset($ar['l_monitor']) && ($ar['l_monitor'] == 'Good') ? true : false) ?>
       <?= form_label('Good', 'fgood', ['class' => 'custom-control-label']) ?>
       </div>
       <div class="custom-control custom-radio custom-control-inline">
       <!-- <input type="radio" value="Problem" id="fproblem" name="f" class="custom-control-input"> -->
       <?= form_radio(['class'=>'custom-control-input', 'name'=>'f', 'id'=>'fproblem'], 'Problem', isset($ar['l_monitor']) && ($ar['l_monitor'] == 'Problem') ? true : false) ?>
       <?= form_label('Problem', 'fproblem', ['class' => 'custom-control-label']) ?>
       </div>
       </div>
     </div>
<!-- KEYBOARD -->
   <div class="form-group col-md-4">
     <?= form_label('<strong><i class="far fa-check-square"></i> Keyboard</strong>', 'g') ?>
      <div class="col-sm-12">
      <div class="custom-control custom-radio custom-control-inline">
      <!-- <input type="radio" value="Good" id="ggood" name="g" class="custom-control-input"> -->
      <?= form_radio(['class'=>'custom-control-input', 'name'=>'g', 'id'=>'ggood'], 'Good', isset($ar['l_keyboard']) && ($ar['l_keyboard'] == 'Good') ? true : false) ?>
      <?= form_label('Good', 'ggood', ['class' => 'custom-control-label']) ?>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
      <!-- <input type="radio" value="Problem" id="gproblem" name="g" class="custom-control-input"> -->
      <?= form_radio(['class'=>'custom-control-input', 'name'=>'g', 'id'=>'gproblem'], 'Problem', isset($ar['l_keyboard']) && ($ar['l_keyboard'] == 'Problem') ? true : false) ?>
      <?= form_label('Problem', 'gproblem', ['class' => 'custom-control-label']) ?>
      </div>
      </div>
    </div>
   </div><!--END ROW-->

<hr class="pt-1">
<!-- =========================================================================== -->
<div class="form-row">

   <!-- MOUSE -->
       <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Mouse</strong>', 'h') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="hgood" name="h" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'h', 'id'=>'hgood'], 'Good', isset($ar['l_mouse']) && ($ar['l_mouse'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'hgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="hproblem" name="h" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'h', 'id'=>'hproblem'], 'Problem', isset($ar['l_mouse']) && ($ar['l_mouse'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'hproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
   <!-- MAINBOARD -->
       <div class="form-group col-md-4">
         <?= form_label('<strong><i class="far fa-check-square"></i> Mainboard</strong>', 'i') ?>
          <div class="col-sm-12">
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Good" id="igood" name="i" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'i', 'id'=>'igood'], 'Good', isset($ar['l_mainboard']) && ($ar['l_mainboard'] == 'Good') ? true : false) ?>
          <?= form_label('Good', 'igood', ['class' => 'custom-control-label']) ?>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Problem" id="iproblem" name="i" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'i', 'id'=>'iproblem'], 'Problem', isset($ar['l_mainboard']) && ($ar['l_mainboard'] == 'Problem') ? true : false) ?>
          <?= form_label('Problem', 'iproblem', ['class' => 'custom-control-label']) ?>
          </div>
          </div>
        </div>
   <!-- PROCESSOR -->
      <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Processor</strong>', 'j') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="jgood" name="j" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'j', 'id'=>'jgood'], 'Good', isset($ar['l_processor']) && ($ar['l_processor'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'jgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="jproblem" name="j" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'j', 'id'=>'jproblem'], 'Problem', isset($ar['l_processor']) && ($ar['l_processor'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'jproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
      </div><!--END ROW-->

<hr class="pt-1">
<!-- =========================================================================== -->
<div class="form-row">

   <!-- HARDDRIVE -->
       <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Hard Drive</strong>', 'k') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="kgood" name="k" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'k', 'id'=>'kgood'], 'Good', isset($ar['l_harddrive']) && ($ar['l_harddrive'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'kgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="kproblem" name="k" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'k', 'id'=>'kproblem'], 'Problem', isset($ar['l_harddrive']) && ($ar['l_harddrive'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'kproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
   <!-- RAM -->
       <div class="form-group col-md-4">
         <?= form_label('<strong><i class="far fa-check-square"></i> R A M</strong>', 'l') ?>
          <div class="col-sm-12">
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Good" id="lgood" name="l" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'l', 'id'=>'lgood'], 'Good', isset($ar['l_ram']) && ($ar['l_ram'] == 'Good') ? true : false) ?>
          <?= form_label('Good', 'lgood', ['class' => 'custom-control-label']) ?>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Problem" id="lproblem" name="l" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'l', 'id'=>'lproblem'], 'Problem', isset($ar['l_ram']) && ($ar['l_ram'] == 'Problem') ? true : false) ?>
          <?= form_label('Problem', 'lproblem', ['class' => 'custom-control-label']) ?>
          </div>
          </div>
        </div>
   <!-- VGA -->
      <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> V G A </strong>', 'm') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="mgood" name="m" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'m', 'id'=>'mgood'], 'Good', isset($ar['l_vga']) && ($ar['l_vga'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'mgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="mproblem" name="m" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'m', 'id'=>'mproblem'], 'Problem', isset($ar['l_vga']) && ($ar['l_vga'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'mproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
      </div><!--END ROW-->

<hr class="pt-1">
<!-- =========================================================================== -->
<div class="form-row">

   <!-- CD ROOM -->
       <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> CD-Room</strong>', 'n') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="ngood" name="n" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'n', 'id'=>'ngood'], 'Good', isset($ar['l_cdroom']) && ($ar['l_cdroom'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'ngood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="nproblem" name="n" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'n', 'id'=>'nproblem'], 'Problem', isset($ar['l_cdroom']) && ($ar['l_cdroom'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'nproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
   <!-- LAN CARD -->
       <div class="form-group col-md-4">
         <?= form_label('<strong><i class="far fa-check-square"></i> LAN Card</strong>', 'o') ?>
          <div class="col-sm-12">
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Good" id="ogood" name="o" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'o', 'id'=>'ogood'], 'Good', isset($ar['l_lancard']) && ($ar['l_lancard'] == 'Good') ? true : false) ?>
          <?= form_label('Good', 'ogood', ['class' => 'custom-control-label']) ?>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Problem" id="oproblem" name="o" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'o', 'id'=>'oproblem'], 'Problem', isset($ar['l_lancard']) && ($ar['l_lancard'] == 'Problem') ? true : false) ?>
          <?= form_label('Problem', 'oproblem', ['class' => 'custom-control-label']) ?>
          </div>
          </div>
        </div>
   <!-- PAN -->
      <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> P A N </strong>', 'p') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="pgood" name="p" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'p', 'id'=>'pgood'], 'Good', isset($ar['l_pan']) && ($ar['l_pan'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'pgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="pproblem" name="p" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'p', 'id'=>'pproblem'], 'Problem', isset($ar['l_pan']) && ($ar['l_pan'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'pproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
      </div><!--END ROW-->


<hr class="pt-1">
<!-- =========================================================================== -->
<div class="form-row">

   <!-- POWER SUPPLY -->
       <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Power Supply</strong>', 'q') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="qgood" name="q" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'q', 'id'=>'qgood'], 'Good', isset($ar['l_powersupply']) && ($ar['l_powersupply'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'qgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="qproblem" name="q" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'q', 'id'=>'qproblem'], 'Problem', isset($ar['l_powersupply']) && ($ar['l_powersupply'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'qproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
   <!-- PRINTER -->
       <div class="form-group col-md-4">
         <?= form_label('<strong><i class="far fa-check-square"></i> Printer</strong>', 'r') ?>
          <div class="col-sm-12">
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Good" id="rgood" name="r" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'r', 'id'=>'rgood'], 'Good', isset($ar['l_printer']) && ($ar['l_printer'] == 'Good') ? true : false) ?>
          <?= form_label('Good', 'rgood', ['class' => 'custom-control-label']) ?>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Problem" id="rproblem" name="r" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'r', 'id'=>'rproblem'], 'Problem', isset($ar['l_printer']) && ($ar['l_printer'] == 'Problem') ? true : false) ?>
          <?= form_label('Problem', 'rproblem', ['class' => 'custom-control-label']) ?>
          </div>
          </div>
        </div>
   <!-- SCANNER -->
      <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Scanner </strong>', 's') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="sgood" name="s" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'s', 'id'=>'sgood'], 'Good', isset($ar['l_scanner']) && ($ar['l_scanner'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'sgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="sproblem" name="s" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'s', 'id'=>'sproblem'], 'Problem', isset($ar['l_scanner']) && ($ar['l_scanner'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'sproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
      </div><!--END ROW-->


<hr class="pt-1">
<!-- =========================================================================== -->
<div class="form-row">

   <!-- SOFTWARE -->
       <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Software</strong>', 't') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="tgood" name="t" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'t', 'id'=>'tgood'], 'Good', isset($ar['l_software']) && ($ar['l_software'] == 'Good') ? true : false) ?>
         <?= form_label('Good', 'tgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="tproblem" name="t" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'t', 'id'=>'tproblem'], 'Problem', isset($ar['l_software']) && ($ar['l_software'] == 'Problem') ? true : false) ?>
         <?= form_label('Problem', 'tproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
   <!-- O S -->
       <div class="form-group col-md-4">
         <?= form_label('<strong><i class="far fa-check-square"></i> O S</strong>', 'u') ?>
          <div class="col-sm-12">
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Good" id="ugood" name="u" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'u', 'id'=>'ugood'], 'Good', isset($ar['l_os']) && ($ar['l_os'] == 'Good') ? true : false) ?>
          <?= form_label('Good', 'ugood', ['class' => 'custom-control-label']) ?>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
          <!-- <input type="radio" value="Problem" id="uproblem" name="u" class="custom-control-input"> -->
          <?= form_radio(['class'=>'custom-control-input', 'name'=>'u', 'id'=>'uproblem'], 'Problem', isset($ar['l_os']) && ($ar['l_os'] == 'Problem') ? true : false) ?>
          <?= form_label('Problem', 'uproblem', ['class' => 'custom-control-label']) ?>
          </div>
          </div>
        </div>
   <!-- STATUS -->
      <div class="form-group col-md-4">
        <?= form_label('<strong><i class="far fa-check-square"></i> Status PC </strong>', 'v') ?>
         <div class="col-sm-12">
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Good" id="vgood" name="v" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'v', 'id'=>'vgood'], 'Ok', isset($ar['status']) && ($ar['status'] == 'Ok') ? true : false) ?>
         <?= form_label('Ok', 'vgood', ['class' => 'custom-control-label']) ?>
         </div>
         <div class="custom-control custom-radio custom-control-inline">
         <!-- <input type="radio" value="Problem" id="vproblem" name="v" class="custom-control-input"> -->
         <?= form_radio(['class'=>'custom-control-input', 'name'=>'v', 'id'=>'vproblem'], 'Maintenance', isset($ar['status']) && ($ar['status'] == 'Maintenance') ? true : false) ?>
         <?= form_label('Maintenance', 'vproblem', ['class' => 'custom-control-label']) ?>
         </div>
         </div>
       </div>
      </div><!--END ROW-->

   </div>
</div>
<!-- ================================= SAVING ==================================-->

      <div class="card shadow mb-4">
          <div class="form-group row">
          <?= form_label('', '', ['class' => 'col-sm-2 col-form-label']) ?>
          <div class="col-sm-12 text-center">
          <button type='submit' name='submit' class='btn btn-primary'>
          <i class='fas fa-save'></i> Save Data</button>
          </div>
          </div>
      </div>
   </div>


<!-- USER IDENTITIES -->

<div class="col-xl-4 col-lg-5">
<div class="card shadow mb-4">
 <!-- Card Header - Dropdown -->
 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-secret"></i> User Identity</h6>
   <div class="dropdown no-arrow">
     <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
     </a>
     <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
       <div class="dropdown-header">Settings</div>
       <a class="dropdown-item" href="#">View User</a>
       <a class="dropdown-item" href="#">View Computer</a>
     </div>
   </div>
 </div>
 <!-- Card Body -->
<div class="card-body">
  <?php if($ar['avatar'] == ''){
      echo '<img class="rounded mx-auto d-block mb-3 img-rounded" src="'.base_url().'arians/img/profile.png" style="height:150px" width="120px">';
    }else {
      echo '<img class="rounded-circle mx-auto d-block mb-3 " src="'.base_url().'arians/photos/'.$ar['avatar'].' " style="height:150px" width="120px">';
    }
  ?>

<!-- SELECT USERS -->
<div class="form-row">
 <div class="form-group col-md-12">
  <?= form_label('Select Users', 'a') ?>
   <?= form_dropdown('a', getDropdownList('it_users', ['id_users', 'first_name']),$ar['id_users'], array('class' => 'selectone form-control', 'required' => 'required')) ?>
     </div>
      </div>
<!--COMPUTER NAME -->
<div class="form-row">
 <div class="form-group col-md-12">
  <?= form_label('Computer Name', 'b') ?>
   <?= form_input('b', $ar['l_pcname'], ['class' => 'form-control']) ?>
    </div>
     </div>
<!-- SELECT MONTH -->
<div class="form-row">
 <div class="form-group col-md-12">
  <?= form_label('Month', 'c') ?>
   <?= form_dropdown('c', getDropdownList('it_month', ['id_month', 'month_name']),$ar['id_month'], array('class' => 'selectone form-control', 'required' => 'required')) ?>
    </div>
     </div>
 <!-- SELECT YEARS -->
<div class="form-row">
 <div class="form-group col-md-12">
  <?= form_label('Period', 'd') ?>
   <?= form_dropdown('d', getDropdownList('it_years', ['id_years', 'years_name']),$ar['id_years'], array('class' => 'selectone form-control', 'required' => 'required')) ?>
    </div>
     </div>


       </div>
     </div>
     <!-- NOTE -->
     <div class="card shadow mb-4">
       <div class="card-body">
       <?= form_label('Note', 'note') ?>
       <textarea class="form-control" rows="4" name="note"><?= $ar['note'] ?></textarea>

       <div class="mt-3 text-center small">
         <span class="mr-2">
           <i class="fas fa-circle text-primary"></i> write here, if there are problem items
         </span>
         </div>
     </div>
   </div>

 </div>
 </div>

 <?= form_close() ?>
