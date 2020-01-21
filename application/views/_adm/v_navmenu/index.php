<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_navmenu', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Menu Name</th>
            <th>Menu Link</th>
            <th>Parent</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $no = 1;
            foreach ($ar->result_array() as $row){
                echo "<tr>
                      <td align='center'>$no</td>
                      <td>$row[menu_name]</td>
                      <td align='center'>
                        <a target='_blank' href='$row[menu_link]' class='btn btn-default btn-sm'><i class='fas fa-external-link-alt'></i></a>
                      </td>
                      <td class='text-center'>";
                        if($row['id_parent'] == '0'){
                          echo "<a href='' class='btn btn-default btn-sm'><i class='far fa-check-circle'></i> Primary</a>";
                        }else{
                          echo "<a href='' class='btn btn-default btn-sm text-info'><i class='fas fa-ellipsis-v'></i> Submenu</a>";
                        }
                      echo"</td>
                      <td class='text-center'><a href='' class='btn btn-default btn-sm'>$row[menu_order]</a></td>
                      <td class='text-center'>";
                      if($row['menu_active'] == '1'){
                        echo "<a href='#' class='btn btn-default btn-sm'><i class='far fa-check-circle'></i> Active</a>";
                      }else{
                        echo "<a href='#' class='btn btn-default btn-sm text-danger'><i class='fas fa-exclamation'></i> Non Active</a>";
                      }
                      echo"</td>
                      <td style='width:60px;'>
                      <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_navmenu/')."$row[id_menu]'> <i class='far fa-edit'></i> </a> &nbsp;
                      <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_menu]' id='$row[id_menu]'><i class='fas fa-trash-alt'></i> </a>
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
<div class="modal fade" id="remove<?= $i['id_menu']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['menu_name'] ?></strong> menu?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_navmenu/'.$i['id_menu']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
