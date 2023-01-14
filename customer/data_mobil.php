<?php
/*$perintah=new crud();
$table="tbl_area";
@$where="id_area = $_GET[id]";
$link="?menu=area";
@$field=array('id_area'=>$_POST['id_area'],'area'=>$_POST['area']);


if(isset($_POST['simpan'])){
	$perintah->simpan($table,$field,$link);

}
if(isset($_GET['hapus'])){
$perintah->hapus($table,$where,$link);

}

if(isset($_GET['edit'])){
	@$edit=$perintah->edit($table,$where);
	
}

if(isset($_POST['ubah'])){
	@$perintah->ubah($table,$field,$where,$link);
}	
*/
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
<h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Mobil</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                    <th>No</th>
                      <th>Nama Mobil</th>
                      <th>Jenis Mobil</th>
                      <th>CC Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Bahan Bakar</th>
                      <th>Warna Mobil</th>                      
                      <th>Harga Sewa (1 Hari)</th>
                    </tr>
                  </thead>

                  <?php
                    $result = mysql_query("SELECT * FROM tbl_mobil");
                    $no = 1;
                    while ($row = mysql_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $no?> </td>   
                      <td><?php echo $row['nama_mobil'] ?></td>
                      <td><?php echo $row['jenis_mobil'] ?></td>
                      <td><?php echo $row['cc_mobil']?> </td>
                      <td><?php echo $row['plat_nomor']?></td>
                      <td><?php echo $row['bahan_bakar']?></td>
                      <td><?php echo $row['warna_mobil']?></td>
                      <td><?php echo $row['harga_sewa_perhari']?></td>
                      
                    </tr>
                    
                  <?php  $no++;  }
                  ?>
                </table>
              </div>
            </div>
          </div>

  
         </body>
</html>