<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Departemen</h1>

    <a href="<?= base_url('Departemen/create'); ?>" class="btn btn-haven"> <i class="fa fa-plus"></i> Tambah Data </a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Daftar Data Departemen</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%">No</th>
						<th>Nama Departemen</th>
						<th>Jumlah Karyawan</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; foreach ($listData as $data) { ?>
						<tr>
							<td align="center"><?= $no++; ?></td>
							<td><?= $data->nama_departemen; ?></td>
							<td align="center"><?= $data->length; ?></td>
							<td align="center">
								<a href="<?= base_url('Departemen/edit/' . $data->id_departemen); ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i></a>
								<a href="<?= base_url('Departemen/delete/' . $data->id_departemen); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash"></i></a>
							</td>
						</tr>
					<?php } ?>							
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php $this->load->view('layouts/footer_admin'); ?>