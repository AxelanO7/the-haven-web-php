<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Subkriteria Fuzzy</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<?php if ($variabel==NULL): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Himpunan Fuzzy</h6>
    </div>

    <div class="card-body">
		<div class="alert alert-info">
			Data masih kosong.
		</div>
	</div>
</div>
<?php endif ?>

<?php foreach ($variabel as $key): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <div class="d-sm-flex align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Fungsi Keanggotaan Kriteria <?= $key->nama_kriteria ?></h6>
			
			<a href="#tambah<?= $key->id_kriteria ?>" data-toggle="modal" class="btn btn-sm btn-haven"> <i class="fa fa-plus"></i> Tambah Data </a>
		</div>
    </div>
	
	<div class="modal fade" id="tambah<?= $key->id_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah <?= $key->nama_kriteria ?></h5>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<?= form_open('Subkriteria/store') ?>
					<div class="modal-body">
						<input type="text" name="id_kriteria" value="<?= $key->id_kriteria ?>" hidden>
						<div class="form-group">
							<label class="font-weight-bold">Nama Subkriteria Fuzzy</label>
							<input autocomplete="off" type="text" class="form-control" name="nama_subkriteria" required>
						</div>
						<div class="form-group">
							<label class="font-weight-bold">Kurva</label>
							<select class="form-control" name="kurva" id="pilihan_<?= $key->id_kriteria ?>" required> 
								<option value="">--Pilih Kurva--</option>
								<option value="Linier Naik">Linier Naik</option>
								<option value="Linier Turun">Linier Turun</option>
								<option value="Segitiga">Segitiga</option>
								<option value="Trapesium">Trapesium</option>
							</select>
						</div>
						<div class="form-group d-none" id="div_a<?= $key->id_kriteria ?>">
							<label class="font-weight-bold">a</label>
							<input autocomplete="off" type="number" step="0.01" id="a<?= $key->id_kriteria ?>" name="a" class="form-control">
						</div>
						<div class="form-group d-none" id="div_b<?= $key->id_kriteria ?>">
							<label class="font-weight-bold">b</label>
							<input autocomplete="off" type="number" step="0.01" id="b<?= $key->id_kriteria ?>" name="b" class="form-control">
						</div>
						<div class="form-group d-none" id="div_c<?= $key->id_kriteria ?>">
							<label class="font-weight-bold">c</label>
							<input autocomplete="off" type="number" step="0.01" id="c<?= $key->id_kriteria ?>" name="c" class="form-control">
						</div>
						<div class="form-group d-none" id="div_d<?= $key->id_kriteria ?>">
							<label class="font-weight-bold">d</label>
							<input autocomplete="off" type="number" step="0.01" id="d<?= $key->id_kriteria ?>" name="d" class="form-control">
						</div>
						
						<div id="tfoto_a<?= $key->id_kriteria ?>" class="d-none">
							<img src="<?= base_url('assets/')?>img/naik.png" class="img-fluid"/>
						</div>
						<div id="tfoto_b<?= $key->id_kriteria ?>" class="d-none">
							<img src="<?= base_url('assets/')?>img/turun.png" class="img-fluid"/>
						</div>
						<div id="tfoto_c<?= $key->id_kriteria ?>" class="d-none">
							<img src="<?= base_url('assets/')?>img/segitiga.png" class="img-fluid" />
						</div>
						<div id="tfoto_d<?= $key->id_kriteria ?>" class="d-none">
							<img src="<?= base_url('assets/')?>img/trapesium.png" class="img-fluid"/>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
						<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">						
						<th width="5%">No</th>
						<th>Nama Subkriteria Fuzzy</th>
						<th width="15%">Jenis Kurva</th>
						<th width="20%">Domain</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$himpunan1 = $this->Subkriteria_model->data_subkriteria_fuzzy($key->id_kriteria);
						$no=1;
						foreach ($himpunan1 as $key):
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $key['nama_subkriteria'] ?></td>
						<td><?= $key['kurva'] ?></td>
						<td>
							[<?= $key['a'] ?>] 
							[<?= $key['b'] ?>] 
							<?php
							if(($key['kurva'] == "Segitiga") || ($key['kurva'] == "Trapesium")){
							?>
							[<?= $key['c'] ?>] 
							<?php
							}
							if($key['kurva'] == "Trapesium"){
							?>
							[<?= $key['d'] ?>]
							<?php
							}
							?>
						</td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="modal" title="Edit Data" href="#editsk<?= $key['id_subkriteria_fuzzy'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Subkriteria/destroy/'.$key['id_subkriteria_fuzzy']) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
							</div>
						</td>
					</tr>

					<!-- Modal -->
					<div class="modal fade" id="editsk<?= $key['id_subkriteria_fuzzy'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?= $key['nama_subkriteria'] ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Subkriteria/update/'.$key['id_subkriteria_fuzzy']) ?>
									<?= form_hidden('id_subkriteria_fuzzy', $key['id_subkriteria_fuzzy']) ?>
									<div class="modal-body">
										<input type="text" name="id_kriteria" value="<?= $key['id_kriteria'] ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold">Nama Subkriteria Fuzzy</label>
											<input autocomplete="off" type="text" class="form-control" name="nama_subkriteria" value="<?= $key['nama_subkriteria'] ?>" required>
										</div>
										<div class="form-group">
											<label class="font-weight-bold">Kurva</label>
											<select class="form-control" name="kurva" required id="epilihan_<?=$key['id_subkriteria_fuzzy']?>"> 
												<option value="">--Pilih Kurva--</option>
												<option value="Linier Naik" <?php if($key['kurva'] == "Linier Naik"){echo "selected";}?>>Linier Naik</option>
												<option value="Linier Turun" <?php if($key['kurva'] == "Linier Turun"){echo "selected";}?>>Linier Turun</option>
												<option value="Segitiga" <?php if($key['kurva'] == "Segitiga"){echo "selected";}?>>Segitiga</option>
												<option value="Trapesium" <?php if($key['kurva'] == "Trapesium"){echo "selected";}?>>Trapesium</option>
											</select>
										</div>
										<div class="form-group" id="ediv_a<?= $key['id_subkriteria_fuzzy'] ?>">
											<label class="font-weight-bold">Domain (a)</label>
											<input autocomplete="off" type="number" step="0.01" name="a" value="<?= $key['a'] ?>" id="ea<?= $key['id_subkriteria_fuzzy'] ?>" class="form-control">
										</div>
										<div class="form-group" id="ediv_b<?= $key['id_subkriteria_fuzzy'] ?>">
											<label class="font-weight-bold">Domain (b)</label>
											<input autocomplete="off" type="number" step="0.01" name="b" value="<?= $key['b'] ?>" id="eb<?= $key['id_subkriteria_fuzzy'] ?>" class="form-control">
										</div>
										<div class="form-group <?php if(($key['kurva'] == "Linier Turun") || ($key['kurva'] == "Linier Naik")){echo "d-none";}?>" id="ediv_c<?= $key['id_subkriteria_fuzzy'] ?>">
											<label class="font-weight-bold">Domain (c)</label>
											<input autocomplete="off" type="number" step="0.01" name="c" value="<?= $key['c'] ?>" id="ec<?= $key['id_subkriteria_fuzzy'] ?>" class="form-control">
										</div>
										<div class="form-group <?php if(($key['kurva'] == "Linier Turun") || ($key['kurva'] == "Linier Naik") || ($key['kurva'] == "Segitiga")){echo "d-none";}?>" id="ediv_d<?= $key['id_subkriteria_fuzzy'] ?>">
											<label class="font-weight-bold">Domain (d)</label>
											<input autocomplete="off" type="number" step="0.01" name="d" value="<?= $key['d'] ?>" id="ed<?= $key['id_subkriteria_fuzzy'] ?>" class="form-control">
										</div>
										<div id="etfoto_a<?= $key['id_subkriteria_fuzzy'] ?>" class="<?php if($key['kurva'] != "Linier Naik"){echo "d-none";}?>">
											<img src="<?= base_url('assets/')?>img/naik.png" class="img-fluid"/>
										</div>
										<div id="etfoto_b<?= $key['id_subkriteria_fuzzy'] ?>" class="<?php if($key['kurva'] != "Linier Turun"){echo "d-none";}?>">
											<img src="<?= base_url('assets/')?>img/turun.png" class="img-fluid"/>
										</div>
										<div id="etfoto_c<?= $key['id_subkriteria_fuzzy'] ?>" class="<?php if($key['kurva'] != "Segitiga"){echo "d-none";}?>">
											<img src="<?= base_url('assets/')?>img/segitiga.png" class="img-fluid" />
										</div>
										<div id="etfoto_d<?= $key['id_subkriteria_fuzzy'] ?>" class="<?php if($key['kurva'] != "Trapesium"){echo "d-none";}?>">
											<img src="<?= base_url('assets/')?>img/trapesium.png" class="img-fluid"/>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
                <?php
					$no++;
					endforeach
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php endforeach ?>	  

