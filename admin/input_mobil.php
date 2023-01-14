<?php
$perintah=new crud();
$table="tbl_mobil";
@$where="id_mobil = $_GET[id]";
$link="?menu=mobil";
@$field=array('id_mobil'=>$_POST['id_mobil'],
              'nama_mobil'=>$_POST['nama_mobil'],
              'jenis_mobil'=>$_POST['jenis_mobil'],
              'cc_mobil'=>$_POST['cc_mobil'],
              'plat_nomor'=>$_POST['plat_nomor'],
              'tahun_mobil'=>$_POST['tahun_mobil'],
              'bahan_bakar'=>$_POST['bahan_bakar'],
              'warna_mobil'=>$_POST['warna_mobil'],              
              'harga_sewa_perhari'=>$_POST['harga_sewa_perhari'],
              );
@$tgl = date('d-m-Y');

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
          <h1 class="h3 mb-2 text-gray-800">Form Input Data Mobil</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
      </div>

<div class="card o-hidden border-left-danger shadow h-100 my-0">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="form-group">

        <form method="post" >

        <div class="form-group row">        
          <label for="example-text-input" class="col-3 col-form-label">ID Mobil</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="ID Mobil Otomatis" readonly name="id_mobil" value="<?php echo @$edit['id_mobil'] ?>">
        </div>
        </div>

        <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Nama Mobil</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="Masukkan Nama Mobil" name="nama_mobil" value="<?php echo @$edit['nama_mobil'] ?>" required>
        </div>
        </div>

        <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Jenis Mobil</label>
          <div class="col-9">
            <select class="form-control" name="jenis_mobil" value"<?php echo@$edit['jenis_mobil'] ?>" required>
              <option value="">Pilih Jenis Mobil</option>
                  <option value="Matic">Matic</option>
                  <option valie="Manual">Manual</option>
            </select>
          </div>
          </div>

<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">CC Mobil</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan CC Mobil"  name="cc_mobil" value="<?php echo @$edit['cc_mobil'] ?>" required>
  </div>
</div>

  <div class="form-group row">
          <label for="example-url-input" class="col-3 col-form-label">Plat Nomor Mobil</label>
            <div class="col-9">
              <input class="form-control" type="text"  placeholder="Masukkan Plat Nomor Mobil"  name="plat_nomor" value="<?php echo @$edit['plat_nomor'] ?>" required>
            </div>
  </div>

  <div class="form-group row">
          <label for="example-url-input" class="col-3 col-form-label">Tahun Mobil</label>
            <div class="col-9">
              <input class="form-control" type="text"  placeholder="Masukkan Tahun Mobil"  name="tahun_mobil" value="<?php echo @$edit['tahun_mobil'] ?>" required>
            </div>
  </div>

  <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Bahan Bakar</label>
          <div class="col-9">
            <select class="form-control" name="bahan_bakar" value"<?php @$edit['bahan_bakar'] ?>" required>
              <option value="">Pilih Bahan Bakar</option>
                  <option value="Bensin">Bensin</option>
                  <option valie="Solar">Solar</option>
            </select>
          </div>
  </div>

  <div class="form-group row">
          <label for="example-url-input" class="col-3 col-form-label">Warna Mobil</label>
          <div class="col-9">
            <input class="form-control" type="text"  placeholder="Masukkan Warna Mobil"  name="warna_mobil" value="<?php echo @$edit['warna_mobil'] ?>" required>
          </div>
  </div>

  <div class="form-group row">
          <label for="example-url-input" class="col-3 col-form-label">Harga Sewa (1 Hari)</label>
            <div class="col-9">
                <input class="form-control" type="text"  placeholder="Masukkan Harga Sewa Mobil"  name="harga_sewa_perhari" value="<?php echo @$edit['harga_sewa_perhari'] ?>" required>
            </div>
  </div>
</div>


    <div class="text-right">
    <?php if (@$_GET['id']==""){ ?>
    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
    <?php }else{?>
    <button type="submit" name="ubah" class="btn btn-danger">Ubah</button>
    <?php }?></td>
    </div>

    </div>
    </div>  
<br>
<!-- DataTales Example -->
          <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-2 text-gray-800">Data Mobil</h1>
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
                      <th>ID Mobil</th>
                      <th>Nama Mobil</th>
                      <th>Jenis Mobil</th>
                      <th>CC Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Bahan Bakar</th>
                      <th>Warna Mobil</th>                      
                      <th>Harga Sewa (1 Hari)</th>
                      <th>Hapus</th>
                      <th>Edit</th>
                    </tr>
                  </thead>

                  <?php
                    $result = mysql_query("SELECT * FROM tbl_mobil");
                    $no = 1;
                    while ($row = mysql_fetch_array($result)) {
                  ?>
                    <tr>
                      <td><?php echo $no?> </td>
                      <td><?php echo $row['id_mobil']?> </td>    
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
                </form>
              </div>
              </div>
        
  
         </body>
</html>