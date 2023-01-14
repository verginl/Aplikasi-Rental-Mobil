<?php
date_default_timezone_set("Asia/Bangkok");
include"../Library/koneksi.php";
$perintah=new crud();
$perintah->koneksi();
$query="qw_booking";
@$where="id_booking = $_GET[id]";
if(isset($_GET['edit'])){
  @$edit=$perintah->edit($query,$where);
  
}
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../sintak/style.css">
<meta http-equiv="content-type" content="text/html"; charset="utf-8">
<title>Cetak Struk</title>
</head>

<body>
<style>
.utama{
	margin:0 auto;
	border:thin solid#000000;
	width:1030px;
	height:auto;}
.print{
	margin:0 auto;
	width:700px;}
	a{
		text-decoration:none;}
</style>
  <div class="print">
    <a href="" onclick="document.getElementById('print').style.display='none';window.print();">
    <img src="../img/print-icon.png" id="print" width="25" height="25" border="0" /></a>
    </div>
    <div class="utama"><br>
        <table width="100%" border="0" cellspacing="3" cellpadding="0" align="center" style="margin-top:10px;margin-left:10px; font-size:20px">
            <tr>
                <td width="10%" rowspan="7" align="center" valign="top"><img src="../img/logorental.png"  height="70" style="margin-right:30px;margin-top:15px; " /></td>
                <td width="90%" valign="top"><strong>CV. BINTANG MULYA</strong></td><br>

            </tr>
        <tr>
            <td valign="top">CHANDRA RENTAL MOBIL</td>
        </tr>
        <tr>
            <td valign="top" style="padding-right:10px; ">JL. H. Achmad Sobana No.4 Indraprasta, Tegal Gundil Wr Jambu, Bogor, Jawa Barat</td>
            
        </tr>
        <tr><td valign="top"><strong>Telp. 082116072040, 087770083776 (Samping SMA Kamandaka)</strong></td></tr>
        </table><table width="100%"><br>

        <tr><td><hr></td></tr>
    </table>

<br><table width="950" cellspacing="2" cellpadding="9px" align="center" border="1" style="border-collapse:collapse">
        <tr>
            <td width="30" colspan="3"><b>IDENTITAS PENYEWA</b></td>
           
        </tr>        
        <tr>
            <td width="30"> &nbsp;&nbsp;No Booking</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['id_booking'] ?> </td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Nama Customer</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['nama_customer'] ?> </td>       
        </tr> 
        <tr>
            <td width="30">&nbsp;&nbsp;No Telepon</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['no_telepon'] ?> </td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Jenis Kelamin</td>
            <td align="center">:</td>
            <td width="250">
                <?php if ($edit['jk']=='L') {
                    ECHO 'Laki - Laki';}
                    elseif ($edit['jk']=='P') {
                        ECHO 'Perempuan';
                    }


                     ?> </td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Alamat</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['alamat'] ?> </td>       
        </tr>
       <tr>
            <td width="30" colspan="3"><b>MOBIL</b></td>
           
        </tr>     
        <tr>
            <td width="30">&nbsp;&nbsp;Nama Mobil</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['nama_mobil'] ?>, <?php echo $edit['jenis_mobil'] ?>, <?php echo $edit['warna_mobil'] ?> </td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Plat Nomor</td>
            <td align="center">:</td>
            <td width="250"> <?php echo $edit['plat_nomor'] ?></td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Disewa Selama</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['jml_hari'] ?> Hari </td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Dari Tanggal</td>
            <td width="1"align="center">:</td>
            <td width="250"><b><?php echo $edit['tgl_sewa'] ?></b><i> &nbsp; Sampai Tanggal</i> &nbsp;  <b><?php echo $edit['tgl_kembali'] ?></b> </td>       
        </tr>
        <tr>
            <td width="30" colspan="3"><b>PEMBAYARAN</b></td>
           
        </tr>  
                <tr>
            <td width="30">&nbsp;&nbsp;Harga Sewa Perhari</td>
            <td align="center">:</td>
            <td width="250">Rp. <?php echo $edit['harga_sewa_perhari'] ?> / Hari </td>       
        </tr>
                <tr>
            <td width="30"><b>&nbsp;&nbsp;Total Pembayaran</b></td>
            <td align="center"><b>:</b></td>
            <td width="250"><b>Rp. <?php echo $edit['harga_sewa_total'] ?></b></td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Uang Muka / Booking</td>
            <td align="center">:</td>
            <td width="250">Rp. <?php echo $edit['nominal_bayar'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sisa Pembayaran : Rp. <?php echo $edit['sisa_bayar'] ?></td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Status Pembayaran</td>
            <td align="center">:</td>
            <td width="250"><?php echo $edit['status_pembayaran'] ?></td>       
        </tr>
        <tr>
            <td width="30" colspan="3"><b>PENGEMBALIAN</b></td>
           
        </tr>  
        <tr>
            <td width="30">&nbsp;&nbsp;Tanggal Mobil Dikembalikan</td>
            <td align="center">:</td>
            <td width="250">............................................................</td>       
        </tr>

        <tr>
            <td width="30">&nbsp;&nbsp;Telat Dikembalikan Selama</td>
            <td align="center">:</td>
            <td width="250">............................................................ Hari</td>       
        </tr>

        <tr>
            <td width="30">&nbsp;&nbsp;Biaya Cuci</td>
            <td align="center">:</td>
            <td width="250">Rp. .....................................................</td>       
        </tr>
        <tr>
            <td width="30">&nbsp;&nbsp;Denda / Biaya Lainnya</td>
            <td align="center">:</td>
            <td width="250">Rp. .....................................................</td>       
        </tr>
        <tr>
            <td width="30"><b>Status Transaksi</b></td>
            <td align="center"><b>:</b></td>
            <td width="250"><b>............................................................</b></td>       
        </tr>

</table><br>
<table width="950" cellspacing="2" cellpadding="40px" align="center" border="0" style="border-collapse:collapse">
    <tr align="center"><td></td>
        <td></td>
        <td></td>
    
    <td align="center">Bogor, <?php echo date('l- d - m - Y') ?></td>
    </tr>
    <tr align="center"><td>Yang Menyewakan / Pemilik</td>
        <td></td>
        <td></td>
        <td align="center">Penyewa</td></tr>
    <tr align="center"><td>(...............................................)</td>
        <td></td>
        <td></td>
    <td align="center">(...............................................)</td>
    </tr>

</table>


</div>
<center><input type="button" class="button" name="export" value="Export" style="display:none;"></center>
</body>
</html>