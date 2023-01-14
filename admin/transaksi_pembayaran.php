<?php
$perintah=new crud();
$query = "qw_booking";
$table="tbl_booking";
@$where="id_booking = $_GET[id]";
$link="?menu=pembayaran";
@$tgl = date('d-m-Y');

if (@$_POST['sisa_bayar']==0)
    {
      $statuspembayaran = 'Lunas';
      }else{ $statuspembayaran = 'Belum Lunas'; }
    @$field=array('id_booking'=>$_POST['id_booking'],
              'id_customer'=>$_POST['id_customer'],
              'id_mobil'=>$_POST['id_mobil'],
              'tgl_sewa'=>$_POST['tgl_sewa'],
              'tgl_kembali' => $_POST['tgl_kembali'],
              'jml_hari' => $_POST['jml_hari'],
              'tgl_booking'=>$_POST['tgl_booking'],
              'harga_sewa_total'=>$_POST['harga_sewa_total'],
              'nominal_bayar'=>$_POST['nominal_bayar'],
              'sisa_bayar'=>$_POST['sisa_bayar'],
              'status_pembayaran' => $statuspembayaran,
              );  
      
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
  @$perintah->ubah_pembayaran($table,$field,$where,$link);
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
<h1 class="h3 mb-2 text-gray-800">Form Pelunasan Pembayaran</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<form method="post">


            <div class="form-group row">
  
  <div class="col-12">
    
  
  <button class="btn btn-success float-right  " type="button" data-toggle="collapse" data-target="#collapseDataBooking" aria-expanded="false" aria-controls="collapseExample"onClick="sum_harga_sewa_total()" >
    Tampilkan Data Booking
  </button>
  
</p>
<br>
<br>
<div class="collapse" id="collapseDataBooking">
<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Bookingan Penyewaan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Nama Mobil</th>
                      <th>Tanggal Booking</th>
                      <th>Status Pembayaran</th>
                      <th>Pembayaran</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_booking where status_pembayaran = 'Belum Lunas'");
          $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['nama_mobil']?></td>
<td><?php echo $row['tgl_booking']?> </td>
<td><?php echo $row['status_pembayaran']?> </td>
 <td width="100" align="center"> <a href="?menu=pembayaran&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Pembayaran" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
                        </tr>
                    
          <?php  $no++;  }
          ?>
                </table>
              </div>
            </div>
           </div>
           </div></div></div>
    <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="form-group">
        <div class="form-group row">        
          <label for="example-text-input" class="col-3 col-form-label">ID Transaksi Booking</label>
        <div class="col-9">
          <input class="form-control" type="text" placeholder="ID Transaksi Booking" readonly name="id_booking" value="<?php echo @$edit['id_booking'] ?>">
        </div>
        </div>

        <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Nama Customer</label>
        <div class="col-9">
        <select name="id_customer" class="form-control"   >
        <option value="<?php echo @$edit ['id_customer'] ?>"> <?php echo @$edit ['nama_customer']?> </option>
        
   </select>
        </div>
        </div>

<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Dari Tanggal</label>
      <div class="col-3">
        
        <input id="tgl_sewa" type="text" width="217" name="tgl_sewa" value="<?php echo @$edit['tgl_sewa'] ?>" onchange="cal()" required placeholder="Dari Tanggal" />
      </div>
      <label for="example-search-input" class="col-2 col-form-label">Sampai Tanggal</label>
      <div class="col-3">
      <input  id="tgl_kembali" type="text"name="tgl_kembali"width="217"  placeholder="Sampai Tanggal" value="<?php echo @$edit['tgl_kembali'] ?>" onchange="cal()" required />
   
      </div>
      </div>
      <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#tgl_sewa').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            minDate: today,
            format:'yyyy-mm-dd',
            maxDate: function () {
                return $('#tgl_kembali').val();
            }
        });
        $('#tgl_kembali').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd',
            minDate: function () {
                return $('#tgl_sewa').val();
            }
        });
    </script>
      
    
