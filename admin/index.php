<?php
session_start();
include "../Library/koneksi.php";
$perintah = new crud(); 
$perintah ->koneksi();
$table = "tbl_admin";
@$username = $_POST['username'];
@$password =$_POST['password'];
$nama_form = "hal_admin.php?menu=home";

@$field = array('username' =>$_POST['username'],'password' =>$_POST['password']);

if(isset($_POST['login'])){
  $perintah->login($table, $username, $password, $nama_form);

}

if(isset($_POST['kembali'])){
  
  echo "<script>document.location.href='../index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi Rental Mobil</title>

  <!-- Custom fonts for this template-->
  <link href="../css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">

  <div class="container">
    
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5  col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          
              <div class="">
                <div class="p-4">
                  <div class="text-center">
                    <h1 class="h3 text-gray-900 mb-3">Welcome, Back...</h1>
                  </div>
                  <form method ="post"class="user">

                    <div class="form-group">
                      <div class="text-center">
                      <img src="../img/admin1-01.png" height="210" width="210"></div>
                      <br>
                     
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="emailHelp" name="username" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password"class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="login" class="btn btn-danger btn-user btn-block" value="Login">
                    <input type="submit" name="kembali" value="Cancel" class="btn btn-secondary btn-user btn-block">
                    </a>
                    <hr>
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
  <script src="../css/jquery/jquery.min.js"></script>
  <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../css/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
