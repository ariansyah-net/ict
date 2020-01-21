<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_downloads', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-success btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th class="text-center">No.</th>
            <th>File Name</th>
            <th class="text-center">Type & Size</th>
            <th class="text-center">Date</th>
            <th class="text-center">Hits</th>
            <th class="text-center">Path Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
              $no = 1;
              foreach ($ar->result_array() as $row){
                $date = tgl_indo($row['down_date']);

                  echo "<tr>
                        <td align='center'>$no</td>
                        <td>$row[down_title]</td>
                        <td class='text-center'>$row[down_type] $row[down_size] Kb</td>
                        <td class='text-center'>$date</td>
                        <td class='text-center'>
                        <a href='' class='btn btn-default btn-sm'><i class='far fa-eye'></i>
                        $row[down_hits]</a>
                        </td>
                        <td class='text-center'><a href='".base_url()."arians/media/downloads/$row[down_filename]' class='btn btn-default'>Downloads</a></td>
                        <td style='width:80px;'>
                        <a class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/change_downloads/')."$row[id_download]'> <i class='far fa-edit'></i> </a> &nbsp;
                        <a class='btn btn-danger btn-circle btn-sm' title='Remove' href='#' data-toggle='modal' data-target='#remove$row[id_download]' id='$row[id_download]'><i class='fas fa-trash-alt'></i> </a>
                        </td>
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
<div class="modal fade" id="remove<?= $i['id_download']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure will remove <strong><?= $i['down_title']?>?</strong>
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_downloads/'.$i['id_download']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
