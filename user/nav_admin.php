<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sistem Pertanian</title>

  <!-- Bootstrap core CSS -->
  <link href="../../sistem pertanian/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a40c3b3cc0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registrasi.css">
  <!-- Custom styles for this template -->
  <link href="../../sistem pertanian/css/nav_admin.css" rel="stylesheet">
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
                        <li class="nav-item">
                            <a class="nav-link active" href="../../sistem pertanian/user/home_admin.php">
                            <i class="fa fa-fw fa-home"></i>
                                <span data-feather="home"></span>Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../sistem pertanian/user/user.php">
                            <i class="fa fa-fw fa-users"></i>
                                Data Pengguna
                            </a>
                        </li>
                        <li class="nav-item ">
                                <div class="accordion-head">
                                    <a class="nav-link" href="" data-toggle="collapse" data-target="#jenis1" >
                                    <div class="row">
                                        <div class="col-7"><span class="fa fa-fw fa-database"></span> 
                                        Data Pertanian</div>
                                        <div class="col"><span class="fa  fa-chevron-down text-right"></span></div>
                                    </div>
                                    
                                        
                                        
                                        
                                    </a>
                                </div>
                                <div id="jenis1" class="collapse " data-parent="#accordion">
                                    <ul>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_master/input_padi.php">
                                                Padi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_master/input_palawija.php">
                                                Palawija
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../data_master/input_sbs.php">
                                                SBS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

      <!-- akhir nav-bar -->