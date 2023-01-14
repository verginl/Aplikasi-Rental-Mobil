<?php
$perintah=new crud();
$table="tbl_Test";
@$where="id_test = $_GET[id]";
$link="?menu=mobil";
$tempat="../foto/";
@$foto=$_FILES['foto'];
@$field=array('nama_foto'=>$_POST['nama_foto'],
              'foto'=>$foto['name'],
              
              );
@$tgl = date('d-m-Y');

if(isset($_POST['simpan'])){
$perintah->uploadfoto($foto,$tempat);
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

        <!-- Nested Row within Card Body -->
        <div class="form-group">

        <form method="post" >

        <div class="form-group row">        
          <label for="example-text-input" class="col-3 col-form-label">Nama </label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="ID nama_foto " name="nama_foto" value="<?php echo @$edit['nama_foto'] ?>">
        </div>
        </div>

  <div class="form-group row">
          <label for="example-url-input" class="col-3 col-form-label">Fotoo</label>
            <div class="col-9">
               <input type="file" name="foto">
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
        
  
         </body>
</html>