<?php foreach ($variabel as $key): ?>
<script>
	$(document).ready(function() {
		$('#pilihan_<?= $key->id_kriteria ?>').change(function() {
			var pilihan = $('#pilihan_<?= $key->id_kriteria ?>').val();
			if (pilihan == 'Linier Naik') {
				$('#a<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#b<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				
				$('#div_a<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_b<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#a<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#b<?= $key->id_kriteria ?>').attr('class', 'form-control');
				
				$('#div_c<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#div_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#tfoto_a<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#tfoto_b<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_c<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#a<?= $key->id_kriteria ?>').val('');
				$('#b<?= $key->id_kriteria ?>').val('');
				$('#c<?= $key->id_kriteria ?>').val('');
				$('#d<?= $key->id_kriteria ?>').val('');
			}
			else if (pilihan == 'Linier Turun') {
				$('#a<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#b<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				
				$('#div_a<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_b<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#a<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#b<?= $key->id_kriteria ?>').attr('class', 'form-control');
				
				$('#div_c<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#div_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#tfoto_b<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#tfoto_a<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_c<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#a<?= $key->id_kriteria ?>').val('');
				$('#b<?= $key->id_kriteria ?>').val('');
				$('#c<?= $key->id_kriteria ?>').val('');
				$('#d<?= $key->id_kriteria ?>').val('');
			}
			
			else if (pilihan == 'Segitiga') {
				$('#a<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#b<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#c<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				
				$('#div_a<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_b<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_c<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#a<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#b<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#c<?= $key->id_kriteria ?>').attr('class', 'form-control');
				
				$('#div_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#tfoto_c<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#tfoto_a<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_b<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_d<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#a<?= $key->id_kriteria ?>').val('');
				$('#b<?= $key->id_kriteria ?>').val('');
				$('#c<?= $key->id_kriteria ?>').val('');
				$('#d<?= $key->id_kriteria ?>').val('');
			}
			
			else if (pilihan == 'Trapesium') {
				$('#a<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#b<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#c<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#d<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				
				$('#div_a<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_b<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_c<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#div_d<?= $key->id_kriteria ?>').attr('class', 'd-block form-group');
				$('#a<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#b<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#c<?= $key->id_kriteria ?>').attr('class', 'form-control');
				$('#d<?= $key->id_kriteria ?>').attr('class', 'form-control');
				
				$('#tfoto_d<?= $key->id_kriteria ?>').removeAttr('class', 'd-none');
				$('#tfoto_a<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_b<?= $key->id_kriteria ?>').attr('class', 'd-none');
				$('#tfoto_c<?= $key->id_kriteria ?>').attr('class', 'd-none');
				
				$('#a<?= $key->id_kriteria ?>').val('');
				$('#b<?= $key->id_kriteria ?>').val('');
				$('#c<?= $key->id_kriteria ?>').val('');
				$('#d<?= $key->id_kriteria ?>').val('');
			}
		});
	});
</script>

<?php
$himpunan1 = $this->Subkriteria_model->data_subkriteria_fuzzy($key->id_kriteria);
foreach ($himpunan1 as $key):
?>

<script>
	$(document).ready(function() {
		$('#epilihan_<?= $key['id_subkriteria_fuzzy'] ?>').change(function() {
			var epilihan = $('#epilihan_<?= $key['id_subkriteria_fuzzy'] ?>').val();
			if (epilihan == 'Linier Naik') {
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				
				$('#ediv_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				
				$('#ediv_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#ediv_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#etfoto_a<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#etfoto_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').val('');
			}
			else if (epilihan == 'Linier Turun') {
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				
				$('#ediv_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				
				$('#ediv_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#ediv_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#etfoto_b<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#etfoto_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').val('');
			}
			
			else if (epilihan == 'Segitiga') {
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				
				$('#ediv_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				
				$('#ediv_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#etfoto_c<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#etfoto_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').val('');
			}
			
			else if (epilihan == 'Trapesium') {
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				
				$('#ediv_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ediv_d<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-block form-group');
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'form-control');
				
				$('#etfoto_d<?= $key['id_subkriteria_fuzzy'] ?>').removeAttr('class', 'd-none');
				$('#etfoto_a<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_b<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				$('#etfoto_c<?= $key['id_subkriteria_fuzzy'] ?>').attr('class', 'd-none');
				
				$('#ea<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#eb<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ec<?= $key['id_subkriteria_fuzzy'] ?>').val('');
				$('#ed<?= $key['id_subkriteria_fuzzy'] ?>').val('');
			}
		});
	});
</script>

<?php
	endforeach;
endforeach;
?>	  

<?php $this->load->view('layouts/footer_admin'); ?>