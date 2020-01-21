<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_problem', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive table-small">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Problem</th>
            <th>Follow Up</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="text-sm">
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
                $problem =(strip_tags($row['title_problem']));
      					$prob = substr($problem,0,50);
      					// $prob = substr($problem,0,strrpos($prob," "));
                $followup =(strip_tags($row['followup']));
                $fup = substr($followup,0,50);
                $fup = substr($followup,0,strrpos($fup," "));

                if($row['result'] == 'repaired'){
                  echo "<tr class='text-danger'>
                        <td align='center'>$no</td>";

                        if($row['unique_user'] === 'Y') {
                          echo "<td>$row[other_user]</td>";
                        }else if($row['is_active'] === 'N') {
                          echo "<td class='text-danger'><i class='fas fa-exclamation-circle'></i> $row[first_name] $row[last_name]</td>";
                        }else {
                          echo "<td>$row[first_name] $row[last_name]</td>";
                        }
                        echo "
                        <td>$prob</td>
                        <td>$fup</td>
                        <td><span class='fas fa-exclamation'></span> $row[result]</td>
                        <td>$row[date]</td>
                        <td>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_problem/')."$row[id_problem]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='".base_url('dashboard/remove_problem/')."$row[id_problem]' onclick=\"return confirm('Are you sure can remove this data?')\"> <i class='far fa-trash-alt'></i> </a>
                        </td>
                        </tr>
                        ";
                  $no++;
                } else {
                  echo "<tr>
                        <td align='center'>$no</td>
                        ";
                          if($row['unique_user'] == 'Y') {
                            echo "<td class='text-primary'>$row[other_user]</td>";
                          }else if($row['is_active'] === 'N') {
                            echo "<td class='text-danger'><i class='fas fa-exclamation-circle'></i> $row[first_name] $row[last_name]</td>";
                          }else {
                            echo "<td>$row[first_name] $row[last_name]</td>";
                          }
                        echo "
                        <td>$prob</td>
                        <td>$row[followup]</td>
                        <td style='width:80px;'><span class='fas fa-check-circle'></span> $row[result]</td>
                        <td>$row[date]</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_problem/')."$row[id_problem]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_problem]' id='$row[id_problem]'><i class='fas fa-trash-alt'></i> </a>
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
<div class="modal fade" id="remove<?= $i['id_problem']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['first_name']?>, <?=$i['last_name'] ?></strong> from list?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_problem/'.$i['id_problem']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
