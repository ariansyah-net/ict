<div class="container">
	<div class="form-center">
		<?= form_open($form_action) ?>
			<?= isset($input->id_problem) ? form_hidden('id_problem', $input->id_problem) : '' ?>
				<?= isset($input->id_users) ? form_input(['type' => 'hidden', 'name' => 'id_users', 'id' => 'id-users', 'value' => $input->id_users]) : '' ?>
					<?= form_hidden('author', $this->session->userdata('nama_admin'), $input->author) ?>
						<input type="hidden" name="period" value="<?php echo date('Y'); ?>">
<!-- Date -->
<div class="row">
	<?= form_label('Date :', 'date', ['class' => 'col-3 label']) ?>
		<?php $bangarie = 'id="picker" class="col-5" placeholder="you must following format!"';
			echo form_input('date', $input->date, $bangarie); ?>
				<span id="font-error"><?= form_error('date');?></span>
					</div>
<!--Selected Users -->

						<div class="row">
							<?= form_label('', 'id_users', ['class' => 'col-3 label']) ?>
								<label for="userlist" class="combostyle">Show user list
									<input type="checkbox" onclick="javascript:checkUser();" id="userlist">
										<span class="combocheck"></span> </label>
											<label for="other" class="combostyle">Spesific User
												<input type="checkbox" onclick="javascript:checkOther();" id="other">
													<span class="combocheck"></span> </label>
														</div>
<!-- User List -->
									<div class="row" style="display:none" id="listuser">
									<?= form_label('Select User List :', 'search_user', ['class' => 'col-3 label']) ?>
										<input type="text"  class="col-8" name="search_user" value="<?= $input->nama_user ?>" id="search_user" onkeyup="userAC()" placeholder="Write Something..">
											<span id="font-error"><?= form_error('id_users');?></span>
												<ul id="daftar_pengguna" class="live-search-list"></ul>
													</div>
<!-- Other User -->
								<div class="row" style="display:none" id="otherUser">
									<?= form_label('Specific Name :', 'other_user', ['class' => 'col-3 label']) ?>
									<input type="text" id="otherUser"  class="col-8" name="other_user" value="<?= $input->other_user ?>" placeholder="Other User..">
										<span id="font-error"><?= form_error('other_user');?></span>
										</div>
<!-- Problem -->
											<div class="row">
										<?= form_label('What the Problem? :', 'title_problem', ['class' => 'col-3 label']) ?>
										<?= form_textarea(array('name' => 'title_problem', 'rows' => 1, 'class' => 'col-8', 'required' => 'required'), $input->title_problem) ?>
								<span id="font-error"><?= form_error('title_problem');?></span>
							</div>
<!-- FollowUp -->
					<div class="row">
				<?= form_label('Follow Up :', 'followup', ['class' => 'col-3 label']) ?>
				<?= form_textarea(array('name' => 'followup', 'rows' => 1, 'class' => 'col-8', 'required' => 'required'), $input->followup) ?>
		<span id="font-error"><?= form_error('followup');?></span>
	</div>
<!--Result-->
	<div class="row">
			<?= form_label('Result Status :', 'result', ['class' => 'col-3 label']) ?>
			<label for="ResultSolved" class="radiostyle"> Solved
			<?= form_radio(['id'=>'ResultSolved', 'onclick'=>'checkResult()', 'class'=>'radiostyle', 'name' => 'result'], 'success', isset($input->result) && ($input->result == 'success') ? true : false) ?>
			<span class="checkmark"></span></label>

			<label for="ResultProccess" class="radiostyle"> On Process
			<?= form_radio(['id'=>'ResultProccess', 'onclick'=>'checkResult2()', 'class'=>'radiostyle', 'name' => 'result'], 'repaired', isset($input->result) && ($input->result == 'repaired') ? true : false) ?>
			<span class="checkmark"></span></label>
			<span id="font-error"><?= form_error('result') ?></span>
	</div>

<!--Result Date-->
<div class="row" id="resultdate">
	<?= form_label('Result Date :', 'result_date', ['class' => 'col-3 label']) ?>
		<?php $bangarie = 'id="picker2" class="col-5" placeholder="End Process"';
			echo form_input('result_date', $input->result_date, $bangarie); ?>
				<span id="font-error"><?= form_error('result_date');?></span>
					</div>
<!-- Information -->
							<div class="row" style="display:none;" id="noted">
						<?= form_label('Note :', 'information', ['class' => 'col-3 label']) ?>
					<?= form_textarea(array('name' => 'information', 'rows' => 2, 'class' => 'col-8'), $input->information) ?>
				<span id="font-error"><?= form_error('information') ?></span>
			</div>

<!-- Actions -->
<hr class="dashboard">
<div class="row">
	<?= form_button(' ', '<i class="fa fa-arrow-left"></i> &nbsp;Back &nbsp;', array('class' => 'btn btn-success', 'onclick' => 'back()')) ?>
		<span class="right">
			<?= form_button(['type' => 'submit', 'content' => '<i class="fa fa-save"></i> &nbsp; Save &nbsp;', 'class' => 'btn btn-primary']) ?>
				</span>
					</div>

				<?=form_close() ?>
					</div><!--end form-public-->
						</div><!--end container-->

<script>
	function checkUser() {
		if(document.getElementById('userlist').checked){
			document.getElementById('listuser').style.display = 'inline';
			document.getElementById('otherUser').style.display = 'none';
		}else {
		 document.getElementById('listuser').style.display = 'none';
		}
	}
	function checkOther() {
		if(document.getElementById('other').checked){
			document.getElementById('otherUser').style.display = 'block';
			// document.getElementById('listuser').style.display = 'none';
		}else {
		 document.getElementById('otherUser').style.display = 'none';
		}
	}
	function checkResult() {
	  if(document.getElementById('ResultSolved').checked == true){
			document.getElementById('resultdate').style.display = 'block';
			document.getElementById('noted').style.display = 'none';
	  } else {
			 document.getElementById('resultdate').style.display = 'none';
	  }
	}
	function checkResult2() {
		if(document.getElementById('ResultProccess').checked){
			document.getElementById('resultdate').style.display = 'none';
			document.getElementById('noted').style.display = 'inline';
		}else {
		 // document.getElementById('resultdate').style.display = 'none';
		 // document.getElementById('noted').style.display = 'inline';
		}
	}
</script>
