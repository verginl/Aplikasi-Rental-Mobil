<?php
$perintah=new crud();
$query = "qw_booking";
$table="tbl_booking";
@$where="id_booking = $_GET[id]";
$link="?menu=pembayaran";
@$tgl = date('d-m-Y');

@$tgl_sewa =  $_POST['tgl_sewa'];
@$tgl_kembali = $_POST['tgl_kembali'];
@$mobil = $_POST['id_mobil'];
@$jenis_mobil = $_POST['jenis_mobil'];
@$harga_sewa_perhari = $_POST['harga_sewa_perhari'];
@$jml_hari = $_POST['jml_hari'];
@$tgl_booking = $_POST['tgl_booking'];

if (@$_POST['sisa_bayar']==0)
    {
      $statuspembayaran = 'Lunas';
      }else{ $statuspembayaran = 'Belum Lunas'; }
    @$field=array('id_booking'=>$_POST['id_booking'],
              'id_customer'=>$_POST['id_customer'],
              'id_mobil'=>$mobil,
              'tgl_sewa'=>$tgl_sewa,
              'tgl_kembali' => $tgl_kembali,
              'jml_hari' => $jml_hari,
              'tgl_booking'=>$tgl_booking,
              'harga_sewa_total'=>$_POST['harga_sewa_total'],
              'nominal_bayar'=>$_POST['nominal_bayar'],
              'sisa_bayar'=>$_POST['sisa_bayar'],
              'status_pembayaran' => $statuspembayaran,
              );  
      
