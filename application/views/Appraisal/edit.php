<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Appraisal</h1>

	<a href="<?= base_url('Appraisal'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fas fa-fw fa-edit"></i> Edit Data Appraisal</h6>
    </div>
	
	<?php echo form_open('Appraisal/update/'.$Appraisal->id_appraisal); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_appraisal', $Appraisal->id_appraisal) ?>
				<?php
				foreach($karyawans as $karyawan){
					$karyawanss = $this->Appraisal_model->get_karyawan();
				?>
				<?php } ?>
					<div class="form-group col-md-4">
						<label class="font-weight-bold">Nama Karyawan</label>
					</div>
					<div class="form-group col-md-8">
						<select name="id_karyawan" required="" disabled="" class="form-control">
							<option value="<?php echo("$Appraisal->id_karyawan") ?>"><?php echo("$karyawan->nama_karyawan") ?></option>
							<option value="">--Pilih--</option>
							<?php
								foreach ($karyawanss as $karyawansss){
							?>
							<option value="<?php echo "$karyawansss->id_karyawan" ?>"><?php echo "$karyawansss->nama_karyawan" ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="row">
				<div class="form-group col-md-4">
					<label class="font-weight-bold">Tanggal Pengisian</label>
				</div>
				<div class="form-group col-md-8">
					<input type="date" name="tgl_pengisian" class="form-control" value="<?php echo("$Appraisal->tgl_pengisian") ?>"/>
				</div>
			</div>
			<h5 class="mt-5 font-weight-bold">I. 5 KEY questions FOR A GREAT CONVERSATION</h5>
			<div class="row">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">How do you feel you are progressing this year? Think about which Key Performance Objectives / Key Job Responsibilities and / or Leadership Competencies / Service Behaviours you are most proud of.</label>
					<input autocomplete="off" type="text" name="progress" required class="form-control" value="<?php echo("$Appraisal->progress") ?>"/>
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">What kind of developments that you have made this year, which help you to archieve your Key Performance Objectives/Key Job Responsibilities and/or Leadership Competencies/Service Behaviours?</label>
					<input autocomplete="off" type="text" name="development" required class="form-control"  value="<?php echo("$Appraisal->development") ?>" />
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">What can you do in the remains of the year to deliver your strongest performance in the next year?</label>
					<input autocomplete="off" type="text" name="strongest_perform" required class="form-control" value="<?php echo("$Appraisal->strongest_perform") ?>" />
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">As your superior, do i give you enough time in gibving feedback in order to assist you to perform your best?</label>
					<input autocomplete="off" type="text" name="giving_feedback" required class="form-control" value="<?php echo("$Appraisal->giving_feedback") ?>" />
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">What kind of assistance do you expect from me as your superior to improve your performance / skills?</label>
					<input autocomplete="off" type="text" name="assistance" required class="form-control" value="<?php echo("$Appraisal->assistance") ?>" />
				</div>
			</div>
			<h5 class="mt-5 font-weight-bold">II. GENERAL ASSESSMENT</h5>
			<div class="row">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Subject's Main Strengths</label>
					<input autocomplete="off" type="text" name="main_strength" required class="form-control" value="<?php echo("$Appraisal->main_strength") ?>" />
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Employee's Main To Be Improved</label>
					<input autocomplete="off" type="text" name="tobe_improved" required class="form-control" value="<?php echo("$Appraisal->tobe_improved") ?>" />
				</div>
			</div>
			<h5 class="mt-5 font-weight-bold">III. TRAINING & DEVELOPMENT RECOMMENDATIONS</h5>
			<div class="row">
				<div class="form-group col-md-12">
					<label class="font-weight-bold">What training/courses do you expect company should give you to improve for your further development?</label>
					<input autocomplete="off" type="text" name="training_course" required class="form-control"  value="<?php echo("$Appraisal->training_course") ?>" />
				</div>
			</div>
			<h5 class="mt-5 font-weight-bold">IV. COMMENTS BY EMPLOYEE ON THE PERFORMANCE APPRAISAL PROCESS</h5>
			<textarea class="form-control" name="comment" autocomplete="off" value="<?php echo("$Appraisal->comment") ?>" ></textarea>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>