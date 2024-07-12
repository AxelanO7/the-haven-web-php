<?php
$this->load->view('layouts/header_admin');
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan</h1>
</div>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-haven">Hitung Berdasarkan Query</h6>
	</div>
	<form action="<?= base_url('Perhitungan'); ?>" method="POST">
		<div class="card-body">
			<div class="row d-flex justify-content-center">
				<?php
				foreach ($variabels as $variabel) {
					$himpunans = $this->Perhitungan_model->get_himpunan($variabel->id_kriteria);
				?>
					<div class="form-group col-xl-4">
						<label class="font-weight-bold"><?= $variabel->nama_kriteria ?></label>
						<select name="id_subkriteria_fuzzy_<?= $variabel->id_kriteria ?>" class="form-control" required>
							<!-- <option value="">--Pilih--</option> -->
							<?php foreach ($himpunans as $himpunan) { ?>
								<?php if ($himpunan->nama_subkriteria == "Excellent") { ?>
									<option value="<?= $himpunan->id_subkriteria_fuzzy ?>" } ? selected> <?= $himpunan->nama_subkriteria ?></option>
								<?php  } ?>
								<!-- <option value="<?= $himpunan->id_subkriteria_fuzzy ?>" <?php if (isset($_POST['hitung'])) {
																								if ($_POST['id_subkriteria_fuzzy' . $variabel->id_kriteria] == $himpunan->id_subkriteria_fuzzy) {
																									echo "selected";
																								}
																							} ?>><?= $himpunan->nama_subkriteria ?></option> -->
							<?php } ?>
						</select>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<div class="card-footer text-center">
			<button name="hitung" type="submit" class="btn btn-haven"><i class="fa fa-search"></i> Hitung</button>
		</div>
	</form>
</div>

