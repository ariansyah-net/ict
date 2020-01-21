<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
      <?= anchor('dashboard/add_computers', '<i class="fas fa-tv"></i>', array('class' =>'btn btn-primary btn-sm'))?>
      <?= anchor('dashboard/add_users', '<i class="fas fa-users"></i>', array('class' =>'btn btn-info btn-sm'))?>
    </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No.</th>
            <th>User Name</th>
            <th class="text-center">Codefications</th>
            <th class="text-center">Locations</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
            $no = 1;
            foreach ($ar->result_array() as $row){
              echo "<tr>
                    <td align='center'>$no</td>";
                    if($row['unique_user'] == 'Y'){
                      echo "<td><a href='#' class='text-default' data-toggle='modal' data-target='#photo$row[id_users]' id='$row[id_users]'>$row[pcname]</a></td>";
                    }else{
                      echo "<td><a href='#' class='text-secondary' data-toggle='modal' data-target='#photo$row[id_users]' id='$row[id_users]'>$row[first_name] $row[last_name]</a></td>";
                    }
                    echo"
                    <td class='text-center'>$row[codefication]</td>
                    <td>$row[room_name] </td>
                    <td class='text-center'>
                    <a target='_blank' class='btn btn-info btn-circle btn-sm' title='Detail' href='".base_url('dashboard/print_card/')."$row[id_computers]'> <i class='fas fa-print'></i> </a> &nbsp;
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
<!-- Modal View Photo-->
<div class="modal fade" id="photo<?= $i['id_users']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Photo</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
      <?php if($i['avatar'] == ''){
        echo '<img class="rounded mx-auto d-block mb-3" src="'.base_url().'arians/img/profile.png" style="height:350px" width="250px">';
        echo "<a href='' class='btn btn-secondary btn-sm mx-auto d-block text-white'> $i[first_name], $i[last_name]</a>";
        }else {
        echo '<img class="rounded mx-auto d-block mb-3" src="'.base_url().'arians/photos/'.$i['avatar'].' " style="height:350px" width="250px">';
        echo "<a href='' class='btn btn-secondary btn-sm mx-auto d-block text-white'> $i[first_name], $i[last_name]</a>";
        }
      ?>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>
