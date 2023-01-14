<?php
$perintah=new crud();
$table="tbl_customer";

$link="?menu=customer";
@$tgl = date('d-m-Y');
@$perintah->tampil("tbl_customer WHERE username='$_SESSION[username]'");
@$tampil=mysql_fetch_array(mysql_query("SELECT *FROM tbl_customer where username='$_SESSION[username]'"));
$id_customer = $tampil['id_customer'];
@$where="id_customer = $id_customer";
@$fieldubah=array('id_customer'=>$_POST['id_customer'],
              'nama_customer'=>$_POST['nama_customer'],
              'jk'=>$_POST['jk'],
              'no_telepon'=>$_POST['no_telepon'],
              'tgl_daftar'=>$_POST['tgl_daftar'],
              'alamat'=>$_POST['alamat'],
              'username'=>$_POST['username'],
              'password'=>$_POST['password'],
              );

if(isset($_GET['edit'])){ 
 @$edit=$perintah->edit($table,$where);
}

if(isset($_POST['ubah'])){  
	@$perintah->ubah($table,$fieldubah,$where,$link);
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
<h1 class="h3 mb-2 text-gray-800">Form Edit Data Diri</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>

<div class="card o-hidden border-left-danger shadow h-100 my-0">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="form-group">

        <form method="post" >

        <div class="form-group row">        
          <label for="example-text-input" class="col-3 col-form-label">ID Customer</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="ID Customer Otomatis" readonly name="id_customer" value="<?php echo @$tampil['id_customer'] ?>">
        </div>
        </div>

        <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Nama Customer</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="Masukkan Nama Customer" name="nama_customer" value="<?php echo @$tampil['nama_customer'] ?>" required>
        </div>
        </div>

        <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Jenis Kelamin</label>
          <div class="col-9">
            <select class="form-control" name="jk" required>
            	<option value="">Pilih Jenis Kelamin</option>
              <?php echo @$tampil['jk'];
              if ($tampil['jk']== "L") echo "<option value='L' selected>Laki-Laki</option>";
              else echo "<option value='L'>Laki-Laki</option>";
              if ($tampil['jk']== "P") echo "<option value='P' selected>Perempuan</option>";
              else echo "<option value='P'>Perempuan</option>"; ?>
            
?>
            </select>
          </div>
          </div>

<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">No Telepon</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan No Telepon"  name="no_telepon" value="<?php echo @$tampil['no_telepon'] ?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Alamat</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan Alamat"  name="alamat" value="<?php echo @$tampil['alamat'] ?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Jaminan</label>
  <div class="col-9">
    <?php echo @$tampil['jaminan']?>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Username</label>
  <div class="col-9">
    <input class="form-control" type="text" readonly="readonly"  placeholder="Masukkan Username"  name="username" value="<?php echo @$tampil['username'] ?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Password</label>
  <div class="col-9">
    <input class="form-control" type="password"  placeholder="Masukkan password"  name="password" value="<?php echo @$tampil['password'] ?>" required>
  </div>
</div>

    <div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Daftar</label>
      <div class="col-9">
        <input type="text" class="form-control" name="tgl_daftar" placeholder="Masukkan tgl" value="<?php echo @$tampil['tgl_daftar'] ?>" readonly="readonly" required />
      </div>
    </div>


    </div>


    <div class="text-right">
    <?php if (@$_GET['id']==""){ ?>
    <button type="submit" name="ubah" class="btn btn-danger">Ubah Data</button>
    <?php }else{?>
    <button type="submit" name="ubah" class="btn btn-danger">Ubah</button>
    <?php }?></td>
    </div>


</div>
</div>
          
        </form>
  
         </body>
</html>