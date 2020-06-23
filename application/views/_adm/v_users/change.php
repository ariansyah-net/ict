<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="identities-tab" data-toggle="tab" href="#identities" role="tab" aria-controls="identities" aria-selected="true">User Identity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="topnav-tab" data-toggle="tab" href="#topnav" role="tab" aria-controls="topnav" aria-selected="false">Office</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="false">Account</a>
  </li>
</ul>
<!-- =========================TAB 1=================================== -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="identities" role="tabpanel" aria-labelledby="identities-tab">
<!-- IN TAB -->
    <div class="card shadow mb-4">
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Change User</h6>
      </a>
    <div class="collapse show" id="collapseCardExample">
    <div class="card-body">


<?= form_open_multipart('dashboard/change_users') ?>
<?= form_hidden('id', $rows['id_users'])?>

<!-- <input type='hidden' name='id' value='$rows[id_event]'> -->
<!-- FIRST NAME -->
    <div class="form-group row">
    <?= form_label('First Name', 'first_name', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('a', $rows['first_name'], ['class' => 'form-control', 'required' => 'required']) ?>
    </div>
    </div>
<!-- LAST NAME -->
    <div class="form-group row">
    <?= form_label('Last Name', 'last_name', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('b', $rows['last_name'], ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- EMAIL -->
    <div class="form-group row">
    <?= form_label('Email', 'email', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('c', $rows['email'], ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- PHONE -->
    <div class="form-group row">
    <?= form_label('Phone', 'phone', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('d', $rows['phone'], ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- GENDER -->
    <div class="form-group row">
    <?= form_label('Gender', 'level', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'M',  'required' => 'required'], 'M', isset($rows['gender']) && ($rows['gender'] == 'M') ? true : false) ?>
    <?= form_label('Male', 'M', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'e', 'id'=>'F', 'required' => 'required'], 'F', isset($rows['gender']) && ($rows['gender'] == 'F') ? true : false) ?>
    <?= form_label('Female', 'F', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- AVATAR -->
    <div class="form-group row">
    <?= form_label('Photo', 'page_img', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="f">
    <?= form_label('Choose file..', 'f', ['class' => 'custom-file-label', 'id' => 'customFile']) ?>
    <small class="form-text text-muted">Note: max 1 mb file to upload</small>
    </div>
    </div>
    </div>

    <div class="form-group row">
  		<?= form_label('&nbsp;', '', array('class' => 'col-sm-2 col-form-label')) ?>
        <div class="col-sm-7">
          <?php if(!$rows['avatar'] == "") {
            echo "<img src='".base_url()."arians/photos/$rows[avatar]' class='img-thumbnail' style='width:150px;'>";
            }else{
            echo "<img src='".base_url()."arians/photos/whois.png' class='img-thumbnail' style='width:150px;'> ";
            }
          ?>
				</div>
      </div>


    </div><!--end card-body-->
  </div><!--end collapse-->
</div><!--end shadow-->

</div><!--end tab identities-->


<!-- ==========================TAB 2====================================== -->

<div class="tab-pane fade" id="topnav" role="tabpanel" aria-labelledby="topnav-tab">

  <div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Workstation</h6>
    </a>
  <div class="collapse show" id="collapseCardExample">
  <div class="card-body">

<!-- POSITION -->
    <div class="form-group row">
    <?= form_label('Position', 'position', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('g', $rows['position'], ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- FIELDWORK -->
    <div class="form-group row">
    <?= form_label('Fieldwork :', 'fieldwork', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_dropdown('h', getDropdownList('it_fieldwork', ['id_fieldwork', 'fieldwork_name']), $rows['id_fieldwork'], array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- LOCATION -->
    <div class="form-group row">
    <?= form_label('Location', 'location', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_dropdown('i', getDropdownList('it_locations', ['id_locations', 'locations_name']), $rows['id_locations'], array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- ROOM -->
    <div class="form-group row">
    <?= form_label('Room', 'id_room', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_dropdown('j', getDropdownList('it_rooms', ['id_room', 'room_name']), $rows['id_room'], array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- ACTIVE -->
    <div class="form-group row">
    <?= form_label('Status', 'level', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'k', 'id'=>'1'], '1', isset($rows['is_active']) && ($rows['is_active'] == '1') ? true : false) ?>
    <?= form_label('Active', '1', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <?= form_radio(['class'=>'custom-control-input', 'name'=>'k', 'id'=>'0'], '0', isset($rows['is_active']) && ($rows['is_active'] == '0') ? true : false) ?>
    <?= form_label('Non Active', '0', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- INFO -->
    <div class="form-group row">
    <?= form_label('Info User', 'info', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <textarea class="form-control" rows="2" name="l"><?= $rows['info']?></textarea>
    </div>
    </div>

<!-- UNIQUE USER -->
    <div class="form-group row">
    <?= form_label('User Unique', 'unique_user', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <div class="custom-control custom-checkbox">
    <?= form_checkbox(['class'=>'custom-control-input', 'name'=>'m', 'id'=>'check'], 'Y', isset($rows['unique_user']) && ($rows['unique_user'] == 'Y') ? true : false) ?>
    <label class="custom-control-label text-danger" for="check">Set unique user</label>
    </div>
    </div>
    </div>

</div><!--end card-body-->
</div><!--end collapse-->
</div><!--end shadow-->


</div><!--end tab topnav-->




<!-- ===========================TAB 3==================================== -->
<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">


<div class="card shadow mb-4">
<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user"></i> User Account</h6>
</a>
<div class="collapse show" id="collapseCardExample">
<div class="card-body">

  <div class="card text-white bg-dark">
    <div class="card-body">
      <h6 class="card-title"><strong>Caution, this function is still in the development stage!</strong></h6>
      <p class="card-text text-warning">You can set this user to be able to log in to the application as an admin or as a user.</p>
      <!-- <a target="_blank" href="https://ariansyah.net/it-operations" class="btn btn-info"><i class="fas fa-book"></i> View Docs</a> -->
    <hr>


    <div class="form-group row">
    <?= form_label('Email', 'email', ['class' => 'col-sm-2 col-form-label', 'readonly'=>'readonly']) ?>
    <div class="col-sm-5">
    <?= form_input('n', $rows['email'], ['class' => 'form-control']) ?>
    </div>
    </div>

    <div class="form-group row">
    <?= form_label('Password', 'password', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_password('o', $rows['password'], ['class' => 'form-control']) ?>
    </div>
    </div>


    </div>
  </div>


</div><!--end card-body-->
</div><!--end collapse-->
</div><!--end shadow-->

</div><!--end tab account-->

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
