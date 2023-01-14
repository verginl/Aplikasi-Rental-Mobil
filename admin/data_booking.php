<?php
$perintah=new crud();
$query="qw_booking";
$table = "tbl_booking";
@$where="id_booking = $_GET[id]";
$link="?menu=data_booking";
if(isset($_GET['hapus'])){
$perintah->hapus($table,$where,$link);
}

if(isset($_GET['edit'])){
	@$edit=$perintah->edit($query,$where);
	
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<title>Rental Mobil</title>
</head>
  <script src="../css/datatables/jquery.dataTables.min.js"></script>
  <script src="../css/datatables/dataTables.bootstrap4.min.js"></script>
<body>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
<h1 class="h3 mb-2 text-gray-800">Data Bookingan Penyewaan</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<!-- DataTales Example -->
          <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Bookingan Penyewaan (Belum Lunas)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="display table table-bordered" id="" width="100%" cellspacing="0">
  
        <thead>
                    <tr>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Booking</th>
                      <th>Nama Mobil</th>
                      
                      <th>Dari Tanggal</th>
                      <th>Sampai Tanggal</th>
                      <th>Nominal Bayar</th>
                      <th>Sisa Bayar</th>
                      <th>Status Pembayaran</th>
                      <th>Batal Booking</th>
                      <th>Detail</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_booking WHERE status_pembayaran = 'Belum Lunas'");
         
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['tgl_booking']?></td>
<td><?php echo $row['nama_mobil'].', '.  $row['plat_nomor']?></td>
<td><?php echo $row['tgl_sewa']?></td>
<td><?php echo $row['tgl_kembali']?></td>
<td><?php echo $row['nominal_bayar']?> </td>
<td><?php echo $row['sisa_bayar']?> </td>
<td><?php echo $row['status_pembayaran']?> </td>
<td width="100" align="center"><a href="?menu=data_booking&hapus&id=<?php echo $row['id_booking'] ?>" onClick="return confirm('Cancel Booking ?')"><input  type="submit" name="hapus" value="Batal Booking" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
  <td width="100" align="center"> <a href="?menu=data_booking_detail&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Detail" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a></td>
                        </tr>
                       
                    
          <?php   }
          ?>

                </table>

              </div></div>

            </div>
    

<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Booking Penyewaan (Sudah Lunas)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="display table table-bordered" id="" width="100%" cellspacing="0">
  
        <thead>
                    <tr>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Booking</th>
                      <th>Nama Mobil</th>         
                      <th>Dari Tanggal</th>
                      <th>Sampai Tanggal</th>
                      <th>Nominal Bayar</th>
                      <th>Sisa Bayar</th>
                      <th>Status Pembayaran</th>
                      <th>Batal Booking</th>
                      <th>Berangkat</th>
                      <th>Detail</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_booking WHERE status_pembayaran = 'Lunas'");
         
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['tgl_booking']?></td>
<td><?php echo $row['nama_mobil'].', '.  $row['plat_nomor']?></td>
<td><?php echo $row['tgl_sewa']?></td>
<td><?php echo $row['tgl_kembali']?></td>
<td><?php echo $row['nominal_bayar']?> </td>
<td><?php echo $row['sisa_bayar']?> </td>
<td><?php echo $row['status_pembayaran']?> </td>
<td width="100" align="center"><a href="?menu=data_booking&hapus&id=<?php echo $row['id_booking'] ?>" onClick="return confirm('Cancel Booking ?')"><input  type="submit" name="hapus" value="Batal Booking" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
  <td width="100" align="center"> <a href="?menu=data_booking&hapus&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Berangkat Sewa" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"></a></td>
   <td width="100" align="center"> <a href="?menu=data_booking_detail&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Detail" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a></td>
                        </tr>
                    
          <?php   }
          ?>
                </table>

              </div>
            </div>
         </body>         
</html>
