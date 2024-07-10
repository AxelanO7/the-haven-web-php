<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Appraisal</h1>

	<a href="<?= base_url('Appraisal/create'); ?>" class="btn btn-haven"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<!-- ADMIN -->
<?php if ($this->session->userdata('id_user_level') == ('1')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
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
						$no = 1;
						foreach ($list as $data => $Appraisal) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $Appraisal->kode_karyawan ?></td>
								<td><?php echo $Appraisal->nama_karyawan ?></td>
								<?php $cek_tombol = $this->Appraisal_model->untuk_tombol($Appraisal->id_karyawan); ?>

								<td>
									<?php if ($cek_tombol == 0) { ?>
										<a data-toggle="tooltip" data-placement="bottom" title="Tambah Data" href="<?= base_url('Appraisal/create/' . $Appraisal->id_karyawan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"> Input</i></a>
									<?php } else { ?>
										<a data-toggle="tooltip" data-placement="bottom" title="Lihat Data" href="<?= base_url('Appraisal/lihat/' . $Appraisal->id_karyawan); ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
									<?php } ?>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HRM -->
<?php if ($this->session->userdata('id_user_level') == ('3')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Kode Karyawan</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($list as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->kode_karyawan ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<?php $cek_tombol = $this->Appraisal_model->untuk_tombol($value->id_karyawan); ?>

								<td>
									<?php if ($cek_tombol == 0) { ?>
										<a href="<?= base_url('Appraisal/create/' . $value->id_karyawan) ?>" class="btn btn-danger btn-sm"><i class="fa fa-plus"></i> Input</a>
									<?php } else { ?>
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
									<?php } ?>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD AG -->
<?php if ($this->session->userdata('username') == ('hod.ag')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodag as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD ENG -->
<?php if ($this->session->userdata('username') == ('hod.eng')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodeng as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD FBK -->
<?php if ($this->session->userdata('username') == ('hod.fbk')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodfbk as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD FBS -->
<?php if ($this->session->userdata('username') == ('hod.fbs')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodfbs as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD FO -->
<?php if ($this->session->userdata('username') == ('hod.fo')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodfo as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD HK -->
<?php if ($this->session->userdata('username') == ('hod.hk')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodhk as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD HC -->
<?php if ($this->session->userdata('username') == ('hod.hc')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodhc as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- HOD SM -->
<?php if ($this->session->userdata('username') == ('hod.sm')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($listhodsm as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td>
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif; ?>

<!-- STAFF -->
<?php if ($this->session->userdata('id_user_level') == ('5')) : ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Appraisal</h6>
		</div>
		<?php
		$username = $this->session->userdata('username');
		?>
		<?php echo form_open('Appraisal' . $this->session->userdata('username')); ?>
		<div class="card-body">
			<?php echo form_hidden('username', $this->session->userdata('username')) ?>
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Karyawan</th>
							<th>Tanggal Pengisian</th>
							<!-- <th width="15%">Aksi</th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($staff as $data => $value) {
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td><?php echo $value->nama_karyawan ?></td>
								<td><?php echo $value->tgl_pengisian ?></td>
								<!-- <td>
									<div class="btn-group" role="group">
										<a href="<?= base_url('Appraisal/lihat/' . $value->nama_karyawan) ?>" class="btn btn-haven btn-sm"><i class="fa fa-eye"> Lihat</i></a>
										<!-- <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
									</div>
								</td> 
							</tr>
						<?php
							$no++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<?php echo form_close() ?>
	</div>
<?php endif; ?>


<?php $this->load->view('layouts/footer_admin'); ?>