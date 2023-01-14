
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<title>Rental Mobil</title>
</head>

 <script src="../css/datatables/jquery.dataTables.min.js"></script>
  <script src="../css/datatables/dataTables.bootstrap4.min.js"></script>
<body>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
<h1 class="h3 mb-2 text-gray-800">Data Customer</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<!-- DataTales Example -->
          <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Customer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
                      <th>Nama Customer</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telepon</th>
                      <th>Jaminan</th>                    
                      <th>Tanggal Daftar</th>
                      <th>Status</th>
                      <th>Hapus</th>
                      <th>Edit</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM tbl_customer");
          $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['jk'] ?></td>
<td><?php echo $row['no_telepon']?> </td>
<td><?php echo $row['jaminan']?></td>
<td><?php echo $row['tgl_daftar']?> </td>
<td><?php echo $row['status']?> </td>
<td width="100" align="center"><a href="?menu=input_customer&hapus&id=<?php echo $row['id_customer'] ?>" onClick="return confirm('Anda ingin menghapus ?')"><input  type="submit" name="hapus" value="Delete" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
  <td width="100" align="center"> <a href="?menu=input_customer&edit&id=<?php echo $row['id_customer'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
                        </tr>
                    
          <?php  $no++;  }
          ?>
                </table>
              </div>
            </div>
    

  
         </body>

         
</html>