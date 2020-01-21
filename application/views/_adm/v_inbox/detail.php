<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
<!-- Card Header - Accordion -->
<a href="#page" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
<h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Inbox</h6>
</a>
<!-- Card Content - Collapse -->
<div class="collapse show" id="page">
<div class="card-body">

<?= form_open('dashboard/detail_inbox/'.$ar['id_inbox'].' ') ?>

<!--NAME INBOX-->
    <div class="form-group row">
    <?= form_label('Name :', 'inbox_name', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-8">
    <?= form_input('a', $ar['inbox_name'], ['class' => 'form-control', 'readonly' => 'readonly']) ?>
    </div>
    </div>
<!--INBOX EMAIL-->
    <div class="form-group row">
    <?= form_label('Email :', 'inbox_email', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <?= form_input('b', $ar['inbox_email'], ['class' => 'form-control', 'readonly' => 'readonly']) ?>
    </div>
    </div>
<!--INBOX SUBJECT-->
    <div class="form-group row">
    <?= form_label('Subject :', 'inbox_subject', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <?= form_input('c', $ar['inbox_subject'], ['class' => 'form-control', 'readonly' => 'readonly']) ?>
    </div>
    </div>
<!--INBOX MESSAGE-->
    <div class="form-group row">
    <?= form_label('Message :', 'inbox_message', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <textarea class="form-control" rows="4" name="d" readonly><?= $ar['inbox_message'] ?></textarea>
    </div>
    </div>

<!--INBOX REPLY-->
    <div class="form-group row">
    <?= form_label('Reply :', 'e', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10">
    <textarea class="form-control" id="mytextarea" rows="10" name="e" placeholder="Write Something.."></textarea>
    </div>
    </div>

<!--ACTION BUTTON-->
    <div class="form-group row">
    <?= form_label('', '', ['class' => 'col-sm-2 col-form-label']) ?>
    <div class="col-sm-10 p-3">
    <button type='submit' name='submit' class='btn btn-primary'><i class='fab fa-rocketchat'></i> Reply Message</button>
    </div>
    </div>
<?= form_close() ?>
    </div>
  </div>
</div>
