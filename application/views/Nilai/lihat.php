<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Nilai </h1>

	<a href="<?= base_url('Nilai'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Lihat Data Nilai</h6>
    </div>
	
	<?php echo form_open('Nilai/lihat'.$Nilai->nama_karyawan); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_karyawan', $Nilai->nama_karyawan) ?>
				<?php
				foreach($karyawans as $karyawan){
					$karyawanss = $this->Nilai_model->get_karyawan();
				?>
				<?php } ?>
					<div class="form-group col-md-4">
						<label class="font-weight-bold">Nama Karyawan</label>
					</div>
					<div class="form-group col-md-8">
						<select name="id_karyawan" required="" class="form-control" disabled="true">
							<option value="<?php echo("$Nilai->id_karyawan") ?>"><?php echo("$Nilai->nama_karyawan") ?></option>
							<option value="">--Pilih--</option>
							<?php
								foreach ($karyawanss as $karyawan){
							?>
							<option value="<?php echo "$karyawan->id_karyawan" ?>"><?php echo "$karyawan->nama_karyawan" ?></option>
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
						<select name="id_subkriteria_fuzzy" required="" class="form-control" disabled="true">
							<?php
								foreach ($subkriteriaa as $subkriteria){
							?>
							<option value="<?php echo("$subkriteria->id_subkriteria_fuzzy") ?>"><?php echo("$subkriteria->nama_subkriteria") ?></option>
							<option value="">--Pilih--</option>
							<option value="<?php echo "$subkriteria->id_subkriteria_fuzzy" ?>"><?php echo "$subkriteria->nama_subkriteria" ?></option>
							<?php } ?>
						</select>
					</div>
				<?php endforeach ?>	 
			</div>

		<div class="card-footer text-right">
            <?php
				$no=1;
				foreach ($list as $data => $value) {
			?>
			<?php
				$no++;
				}
			?>
				<div class="" role="group">					
					<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?=base_url('Nilai/edit/'.$value->id_nilai)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"> Edit Data</i></a>

					<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('Nilai/destroy/'.$value->id_nilai)?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus Data</i></a>
				</div>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>