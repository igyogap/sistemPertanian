<?php 

include_once '../function.php';

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Pertanian</title>

<!-- Bootstrap core CSS -->
<link href="../../Sistem Pertanian/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->

<link rel="stylesheet" href="../../sistem pertanian/css/nav_admin.css">
<link rel="stylesheet" href="../../sistem pertanian/css/pegawai.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
    rel="stylesheet">
<script src="https://kit.fontawesome.com/a40c3b3cc0.js" crossorigin="anonymous"></script>
<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>

<body>

    <!-- awal header -->
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"> Sistem Pertanian</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../logout.php">Sign out  <i class="fa fa-sign-out"></i></a>
            </li>
        </ul>
    </nav>
    <!-- akhir header -->

    <!-- awal nav-bar -->
    <div class="container-fluid">
        <div class="accordion" id="accordion">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">

                            <!-- menu 1 -->
                            <li class="nav-item">
                                <a class="nav-link active" href="../../sistem pertanian/user/halaman_pegawai.php">
                                    <i class="fa fa-fw fa-home"></i>
                                    Home <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <!-- /menu 1 -->

                            <!-- menu 2 -->
                            <li class="nav-item ">
                                <div class="accordion-head">
                                    <a class="nav-link" href="" data-toggle="collapse" data-target="#jenis1">
                                        <span class="fa fa-fw fa-chevron-down"></span>
                                        Kelola Data Pertanian
                                    </a>
                                </div>
                                <div id="jenis1" class="collapse " data-parent="#accordion">
                                    <ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../sistem pertanian/data_pertanian/input_padi.php">
                                                Padi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../sistem pertanian/data_pertanian/input_palawija.php">
                                                Palawija
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../sistem pertanian/data_pertanian/input_sbs.php">
                                                SBS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- /menu 2 -->

                            <!-- menu 2 -->
                            <li class="nav-item ">
                                <div class="accordion-head">
                                    <a class="nav-link" href="" data-toggle="collapse" data-target="#jenis2">
                                        <span class="fa fa-fw fa-chevron-down"></span>
                                        Rekap Bulanan
                                    </a>
                                </div>
                                <div id="jenis2" class="collapse " data-parent="#accordion">
                                    <ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../sistem pertanian/data_pertanian/data_padi.php">
                                                Padi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_pertanian/data_palawija.php">
                                                Palawija
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_pertanian/data_sbs.php">
                                                SBS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- /menu 2 -->


                            <!-- menu 3 -->
                            <li class="nav-item">
                                <div class="accordion-head">
                                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#jenis3">
                                        <span class="fa fa-fw fa-chevron-down "></span>
                                        Rekap Tahunan
                                    </a>
                                </div>
                                <div id="jenis3" class="collapse" data-parent="#accordion">
                                    <ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_pertanian/rekap_tahunan_padi.php">
                                                Padi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_pertanian/rekap_tahunan_palawija.php">
                                                Palawija
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_pertanian/rekap_tahunan_sbs.php">
                                                SBS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- /menu 3 -->

                        </ul>
                    </div>
            </div>
            </nav>

            <!-- akhir nav-bar -->