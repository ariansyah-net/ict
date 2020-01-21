<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Inbox List</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($ar->result_array() as $row){
            $date = tgl_indo($row['inbox_date']);
            $msg = substr($row['inbox_message'],0,50);
            if ($row['inbox_read']=='N'){ $bold = 'font-weight-bold'; }else{ $bold = ''; }
                echo "<tr class='$bold'>
                      <td align='center'>$no</td>
                      <td>$row[inbox_name]</td>
                      <td>$row[inbox_email]</td>
                      <td>$row[inbox_subject]</td>
                      <td>$msg..</td>
                      <td>$date</td>
                      <td style='width:60px;'>
                      <a class='btn btn-info btn-circle btn-sm' title='Reply' href='".base_url('dashboard/detail_inbox/')."$row[id_inbox]'> <i class='far fa-comment-alt'></i> </a> &nbsp;
                      <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_inbox]' id='$row[id_inbox]'><i class='fas fa-trash-alt'></i> </a>
                      </td>
                      </tr>
                      ";
                $no++;
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<?php foreach($ar->result_array() as $i): ?>
<!-- Modal Remove-->
<div class="modal fade" id="remove<?= $i['id_inbox']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove inbox from <strong><?= $i['inbox_name']?></strong>?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_inbox/'.$i['id_inbox']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