<?php
if (isset($_POST['hitung'])) {
	$this->Perhitungan_model->hapus_hasil();
	$matriks_x = array();
	foreach ($alternatifs as $alternatif) :
		foreach ($variabels as $variabel) :

			$id_karyawan = $alternatif->id_karyawan;
			$id_kriteria = $variabel->id_kriteria;

			$n = $this->Perhitungan_model->data_nilai($id_karyawan, $id_kriteria);
			$nilai = $n['nilai'] ?? 0;

			$matriks_x[$id_kriteria][$id_karyawan] = $nilai;
		endforeach;
	endforeach;

	$nilai_da = array();
	foreach ($alternatifs as $alternatif) :
		$id_karyawan = $alternatif->id_karyawan;
		foreach ($variabels as $variabel) :
			$id_kriteria = $variabel->id_kriteria;
			$x = $matriks_x[$id_kriteria][$id_karyawan];

			$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
			foreach ($himpunans as $himpunan) {
				$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
				$kurva = $himpunan->kurva;
				if ($kurva == "Linier Naik") {
					$a = $himpunan->a;
					$b = $himpunan->b;
					if ($x <= $a) {
						$da = 0;
					} elseif (($a <= $x) && ($x <= $b)) {
						$da = ($x - $a) / ($b - $a);
					} elseif ($x >= $b) {
						$da = 1;
					}
				}
				if ($kurva == "Linier Turun") {
					$a = $himpunan->a;
					$b = $himpunan->b;
					if ($x <= $a) {
						$da = 1;
					} elseif (($a <= $x) && ($x <= $b)) {
						$da = ($b - $x) / ($b - $a);
					} elseif ($x >= $b) {
						$da = 0;
					}
				}

				if ($kurva == "Segitiga") {
					$a = $himpunan->a;
					$b = $himpunan->b;
					$c = $himpunan->c;
					if (($x <= $a) || ($x >= $c)) {
						$da = 0;
					} elseif (($a <= $x) && ($x <= $b)) {
						$da = ($x - $a) / ($b - $a);
					} elseif (($b <= $x) && ($x <= $c)) {
						$da = ($c - $x) / ($c - $b);
					}
				}

				if ($kurva == "Trapesium") {
					$a = $himpunan->a;
					$b = $himpunan->b;
					$c = $himpunan->c;
					$d = $himpunan->d;
					if (($x >= $d) || ($x <= $a)) {
						$da = 0;
					} elseif (($a <= $x) && ($x <= $b)) {
						$da = ($x - $a) / ($b - $a);
					} elseif (($c <= $x) && ($x <= $d)) {
						$da = $b - ($a / $d) - $c;
					} elseif (($b <= $x) && ($x <= $c)) {
						$da = 1;
					}
				}
				$nilai_da[$id_kriteria][$id_karyawan][$id_subkriteria_fuzzy] = $da;
			}
		endforeach;
	endforeach;

	$fuzzy_q = array();
	$nilai_fs = array();
	foreach ($alternatifs as $alternatif) :
		$id_karyawan = $alternatif->id_karyawan;
		$tot = 0;
		foreach ($variabels as $variabel) :
			$id_kriteria = $variabel->id_kriteria;
			$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
			foreach ($himpunans as $himpunan) {
				$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;

				if ($_POST['id_subkriteria_fuzzy_' . $id_kriteria] == $id_subkriteria_fuzzy) {
					$da = $nilai_da[$id_kriteria][$id_karyawan][$id_subkriteria_fuzzy];
					$fuzzy_q[$id_kriteria][$id_karyawan][$id_subkriteria_fuzzy] = $da;
				}
			}
			$tot += $da;
		endforeach;
		$nilai_fs[$id_karyawan] = $tot;
	endforeach;
?>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Matriks Keputusan (X)</h6>
		</div>

		<div class="card-body">
			<!-- table with courasel -->
			<!-- <div class="table-responsive">
				<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						$no = 0;
						foreach ($variabels as $variabel) {
						?>
							<li data-target="#carouselExampleIndicators1" data-slide-to="<?= $no; ?>" class="<?= $no == 0 ? 'active' : ''; ?>"></li>
						<?php
							$no++;
						}
						?>
					</ol>
					<div class="carousel-inner">
						<?php
						$no = 0;
						foreach ($variabels as $variabel) {
						?>
							<div class="carousel-item <?= $no == 0 ? 'active' : ''; ?>">
								<table class="table table-bordered" width="100%" cellspacing="0">
									<thead class="bg-haven text-white" style="background-color: #8D9A66">
										<tr align="center">
											<th width="5%" rowspan="2">No</th>
											<th>Nama Karyawan</th>
											<th><?= $variabel->nama_kriteria ?></th>
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
												<td>
													<?= $matriks_x[$variabel->id_kriteria][$id_karyawan]; ?>
												</td>
											</tr>
										<?php
											$no++;
										endforeach;
										?>
									</tbody>
								</table>
							</div>
						<?php
							$no++;
						}
						?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon bg-haven" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
						<span class="carousel-control-next-icon bg-haven" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div> -->
			<!-- end of table with courasel -->

			<!-- Job Knowledge, 
			Quality of Work,
			Consistency of Work,
			Stability,
			Communication,
			Diplomacy and Manners,
			Judgement,
			Salesmanship,
			Customer Relations,
			Leadership Skills,
			Attitude Toward Supervisors,
			Attitude Toward Co-Workers,
			Initiative,
			Attendance,
			Punctuality -->
			<p>
				Notes : Job = Job Knowledge, Qua = Quality of Work, Con = Consistency of Work, Sta = Stability, Com = Communication, Dip = Diplomacy and Manners, Jud = Judgement, Sal = Salesmanship, Cus = Customer Relations, Lea = Leadership Skills, Ats = Attitude Toward Supervisors, Atc = Attitude Toward Co-Workers, Ini = Initiative, Att = Attendance, Pun = Punctuality
			</p>
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead class="bg-haven text-white" style="background-color: #8D9A66">
						<tr align="center">
							<th width="5%" rowspan="2">No</th>
							<th>Nama Karyawan</th>
							<?php foreach ($variabels as $variabel) : ?>
								<th>
									<?php
									$key = $variabel->nama_kriteria;
									if ($key == "Attitude Toward Supervisors") {
										$key = "Ats";
									}
									if ($key == "Attitude Toward Co-Workers") {
										$key = "Atc";
									}
									$short_key = substr($key, 0, 3);
									echo $short_key;
									?>
								</th>
								<!-- <th><?= $variabel->nama_kriteria ?></th> -->
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($alternatifs as $alternatif) : ?>
							<tr align="center">
								<td><?= $no; ?></td>
								<td align="left"><?= $alternatif->nama_karyawan ?></td>
								<?php
								foreach ($variabels as $variabel) :
									$id_karyawan = $alternatif->id_karyawan;
									$id_kriteria = $variabel->id_kriteria;
									echo '<td>';
									echo $matriks_x[$id_kriteria][$id_karyawan];
									echo '</td>';
								endforeach;
								?>
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
	foreach ($variabels as $variabel) {
		$id_kriteria = $variabel->id_kriteria;
		$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
	?>
		<div class="card shadow mb-4">
			<!-- /.card-header -->
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Derajat Keanggotaan Variabel <?= $variabel->nama_kriteria ?></h6>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead class="bg-haven text-white" style="background-color: #8D9A66">
							<tr align="center">
								<th width="5%" rowspan="2" class="align-middle">No</th>
								<th rowspan="2" class="align-middle">Nama Alternatif</th>
								<th rowspan="2" class="align-middle" width="20%"><?= $variabel->nama_kriteria ?></th>
								<th colspan="<?= count($himpunans) ?>">Derajat Keanggotaan</th>
							</tr>
							<tr align="center">
								<?php
								foreach ($himpunans as $himpunan) : ?>
									<th width="10%"><?= $himpunan->nama_subkriteria ?></th>
								<?php endforeach; ?>
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
									echo '<td>';
									echo $matriks_x[$id_kriteria][$id_karyawan];
									echo '</td>';
									foreach ($himpunans as $himpunan) :
										$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
										echo '<td>';
										echo $nilai_da[$id_kriteria][$id_karyawan][$id_subkriteria_fuzzy];
										echo '</td>';
									endforeach;
									?>
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
	}
	?>

	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-haven"><i class="fa fa-table"></i> Fuzzyfikasi Query</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<!-- table with courasel -->
				<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<?php
						$no = 0;
						foreach ($variabels as $variabel) {
						?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?= $no; ?>" class="<?= $no == 0 ? 'active' : ''; ?>"></li>
						<?php
							$no++;
						}
						?>
					</ol>
					<div class="carousel-inner">
						<?php
						$no = 0;
						foreach ($variabels as $variabel) {
						?>
							<div class="carousel-item <?= $no == 0 ? 'active' : ''; ?>">
								<table class="table table-bordered" width="100%" cellspacing="0">
									<thead class="bg-haven text-white" style="background-color: #8D9A66">
										<tr align="center">
											<th width="5%" rowspan="2">No</th>
											<th>Nama Karyawan</th>
											<th><?= $variabel->nama_kriteria ?></th>
											<th>Fire Strength</th>
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
												<td>
													<?= $matriks_x[$variabel->id_kriteria][$id_karyawan]; ?>
												</td>
												<td>
													<?= $nilai_fs[$id_karyawan] / count($variabels); ?>
												</td>
											</tr>
										<?php
											$no++;
										endforeach;
										?>
									</tbody>
								</table>
							</div>
						<?php
							$no++;
						}
						?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon bg-haven" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon bg-haven" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div> -->
				<!-- end of table with courasel -->

				<p>
					Notes : Job = Job Knowledge, Qua = Quality of Work, Con = Consistency of Work, Sta = Stability, Com = Communication, Dip = Diplomacy and Manners, Jud = Judgement, Sal = Salesmanship, Cus = Customer Relations, Lea = Leadership Skills, Ats = Attitude Toward Supervisors, Atc = Attitude Toward Co-Workers, Ini = Initiative, Att = Attendance, Pun = Punctuality
				</p>
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
									if ($_POST['id_subkriteria_fuzzy_' . $id_kriteria] == $himpunan->id_subkriteria_fuzzy) {
							?>
										<th class="align-middle">
											<?php
											$key = $variabel->nama_kriteria;
											if ($key == "Attitude Toward Supervisors") {
												$key = "Ats";
											}
											if ($key == "Attitude Toward Co-Workers") {
												$key = "Atc";
											}
											$short_key = substr($key, 0, 3);
											echo $short_key;
											?>

											<!-- <br/> <?= $himpunan->nama_subkriteria ?> -->
										</th>
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
								foreach ($variabels as $variabel) {
									$id_kriteria = $variabel->id_kriteria;
									$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
									foreach ($himpunans as $himpunan) {
										$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
										if ($_POST['id_subkriteria_fuzzy_' . $id_kriteria] == $id_subkriteria_fuzzy) {
											echo '<td>';
											echo $f = $fuzzy_q[$id_kriteria][$id_karyawan][$id_subkriteria_fuzzy];
											echo '</td>';
											$hasil = [
												'id_karyawan' => $id_karyawan,
												'id_kriteria' => $id_kriteria,
												'id_subkriteria_fuzzy' => $id_subkriteria_fuzzy,
												'f' => $f,
											];
											$this->Perhitungan_model->insert_hasil($hasil);
										}
									}
								}
								?>
								<td><?= $nilai_fs[$id_karyawan] / count($variabels); ?></td>
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
}
$this->load->view('layouts/footer_admin');
?>