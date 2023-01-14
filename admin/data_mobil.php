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
                      <th>Aksi</th>
                      <th>Aksi</th>
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
                      <td width="100" align="center"><a href="?menu=input_mobil&hapus&id=<?php echo $row['id_mobil'] ?>" onClick="return confirm('Anda ingin menghapus ?')"><input  type="submit" name="hapus" value="Delete" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
                        <td width="100" align="center"> <a href="?menu=input_mobil&edit&id=<?php echo $row['id_mobil'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
                    </tr>
                    
                  <?php  $no++;  }
                  ?>
                </table>
              </div>
            </div>
          </div>

  
         </body>
</html>