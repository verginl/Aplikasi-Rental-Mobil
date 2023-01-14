<?php
$perintah=new crud();
$query="qw_transaksi";
$table = "tbl_transaksi";
@$where="id_transaksi = $_GET[id]";
$link="?menu=data_transaksi";
@$tampil=mysql_fetch_array(mysql_query("SELECT *FROM tbl_customer where username='$_SESSION[username]'"));
$id_customer = $tampil['id_customer'];


if(isset($_POST['simpan'])){
	$perintah->simpan($table,$field,$link);

}
if(isset($_GET['hapus'])){
$perintah->hapus($table,$where,$link);

}

if(isset($_GET['edit'])){
	@$edit=$perintah->edit($query,$where);
	
}

if(isset($_POST['ubah'])){
	@$perintah->ubah($table,$field,$where,$link);
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
<h1 class="h3 mb-2 text-gray-800">Data Seluruh Transaksi Penyewaan</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<!-- DataTales Example -->
          <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Transaksi Penyewaan Mobil <?php echo $tampil['nama_customer'] ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Booking</th>
                      <th>Nama Mobil</th>
                      <th>Dari Tanggal</th>
                      <th>Sampai Tanggal</th>
                      <th>Status Transaksi</th>
                      <th>Detail</th>
                      </tr>
                  </thead>

                  <?php
           $result = mysql_query("SELECT * FROM qw_transaksi WHERE id_customer = $id_customer and status_transaksi = 'Selesai' ");
            $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['tgl_booking']?></td>
<td><?php echo $row['nama_mobil'].', '.  $row['plat_nomor']?></td>
<td><?php echo $row['tgl_sewa']?></td>
<td><?php echo $row['tgl_kembali']?></td>
<td><?php echo $row['status_transaksi']?> </td>
  <td width="100" align="center"> <a href="?menu=data_transaksi_detail&edit&id=<?php echo $row['id_transaksi'] ?>"><input  type="submit" name="edit" value="Detail" class="btn btn-primary"></a></td>
                        </tr>
                    
          <?php  $no++;  }
          ?>
                </table>
              </div>
            </div>
            </div>

            <br>

        
    

  
         </body>

         
</html>