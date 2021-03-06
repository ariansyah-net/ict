<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_users', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Fieldwork</th>
            <th>location</th>
            <th>Room</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
                if($row['is_active'] == 0){
                  echo "<tr class='text-warning'>
                        <td align='center'>$no</td>
                        <td>$row[first_name] $row[last_name]</td>
                        <td>$row[fieldwork_name]</td>
                        <td>$row[locations_name]</td>
                        <td>$row[room_name]</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_users/')."$row[id_users]'> <i class='fas fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_users]' id='$row[id_users]'><i class='fas fa-trash-alt'></i> </a>
                        </td>
                        </tr>
                        ";
                  $no++;
                } else {
                  echo "<tr>
                        <td align='center'>$no</td>
                        <td>$row[first_name] $row[last_name]</td>
                        <td>$row[fieldwork_name]</td>
          							<td>$row[locations_name]</td>
                        <td>$row[room_name]</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_users/')."$row[id_users]'> <i class='fas fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_users]' id='$row[id_users]'><i class='fas fa-trash-alt'></i> </a>
                        </td>
                        </tr>
                        ";
                  $no++;
              }
            }
            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<a href="#" class="btn btn-info btn-icon-split">
<span class="icon text-white"><?= isset($nonactive) ? $nonactive : '' ?></span>
<span class="text text-white">non active user</span>
</a>&nbsp;

<a href="#" class="btn btn-info btn-icon-split">
<span class="icon text-white"><?= isset($unique) ? $unique : '' ?></span>
<span class="text text-white">unique user</span>
</a>









<?php foreach($ar->result_array() as $i): ?>
<!-- Modal Remove-->
<div class="modal fade" id="remove<?= $i['id_users']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['first_name'] ?> <?= $i['last_name'] ?> ?</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_users/'.$i['id_users']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
