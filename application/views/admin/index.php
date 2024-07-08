<?php $this->load->view('layouts/header_admin'); ?>

<?php
$pro1 = new Karyawan_model();
$stmt4 = $pro1->readAll();
$stmt5 = json_encode($stmt4, true);
?>

<!-- ADMIN -->
<?php if ($this->session->userdata('id_user_level') == '1') : ?>
    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="alert alert-haven">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selamat datang <span class="text-uppercase"><b><?= $this->session->username; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
        </div>

        <div class="col-xs-12 col-sm-12">
            <div id="container2" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
            <br />
        </div>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Departemen'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_dept; ?></label><br>
                                        <label class="mt-3">Data Departemen<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cube fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Karyawan'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_karyawan; ?></label><br>
                                        <label class="mt-3">Data Karyawan<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Kriteria'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_kriteria; ?></label><br>
                                        <label class="mt-3">Data Kriteria<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Subkriteria'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_sub; ?></label><br>
                                        <label class="mt-3">Data Sub Kriteria<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-edit fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Appraisal'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_appr; ?></label><br>
                                        <label class="mt-3">Data Appraisal<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('penilaian'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_nilai; ?></label><br>
                                        <label class="mt-3">Data Nilai<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Perhitungan'); ?>" class="text-secondary text-decoration-none">Data Perhitungan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('hasil'); ?>" class="text-secondary text-decoration-none">Hasil Akhir</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Laporan'); ?>" class="text-secondary text-decoration-none">Data Laporan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- PIMPINAN -->
<?php if ($this->session->userdata('id_user_level') == '2') : ?>
    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selamat datang <span class="text-uppercase"><b><?= $this->session->username; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('penilaian'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_nilai; ?></label><br>
                                        <label class="mt-3">Data Nilai<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Perhitungan'); ?>" class="text-secondary text-decoration-none">Data Perhitungan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('hasil'); ?>" class="text-secondary text-decoration-none">Hasil Akhir</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Laporan'); ?>" class="text-secondary text-decoration-none">Data Laporan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Profile'); ?>" class="text-secondary text-decoration-none">Data Profile</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- HRD -->
<?php if ($this->session->userdata('id_user_level') == '3') : ?>
    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="alert alert-haven">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selamat datang <span class="text-uppercase"><b><?= $this->session->username; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
        </div>
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Karyawan'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_karyawan; ?></label><br>
                                        <label class="mt-3">Data Karyawan<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cubes fa-4x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Appraisal'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_appr; ?></label><br>
                                        <label class="mt-3">Data Appraisal<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('penilaian'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_nilai; ?></label><br>
                                        <label class="mt-3">Data Nilai<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('Perhitungan'); ?>" class="text-secondary text-decoration-none">Data Perhitungan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('hasil'); ?>" class="text-secondary text-decoration-none">Kesimpulan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- KEPALA DEPT -->
<?php if ($this->session->userdata('id_user_level') == '4') : ?>
    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="alert alert-haven">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selamat datang <span class="text-uppercase"><b><?= $this->session->nama; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
        </div>
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Appraisal'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_appr; ?></label><br>
                                        <label class="mt-3">Data Appraisal<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('penilaian'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_nilai; ?></label><br>
                                        <label class="mt-3">Data Nilai<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- KARYAWAN -->
<?php if ($this->session->userdata('id_user_level') == '5') : ?>
    <div class="mb-4">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-home"></i> Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="alert alert-haven">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selamat datang <span class="text-uppercase"><b><?= $this->session->nama; ?>!</b></span> Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu di bawah.
        </div>
        <div class="row">

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <a href="<?= base_url('Appraisal'); ?>" class="text-secondary text-decoration-none">
                                        <label style="font-size: 38px"><?php echo $total_appr; ?></label><br>
                                        <label class="mt-3">Data Appraisal<br></label>
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../assets/js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/highcharts.js"></script>
<script src="../assets/js/exporting.js"></script>
<script>                        
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'column'
            },
            title: {
                text: 'Karyawan Terbaik'
            },
            xAxis: {
                categories: ['Nama Karyawan']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Nilai'
                }
            },
            series: [
                <?php foreach ($highest as $key => $value) : ?>
                    {
                        name: '<?= $key; ?>',
                        data: [
                            <?= $value; ?>
                        ]
                    },
                <?php endforeach; ?>
            ]
        });
    });
</script>

<?php $this->load->view('layouts/footer_admin'); ?>