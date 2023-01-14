<?php
$perintah=new crud();
$query = "qw_transaksi";
$table="tbl_transaksi";
@$where="id_transaksi = $_GET[id]";
$link="?menu=pembayaran";
@$tgl = date('d-m-Y');
    @$field=array('id_booking'=>$_POST['id_booking'],
              'tgl_selesai'=>$_POST['tgl_selesai'],
              'jml_hari_telat'=>$_POST['jml_hari_telat'],
              'biaya_cuci'=>$_POST['biaya_cuci'],
              'denda'=>$_POST['denda'],
              'status_transaksi' => 'Selesai',
              'status_sewa' => 'Selesai',
              );
    @$where2="id_customer = $_POST[id_customer]";
    @$field2=array('status' =>'Belum Sewa'); 
    $table2 = "tbl_customer";

      
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
  @$perintah->ubah($table2,$field2,$where2,$link);
  echo"<script>;document.location.href='?menu=pengembalian'</script>";


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
<h1 class="h3 mb-2 text-gray-800">Form Transaksi Pengembalian Sewa Mobil</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>

   <br>
        <form method="post" >       
  <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Penyewaan Mobil</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>No Telepon</th>
                      <th>Mobil</th>
                      <th>Tanggal Sewa</th>                    
                      <th>Tanggal Kembali</th>
                      <th>Tanggal Booking</th>
                      <th>Jumlah Hari</th>
                      <th>Status Sewa</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_transaksi where status_transaksi = 'Belum Selesai'");
          $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['no_telepon']?> </td>
<td><?php echo $row['nama_mobil'].','.$row['jenis_mobil'].','.$row['warna_mobil'].','.$row['plat_nomor'] ?></td>
<td><?php echo $row['tgl_sewa']?> </td>
<td><?php echo $row['tgl_kembali']?> </td>
<td><?php echo $row['tgl_booking']?> </td>
<td><?php echo $row['jml_hari'] ?></td>
 <td width="100" align="center"> <a href="?menu=pengembalian&edit&id=<?php echo $row['id_transaksi'] ?>"><input  type="submit" name="edit" value="Selesai" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"></a></td>
                        </tr>
                    
          <?php  $no++;  }
          ?>

                </table>
                
              </div>
              
            </div>

</div>       
<div class="card o-hidden border-left-danger shadow h-100 my-0">
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
        
        <input class="form-control" type="text" width="217" name="tgl_sewaa" value="<?php echo @$edit['tgl_sewa'] ?>"  required placeholder="Dari Tanggal" readonly />
      </div>
      <label for="example-search-input" class="col-2 col-form-label">Sampai Tanggal</label>
      <div class="col-3">
      <input class="form-control"  type="text"name="tgl_kembali"width="217"readonly id="tgl_kembali"  placeholder="Sampai Tanggal" value="<?php echo @$edit['tgl_kembali'] ?>" required />
   
      </div>
      </div>
      
    
<div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Booking</label>
      <div class="col-3">
    <input class="form-control"  name="tgl_booking" type="text" value="<?php echo @$edit['tgl_booking']  ?>" required readonly>
 
    </div>
    <label for="example-url-input" class="col-2 col-form-label">Jumlah Hari Sewa</label>
  <div class="col-3">
    <input class="form-control" type="text"  placeholder="Jumlah Hari" readonly name="jml_hari"  value="<?php echo @$edit['jml_hari'] ?>" required>
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
    <input name="harga_sewa_total" class="form-control" type="text"  placeholder="HARGA SEWA TOTAL" value="<?php echo @$edit['harga_sewa_total'] ?>" readonly="readonly" required>
  </div>
</div>
    <div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Total Pembayaran Biaya Sewa</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Nominal Terbayar" name="" id="nominal_bayar" value="<?php echo @$edit['nominal_bayar'] ?>" readonly="readonly" required>
  </div>
</div>
      <div class="form-group row">
      <label for="example-search-input" class="col-3 col-form-label">Tanggal Pengembalian Mobil</label>
      <div class="col-3"> 
        <input name = "tgl_selesai" class="form-control" id="tgl_selesai"  onchange="cal()" type="date" placeholder="Masukkan Tanggal"  />
      </div>
      
      <label for="example-search-input" class="col-2 col-form-label">Jumlah Hari Terlambat</label>
      <div class="col-3">
      <input class="form-control" type="text"  placeholder="Jumlah Hari Telat" readonly name="jml_hari_telat" id="jml_hari_telat" value="<?php echo @$edit['jml_hari_telat'] ?>" required>
   
      </div>
      </div>
      


<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Biaya Cuci Mobil</label>
  <div class="col-3">
  <input class="form-control" type="text"  placeholder="Biaya Cuci Mobil" name="biaya_cuci" value="<?php echo @$edit['biaya_cuci'] ?>"  required> 
</div>
 <label for="example-url-input" class="col-4 col-form-label">Note : Biaya Cuci Mobil Opsional / Tidak Wajib</label>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-3 col-form-label">Denda / Biaya Lainnya</label>
  <div class="col-9">
    <input class="form-control" type="text"  placeholder="Denda Biaya Sewa" name="denda" value="<?php echo @$edit['denda'] ?>"  required>
  </div>
  </div>
<div class="text-right">
    <?php if (@$_GET['id']==""){ ?>
    <button type="submit" name="simpan" class="btn btn-danger">Transaksi Selesai</button>
    <?php }else{?>
    <button type="submit" name="ubah" class="btn btn-danger">Transaksi Selesai</button>
    <?php }?>
    </div>
</div>
  </div>
</div>

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
                      <th>Edit</th>
                    </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_transaksi");
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
<td width="100" align="center"> <a href="?menu=pengembalian&edit&id=<?php echo $row['id_transaksi'] ?>"><input  type="submit" name="edit" value="Edit" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"></a></td>
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
</script>
         <script type="text/javascript">
        
          function GetDays(){
                var tgl_selesai = new Date(document.getElementById("tgl_selesai").value);
                var tgl_kembali = new Date(document.getElementById("tgl_kembali").value);
                return parseInt((tgl_selesai - tgl_kembali) / (24 * 3600 * 1000));
        }

        function cal(){
        if(document.getElementById("tgl_kembali")){
            document.getElementById("jml_hari_telat").value=GetDays();
        }  
    }

</script>