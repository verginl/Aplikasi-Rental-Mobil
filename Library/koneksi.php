<?php
class crud {

function koneksi (){
		mysql_connect("localhost","root","");
		mysql_select_db ("db_rentalmobil");	

	}
	function ubah_pembayaran($table, array $field, $where,$link){
		@$sisa_bayar = "$_POST[sisa_bayar]";
		if ($sisa_bayar < 0){
		echo '<div class="alert alert-danger">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <strong>Failed!</strong> Maaf uang pembayaran pelunasan harus pas sesuai sisa bayar
	   </div>';
			   }else{
		$sql="UPDATE ".$table." SET";
		
		foreach($field as $key=> $value){
			$sql.=" ".$key."='".$value."',";
		}
		$sql=rtrim($sql,',');
		$sql.="WHERE ".$where."";
		$jalan= mysql_query($sql);
		if($jalan){
		echo '<div class="alert alert-success">
	 	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Suksess!</strong> Data Berhasil Diubah.</strong>
		</div>';
		}
		}
	}
function simpanbooking($table,array $field, $link){
@$nominal_bayar="$_POST[nominal_bayar]";
if ($nominal_bayar <= 100000) {
	echo '<div class="alert alert-danger">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Failed!</strong> Maaf biaya DP harus lebih dari Rp. 100.000.
	</div>';
			}else{
				
		$sql = "INSERT INTO ".$table." SET ";
		foreach($field as $key => $value){
		$sql.=" ".$key." = '".$value."',";
		}
		$sql=rtrim($sql,',');
		$jalan = mysql_query($sql);
		if($jalan){
echo '<div class="alert alert-success">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Suksess!</strong> Data Berhasil Tersimpan.
	</div>';
	}
	}
}

function simpan ($table, array $field,$link){
	$sql = "INSERT INTO ".$table." SET ";
	foreach($field as $key => $value){
		$sql.=" ".$key." = '".$value."',";
	}
	$sql=rtrim($sql,',');
	$jalan = mysql_query($sql);
	
	if($jalan){
echo '<div class="alert alert-success">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Suksess!</strong> Data Berhasil Tersimpan.
	</div>';
	}else{  
	echo mysql_error();
	//echo '<div class="alert alert-danger">
	 //<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	//<strong>Failed!</strong> Data Tidak Tersimpan.
	//</div>';


	}
}
function returnn($table, array $field,$link){
	$sql = "INSERT INTO ".$table." SET ";
	foreach($field as $key => $value){
		$sql.=" ".$key." = '".$value."',";
	}
	$sql=rtrim($sql,',');
	$jalan = mysql_query($sql);
	
	if($jalan){
echo '<div class="alert alert-success">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Suksess!</strong> Data Berhasil Dikembalikan.
	</div>';
	}else{
// echo mysql_error();
 
  echo '<div class="alert alert-danger">
 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Failed!</strong> Maaf Data Tidak Bisa Dikembalikan.
</div>';
	}
}

	function tampil($table){
		$sql= "SELECT * FROM ".$table."";
		$tampil= mysql_query($sql);
		while(@$value=mysql_fetch_array($tampil)){
		$isi[]=$value;	
		}
		return @$isi;
	}
	function hapus ($table, $where,$link){
		$sql="DELETE FROM $table WHERE $where";
		$jalan=mysql_query($sql);
		if ($jalan){
			echo '<div class="alert alert-success">
			 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Suksess!</strong> Data Berhasil Dihapus.
					</div>';
		}else{
			echo		mysql_error();
		echo '<div class="alert alert-danger">
	 	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Failed!</strong> Data Tidak Terhapus.
		</div>';
		}
	}
	
	function edit($table, $where) {
		$sql= "SELECT * FROM $table WHERE $where";
		@$jalan=mysql_fetch_array(mysql_query($sql));
		return $jalan;
	}
	function ubah($table, array $field, $where,$link){
		$sql="UPDATE ".$table." SET";
		
		foreach($field as $key=> $value){
			$sql.=" ".$key."='".$value."',";
		}
		$sql=rtrim($sql,',');
		$sql.="WHERE ".$where."";
		$jalan= mysql_query($sql);
		if($jalan){
		echo '<div class="alert alert-success">
	 	<a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Suksess!</strong> Data Berhasil Diubah.</strong>
		</div>';
		}else{
echo		mysql_error();
		//echo '<div class="alert alert-danger">
	 	//<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		//<strong>Failed!</strong> Data Gagal Terubah.</strong>
		//</div>';
		}
		}
		function uploadfoto($foto,$tempat){
			$alamat= $foto['tmp_name'];
			$namafile= $foto['name'];
			move_uploaded_file($alamat,"$tempat/$namafile");
			return $namafile;

		}
		function login($table, $username, $password, $nama_form){
			@session_start();
			$username=$_POST['username'];
			$password= $_POST['password'];
			$sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
			$jalan = mysql_query($sql);
			@$tampil = mysql_fetch_array($jalan);
			@$cek = mysql_num_rows($jalan);
			if($cek > 0){
				@session_start($tampil[$username]);
				@session_start($tampil[$password]);
				$_SESSION['username'] = $username;
				echo "<script>alert('Welcome $username');document.location.href= '$nama_form'</script>";
			}else{
					echo "<script>alert('Login Failed, Username or Password Not Valid')</script>";
			}
		}
		
}
?>

