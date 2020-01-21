<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_years', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Years</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($ar->result_array() as $row){
              echo "<tr>
                    <td align='center'>$no</td>
                    <td>$row[years_name]</td>
                    <td>$row[last_update]</td>
                    <td style='width:80px;'>
                    <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_years/')."$row[id_years]'> <i class='fas fa-edit'></i> </a> &nbsp;
                    <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_years]' id='$row[id_years]'><i class='fas fa-trash-alt'></i> </a>
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
<div class="modal fade" id="remove<?= $i['id_years']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['years_name']?>?</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_years/'.$i['id_years']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
