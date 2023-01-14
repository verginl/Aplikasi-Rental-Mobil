<?php
@session_start();
include"../Library/koneksi.php";
$perintah=new crud();
$perintah->koneksi();
@$perintah->tampil("tbl_customer WHERE username='$_SESSION[username]'");
@$tampil=mysql_fetch_array(mysql_query("SELECT *FROM tbl_customer where username='$_SESSION[username]'"));

if (empty($_SESSION['username'])){
         echo "<script>alert('Login Terlebih Dahulu');document.location.href='index.php'</script>";  
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

  <title>Rental Mobil Vergi</title>

  
  <!-- Custom fonts for this template-->
<link href="../css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="../css/fontawesome-free/fontt.css" rel="stylesheet">
  <!-- Custom styles for this template-->
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/responsive.bootstrap4.min.css" rel="stylesheet">
<link href="../css/sb-admin-2.min.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="../js/gijgo.min.js" type="text/javascript"></script>
<link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    

<!-- LINK JAVA SCRIPT-->
  <script src="../js/jquery-3.3.1.js"></script>
  <script src="../js/popper.min.js"></script>
<script src="../js/demo/datatables-demo.js"></script>
  <link href="../css/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="../css/datatables/jquery.dataTables.min.js"></script>
  <script src="../css/datatables/dataTables.bootstrap4.min.js"></script>


  <script src="../css/jquery/jquery.min.js"></script>
  <script src="../css/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../css/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../css/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?menu=home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-car-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-left">Rental Mobil Vergi</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="?menu=home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Komponen
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
          <i class="fas fa-fw fa-table"></i>
          <span>Daftar Mobil</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="?menu=data_mobil">Lihat Daftar Mobil</a>

          </div>

        </div>
      </li>





      <!-- Nav Item - Utilities Collapse Menu -->
      
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
          <i class="fas fa-file-signature"></i>
          <span>Form Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header"> Transaksi :</h6>
            <a class="collapse-item" href="?menu=pilih_mobil">Cek Ketersediaan Mobil</a>
            
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataTransaksi" aria-expanded="true" aria-controls="collapseData">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Transaksi</span>
        </a>
        <div id="collapseDataTransaksi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?menu=data_booking">Data Penyewaan</a>
            <a class="collapse-item" href="?menu=data_transaksi">Data Semua Transaksi</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

     
      <!-- Heading -->
    <li class="nav-item">
        <a class="nav-link" href="?menu=contact">
          <i class="fas fa-fw fa-phone"></i>
          <span>Contact Us</span></a>
      </li>
  
  <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-danger" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                <img class="img-profile rounded-circle" src="../img/admin1-01.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="?menu=edit_datadiri">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="?menu=404">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="?menu=404">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
   <div class="container-fluid">        
<?php
      switch (@$_GET['menu']){
        
        case "home";
        include "home.php" ;
        break;
        case"input_mobil";
        include"input_mobil.php";
        break;
        case"input_customer";
        include"input_customer.php";
        break;
        case"data_customer";
        include"data_customer.php";
        break;
        case"data_mobil";
        include"data_mobil.php";
        break;
        case"data_booking";
        include"data_booking.php";
        break;
        case"data_booking_detail";
        include"data_booking_detail.php";
        break;
        case"data_transaksi_detail";
        include"data_transaksi_detail.php";
        break;
        case"data_transaksi";
        include"data_transaksi.php";
        break;
        case"booking";
        include"transaksi_booking.php";
        break;
        case"pilih_mobil";
        include"transaksi_mobil.php";
        break;
        case"contact";
        include"copyright.php";
        break;
        case"data_booking2";
        include"data_booking2.php";
        break;
        case"struk_customer";
        include"struk_customer.php";
        break;
        case"laporan_transaksi";
        include"laporan_transaksi.php";
        break;
        case"edit_datadiri";
        include"edit_datadiri.php";
        break;

        case"404";
        include"404.html";
        break;

case"input_test";
        include"input_test.php";
        break;
      }
        ?>
         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Vergi Nardian Lufyandi 2019</span>
          </div>
        </div>
      </footer>
       <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih tombol Logout apabila anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>



</body>
  <!-- Bootstrap core JavaScript-->
</html>