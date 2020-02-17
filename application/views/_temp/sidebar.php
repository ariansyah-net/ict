<?php if($this->session->userdata('role_id') == 2) : ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a target="_blank" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fab fa-asymmetrik"></i>
        </div>
          <div class="sidebar-brand-text mx-2">Operations <sup>IT</sup></div>
            </a>

<hr class="sidebar-divider my-0">

<li class="nav-item active">
  <a class="nav-link" href="<?=base_url('user')?>">
    <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
      </li>
<hr class="sidebar-divider">
  <div class="sidebar-heading">Primary Menu</div>
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fab fa-fw fa-audible"></i>
          <span>Master Menu</span>
            </a>
<div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
  <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Configurations</h6>
      <a class="collapse-item" href="<?=base_url('user')?>">Profile</a>
      <a class="collapse-item" href="<?=base_url('user')?>">Software</a>
      <a class="collapse-item" href="<?=base_url('user')?>">Downloads</a>
        </div>
          </div>
            </li>
<li class="nav-item">
  <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
        </li>
<hr class="sidebar-divider d-none d-md-block">
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>        
  
  </ul>

<!-- ============================================================================ -->
<?php else: ?>



<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <a target="_blank" class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url()?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fab fa-asymmetrik"></i>
    </div>
    <div class="sidebar-brand-text mx-2">Operations <sup>IT</sup></div>
  </a>

  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?=base_url('dashboard')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
  </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">Primary Menu</div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#master" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fab fa-fw fa-audible"></i>
      <span>Master Data</span>
    </a>
    <div id="master" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Configurations</h6>
        <a class="collapse-item" href="<?=base_url('dashboard/users')?>">User List</a>
        <a class="collapse-item" href="<?=base_url('dashboard/fieldwork')?>">Fieldwork</a>
        <a class="collapse-item" href="<?=base_url('dashboard/rooms')?>">Rooms</a>
        <a class="collapse-item" href="<?=base_url('dashboard/locations')?>">Locations</a>
        <a class="collapse-item" href="<?=base_url('dashboard/years')?>">Years</a>

        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Asset Management</h6>
        <a class="collapse-item" href="<?=base_url('dashboard/computers')?>">Computer</a>
        <a class="collapse-item" href="<?=base_url('dashboard/laptops')?>">Laptop</a>
        <a class="collapse-item" href="<?=base_url('dashboard/devices')?>">Devices</a>

      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#maintenance" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-chalkboard-teacher"></i>
      <span>Maintenance</span>
    </a>
    <div id="maintenance" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=base_url('dashboard/problem')?>">User Problem</a>
        <a class="collapse-item" href="<?=base_url('dashboard/schedule_maintenance')?>">Schedule Maintenance</a>
        <a class="collapse-item" href="<?=base_url('dashboard/list_maintenance')?>">List Maintenance</a>
        <a class="collapse-item" href="<?=base_url('dashboard/control_card')?>">Control Card</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#itprogram" aria-expanded="true" aria-controls="collapseTwo">
      &nbsp;<i class="fas fa-award"></i>
      <span>IT Program</span>
    </a>
    <div id="itprogram" class="collapse" aria-labelledby="itprogram" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">Job Program</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">Job Description</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">Procedure Process</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">News Delivery Form</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">Administrator Accounts</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">IT Form Request</a>
        <a class="collapse-item" href="<?=base_url('dashboard/')?>">List of Lisence Software</a>

      </div>
    </div>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#itsettings" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Settings</span>
    </a>
    <div id="itsettings" class="collapse" aria-labelledby="itsettings" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=base_url('dashboard/navmenu')?>">Navigation Menu</a>
        <a class="collapse-item" href="<?=base_url('dashboard/page')?>">Page Post</a>
        <a class="collapse-item" href="<?=base_url('dashboard/inbox')?>">Inbox</a>
        <a class="collapse-item" href="<?=base_url('dashboard/downloads')?>">Download Area</a>
        <a class="collapse-item" href="<?=base_url('dashboard/landing')?>">Customize Landing</a>
      </div>
    </div>
  </li>

<!--Nav Item Single -->
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
          </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<?php endif; ?>