<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Karyawan</h1>

	<a href="<?= base_url('Karyawan/create'); ?>" class="btn btn-haven"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Karyawan</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<select name="tahun" id="tahun" class="form-control" style="width: 20%" onchange="window.location.href='<?= base_url('Karyawan/index/'); ?>' + this.value">
				<option value="">Pilih Tahun</option>
				<?php
				if ($this->uri->segment(3) != "") {
					$year = $this->uri->segment(3);
				}
				for ($i = 2022; $i < 2025; $i++) {
					echo '<option value="' . $i . '"';
					if ($i == $year) {
						echo ' selected';
					}
					echo '>' . $i . '</option>';
				}
				?>
			</select>
			<br>
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Karyawan</th>
						<th>Departemen</th>
						<th>Nama Karyawan</th>
						<th>Posisi</th>
						<th>Jenis Kelamin</th>
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
							<td><?php echo $value->nama_departemen ?></td>
							<td><?php echo $value->nama_karyawan ?></td>
							<td><?php echo $value->posisi ?></td>
							<td><?php echo $value->jenis_kelamin ?></td>
							<td>
								<div class="btn-group" role="group">
									<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Karyawan/edit/' . $value->id_karyawan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Karyawan/destroy/' . $value->id_karyawan) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

<?php $this->load->view('layouts/footer_admin'); ?>