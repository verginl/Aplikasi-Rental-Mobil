<?php
$perintah=new crud();

$table="tbl_customer";
@$where="id_customer = $_GET[id]";
$link="?menu=customer";
@$tgl = date('d-m-Y');
@$jaminan = implode($_POST["jaminan"], ', ');
$tempat="../foto/";
@$foto=$_FILES['foto'];
@$filenya =$foto['name'];
@$field=array('id_customer'=>$_POST['id_customer'],
              'nama_customer'=>$_POST['nama_customer'],
              'jk'=>$_POST['jk'],
              'no_telepon'=>$_POST['no_telepon'],
              'jaminan' => $jaminan,
              'tgl_daftar'=>$_POST['tgl_daftar'],
              'alamat'=>$_POST['alamat'],
              'username'=>$_POST['username'],
              'password'=>$_POST['password'],
              'status' => 'Belum Sewa',
              
              );

@$fieldubah=array('id_customer'=>$_POST['id_customer'],
              'nama_customer'=>$_POST['nama_customer'],
              'jk'=>$_POST['jk'],
              'no_telepon'=>$_POST['no_telepon'],
              'jaminan' => $jaminan,
              'tgl_daftar'=>$_POST['tgl_daftar'],
              'alamat'=>$_POST['alamat'],
              'username'=>$_POST['username'],
              'password'=>$_POST['password'],
              );


if(isset($_POST['simpan'])){
$perintah->simpan($table,$field,$link);
}

if(isset($_GET['hapus'])){
$perintah->hapus($table,$where,$link);
echo"<script>;document.location.href='?menu=input_customer'</script>";

}

if(isset($_GET['edit'])){ 
 @$edit=$perintah->edit($table,$where);
 @$checked = explode(', ', $edit['jaminan']);
}

if(isset($_POST['ubah'])){
  if(!empty($foto['name'])){
  @$perintah->uploadfoto($foto,$tempat);
  @$jaminan  = implode(', ', $_POST['jaminan']);
	@$perintah->ubah($table,$fieldubah,$where,$link);
}	else{
  @$perintah->ubah($table,$fieldubah,$where,$link);
}
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
<h1 class="h3 mb-2 text-gray-800">Form Input Data Customer</h1>
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
          <input class="form-control" type="text" placeholder="ID Customer Otomatis" readonly name="id_customer" value="<?php echo @$edit['id_customer'] ?>">
        </div>
        </div>

        <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Nama Customer</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="Masukkan Nama Customer" name="nama_customer" value="<?php echo @$edit['nama_customer'] ?>" required>
        </div>
        </div>

        <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Jenis Kelamin</label>
          <div class="col-9">
            <select class="form-control" name="jk" required>
            	<option value="">Pilih Jenis Kelamin</option>
              <?php echo @$edit['jk'];
              if ($edit['jk']== "L") echo "<option value='L' selected>Laki-Laki</option>";
              else echo "<option value='L'>Laki-Laki</option>";
              if ($edit['jk']== "P") echo "<option value='P' selected>Perempuan</option>";
              else echo "<option value='P'>Perempuan</option>"; ?>
            
?>
            </select>
          </div>
          </div>

<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">No Telepon</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan No Telepon"  name="no_telepon" value="<?php echo @$edit['no_telepon'] ?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Alamat</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan Alamat"  name="alamat" value="<?php echo @$edit['alamat'] ?>" required>
  </div>
</div>


  <?php if (@$_GET['id']==""){ ?>
  <div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Jaminan Customer</label>
  <div class="col-2">
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" id="customCheck1" value="KTP">
  <label class="custom-control-label" for="customCheck1">KTP</label>
</div>
</div>

  <div class="col-2">
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="KTM" id="customCheck2">
  <label class="custom-control-label" for="customCheck2">KTM</label>
</div>
</div>

<div class="col-2">
<div class="form-check custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="SIM" id="customCheck3">  
  <label class="custom-control-label" for="customCheck3">SIM</label>
</div>
</div>

<div class="col-2">
<div class="form-check custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="KK"id="customCheck4">
  <label class="custom-control-label" for="customCheck4">KK</label>
</div>
</div>
</div>
 <?php }else{?>


<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Jaminan Customer</label>
  <div class="col-2">
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" id="customCheck1" value="KTP" <?php in_array ('KTP', $checked) ? print "checked" : ""; ?>>
  <label class="custom-control-label" for="customCheck1">KTP</label>
</div>
</div>

  <div class="col-2">
<div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="KTM" id="customCheck2"<?php in_array ('KTM', $checked) ? print "checked" : ""; ?>>
  <label class="custom-control-label" for="customCheck2">KTM</label>
</div>
</div>

<div class="col-2">
<div class="form-check custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="SIM" id="customCheck3" <?php in_array ('SIM', $checked) ? print "checked" : ""; ?>>
  <label class="custom-control-label" for="customCheck3">SIM</label>
</div>
</div>

<div class="col-2">
<div class="form-check custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="jaminan[]" value="KK"id="customCheck4" <?php in_array ('KK', $checked) ? print "checked" : ""; ?>>
  <label class="custom-control-label" for="customCheck4">KK</label>
</div>
</div>
</div>
<?php }?></td>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Username</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Masukkan Username"  name="username" value="<?php echo @$edit['username'] ?>" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Password</label>
  <div class="col-9">
    <input class="form-control" type="password"  placeholder="Masukkan password"  name="password" value="<?php echo @$edit['password'] ?>" required>
  </div>
</div>

    <div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Daftar</label>
      <div class="col-9">
        <input type="text" class="form-control" name="tgl_daftar" placeholder="Masukkan tgl" value="<?php echo $tgl ?>" readonly="readonly" required />
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
<br>
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
                      <th>ID Customer</th>
                      <th>Nama Customer</th>
                      <th>Jenis Kelamin</th>
                      <th>No Telepon</th>
                      <th>Jaminan</th>                    
                      <th>Tanggal Daftar</th>
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
<td><?php echo $row['id_customer']?> </td>    
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['jk'] ?></td>
<td><?php echo $row['no_telepon']?> </td>
<td><?php echo $row['jaminan']?></td>
<td><?php echo $row['tgl_daftar']?> </td>
<td width="100" align="center"><a href="?menu=input_customer&hapus&id=<?php echo $row['id_customer'] ?>" onClick="return confirm('Anda ingin menghapus ?')"><input  type="submit" name="hapus" value="Delete" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
  <td width="100" align="center"> <a href="?menu=input_customer&edit&id=<?php echo $row['id_customer'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
                        </tr>
                    
          <?php  $no++;  }
          ?>
                </table>
              </div>
            </div>
          </div>
          
        </form>
  
         </body>
</html>