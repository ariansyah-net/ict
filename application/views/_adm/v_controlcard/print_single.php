<!-- 
 File Path   : v_controlcard/print_single.php
 Begin       : 2020-02-10
 Last Update : 2020-02-11
 Description : Print Control Card User Computer
 Author      : Ariansyah, A.Md.
 Author URL  : www.ariansyah.net.com
 Author Email: admin@ariansyah.net
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Ariansyah">
  <meta name="author" content="">
  <title>Print Card</title>

<style>
@page { margin: -5px; }
body { margin: 5px 0 0 5px; }

div.relative {
  position: relative;
  margin-left: 60px;
  top: 15px;
  width: 330px;
  height: 402px;
  border: 1px solid green;
  border-radius: 5px;
  padding-top: 20px;
  font-size: 11px;
  font-family: "Monospace", sans-serif, serif;
} 

.logo {
  text-align: center;
  position: relative;
  width: 55px;
  height: 50px;
  margin-left: 140px;
  margin-right: 100px;
  clear: both;
  padding-bottom: 15px;
}
.titlecard{
  font-family: "Monospace", sans-serif, serif;
  text-align: center;
  font-weight: bold;
  font-size: 13px;
  width: 100%;
}
.tableUser{
  width: 100%;
  font-size: 9px;
  /*margin: 2px;*/
}
.tableUser td{
  /*border: 1px solid blue;*/
  border-collapse: collapse;
  width: auto;
  color: #333;
  padding-top:3px;
  padding-right: 10px;
}


