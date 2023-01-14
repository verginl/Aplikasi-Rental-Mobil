<?php
// Range.php
if(isset($_POST["From"], $_POST["to"]))
{
	$conn = mysqli_connect("localhost", "root", "", "db_rentalmobil");
	$result = '';
	$query = "SELECT * FROM qw_transaksi WHERE tgl_sewa BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."'";
	$sql = mysqli_query($conn, $query);
	$result .='
	<br>
	<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Transaksi Penyewaan Sudah Selesai</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
	 <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                    <tr>
                    <th>No</th>
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
			<td><?php echo $no?> </td> 
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
		<td align="center" colspan="11">Tidak Ada Transaksi Penyewaan Pada Tanggal Tersebut</td>
		</tr>';
	}
	$result .='</table><a href="laporan_transaksi.php?menu=laporan_transaksi"><input  type="submit" name="edit" value="Cetak Laporan" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm "></a>
              </div>
            </div>
            </div>
    </div>

';
	echo $result;
}

?>