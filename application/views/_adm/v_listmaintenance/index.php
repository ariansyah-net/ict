<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <?= anchor('dashboard/add_listmaintenance', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-primary btn-sm'))?>
    </h6>
  </div>
  <div class="card-body">
    <form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th><input type="checkbox" id="select_all" value=""/></th>
            <th>No.</th>
            <th>User Name</th>
            <th class="text-center">Month</th>
            <th class="text-center">Period</th>
            <th class="text-center">Status</th>
            <th class="text-center">Author</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($ar->result_array() as $row){
              echo "<tr>
                    <td style='width:20px'><input type='checkbox' name='checked_id[]' class='checkbox' value='$row[id_listmaintenance]'></td>
                    <td align='center'>$no</td>";
                    if($row['unique_user'] == 'Y'){
                      echo "<td class='text-primary'>$row[l_pcname]</td>";
                    }else{
                      echo "<td>$row[first_name] $row[last_name]</td>";
                    }
                    echo "
                    <td class='text-center'>$row[month_name]</td>
                    <td class='text-center'>$row[years_name]</td>
                    <td class='text-center'>";
                    if($row['status'] == 'Ok'){
                      echo "<a href='#' class='btn btn-default white-text btn-sm'><i class='fas fa-check-circle'></i> Good</a>";
                    }else{
                      echo "<a href='#' class='btn btn-default text-danger btn-sm'><i class='fas fa-exclamation-circle'></i> Repaired</a>";
                    }
                    echo"</td>
                    <td>$row[author]</td>
                    <td style='width:80px;'>
                    <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_listmaintenance/')."$row[id_listmaintenance]'> <i class='fas fa-edit'></i> </a> &nbsp;
                    <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_listmaintenance]' id='$row[id_listmaintenance]'><i class='fas fa-trash-alt'></i> </a>
                    </td>
                    </tr>
                    ";
                $no++;
              }
            ?>
        </tbody>
      </table>
    </div>
    <hr>
    <input type="submit" class="btn btn-danger btn-sm" name="bulk_delete_submit" value="Remove Selected"/>
    </form>
  </div>
</div>



<?php foreach($ar->result_array() as $i): ?>
<!-- Modal Remove-->
<div class="modal fade" id="remove<?= $i['id_listmaintenance']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_listmaintenance/'.$i['id_listmaintenance']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>






<script>
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
