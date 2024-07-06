<?php $this->load->view('layouts/footer_admin'); ?>
<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Nilai</h1>

	<a href="<?= base_url('Nilai'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Edit Data Nilai</h6>
    </div>
	
	<?php echo form_open('Nilai/update/'.$Nilai->id_nilai); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_nilai', $Nilai->id_nilai) ?>
				<?php
				foreach($karyawans as $karyawan){
					$karyawanss = $this->Nilai_model->get_karyawan();
				?>
				<?php } ?>
					<div class="form-group col-md-4">
						<label class="font-weight-bold">Nama Karyawan</label>
					</div>
					<div class="form-group col-md-8">
						<select name="id_karyawan" required="" class="form-control">
							<option value="<?php echo("$karyawan->id_karyawan") ?>"><?php echo("$karyawan->nama_karyawan") ?></option>
							<option value="">--Pilih--</option>
							<?php
								foreach ($karyawanss as $karyawann){
							?>
							<option value="<?php echo "$karyawann->id_karyawan" ?>"><?php echo "$karyawann->nama_karyawan" ?></option>
							<?php } ?>
						</select>
					</div>
			</div>
			<div class="row">
				<?php foreach ($variabel as $key): ?>
					<div class="form-group col-md-4">
						<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
					</div>
					<div class="form-group col-md-8">
						<select name="id_subkriteria_fuzzy" required="" class="form-control">
							<option value="<?php echo("$Nilai->id_subkriteria_fuzzy") ?>"><?php echo("$Nilai->nama_subkriteria") ?></option>
							<option value="">--Pilih--</option>
							<?php
								foreach ($subkriteriaa as $subkriteria){
							?>
							<option value="<?php echo "$subkriteria->id_subkriteria_fuzzy" ?>"><?php echo "$subkriteria->nama_subkriteria" ?></option>
							<?php } ?>
						</select>
					</div>
				<?php endforeach ?>	 
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>