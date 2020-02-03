<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>

  <!-- Topbar Search -->
           <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
             <div class="input-group">
               <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
               <div class="input-group-append">
                 <button class="btn btn-primary" type="button">
                   <i class="fas fa-search fa-sm"></i>
                 </button>
               </div>
             </div>
           </form>


    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
               <li class="nav-item dropdown no-arrow d-sm-none">
                 <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-search fa-fw"></i>
                 </a>
                   <!-- Dropdown - Messages -->
                   <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                     <form class="form-inline mr-auto w-100 navbar-search">
                       <div class="input-group">
                         <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                           <button class="btn btn-primary" type="button">
                             <i class="fas fa-search fa-sm"></i>
                           </button>
                         </div>
                       </div>
                     </form>
                   </div>
                 </li>

                 

<!-- ========= PROBLEM NOTIFICATION ================ -->

<li class="nav-item dropdown no-arrow mx-1">
  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php $prob = $this->db->query("SELECT * FROM it_problems WHERE problem_read='0'")->num_rows(); ?>
    <i class="fas fa-bell fa-fw"></i>
    <span class="badge badge-danger badge-counter"><?php echo $prob; ?></span>
  </a>
             

          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header"><i class="fa fa-users"></i> User Problem</h6>

             <?php
              $problem = $this->it->new_problem(4);
              foreach ($problem->result_array() as $row) {
                $problemUser = substr($row['title_problem'],0,35);
                // $problemDate = cek_terakhir($row['date'].' '.$row['period']);
                if ($row['problem_read']=='0'){ $bold = 'font-weight-bold'; }else{ $bold = ''; }

                if($row < 0){
                  echo "Everything is OK";
                }else{

            echo "
                  <a class='dropdown-item d-flex align-items-center' href='".base_url()."dashboard/change_problem/$row[id_problem]'>
                  <div class='dropdown-list-image mr-3'>
                  ";
                    
                    if($row['avatar'] == ''){
                      echo "<img class='rounded-circle' src='".base_url()."arians/photos/whois.png'>";
                    }else{
                      echo "<img class='rounded-circle' src='".base_url()."arians/photos/$row[avatar]'>";
                    }
                    
                  echo "
                  <div class='status-indicator bg-danger'></div>
                  </div>

                  <div>
                  <span class='$bold'>$problemUser</span>
                  <div class='small text-gray-500'>$row[first_name] $row[last_name] - $row[date]</div>
                  </div>
                  </a>";
                }
              }
            ?>
          <a class="dropdown-item text-center small text-gray-500" href="<?=base_url('dashboard/problem')?>">Show All Problem
        </a>
      </div>
    </li>








<!-- ========= INBOX NOTIFICATION ================ -->

      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-envelope fa-fw"></i>
            <?php $jmlh = $this->db->query("SELECT * FROM it_inbox where inbox_read='N'")->num_rows(); ?>
              <span class="badge badge-danger badge-counter"><?php echo $jmlh; ?></span>
                  </a>
  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">Message Center</h6>
      <?php
        $pesan = $this->it->new_message(4);
        foreach ($pesan->result_array() as $row) {
          $msg = substr($row['inbox_message'],0,35);
          $time = cek_terakhir($row['inbox_date'].' '.$row['inbox_time']);
          if ($row['inbox_read']=='N'){ $bold = 'font-weight-bold'; }else{ $bold = ''; }

          if($row < 0){
            echo "No Message Detected";
          }else{

          echo "
            <a class='dropdown-item d-flex align-items-center' href='".base_url()."dashboard/detail_inbox/$row[id_inbox]'>
              <div class='dropdown-list-image mr-3'>
                <img class='rounded-circle' src='".base_url()."arians/img/male.png'>
                <div class='status-indicator bg-warning'></div>
              </div>
              <div class='$bold'>
                <div class='text-truncate'>$msg...</div>
                <div class='small text-gray-500'>$row[inbox_name] - $time</div>
              </div>
            </a>";
            }
          } ?>
        <a class="dropdown-item text-center small text-gray-500" href="<?=base_url('dashboard/inbox')?>">Show All Messages</a>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
          <?= $this->session->userdata('nama_admin'); ?></span>
        <img class="img-profile rounded-circle" alt="ICT" src="<?= base_url('arians/img/'.$this->session->userdata['avatar'].' ') ?>">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="<?=base_url('dashboard/change_author/'.$this->session->userdata['id_admin'].' ')?>">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?= base_url('login/logout')?>">Logout</a>
      </div>
    </div>
  </div>
</div>
