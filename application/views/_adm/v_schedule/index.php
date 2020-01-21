<?php
require 'koneksi.php';

function serialize_ke_string($serial)
{
    $hasil = unserialize($serial);
    return implode(', ', $hasil);
}
?>
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?= anchor('dashboard/add_schedule', '<i class="fas fa-edit"></i> Add New', array('class' =>'btn btn-primary btn-sm'))?></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>Room & Locations</th>
            <th>Month</th>
            <th>Last Update</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $no = 1;
              $query = "SELECT * FROM it_schedule a JOIN it_rooms b ON a.id_room=b.id_room ORDER BY id_schedule DESC";
              $hasil = mysqli_query($link, $query);
              while ($row = mysqli_fetch_array($hasil)) {
            ?>
            <tr>
              <td class="text-center"><?=$no++;?></td>
              <td><?php echo $row['room_name'] ?></td>
              <td><?php echo serialize_ke_string($row['month_name']) ?></td>
              <td><?php echo $row['last_update'] ?></td>
              <td class="text-center">
              <a class="btn btn-info btn-circle btn-sm" title="Detail" href="<?=base_url('dashboard/change_schedule/').$row['id_schedule']?>"> <i class="fas fa-edit"></i> </a> &nbsp;
              <a class="btn btn-danger btn-circle btn-sm" title="Remove" href="#" data-toggle="modal" data-target="#remove<?= $row['id_schedule']?>" id="<?= $row['id_schedule'] ?>"><i class="fas fa-trash-alt"></i> </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Remove-->
<?php foreach($ar->result_array() as $i): ?>
  <div class="modal fade" id="remove<?=$i['id_schedule']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirm to Remove Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure will remove <strong><?= $i['room_name']?></strong> from list?
        </div>
        <div class="modal-footer">
        <a class="btn btn-danger btn-sm" title="Remove" href="<?=base_url('dashboard/remove_schedule/'.$i['id_schedule']) ?>"> <i class="far fa-trash-alt"></i> Yes, Remove</a>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
