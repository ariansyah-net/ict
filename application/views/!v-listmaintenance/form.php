<div class="container">
  <div class="form-maintenance1">
    <?= form_open($form_action) ?>
      <?= isset($input->l_id_list) ? form_hidden('l_id_list', $input->l_id_list) : '' ?>
        <?= isset($input->id_users) ? form_input(['type' => 'hidden', 'name' => 'id_users', 'id' => 'id-lmuac', 'value' => $input->id_users]) : '' ?>
          <?= form_hidden('author', $this->session->userdata('nama_admin'), $input->author) ?>
            <!-- <?= isset($input->id_room) ? form_input(['type' => 'hidden', 'name' => 'id_room', 'id' => 'id-lmuac', 'value' => $input->id_users]) : '' ?> -->

<!--Select User-->
<!-- <div class="row">
  <?= form_label('Select User :', 'id_users', ['class' => 'col-3']) ?>
    <div class="col-9">
      <input type="text" name="search_lmuac" value="<?= $input->nama_user ?>" id="search_lmuac" onkeyup="lmuac()" placeholder="write something..", required="required">
        <input type="checkbox" onclick="javascript:checkUser();" id="pcname"> Add
          <ul id="lmuac_list" class="live-search-list"></ul>
            </div>
              <span id="font-error"><?= form_error('id_users') ?></span>
                </div> -->

        <div class="row">
          <?= form_label('Select User :', 'id_users', ['class' => 'col-3']) ?>
            <div class="col-9">
              <?= form_dropdown('id_users', getDropdownList('users', ['id_users', 'nama_user']), $input->nama_user, ['class' => 'ariansyah',  'style' => 'width:100%;', 'required' => 'required']) ?>
                </div>
                  <span id="font-error"><?= form_error('id_users') ?></span>
                    </div>


<!--PC Name-->
  <div class="row" style="display:none" id="showpcname">
    <?= form_label('PC Name :', 'l_pcname', ['class' => 'col-3 label']) ?>
      <input type="text" class="col-8" name="l_pcname" value="<?= $input->l_pcname ?>" placeholder="computer name..">
        <span id="font-error"><?= form_error('l_pcname');?></span>
          </div>
<!--Select Month-->
              <div class="row">
                <?= form_label('Select Month :', 'l_month', ['class' => 'col-3']) ?>
                  <?= form_dropdown('l_month', getDropdownList('month', ['month_name', 'month_name']), $input->l_month, ['class' => 'col-9', 'required' => 'required']) ?>
                    <span id="font-error"><?= form_error('l_month') ?></span>
                      </div>
<!--Select Year-->
<div class="row">
  <?= form_label('Period :', 'l_year', ['class' => 'col-3']) ?>
    <?= form_dropdown('l_year', getDropdownList('years', ['year_name', 'year_name']), $input->l_year, ['class' => 'col-3', 'required' => 'required']) ?>
      <span id="font-error"><?= form_error('l_year') ?></span>
        <?= anchor("years", '&nbsp;<i class="fa fa-calendar"></i>', ['class' => 'add']) ?>
          </div>
<!--Select Year-->
            <div class="row">
              <?= form_label('Note :', 'note', ['class' => 'col-3']) ?>
                <?= form_textarea(array('name' => 'note', 'rows' => 3, 'class' => 'col-9'), $input->note) ?>
                  <span id="font-error"><?= form_error('note') ?></span>
                    </div>
<div class="row">
<?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp; Save &nbsp;', 'class' => 'btn btn-primary']) ?>
</div>


</div><!--end form1-->

<!-- ************************************************************************* -->
<div class="form-maintenance2">

<!--casing-->
    <div class="row">
      <?= form_label('<strong>1. CPU Casing :</strong>', 'l_casing', ['class' => 'col-4']) ?>
      <label class="radiostyle">Good
      <?= form_radio('l_casing', 'Good', isset($input->l_casing) && ($input->l_casing == 'Good') ? true : false) ?>
      <span class="checkmark"></span></label>

      <label class="radiostyle">Broken
      <?= form_radio('l_casing', 'Problem', isset($input->l_casing) && ($input->l_casing == 'Problem') ? true : false) ?>
      <span class="checkmark"></span></label>
      <span id="font-error"><?= form_error('l_casing') ?></span>
    </div>

