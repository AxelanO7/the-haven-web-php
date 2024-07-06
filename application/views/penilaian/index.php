<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<!-- ADMIN -->
<?php if($this->session->userdata('id_user_level') == '1'): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- PIMPINAN -->
<?php if($this->session->userdata('id_user_level') == ('2')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input disabled="true" autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" disabled="true" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input disabled="true" autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" disabled="true" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HRD -->
<?php if($this->session->userdata('id_user_level') == ('3')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatif as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input disabled="true" autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" disabled="true" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input disabled="true" autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" disabled="true" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD AG -->
<?php if($this->session->userdata('username') == ('hod.ag')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatifag as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD ENG -->
<?php if($this->session->userdata('username') == ('hod.eng')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatifeng as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD FBK -->
<?php if($this->session->userdata('username') == ('hod.fbk')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatiffbk as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD FBS -->
<?php if($this->session->userdata('username') == ('hod.fbs')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatiffbs as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD FO -->
<?php if($this->session->userdata('username') == ('hod.fo')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatiffo as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD HK -->
<?php if($this->session->userdata('username') == ('hod.hk')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatifhk as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD HC -->
<?php if($this->session->userdata('username') == ('hod.hc')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatifhc as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<!-- HOD SM -->
<?php if($this->session->userdata('username') == ('hod.sm')): ?>
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Nama Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no=1;
					foreach ($alternatifsm as $keys): ?>
					<tr align="center">
						<td><?=$no ?></td>
						<td align="left"><?= $keys->kode_karyawan ?></td>
						<td align="left"><?= $keys->nama_karyawan ?></td>
						<?php $cek_tombol = $this->Penilaian_model->untuk_tombol($keys->id_karyawan); ?>

						<td>
						<?php if ($cek_tombol==0) { ?>
						<a data-toggle="modal" href="#set<?= $keys->id_karyawan ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
						<?php } else { ?>
						<a data-toggle="modal" href="#edit<?= $keys->id_karyawan ?>" class="btn btn-haven btn-sm"><i class="fa fa-edit"></i> Edit</a>
						<?php } ?>
						</td>
					</tr>
				
					<!-- Modal -->
					<div class="modal fade" id="set<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/tambah_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control"/>
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="edit<?= $keys->id_karyawan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Penilaian/update_penilaian') ?>
									<div class="modal-body">
										<?php foreach ($variabel as $key): ?>
										<input type="text" name="id_karyawan" value="<?= $keys->id_karyawan ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										<div class="form-group">
											<label class="font-weight-bold"><?= $key->nama_kriteria ?></label>
											<?php $nilai = $this->Penilaian_model->data_penilaian($keys->id_karyawan,$key->id_kriteria); ?>
											<input autocomplete="off" type="number" step="0.001" name="nilai[]" required class="form-control" value="<?= $nilai['nilai'] ?? 0 ?>" />
										</div>
										<?php endforeach ?>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
										<button type="submit" class="btn btn-haven"><i class="fa fa-save"></i> Update</button>
									</div>
								</form>
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
<?php endif; ?>

<?php $this->load->view('layouts/footer_admin'); ?>