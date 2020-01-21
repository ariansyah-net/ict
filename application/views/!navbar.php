<script> function myFunction() { document.getElementsByClassName("topnav")[0].classList.toggle("responsive"); } </script>

<?php
$is_login = $this->session->userdata('is_login');
$level    = $this->session->userdata('level');
?>
<?php if ($is_login): ?>


<ul class="topnav">
<li> <?= anchor('dashboard', '<i class="fa fa-dashboard"></i> &nbsp;Dashboard') ?></li>

<li class="dropdown" href="javascript:void(0)">
    <?= anchor('#', '<i class="fa fa-calendar"></i> &nbsp;Maintenance') ?>
        <div class="dropdown-content">
            <?= anchor('schedule', '<i class="fa fa-angle-double-right"></i> &nbsp;Schedule Maintenance') ?>
                <?= anchor('listmaintenance', '<i class="fa fa-angle-double-right"></i> &nbsp;List Maintenance') ?>
                  <?= anchor('problem', '<i class="fa fa-angle-double-right"></i> &nbsp;Problem Users') ?>
                    <?= anchor('listmaintenance/controlcard', '<i class="fa fa-angle-double-right"></i> &nbsp;Control Card') ?>
                      </div>
                          </li>
<li class="dropdown" href="javascript:void(0)">
    <?= anchor('#', '<i class="fa fa-server"></i> &nbsp;IT Assets') ?>
        <div class="dropdown-content">
            <?= anchor('computers', '<i class="fa fa-angle-double-right"></i> &nbsp;Computers') ?>
              <?= anchor('asset_hardware', '<i class="fa fa-angle-double-right"></i> &nbsp;Hardware') ?>
                <?= anchor('asset_software', '<i class="fa fa-angle-double-right"></i> &nbsp;Software') ?>

                    </div>
                        </li>
<li class="dropdown" href="javascript:void(0)">
    <?= anchor('#', '<i class="fa fa-gg"></i> &nbsp;Codefications') ?>
        <div class="dropdown-content">
            <?= anchor('computers/codefications', '<i class="fa fa-angle-double-right"></i> &nbsp;Computers') ?>
                <?= anchor('asset_hardware/codefications', '<i class="fa fa-angle-double-right"></i> &nbsp;Hardware') ?>
                    </div>
                        </li>
<li class="dropdown" href="javascript:void(0)">
    <?= anchor('', '<i class="fa fa-file-o"></i> &nbsp;Report') ?>
        <div class="dropdown-content">
            <?= anchor('report-users', '<i class="fa fa-angle-double-right"></i> &nbsp;Report Users') ?>
                <?= anchor('report-computer', '<i class="fa fa-angle-double-right"></i> &nbsp;Report Computer') ?>
                    </div>
                        </li>
<?php if ($level === 'root'): ?>
    <li id="menu-setting" class="dropdown" href="javascript:void(0)">
        <?= anchor('', '<i class="fa fa-gear"></i> &nbsp;Settings') ?>
          <?php endif ?>
            <div class="dropdown-content">
              <?= anchor('admin', '<i class="fa fa-angle-double-right"></i> &nbsp;Admin Control') ?>
                </div>
                  </li>

<li class="dropdown" href="javascript:void(0)">
  <?= anchor('', '<i class="fa fa-medkit"></i> &nbsp;Help') ?>
    <div class="dropdown-content">
      <?= anchor('about', '<i class="fa fa-angle-double-right"></i> &nbsp;About') ?>
        <?= anchor('', '<i class="fa fa-angle-double-right"></i> &nbsp;User Guide') ?>
          <?= anchor('logout', '<i class="fa fa-sign-out"></i> &nbsp;Logout', 'class="active"') ?>
            </div>
              </li>

<!-- SINGLE MENU IS DISABLE
<li>
<?= anchor('logout', '<i class="fa fa-sign-out"></i> &nbsp;Logout', 'class="active"') ?>
</li> -->


<!--show this if small screen-->
<li class="icon"><a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-bars"></i> </a></li>
</ul>

<?php else: ?>
    <ul class="topnav">
            <li><?= anchor('login', '<i class="fa fa-home"></i> &nbsp;Welcome') ?>
                </ul>
<?php endif ?>
