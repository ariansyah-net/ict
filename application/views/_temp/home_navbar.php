<nav class="navbar navbar-expand-lg navbar-dark unique-color lighten-5 fixed-top scrolling-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?=base_url()?>"><img class="thumbnail" src="<?=base_url('./arians/home/img/up-50x.png')?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
      aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
      <ul class="navbar-nav mr-auto">
        <?php
            $topmenu = $this->db->query("SELECT * FROM it_navmenu WHERE menu_active='1' AND id_parent = '0' ORDER BY menu_order ASC");
              foreach ($topmenu->result_array() as $row){
              	$dropdown = $this->db->query("SELECT * FROM it_navmenu WHERE id_parent='$row[id_menu]' AND menu_active='1' ORDER BY menu_order ASC")->num_rows();
                  if ($dropdown == 0){
    								echo '<li class="nav-item"><a class="nav-link" href="'.$row['menu_link'].'"> '."<i class='$row[menu_icon]'></i>".' '.$row['menu_name'].' </a></li>';
    	              }else{
    	                echo "<li class='nav-item dropdown'>
                          <a href='".base_url()."$row[menu_link]' class='nav-link dropdown-toggle' id='$row[id_menu]' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='$row[menu_icon]'></i> $row[menu_name]</a>
                          <div class='dropdown-menu dropdown-primary' aria-labelledby='$row[id_menu]'>
                          ";
                            $dropmenu = $this->it->dropdown_menu($row['id_menu']);
                            foreach ($dropmenu->result_array() as $row){
  														echo '<a class="dropdown-item" href="'.$row['menu_link'].'"> '."<i class='$row[menu_icon]'></i>".' '.$row['menu_name'].' </a>';
                            }
                          echo "</li>";
                      }
                  }
              ?>
            </ul>
  <?php
    $is_login = $this->session->userdata('is_login');
    $name     = $this->session->userdata('first_name');
    $avatar   = $this->session->userdata('avatar');
  ?>

<ul class="navbar-nav ml-auto nav-flex-icons">

    <?php if ($is_login): ?>
    <li class="nav-item avatar dropdown">
    <a class="nav-link dropdown-toggle" id="nav1" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">

    <img src="<?=base_url('arians/photos/'.$avatar.' ')?>" class="rounded-circle z-depth-0" alt="avatar image">
    <?= $name; ?> <i class="fas fa-caret-down fa-xs"></i> </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
    <a class="dropdown-item" href="<?=base_url('dashboard/')?>"> Profil Saya</a>
    <a class="dropdown-item" href="<?=base_url('login/logout')?>"> Keluar Aplikasi</a>
    </div>
    </li>

  <?php else: ?>
    <li class="nav-item">
       <a class="nav-link waves-effect waves-light" href="<?=base_url('auth')?>">
       <i class="fas fa-user"></i> Login</a>
     </li>
  </ul>
</div>
    <?php endif ?>
    </div>
  </div>
</nav>