.mutted {color: #333;}
.rights{text-align: right;}
.lefts{text-align: left;}
.bolds{font-weight: bold;}
.tops{margin-top: 13px; border-top: 1px solid #f2f2f2;}
.centers{margin: auto;width: 90%;padding: 10px;}
/*.clearfix {overflow: auto;}*/
/*.floatRight{float: right;}*/
.blink {
  animation: blinker 0.6s linear infinite;
  color:#ff0000;
  font-size: 12px;
  font-weight: bold;
  font-family: sans-serif;
  text-align: center;
}
@keyframes blinker { 50% { opacity: 0; }}

.tableMaintenance{
  width: 100%;
  border: 1px solid #000;
  border-collapse: collapse;
  text-align: center;
}
.tableMaintenance th{
  background-color: #F2F2F2;
  text-align: center;
  font-size: 11px;
  padding: 6px 0 6px 0;
}
.tableMaintenance td {
  padding: 5px;
  color: #333;
  font-size: 10px;
  border: 1px solid #000;
}

/*============ ABSOLUTE DIV ========== */
div.absolute {
  position: absolute;
  top: 60px;
  right: 20px;
  width: 420px;
  height: 330px;
  padding: 0;
  border: 1px solid green;
  border-radius: 5px;
  font-size: 10px;
  font-family: "Monospace", sans-serif, serif;

  transform: rotate(90deg);
  /*transform-origin: 152% 160%;*/
}

.tableSpesification{
  z-index: -1;
  width: 100%;
  border-radius: 5px;
  border-collapse: collapse;
}
.tableSpesification th {
  font-family: "Monospace", serif, sans-serif;
  font-size: 12px;
  text-align: center;
  padding: 10px;
  background-color: #F2F2F2;
}
.tableSpesification td {
  padding-top: 10px;
  padding-right: 0;
  width: 100%;
  font-family: "Monospace", sans-serif, serif;
  font-size: 8px; 
  border-bottom: 1px solid #f2f2f2;
  border-collapse: collapse;
}

</style>
</head>

<body>

<div class="relative">
 <img class="logo" src="arians/img/logo.png">
  <div class="titlecard">CONTROL CARD ICT MAINTENANCE</div>

  <?php if($ar['id_schedule'] == 0) : ?>
    <h4 class="blink">Please set this PC in schedule menu!</h4>
  <?php else: ?>

  <p>
    <div style="width: 100%;">
    <table class="tableUser">
      <tr>
        <td class="mutted rights">Name:</td>
        <td><?=$ar['first_name']?></td>
        <td class="mutted rights">Room:</td>
        <td class="lefts"><?=$ar['room_name']?></td>
      </tr>
      <tr>
        <td class="mutted rights">Location:</td>
        <td class="lefts"><?=$ar['locations_name']?></td>
        <td class="mutted rights">Code:</td>
        <td class="lefts"><?=$ar['codefication']?></td>
      </tr>
    </table>
  </div>

  </p>
<?php endif; ?>

<div class="tops"></div>

<br />
<p>
  <div class="centers">
  <table class="tableMaintenance">
    <tr><th colspan="4">SCHEDULE MAINTENANCE <?php echo date("Y")?></th></tr>
    <tr>
      <td class="bolds">Month</td>
      <td class="bolds">Status</td>
      <td class="bolds" width="45">P I C</td>
      <td class="bolds">Initial</td>
    </tr>
      <tr>
          <?php function serialize_to_string($serial) {
            $result = unserialize($serial);
            return implode('<p>', $result);
            }
          ?>
          <?php if($ar['id_schedule'] == 0) : ?>
            <td colspan="4" style="padding:25px;"><span class="blink">NO DATA TO DISPLAYED</span></td>
          <?php else: ?>
            <td style="padding-top:20px;"><?php echo serialize_to_string($ar['month_name']) ?></td>
            <td></td>
            <td></td>
            <td></td>
          <?php endif; ?>            
      </tr>
    </table>
  
  <p>
<div class="mutted" style="text-align: center; padding-top: 7px"><small>&copy; <?php echo date("Y")?> IT Operations | www.it.ffup.org</small></div>
</div>
</div>


<!-- ================================================ -->

<div class="absolute">
  <table class="tableSpesification">
    <thead>
      <tr><th colspan="8">COMPUTER SPECIFICATIONS</th></tr>
    </thead>
    <br />
      <tbody>
      <tr>
        <td style="text-align:center">Casing</td>
        <td><?=$ar['casing']?></td>
        <td style="text-align:center">Monitor</td>
        <td><?=$ar['monitor']?></td>
        <td style="text-align:center">Keyboard</td>
        <td><?=$ar['keyboard']?></td>
        <td style="text-align:center">Mouse</td>
        <td><?=$ar['mouse']?></td>
      </tr>
      <tr>
        <td style="text-align:center">Mainboard</td>
        <td><?=$ar['mainboard']?></td>
        <td style="text-align:center">CPU</td>
        <td><?=$ar['processor']?></td>
        <td style="text-align:center">HDD</td>
        <td><?=$ar['harddrive']?></td>
        <td style="text-align:center">RAM</td>
        <td><?=$ar['ram']?></td>
      </tr>
      <tr>
        <td style="text-align:center">VGA</td>
        <td><?=$ar['vga']?></td>
        <td style="text-align:center">CD-Room</td>
        <td><?=$ar['cdroom']?></td>
        <td style="text-align:center">LAN-Card</td>
        <td><?=$ar['lancard']?></td>
        <td style="text-align:center">FAN</td>
        <td><?=$ar['fan']?></td>
      </tr>
      <tr>
        <td style="text-align:center">Power Supply</td>
        <td><?=$ar['powersupply']?></td>
        <td style="text-align:center">Printer</td>
        <td><?=$ar['printer']?></td>
        <td style="text-align:center">Scanner</td>
        <td><?=$ar['scanner']?></td>
        <td style="text-align:center">Year Acq</td>
            <td><?=$ar['acquisition']?></td>
        
      </tr>       
      </tbody>
    </table>

   
    <!-- TABLE NETWORKING -->
      <table class="tableSpesification">
        <thead>
          <tr><th colspan="6">NETWORKING</th></tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align:center">IP Address</td>
                <td><?=$ar['ipaddress']?></td>
                <td style="text-align:center">Netmask</td>
                <td><?=$ar['netmask']?></td>
                <td style="text-align:center">Gateway</td>
                <td><?=$ar['gateway']?></td>
              </tr>
              <tr>
                <td style="text-align:center">DNS Server</td>
                <td><?=$ar['dnsserver']?></td>
                <td style="text-align:center">Mac Address</td>
                <td><?=$ar['macaddress']?></td>
                <td style="text-align:center">IP TYPE</td>
                <td><?=$ar['ip_type']?></td>
              </tr>
            </tbody>
      </table>
      
      <p class="mutted" style="text-align: center; padding-top: 8px">&copy; <?php echo date("Y")?> IT Operations | www.it.ffup.org</p>
  </div>

</div>



</body>
</html>
