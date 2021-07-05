<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
    echo "
        <script>
        alert ('Username dan Password tidak sesuai !');
        document.location.href= 'index.php';
        </script> "; 
		}elseif ($_GET['pesan']=="level") {
      echo "
        <script>
          alert('Level User tidak sesuai !');
          document.location.href = 'index.php';
        </script> "; 
    }
	}
	?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sistem Pertanian</title>
  <link rel="shortcut icon" href="../Sistem Pertanian/img/logo.png" type="image/x-icon">
  <!-- Bootstrap core CSS -->
  <link href="../Sistem Pertanian/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles  -->
  <link href="css/login.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/a40c3b3cc0.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container-fluid">
        <div class="col-lg-5 area">
            <div class="jumbotron box">
              <div class="text-center"><img class="mb-4" src="../Sistem Pertanian/img/logo.png" alt="" width="120" height="120"></div>
                <h2 class="text-center" style="color: #545a5a;">LOGIN SISTEM PERTANIAN</h2><br>
                
                <form action="cek_login.php" method="POST">
                    
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-right-0"><i class="fa fa-user"></i></span>
                        </div>
                        <input type="text" name="username" class="form-control border-left-0" placeholder="Username" required autofocus>
                    </div>
                    
                    <div class="input-group form-group">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent border-right-0"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control border-left-0" placeholder="Password" required>
                    </div>
                    <button type="submit"  class="btn btn-primary form-control">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>