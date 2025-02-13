<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Pemilihan Karyawan Terbaik THE HAVEN Bali Seminyak</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="<?= base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/')?>css/sb-admin-2.css">
		<link rel="shortcut icon" href="<?= base_url('assets/')?>img/logo.png" type="image/x-icon">
		<link rel="icon" href="<?= base_url('assets/')?>img/logo.png" type="image/x-icon">
    </head>

    <body style="background-color: #8D9A66">
        <nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand" style="font-weight: 900; color: #8D9A66" href="<?= base_url('')?>"> <i class="fa fa-database mr-2 rotate-n-15"></i> Sistem Pemilihan Karyawan Terbaik THE HAVEN Bali Seminyak</a>
            </div>
        </nav>

        <div class="container">
            <!-- Outer Row -->
            <div class="row d-plex justify-content-between mt-5">				
				<div class="col-xl-6 col-lg-6 col-md-6 mt-5">
                    <div class="card bg-none o-hidden border-0 my-5 text-white" style="background: none;">
                        <div class="text-justify card-body p-0">
                            <h4 style="font-weight: 800;">Pemilihan Karyawan Terbaik THE HAVEN Bali Seminyak</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/')?>img/phm.png" class="mt-5 pt-4" style="width: 100%">
                                </div>
                                <div class="col-md-6">
                                    <img src="<?= base_url('assets/')?>img/thehavenputih.png" class="mt-5 pt-4" style="width: 100%">
                                </div>
                            </div>
                            <!-- <p class="pt-4">
                                Sistem Pendukung Keputusan (SPK) merupakan suatu sistem informasi spesifik yang ditujukan untuk membantu manajemen dalam mengambil keputusan yang berkaitan dengan persoalan yang bersifat semi terstruktur.
                            </p>
                            <p>
                                Metode Fuzzy database model Tahani ini masih tetap menggunakan relasi standar, hanya saja model ini menggunakan teori himpunan fuzzy untuk mendapatkan infromasi pada query-nya. Tahani mendeskripsikan suatu metode pemrosesan query fuzzy dengan didasarkan atas manipulasi bahasa yang dikenal dengan nama Structure Query Language (SQL). 
                            </p> -->
                        </div>
                    </div>
                </div>
				
				<div class="col-xl-5 col-lg-5 col-md-5 mt-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
										<?php $error=$this->session->flashdata('message');
										if($error) {?>
										<div class="alert alert-danger alert-dismissable">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<?php echo $error; ?>                    
										</div>
										<?php }?> 

                                        <form class="user" action="<?php echo site_url('Login/login'); ?>" method="post">
                                            <div class="form-group">
                                                <input required autocomplete="off" type="text" class="form-control form-control-user" id="exampleInputUser" placeholder="Username" name="username" />
                                            </div>
                                            <div class="form-group">
                                                <input required autocomplete="off" type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" />
                                            </div>
                                            <button name="submit" type="submit" class="btn btn-haven btn-user btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?= base_url('assets/')?>js/sb-admin-2.min.js"></script>
    </body>
</html>


