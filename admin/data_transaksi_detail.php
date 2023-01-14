<?php
$perintah=new crud();
$query="qw_transaksi";
$table = "tbl_transaksi";
@$where="id_transaksi = $_GET[id]";
$link="?menu=data_booking";


if(isset($_GET['edit'])){
  @$edit=$perintah->edit($query,$where);
  
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<title>Rental Mobil</title>
</head>
<body>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
<h1 class="h3 mb-2 text-gray-800">Detail Transaksi Sewa Mobil a/n <?php echo $edit['nama_customer']?></h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<!-- DataTales Example -->
          <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Detail Transaksi</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <div class="row">
    <div class="col">
      <table class="table table-bordered">
        <tr>

      <td height="200" align="center" colspan="3"> 
        <div class="text-center">
  <img  class="rounded mx-auto d-block" height="200" width="200" src="../img/admin2-01.png" alt="Foto Tidak Tersedia">
</div></td>
    </tr>
    <tr>
      <td>ID Booking</td>
      <td>:</td>
      <td> <?php echo $edit['id_booking'] ?></td>
    </tr>
    <tr>
          <td>Nama Customer</td>
      <td>:</td>
      <td><?php echo $edit['nama_customer'] ?></td>
    </tr><tr>
          <td>No Telepon</td>
      <td>:</td>
      <td><?php echo $edit['no_telepon'] ?></td>
    </tr><tr>
    <td>Mobil</td>
      <td>:</td>
      <td><?php echo $edit['nama_mobil'] ?></td>
    </tr><tr>
    <td>Jenis Mobil</td>
      <td>:</td>
      <td><?php echo $edit['jenis_mobil'] ?></td>
    </tr><tr>
    <td>Warna Mobil</td>
      <td>:</td>
      <td><?php echo $edit['warna_mobil'] ?></td>
    </tr>
    <td>Plat Nomor</td>
      <td>:</td>
      <td><?php echo $edit['plat_nomor'] ?></td>
    </tr>
    <td>Jenis Mobil</td>
      <td>:</td>
      <td><?php echo $edit['jenis_mobil'] ?></td>
    </tr>
    <td>Tanggal Sewa</td>
      <td>:</td>
      <td><?php echo $edit['tgl_sewa'] ?> </td>
    </tr>
    <td>Tanggal Kembali</td>
      <td>:</td>
      <td><?php echo $edit['tgl_kembali'] ?></td>
    </tr>
    <td>Jumlah Hari</td>
      <td>:</td>
      <td><?php echo $edit['jml_hari'] ?></td>
    </tr>
    
  </table>
    </div>
    <div class="col">
      <table class="table table-bordered">
    <tr>
    <td>Harga Sewa Perhari</td>
      <td>:</td>
      <td><?php echo $edit['harga_sewa_perhari'] ?> </td>
    </tr>
    <td>Harga Sewa Total</td>
      <td>:</td>
      <td><?php echo $edit['harga_sewa_total'] ?></td>
    </tr><tr>
    <td>Nominal Bayar Sewa</td>
      <td>:</td>
      <td><?php echo $edit['nominal_bayar'] ?></td>
    </tr><tr>
    <td>Sisa Pembayaran</td>
      <td>:</td>
      <td><?php echo $edit['sisa_bayar'] ?></td>
    </tr>
    <tr>
    <td>Status Pembayaran</td>
      <td>:</td>
      <td><?php echo $edit['status_pembayaran'] ?></td>
    </tr><tr>
    <td>Tanggal Selesai Transaksi</td>
      <td>:</td>
      <td><?php echo $edit['tgl_selesai'] ?></td>
    </tr>
        <tr>
    <td>Jumlah Hari Telat</td>
      <td>:</td>
      <td><?php echo $edit['jml_hari_telat'] ?></td>
    </tr>
        
        <tr>
    <td>Biaya Cuci Mobil</td>
      <td>:</td>
      <td><?php echo $edit['biaya_cuci'] ?></td>
    </tr>
    <tr>
    <td>Denda / Biaya lainnya</td>
      <td>:</td>
      <td><?php echo $edit['denda'] ?></td>
    </tr>
    <tr>
    <td>Status Transaksi<td>:</td>
      <td><?php echo $edit['status_sewa'] ?></td>
    </tr>
  </table>
<a href="struk_transaksi.php?menu=struk_transaksi&edit&id=<?php echo$edit['id_transaksi'] ?>"><input  type="submit" name="edit" value="Cetak Struk" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm "></a>
    </div>
  </div>
  
  

              </div>

            </div>
    

  
         </body>

         
</html>