if(isset($_POST['simpan'])){
$perintah->simpanbooking($table,$field,$link);
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
 <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="../js/gijgo.min.js" type="text/javascript"></script>
    <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <script src="../css/datatables/jquery.dataTables.min.js"></script>
  <script src="../css/datatables/dataTables.bootstrap4.min.js"></script>

<body>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
<h1 class="h3 mb-2 text-gray-800">Form Transaksi Sewa Mobil</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>

<div class="card o-hidden border-left-danger shadow h-100 my-0">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="form-group">

        <form method="post" >

        <div class="form-group row">        
          <label for="example-text-input" class="col-3 col-form-label">ID Transaksi Booking</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="ID Transaksi Booking" readonly name="id_booking" value="<?php echo @$edit['id_booking'] ?>">
        </div>
        </div>

        <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Nama Customer</label>
        <div class="col-9">
          <select name="id_customer" class="form-control" required>
        <option value="<?php echo @$edit ['id_customer'] ?>"><?php echo @$edit ['nama_customer']?> </option>
        <?php 
   $b= $perintah ->tampil("tbl_customer where status = 'Belum Sewa'");
    foreach ($b as $value){   ?>
   <option value="<?php echo $value['0']?>" > <?php echo $value['1'] ?></option>
   <?php } ?>
   </select>
        </div>
        </div>

<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Dari Tanggal</label>
      <div class="col-3">
        
        <input id="tgl_sewa" class="form-control" type="text" width="217" name="tgl_sewa" value="<?php echo $tgl_sewa ?>" readonly required placeholder="Dari Tanggal" />
      </div>
      <label for="example-search-input" class="col-2 col-form-label">Sampai Tanggal</label>
      <div class="col-3">
      <input class="form-control"  id="tgl_kembali" type="text"name="tgl_kembali"width="217"  placeholder="Sampai Tanggal"readonly value="<?php echo $tgl_kembali ?>" required />
   
      </div>
      </div>
     
<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Booking</label>
      <div class="col-3">
    <input class="form-control" name="tgl_booking" type="text" value="<?php echo $tgl_booking ?>" required  readonly>
 
    </div>
    <label for="example-url-input" class="col-2 col-form-label">Jumlah Hari</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Jumlah Hari" readonly name="jml_hari" id="jml_hari" value="<?php echo $jml_hari ?>" required>
  </div>
    </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Nama Mobil</label>
          <div class="col-9">
        <select name="id_mobil" id="id_mobil" class="form-control" required>
  <?php $b= $perintah ->tampil("tbl_mobil where id_mobil = $mobil");
    foreach ($b as $value){   ?>
   <option value="<?php echo $value['id_mobil']?>" > <?php echo$value['nama_mobil'] ?></option>
   <?php } 
   ?>
</select>
          </div>
          </div>
          <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Jenis Mobil</label>
        <div class="col-9">
           <input class="form-control" type="text"  placeholder="JENIS MOBIL"  name="jenis_mobil" id="jenis_mobil" value="<?php echo $jenis_mobil ?>" readonly="readonly" required>
        </div>
        </div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Harga Sewa Perhari</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="HARGA SEWA PERHARI" readonly name="harga_sewa_perhari" id="harga_sewa_perhari" value="<?php echo $harga_sewa_perhari ?>"  required>
  </div>
</div>

<div class="form-group row">
  
  <div class="col-12">
    
  
  <button class="btn btn-success float-right  " type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" onClick="sum_harga_sewa_total()" >
    Lanjutkan Pembayaran
  </button>
  
</p>
<br>
<br>
<div class="collapse" id="collapseExample">
  
    <div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Harga Sewa Total</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="HARGA SEWA TOTAL"onkeyup="sum_sisa_pembayaran()"  name="harga_sewa_total" id="harga_sewa_total" value="<?php echo @$edit['harga_sewa_total'] ?>" readonly="readonly" required>
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Bayar</label>
  <div class="col-9">
    <input class="form-control" type="text" onkeyup="sum_sisa_pembayaran()"  placeholder="Masukkan Nominal Bayar" id="nominal_bayar"  name="nominal_bayar" value="<?php echo @$edit['nominal_bayar'] ?>" required>
  </div>
  
</div>
<div class="form-group row">
    <label for="example-url-input" class="col-3 col-form-label">Sisa Pembayaran</label>
  <div class="col-9">
  <input class="form-control" type="text"  placeholder="Sisa Pembayaran"  name="sisa_bayar" id="sisa_bayar" value="<?php echo @$edit['sisa_bayar'] ?>" required readonly> 
  </div>
</div>

<div class="text-right">
    <?php if (@$_GET['id']==""){ ?>
    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
    <?php }else{?>
    <button type="submit" name="ubah" class="btn btn-danger">Ubah</button>
    <?php }?>
    </div>
</div>
  </div>
</div>


</div>

    


</div>
</div>  
<br>
<br>

<br>
<br>
<!-- DataTales Example -->
<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Transaksi Booking</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Nama Customer</th>
                      <th>No Telepon</th>
                      <th>Nama Mobil</th>
                      <th>Jenis Mobil</th>
                      <th>Warna Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Tanggal Sewa</th>                    
                      <th>Tanggal Kembali</th>
                      <th>Tanggal Booking</th>
                      <th>Jumlah Hari</th>
                      
                      <th>Harga Sewa Perhari</th>
                      <th>Harga Sewa Total</th>
                      <th>Nominal Bayar</th>
                      <th>Sisa Bayar</th>
                      <th>Status Pembayaran</th>
                      <th>Batal Booking</th>
                      <th>Edit</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_booking");
          $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['no_telepon']?> </td>
<td><?php echo $row['nama_mobil']?></td>
<td><?php echo $row['jenis_mobil']?> </td>
<td><?php echo $row['warna_mobil']?></td>
<td><?php echo $row['plat_nomor']?> </td>
<td><?php echo $row['tgl_sewa']?> </td>
<td><?php echo $row['tgl_kembali']?> </td>
<td><?php echo $row['tgl_booking']?> </td>
<td><?php echo $row['jml_hari'] ?></td>
<td><?php echo $row['harga_sewa_perhari']?></td>
<td><?php echo $row['harga_sewa_total']?> </td>
<td><?php echo $row['nominal_bayar']?> </td>
<td><?php echo $row['sisa_bayar']?> </td>
<td><?php echo $row['status_pembayaran']?> </td>
<td width="100" align="center"><a href="?menu=booking&hapus&id=<?php echo $row['id_booking'] ?>" onClick="return confirm('Anda ingin menghapus ?')"><input  type="submit" name="hapus" value="Batal Booking" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
  <td width="100" align="center"> <a href="?menu=booking&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
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
<script type="text/javascript">
  <?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('harga_sewa_perhari').value = mobil[id].harga_sewa_perhari;
    document.getElementById('jenis_mobil').value = mobil[id].jenis_mobil;
};
</script>
<script type="text/javascript">
    function sum_harga_sewa_total()
{
        var harga_sewa_perhari = document.getElementById("harga_sewa_perhari").value;
        var jml_hari = document.getElementById("jml_hari").value;
        var harga_sewa_total = parseInt(harga_sewa_perhari * jml_hari);
        document.getElementById("harga_sewa_total").value = harga_sewa_total;
}
function sum_sisa_pembayaran()
{
        var harga_sewa_total = document.getElementById("harga_sewa_total").value;
        var nominal_bayar = document.getElementById("nominal_bayar").value;
        var sisa_bayar = parseInt(harga_sewa_total - nominal_bayar);
        document.getElementById("sisa_bayar").value = sisa_bayar;
}

   function GetDays(){
                var tgl_sewa = new Date(document.getElementById("tgl_sewa").value);
                var tgl_kembali = new Date(document.getElementById("tgl_kembali").value);
                return parseInt((tgl_kembali - tgl_sewa) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("tgl_kembali")){
            document.getElementById("jml_hari").value=GetDays();
        }  
    }
</script>