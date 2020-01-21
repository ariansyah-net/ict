<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="identities-tab" data-toggle="tab" href="#identities" role="tab" aria-controls="identities" aria-selected="true">User Identity</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="topnav-tab" data-toggle="tab" href="#topnav" role="tab" aria-controls="topnav" aria-selected="false">Office</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="false">About</a>
  </li>
</ul>
<!-- =========================TAB 1=================================== -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="identities" role="tabpanel" aria-labelledby="identities-tab">
<!-- IN TAB -->
    <div class="card shadow mb-4">
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
      <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Add New User</h6>
      </a>
    <div class="collapse show" id="collapseCardExample">
    <div class="card-body">













<?= form_open_multipart('dashboard/add_users') ?>
<!-- FIRST NAME -->
    <div class="form-group row">
    <?= form_label('First Name :', 'first_name', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('a', '', ['class' => 'form-control', 'required' => 'required']) ?>
    </div>
    </div>
<!-- LAST NAME -->
    <div class="form-group row">
    <?= form_label('Last Name :', 'last_name', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('b', '', ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- EMAIL -->
    <div class="form-group row">
    <?= form_label('Email :', 'email', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_input('c', '', ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- PHONE -->
    <div class="form-group row">
    <?= form_label('Phone :', 'phone', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('d', '', ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- GENDER -->
    <div class="form-group row">
    <?= form_label('Gender :', 'gender', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="M" id="M" name="e" class="custom-control-input" required>
    <?= form_label('Male', 'M', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="F" id="F" name="e" class="custom-control-input" required>
    <?= form_label('Female', 'F', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>


<!-- AVATAR -->
    <div class="form-group row">
    <?= form_label('Photo :', 'avatar', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <div class="custom-file">
    <input type="file" class="custom-file-input" id="customFile" name="f">
    <?= form_label('Choose file..', 'f', ['class' => 'custom-file-label', 'id' => 'customFile']) ?>
    <small class="form-text text-muted">Note: max 1 mb file to upload</small>
    </div>
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
    <?= form_label('Position :', 'position', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_input('g', '', ['class' => 'form-control']) ?>
    </div>
    </div>
<!-- FIELDWORK -->
    <div class="form-group row">
    <?= form_label('Fieldwork :', 'fieldwork', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_dropdown('h', getDropdownList('it_fieldwork', ['id_fieldwork', 'fieldwork_name']),'', array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- LOCATION -->
    <div class="form-group row">
    <?= form_label('Location :', 'location', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-5">
    <?= form_dropdown('i', getDropdownList('it_locations', ['id_locations', 'locations_name']),'', array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- ROOM -->
    <div class="form-group row">
    <?= form_label('Room :', 'id_room', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <?= form_dropdown('j', getDropdownList('it_rooms', ['id_room', 'room_name']),'', array('class' => 'form-control', 'required' => 'required')) ?>
    </div>
    </div>
<!-- ACTIVE -->
    <div class="form-group row">
    <?= form_label('Status :', 'level', ['class' => 'col-sm-2 col-from-label']) ?>
    <div class="col-sm-10">
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="Y" id="Y" name="k" class="custom-control-input">
    <?= form_label('Active', 'Y', ['class' => 'custom-control-label']) ?>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" value="N" id="N" name="k" class="custom-control-input">
    <?= form_label('Non Active', 'N', ['class' => 'custom-control-label']) ?>
    </div>
    </div>
    </div>

<!-- INFO -->
    <div class="form-group row">
    <?= form_label('Info User :', 'info', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <textarea class="form-control" rows="2" name="l"></textarea>
    </div>
    </div>

<!-- UNIQUE USER -->
    <div class="form-group row">
    <?= form_label('User Unique :', 'unique_user', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-7">
    <div class="custom-control custom-checkbox">
    <input type="checkbox" name="m" value="Y" class="custom-control-input" id="check">
    <label class="custom-control-label text-danger" for="check">Set unique user</label>
    </div>
    </div>
    </div>

</div><!--end card-body-->
</div><!--end collapse-->
</div><!--end shadow-->


</div><!--end tab topnav-->




<!-- ===========================TAB 3==================================== -->
<div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">


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

</div><!--end tab about-->

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
