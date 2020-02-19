<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_tags', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Tag Name</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
                $date = tgl_indo($row['last_update']);
                  echo "<tr>
                        <td align='center'>$no</td>
                        <td>$row[tag_name]</td>";
                        if ($row['tag_active'] == 1){
                        	echo "<td><a href='' class='btn btn-default btn-sm text-secondary'><i class='fas fa-check-circle'></i> Active</a></td>";
                        }else {
                        	echo "<td><a href='' class='btn btn-default btn-sm text-danger'><i class='fas fa-exclamation-circle'></i> Non Active</a></td>";
                        }
                        echo "<td>";
                        echo date('d M Y', $row['last_update']);
                        echo "</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_tags/')."$row[id_tag]'> <i class='fas fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_tag]' id='$row[id_tag]'><i class='fas fa-trash-alt'></i> </a>
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
<div class="modal fade" id="remove<?= $i['id_tag']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['tag_name']?>?</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_categories/'.$i['id_tag']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
