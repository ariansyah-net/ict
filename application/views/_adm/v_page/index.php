<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_page', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-info btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Page Link</th>
            <th>Viewer</th>
            <th>Status</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
              $date = tgl_indo($row['page_created']);
                // if($row['page_active'] == '0'){
                //   echo "";
                // } else {
                  echo "<tr>
                        <td align='center'>$no</td>
                        <td>$row[page_title]</td>
                        <td align='center'><a target='_blank' href='".base_url('home/page/')."$row[page_slug]' class='btn btn-circle btn-info btn-sm'><i class='fas fa-link'></i></a></td>
                        <td align='center'>
                        <a href='' class='btn btn-default btn-sm'><i class='far fa-eye'></i>
                        $row[page_hits]</a></td>
                        <td class='text-grey text-center'>";
                          if($row['page_active'] == '1'){
                            echo "<a href='#' class='btn btn-info btn-sm'><i class='far fa-check-circle'></i> Active</a>";
                          }else{
                            echo "<a href='#' class='btn btn-default btn-sm text-danger'><i class='fas fa-exclamation'></i> Non Active</a>";
                          }
                        echo"</td>";
                        echo "<td>$date</td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_page/')."$row[id_page]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_page]' id='$row[id_page]'><i class='fas fa-trash-alt'></i> </a>
                        </td>
                        </tr>
                        ";
                  $no++;

              } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>



<?php foreach($ar->result_array() as $i): ?>
<!-- Modal Remove-->
<div class="modal fade" id="remove<?= $i['id_page']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['page_title'] ?></strong> page?
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_page/'.$i['id_page']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