<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Booking</label>
      <div class="col-3">
    <input class="form-control"  name="tgl_booking" type="text" value="<?php echo @$edit['tgl_booking']  ?>" required readonly >
 
    </div>
    <label for="example-url-input" class="col-2 col-form-label">Jumlah Hari</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Jumlah Hari" readonly name="jml_hari" id="jml_hari" value="<?php echo @$edit['jml_hari'] ?>" required>
  </div>
    </div>
        <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Pilih Mobil</label>
          <div class="col-9">
        <select name="id_mobil" id="id_mobil" class="form-control" onchange='changeValue(this.value)' readonly required>
  <option value="<?php echo @$edit['id_mobil'] ?>"><?php echo @$edit['nama_mobil'] ?></option>

</select>

          </div>
          </div>
          <div class="form-group row">
          <label for="example-search-input" class="col-3 col-form-label">Jenis Mobil</label>
        <div class="col-9">
           <input class="form-control" type="text"  placeholder="JENIS MOBIL"  name="jenis_mobil" id="jenis_mobil" value="<?php echo @$edit['jenis_mobil'] ?>" readonly="readonly" required>
        </div>
        </div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Harga Sewa Perhari</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="HARGA SEWA PERHARI" readonly name="harga_sewa_perhari" id="harga_sewa_perhari" value="<?php echo @$edit['harga_sewa_perhari'] ?>"  required>
  </div>
</div>


    <div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Harga Sewa Total</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="HARGA SEWA TOTAL"onkeyup="sum_sisa_pembayaran()"  name="harga_sewa_total" id="harga_sewa_total" value="<?php echo @$edit['harga_sewa_total'] ?>" readonly="readonly" required>
  </div>
</div>
    <div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Biaya DP</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Nominal Terbayar" name="" id="nominal_bayar" value="<?php echo @$edit['nominal_bayar'] ?>" readonly="readonly" required>
  </div>
</div>
<div class="form-group row">
    <label for="example-url-input" class="col-3 col-form-label">Sisa Biaya Sewa</label>
  <div class="col-9">
  <input class="form-control" type="text"  placeholder="Nominal Terbayar" name="" id="sisa_bayar" value="<?php echo @$edit['sisa_bayar'] ?>" readonly="readonly" required>
  
  </div>
</div>

<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Nominal Biaya Pelunasan</label>
  <div class="col-9">
    <input class="form-control" type="text" onkeyup="sum_sisa_pembayaran()" placeholder="Nominal Bayar Pelunasan" id="nominal_pelunasan"  name="nominal_pelunasan" required>
  </div>
  
</div>
<div class="form-group row">
<label for="example-url-input" class="col-3 col-form-label">Total Seluruh Pembayaran</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Total Pembayaran" readonly name="nominal_bayar" id="nominal_bayar_akhir" value="" required>
  </div>
  <label for="example-url-input" class="col-2 col-form-label">Sisa Biaya Akhir</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Sisa Seluruh Pembayaran" name="sisa_bayar" id="sisa_bayar_akhir" value="" readonly="readonly" required>
  </div>
</div>
<?php

?>

<div class="text-right">
    <?php if (@$_GET['id']==""){ ?>
    <button type="submit" name="simpan" class="btn btn-danger">Simpan</button>
    <?php }else{?>
    <button type="submit" name="ubah" class="btn btn-danger">Update Pembayaran</button>
    <?php }?>
    </div>
</div>
  </div>
</div>


<br>
<br><div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
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
<td width="100" align="center"> <a href="?menu=pembayaran&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
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

$('#nominal_pelunasan').keyup(function(){
    var nominal_bayar;
    var nominal_pelunasan;
nominal_bayar = parseInt($('#nominal_bayar').val());
nominal_pelunasan = parseInt($('#nominal_pelunasan').val());
var nominal_bayar_akhir = nominal_bayar + nominal_pelunasan;
$('#nominal_bayar_akhir').val(nominal_bayar_akhir.toFixed());

    });
$('#nominal_pelunasan').keyup(function(){
    var sisa_bayar;
    var nominal_pelunasan;
sisa_bayar = parseInt($('#sisa_bayar').val());
nominal_pelunasan = parseInt($('#nominal_pelunasan').val());
var sisa_bayar_akhir = sisa_bayar - nominal_pelunasan;
$('#sisa_bayar_akhir').val(sisa_bayar_akhir.toFixed());

    });
        
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


  $('#tgl_sewa').datepicker({
            uiLibrary: 'bootstrap4'
        });
</script>