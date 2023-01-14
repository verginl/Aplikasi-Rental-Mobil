<?php
$perintah=new crud();
$query="qw_booking";
$table = "tbl_booking";
@$where="id_booking = $_GET[id]";
$link="?menu=data_booking";


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
  <script src="../css/datatables/dataTables.bootstrap4.min.js"></script> <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="../js/gijgo.min.js" type="text/javascript"></script>
    <link href="../css/gijgo.min.css" rel="stylesheet" type="text/css" />
<body>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
<h1 class="h3 mb-2 text-gray-800">Form Transaksi Penyewaan Mobil</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<form method="post" action="?menu=booking">
<div class="card o-hidden border-left-danger shadow h-100 my-0">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
       <div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Dari Tanggal</label>
      <div class="col-3">
        
        <input id="tgl_sewa" type="text" width="217" name="tgl_sewa" onchange="cal()" required placeholder="Dari Tanggal" />
      </div>
      <label for="example-search-input" class="col-2 col-form-label">Sampai Tanggal</label>
      <div class="col-3">
      <input  id="tgl_kembali" type="text"name="tgl_kembali"width="217" onchange="cal()" placeholder="Sampai Tanggal" required />
   
      </div>
      </div>
<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Booking</label>
      <div class="col-3">
    <input class="form-control" readonly="" name="tgl_booking" type="text" value="<?php echo date('Y-m-d')?>" required>
 
    </div>
    <label for="example-url-input" class="col-2 col-form-label">Jumlah Hari</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Jumlah Hari" readonly name="jml_hari" id="jml_hari" value="<?php echo @$edit['jml_hari'] ?>" required>
  </div>
    </div>
  <div class="form-group row">
          <label for="example-email-input" class="col-3 col-form-label">Pilih Mobil</label>
          <div class="col-9">
        <select name="id_mobil" id="id_mobil" class="form-control" onchange='changeValue(this.value)' required>
  <option value="<?php echo @$edit['id_mobil'] ?>"><?php echo @$edit['nama_mobil'] ?></option>
 <?php 
 $con = mysqli_connect("localhost", "root","", "db_rentalmobil");
 $query=mysqli_query($con, "select * from tbl_mobil"); 
 $result = mysqli_query($con, "select * from tbl_mobil");  
 $jsArray = "var mobil = new Array();\n";
 while ($row = mysqli_fetch_array($result)) {  
 echo '<option name="id_mobil"  value="' . $row['id_mobil'] . '">' . $row['nama_mobil'] . '</option>';  
 $jsArray .= "mobil['" . $row['id_mobil'] . "'] = {harga_sewa_perhari:'" . addslashes($row['harga_sewa_perhari']) ."',jenis_mobil:'" . addslashes($row['jenis_mobil']) ."'};\n";
  }
  ?>
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
       
              <input type="button" name="tampilkan" id="tampilkan" value="Tampilkan" class="btn btn-success text-right"/>         
          </div>
 <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#tgl_sewa').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd hh:mm',
            maxDate: function () {
                return $('#tgl_kembali').val();
            }
        });
        $('#tgl_kembali').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd hh:mm',
            minDate: function () {
                return $('#tgl_sewa').val();
            }
        });
    </script>
</div>
<br>
<div id="data_booking">
            <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Daftar Booking Penyewaan Mobil</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table class="display table table-bordered" id="" width="100%" cellspacing="0">
  
        <thead>
                    <tr>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Sewa</th>
                      <th>Nama Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Harga Sewa Total</th>
                      <th>Nominal Bayar</th>
                      <th>Sisa Bayar</th>
                      <th>Status Pembayaran</th>
                      <th>Detail</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_booking");
         
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['tgl_sewa'] ?></td>
<td><?php echo $row['nama_mobil']?></td>
<td><?php echo $row['plat_nomor']?> </td>
<td><?php echo $row['harga_sewa_total']?> </td>
<td><?php echo $row['nominal_bayar']?> </td>
<td><?php echo $row['sisa_bayar']?> </td>
<td><?php echo $row['status_pembayaran']?> </td>

  <td width="100" align="center"> <a href="?menu=data_booking_detail&edit&id=<?php echo $row['id_booking'] ?>"><input  type="submit" name="edit" value="Detail" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"></a></td>
                        </tr>
                       
                    
          <?php   }
          ?>

                </table>
              </div>
            </div>
            </div>
  </div>
</form>

         </body>

         
</html>
<script src="../js/jquery-ui.js"></script>
<!-- Script -->
<script>
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

   <?php echo $jsArray; ?>
function changeValue(id){
    document.getElementById('harga_sewa_perhari').value = mobil[id].harga_sewa_perhari;
    document.getElementById('jenis_mobil').value = mobil[id].jenis_mobil;
};
  $('#tampilkan').click(function(){
    var tgl_sewa = $('#tgl_sewa').val();
    var tgl_kembali = $('#tgl_kembali').val();
    var id_mobil = $('#id_mobil').val();
    if(tgl_sewa != '' && tgl_kembali != '' && id_mobil!= '')
    {
      $.ajax({
        url:"operasi_mobil.php",
        method:"POST",
        data:{tgl_sewa:tgl_sewa, tgl_kembali:tgl_kembali,id_mobil:id_mobil},
        success:function(data)
        {
          $('#data_booking').html(data);
        }
      });
    }
    else
    {
      alert("Isi Semua Opsi Diatas");
    }
  });
</script>