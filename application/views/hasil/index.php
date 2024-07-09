<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>

	<a href="<?= base_url('Laporan'); ?>" class="btn btn-haven"> <i class="fa fa-print"></i> Cetak Data </a>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Data Hasil Akhir</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-haven text-white" style="background-color: #8D9A66">
					<tr align="center">
						<th width="5%" class="align-middle">No</th>
						<th class="align-middle">Nama Alternatif</th>
						<?php
						foreach ($variabels as $variabel) {
							$id_kriteria = $variabel->id_kriteria;
							$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
							foreach ($himpunans as $himpunan) {
								$him = $this->Perhitungan_model->get_himpunan_row($id_kriteria);
								if ($him->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy) {
						?>
									<th class="align-middle">
										<?= $variabel->nama_kriteria ?><br />
										<?= $himpunan->nama_subkriteria ?></th>
						<?php
								}
							}
						}
						?>
						<th class="align-middle">Fire Strength</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($alternatifs as $alternatif) :
						$id_karyawan = $alternatif->id_karyawan;
					?>
						<tr align="center">
							<td><?= $no; ?></td>
							<td align="left"><?= $alternatif->nama_karyawan ?></td>
							<?php
							$tot = 0;
							foreach ($variabels as $variabel) {
								$id_kriteria = $variabel->id_kriteria;
								$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
								foreach ($himpunans as $himpunan) {
									$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
									$hasil = $this->Perhitungan_model->get_hasil($id_karyawan, $id_kriteria);
									if ($hasil->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy) {
										echo '<td>';
										echo $hasil->f;
										echo '</td>';
									}
								}
								$tot += $hasil->f;
							}
							?>
							<td><?= $tot / count($variabels); ?></td>
						</tr>
					<?php
						$no++;
					endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
$this->load->view('layouts/footer_admin');
?>