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
              <h6 class="m-0 font-weight-bold text-danger">Informasi Ketersediaan Mobil</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
	 <table class="display table table-bordered" id="" width="100%" cellspacing="0">
        <thead>
                   <tr align="center">
                      <th>Informasi</th>
                    </tr>
                  </thead>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
			<tr>
			
<td align="center">Maaf Mobil yang anda pilih tidak tersedia pada tanggal tersebut, silahkan pilih mobil atau tanggal lain.</td>



                        </tr> </table>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td align="center">Mobil yang anda pilih Tersedia, silahkan menuju Rental Mobil untuk Booking. </td>
		

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