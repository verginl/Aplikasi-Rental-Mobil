<?php
date_default_timezone_set("Asia/Bangkok");
include"../Library/koneksi.php";
$perintah=new crud();
$perintah->koneksi();
$query="qw_transaksi";
@$where="id_transaksi = $_GET[id]";
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
        </table>
        <table width="100%"><br>

        <tr><td><hr></td></tr>
    </table>

<br>

<?php
$from = $_POST["From"];
$to = $_POST["to"];

    $conn = mysqli_connect("localhost", "root", "", "db_rentalmobil");
    $result = '';
    $query = "SELECT * FROM qw_transaksi WHERE tgl_sewa BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
    $sql = mysqli_query($conn, $query);

    $result .='
    <br>
        <table width="950" cellspacing="2" cellpadding="9px" align="center" border="1" style="border-collapse:collapse">
        <thead>
                    <tr>
                    
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Sewa</th>
                      <th>Nama Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Disewa Selama</th>
                      <th>Nominal Bayar Sewa</th>
                      <th>Denda</th>
                      <th>Tanggal Selesai Transaksi</th>
                      <th>Status Transaksi</th>
                  
                      </tr>
                  </thead>';
    if(mysqli_num_rows($sql) > 0)
    {
        while($row = mysqli_fetch_array($sql))
        {
            $result .='
            <tr>
<td>'.$row["id_booking"].'</td>
<td>'.$row["nama_customer"].'</td>
<td>'.$row["tgl_sewa"].'</td>
<td>'.$row["nama_mobil"].'</td>
<td>'.$row["plat_nomor"].'</td>
<td>'.$row["jml_hari"].' Hari</td>
<td>'.$row["nominal_bayar"].'</td>
<td>'.$row["denda"].'</td>
<td>'.$row["tgl_selesai"].'</td>
<td>' .$row["status_transaksi"].' </td>

                        </tr>';
        }
    }
    else
    {
        $result .='
        <tr>
        <td colspan="11" align="center">Tidak Ada Transaksi Pada Tanggal '.$from.' sampai '.$to.'</td>
        </tr>';
    }
    $result .='</table>
    <br>
              

';
    echo $result;
?>
</body>
</html>