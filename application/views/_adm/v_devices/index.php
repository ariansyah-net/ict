<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_devices', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th><span class="fas fa-server"></span> Device</th>
            <th>Category</th>
            <th>Codefication</th>
            <th>Brand / Type</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
                if($row['d_active'] == 'N'){
                  echo "<tr class='text-warning bg-gray-100'>
                        <td align='center'>$no</td>
                        <td>$row[d_name]</td>
                        <td>$row[asset_category_name]</td>
                        <td>$row[d_codefication]</td>
                        <td>$row[d_brand] $row[d_type]</td>
                        <td>$row[room_name]</td>
                        <td style='width:80px;'>
                        <a class='btn btn-default btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_devices/')."$row[id_device]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-default btn-circle btn-sm' title='Remove' href='".base_url('dashboard/remove_devices/')."$row[id_device]' onclick=\"return confirm('Are you sure can remove this data?')\"> <i class='far fa-trash-alt'></i> </a>
                        </td>
                        </tr>
                        ";
                  $no++;
                } else {
                  echo "<tr>
                        <td align='center'>$no</td>
                        <td>$row[d_name]</td>
                        <td>$row[asset_category_name]</td>
                        <td>$row[d_codefication]</td>
                        <td>$row[d_brand] - $row[d_type]</td>
                        <td>$row[room_name]</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_devices/')."$row[id_device]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_device]' id='$row[id_device]'><i class='fas fa-trash-alt'></i> </a>
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

<?php foreach($ar->result_array() as $i): ?>
<!-- Modal Remove-->
<div class="modal fade" id="remove<?= $i['id_device']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['d_name']?>?</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_devices/'.$i['id_device']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
