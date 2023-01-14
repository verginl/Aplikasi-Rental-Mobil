<?php
// Range.php
if(isset($_POST["tgl_sewa"])&& isset($_POST["tgl_kembali"])&& isset($_POST["id_mobil"]))
{
	$conn = mysqli_connect("localhost", "root", "", "db_rentalmobil");
	$result = '';
	$query = "SELECT * FROM qw_booking WHERE tgl_sewa BETWEEN '".$_POST["tgl_sewa"]."' AND '".$_POST["tgl_kembali"]."' AND id_mobil = '".$_POST["id_mobil"]."'" ;
	$sql = mysqli_query($conn, $query);
	$result .='
	<br>
	<div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Data Ketersediaan Mobil</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
	 <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                   <tr>
                      <th>ID Booking</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Booking</th>
                      <th>Dari Tanggal</th>
                      <th>Sampai Tanggal</th>
                      <th>Nama Mobil</th>
                      <th>Plat Nomor</th>
                      <th>Nominal Bayar</th>
                      <th>Sisa Bayar</th>
                      <th>Status Pembayaran</th>
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
<td>'.$row["tgl_booking"].'</td>
<td>'.$row["tgl_sewa"].'</td>
<td>'.$row["tgl_kembali"].'</td>
<td>'.$row["nama_mobil"].'</td>
<td>'.$row["plat_nomor"].'</td>
<td>'.$row["nominal_bayar"].'</td>
<td>'.$row["sisa_bayar"].'</td>
<td>' .$row["status_pembayaran"].' </td>

                        </tr> </table>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td align="center" colspan="5">Mobil Tersedia : </td>
		<td colspan="6"><input  type="submit" name="booking" value="Booking Mobil" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm "></td>

		</tr>'; 
	}
	$result .='
              </div>
            </div>
            </div>
    </div>

';
	echo $result;
}

?>