<!--Monitor-->
  <div class="row">
    <?= form_label('<strong> 2. Monitor :</strong>', 'l_monitor', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_monitor', 'Good', isset($input->l_monitor) && ($input->l_monitor == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_monitor', 'Problem', isset($input->l_monitor) && ($input->l_monitor == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_monitor') ?></span>
  </div>

<!--Keyboard-->
    <div class="row">
      <?= form_label('<strong>3. Keyboard :</strong>', 'l_keyboard', ['class' => 'col-4']) ?>
      <label class="radiostyle">Good
      <?= form_radio('l_keyboard', 'Good', isset($input->l_keyboard) && ($input->l_keyboard == 'Good') ? true : false) ?>
      <span class="checkmark"></span></label>

      <label class="radiostyle">Broken
      <?= form_radio('l_keyboard', 'Problem', isset($input->l_keyboard) && ($input->l_keyboard == 'Problem') ? true : false) ?>
      <span class="checkmark"></span></label>
      <span id="font-error"><?= form_error('l_keyboard') ?></span>
    </div>

<!--Mouse-->
  <div class="row">
      <?= form_label('<strong>4. Mouse :</strong>', 'l_mouse', ['class' => 'col-4']) ?>
      <label class="radiostyle">Good
      <?= form_radio('l_mouse', 'Good', isset($input->l_mouse) && ($input->l_mouse == 'Good') ? true : false) ?>
      <span class="checkmark"></span></label>

      <label class="radiostyle">Broken
      <?= form_radio('l_mouse', 'Problem', isset($input->l_mouse) && ($input->l_mouse == 'Problem') ? true : false) ?>
      <span class="checkmark"></span></label>
      <span id="font-error"><?= form_error('l_mouse') ?></span>
  </div>

<!--Mainboard-->
  <div class="row">
    <?= form_label('<strong>5. Mainboard :</strong>', 'l_mainboard', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_mainboard', 'Good', isset($input->l_mainboard) && ($input->l_mainboard == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_mainboard', 'Problem', isset($input->l_mainboard) && ($input->l_mainboard == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_mainboard') ?></span>
  </div>

<!--Processor-->
  <div class="row">
    <?= form_label('<strong> 6. Processor :</strong>', 'l_processor', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_processor', 'Good', isset($input->l_processor) && ($input->l_processor == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_processor', 'Problem', isset($input->l_processor) && ($input->l_processor == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_processor') ?></span>
  </div>

<!--Hard Drive-->
  <div class="row">
    <?= form_label('<strong>7. HardDrive :</strong>', 'l_harddrive', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_harddrive', 'Good', isset($input->l_harddrive) && ($input->l_harddrive == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_harddrive', 'Problem', isset($input->l_harddrive) && ($input->l_harddrive == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_harddrive') ?></span>
  </div>

<!--RAM-->
  <div class="row">
    <?= form_label('<strong>8. RAM :</strong>', 'l_ram', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_ram', 'Good', isset($input->l_ram) && ($input->l_ram == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_ram', 'Problem', isset($input->l_ram) && ($input->l_ram == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_ram') ?></span>
  </div>

<!--VGA-->
  <div class="row">
    <?= form_label('<strong>9. VGA :</strong>', 'l_vga', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_vga', 'Good', isset($input->l_vga) && ($input->l_vga == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_vga', 'Problem', isset($input->l_vga) && ($input->l_vga == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_vga') ?></span>
  </div>
</div><!--end form-maintenance2-->

<!-- ************************************************************************* -->

<div class="form-maintenance3">

<!--CD Room-->
    <div class="row">
      <?= form_label('<strong>10. CD-Room :</strong>', 'l_cdroom', ['class' => 'col-4']) ?>
      <label class="radiostyle">Good
      <?= form_radio('l_cdroom', 'Good', isset($input->l_cdroom) && ($input->l_cdroom == 'Good') ? true : false) ?>
      <span class="checkmark"></span></label>

      <label class="radiostyle">Broken
      <?= form_radio('l_cdroom', 'Problem', isset($input->l_cdroom) && ($input->l_cdroom == 'Problem') ? true : false) ?>
      <span class="checkmark"></span></label>
      <span id="font-error"><?= form_error('l_cdroom') ?></span>
    </div>

<!--LAN CARD-->
  <div class="row">
    <?= form_label('<strong>11. LanCard :</strong>', 'l_lancard', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_lancard', 'Good', isset($input->l_lancard) && ($input->l_lancard == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_lancard', 'Problem', isset($input->l_lancard) && ($input->l_lancard == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_lancard') ?></span>
  </div>

<!--PAN-->
  <div class="row">
    <?= form_label('<strong>12. PAN :</strong>', 'l_pan', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_pan', 'Good', isset($input->l_pan) && ($input->l_pan == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_pan', 'Problem', isset($input->l_pan) && ($input->l_pan == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_pan') ?></span>
  </div>

<!--POWER SUPPLY-->
  <div class="row">
    <?= form_label('<strong>13. Power Supply :</strong>', 'l_powersupply', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_powersupply', 'Good', isset($input->l_powersupply) && ($input->l_powersupply == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_powersupply', 'Problem', isset($input->l_powersupply) && ($input->l_powersupply == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_powersupply') ?></span>
  </div>

<!--Printer-->
  <div class="row">
    <?= form_label('<strong>14. Printer :</strong>', 'l_printer', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_printer', 'Good', isset($input->l_printer) && ($input->l_printer == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_printer', 'Problem', isset($input->l_printer) && ($input->l_printer == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_printer') ?></span>
  </div>

<!--Scanner-->
  <div class="row">
    <?= form_label('<strong>15. Scanner :</strong>', 'l_scanner', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_scanner', 'Good', isset($input->l_scanner) && ($input->l_scanner == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_scanner', 'Problem', isset($input->l_scanner) && ($input->l_scanner == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_scanner') ?></span>
  </div>

<!--Software-->
  <div class="row">
    <?= form_label('<strong>16. Software :</strong>', 'l_software', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_software', 'Good', isset($input->l_software) && ($input->l_software == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_software', 'Problem', isset($input->l_software) && ($input->l_software == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_software') ?></span>
  </div>

<!--Os-->
  <div class="row">
    <?= form_label('<strong>17. OS :</strong>', 'l_os', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('l_os', 'Good', isset($input->l_os) && ($input->l_os == 'Good') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Broken
    <?= form_radio('l_os', 'Problem', isset($input->l_os) && ($input->l_os == 'Problem') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('l_os') ?></span>
  </div>

<!--Status-->
  <div class="row">
    <?= form_label('<strong>18. Status :</strong>', 'status', ['class' => 'col-4']) ?>
    <label class="radiostyle">Good
    <?= form_radio('status', 'Ok', isset($input->status) && ($input->status == 'Ok') ? true : false) ?>
    <span class="checkmark"></span></label>

    <label class="radiostyle">Maintenance
    <?= form_radio('status', 'Maintenance', isset($input->status) && ($input->status == 'Maintenance') ? true : false) ?>
    <span class="checkmark"></span></label>
    <span id="font-error"><?= form_error('status') ?></span>
  </div>

</div><!--end form-maintenance3-->
</div><!--end container-->




<script>
	function checkUser() {
		if(document.getElementById('pcname').checked){
			document.getElementById('showpcname').style.display = 'inline';
			// document.getElementById('otherUser').style.display = 'none';
		}else {
		 document.getElementById('showpcname').style.display = 'none';
		}
	}
</script>
