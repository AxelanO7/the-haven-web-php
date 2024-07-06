<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Karyawan</h1>

	<a href="<?= base_url('Karyawan'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fas fa-fw fa-edit"></i> Edit Data Karyawan</h6>
    </div>
	
	<?php echo form_open('Karyawan/update/'.$karyawan->id_karyawan); ?>
	<!-- <?php
		echo $karyawan->id_departemen;
		echo $karyawan->nama_karyawan;
	?> -->
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_karyawan', $karyawan->id_karyawan) ?>
				<?php
				foreach($departemens as $departemen){
					$himpunans = $this->Karyawan_model->get_departemen();
				?>
			<?php } ?>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">ID Departemen</label>
					<select name="id_departemen" required="" class="form-control">
						<option value="<?php echo "$karyawan->id_departemen" ?>"><?php echo "$karyawan->id_departemen" ?></option>
						<option value="">--Pilih--</option>
						<?php
							foreach ($himpunans as $himpunan){
						?>
						<option value="<?php echo "$himpunan->id_departemen" ?>"><?php echo "$himpunan->nama_departemen" ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="row">
				<?php echo form_hidden('id_karyawan', $karyawan->id_karyawan) ?>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Kode Karyawan</label>
					<input autocomplete="off" type="text" name="kode_karyawan" value="<?php echo $karyawan->kode_karyawan ?>" required class="form-control"/>
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Nama Karyawan</label>
					<input autocomplete="off" type="text" name="nama_karyawan" value="<?php echo $karyawan->nama_karyawan ?>" required class="form-control"/>
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Posisi Karyawan</label>
					<input autocomplete="off" type="text" name="posisi" value="<?php echo $karyawan->posisi ?>" required class="form-control"/>
				</div>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Jenis Kelamin</label>
					<select name="jenis_kelamin" value="<?php echo $karyawan->jenis_kelamin ?>" class="form-control">
						<option value="<?php echo "$karyawan->jenis_kelamin" ?>"><?php echo "$karyawan->jenis_kelamin" ?></option>
						<option>--Pilih--</option>
						<option value="Laki-laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>