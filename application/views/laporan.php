<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pendukung Keputusan Metode FUZZY TAHANI</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
</style>
<body>
<h4>Hasil Akhir FUZZY TAHANI</h4>
<table border="1" width="100%">
	<thead>
		<tr align="center">
			<th width="5%" class="align-middle">No</th>
			<th class="align-middle">Nama Alternatif</th>
			<?php
			foreach ($variabels as $variabel){
			$id_kriteria = $variabel->id_kriteria;
			$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
			foreach ($himpunans as $himpunan){
			$him = $this->Perhitungan_model->get_himpunan_row($id_kriteria);
			if($him->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy){
			?>
				<th class="align-middle">
				<?= $variabel->nama_kriteria ?><br/>
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
			$no=1;
			foreach ($alternatifs as $alternatif):
			$id_karyawan = $alternatif->id_karyawan;
			?>
		<tr align="center">
			<td><?= $no; ?></td>
			<td align="left"><?= $alternatif->nama_karyawan ?></td>
			<?php
			$tot = 0;
			foreach ($variabels as $variabel){
				$id_kriteria = $variabel->id_kriteria;
				$himpunans = $this->Perhitungan_model->get_himpunan($id_kriteria);
				foreach ($himpunans as $himpunan){
					$id_subkriteria_fuzzy = $himpunan->id_subkriteria_fuzzy;
					$hasil = $this->Perhitungan_model->get_hasil($id_karyawan,$id_kriteria);
					if($hasil->id_subkriteria_fuzzy == $himpunan->id_subkriteria_fuzzy){
					echo '<td>';
					echo $hasil->f;
					echo '</td>';
					}
				}
				$tot += $hasil->f;
			}
			?>
			<td><?= $tot/count($variabels); ?></td>
		</tr>
		<?php
			$no++;
			endforeach;
		?>
	</tbody>
</table>

<script>
	window.print();
</script>
</body>
</html>