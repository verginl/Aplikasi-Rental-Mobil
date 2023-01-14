<?php
@session_start();
$perintah=new crud();
$perintah->koneksi();

@$tampil=mysql_fetch_array(mysql_query("SELECT *FROM tbl_customer where username='$_SESSION[username]'"));
if (empty($_SESSION['username'])){
	echo "<script>alert('Anda belum melakukan login');document.location.href='index.php'</script>";
	}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<title>Rental Mobil</title>
</head>

<body>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
           
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Report</a>
          </div>
         
          <h6 class="page-header text-danger">Date : <?php echo date('l, d-M-Y') ?></h6>
      <hr>
<h1 class="h4 mb-2 text-gray-800"> Aplikasi Rental Mobil Vergi V 0.1</h1>
<h1 class="h4 mb-2 text-gray-800">Welcome <a href="?menu=data_diri" class="text-danger"> <?php echo @$tampil['nama_customer']?></a>
</h1><br>
                      <center>
         	<img src="../img/LOGORENTAL.png" class="img-fluid" height="300" width="800" alt=""/>            
                    </center>
         </body>
</html>