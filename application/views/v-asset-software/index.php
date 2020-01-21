<script type="text/javascript">function del() {return confirm('Are you sure to remove this software from list?');}</script>

  <?php
  $perPage = 10;
  $keywords = $this->input->get('keywords');
  if (isset($keywords)) {
  	$page = $this->uri->segment(3);
  }else{
  	$page = $this->uri->segment(2);
  }
  $i = isset($page) ? $page * $perPage - $perPage : 0;
  ?>

  <div class='panel panel-default'>
  	<div class='panel-heading'>

      <div class="searching">
  			<div id="panelMenu" class="abcd">
  				<a href="javascript:void(0)" class="closebtn rotation" onclick="closePM()"> &times; </a>
  				<p></p>
  				<p>
  					<fieldset>
  						<legend>Search Name or Category</legend>
  							<?= form_open('asset_software/search', ['method' => 'GET']) ?>
  							<?= form_input('keywords', $this->input->get('keywords'), ['placeholder' => 'writing here..']) ?>
  							<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-search"></i>', 'class' => 'btn btn-default']) ?>
  							<?= form_close() ?>
  					</fieldset>
  					<p>
  						<hr class="dashboard">&nbsp;
  						<?= anchor("asset_software/create", '<i class="fa fa-edit"></i> Add New', ['class' => 'btn btn-primary']) ?>
  						<?= anchor("asset_software/printAll", '<i class="fa fa-print"></i> Print Table', ['class' => 'btn btn-warning', 'target' => '_blank']) ?>

  						<p></p>&nbsp;
  						<?= anchor("asset_category", '<i class="fa fa-arrow-circle-left"></i> Category', ['class' => 'btn btn-danger']) ?>

  					</div> <!--id panelMenu -->

  				</div><!--searching-->
  				<button type="button" class="rotation circle info " onclick="openPM()"><i class="fa fa-align-center fa-2x"></i> </button>
  			<div class="clear"></div>
  		</div><!--end heading-->


  <div class='panel-body'>
  <?php if($asset_software): ?>
  	<div style="overflow-x:auto;">
  		<table><thead>
  		<tr>
  		<th>No.</th>
  		<th>Software Name</th>
  		<th><i class="fa fa-unlink"></i> Asset Category</th>
  		<th>Vendor</th>
  		<th>Lisence Key</th>
  		<th><i class="fa fa-unlink"></i> Lisence Type</th>
  		<th><i class="fa fa-calendar"></i> Acquisition</th>
  		<th><i class="fa fa-calendar-o"></i> Expires Date</th>
  		<th>Serial Number</th>
  		<th>Price</th>
  		<th colspan="3"><i class="fa fa-sitemap"></th>
  		</tr>
  		</thead>
  		<tbody>
  		<?php foreach ($asset_software as $ar): ?>
  		<?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
  		<td><?= ++$i ?></td>
  		<td><?= $ar->sf_name ?></td>
  		<td><?= $ar->asset_cat_name ?></td>
  		<td><?= $ar->sf_vendor ?></td>
  		<td><?= $ar->sf_lisence_key ?></td>
  		<td><?= $ar->lisence_name ?></td>
  		<td><?= $ar->sf_acquisition_date ?></td>
      <td  align="center"><?= $ar->sf_expiry_date ?></td>
  		<td align="center"><?= $ar->sf_serial_number ?></td>
  		<td><?= $ar->sf_price ?></td>

  		<td align="center"><?= anchor("asset_software/edit/".sha1($ar->id), '&nbsp;&nbsp;', ['class' => 'btn btn-detail', 'title' => 'Detail']) ?></td>
  		<td align="center"><?= anchor("asset_software/delete/".sha1($ar->id), '&nbsp;&nbsp;', array('class' => 'btn btn-trash', 'title' => 'Delete', 'onclick' => 'return del()')) ?></td>
  		</tr>
  		<?php endforeach ?>
  		</tbody>
  		<tfoot><tr></tr></tfoot>
  		</table>
  		</div><!--end overflow-x-->
  		<div class="pagination">
  		<strong> Total Entry : <?= isset($jumlah) ? $jumlah : '' ?></strong>
  		<?php if ($pagination): ?>
  		<span class="right"><?= $pagination ?></span>
  		<?php else: ?>&nbsp;<?php endif ?>
  		</div>
  <?php else: ?>
  <div class="no_result">Empty result in database, please create new for showing table.</div>
  <?php endif ?>

  </div></div></div>

  <script>
  	function openPM() {
  		document.getElementById("panelMenu").style.width = "250px";
  		document.body.style.backgroundColor = "orange";
  	}
  	function closePM() {
  		document.getElementById("panelMenu").style.width = "0";
  		document.body.style.backgroundColor = "white";
  	}
  </script>
