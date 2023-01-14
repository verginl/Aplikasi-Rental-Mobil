<?php
$perintah=new crud();
$query="qw_transaksi";
$table = "tbl_transaksi";
@$where="id_transaksi = $_GET[id]";
$link="?menu=data_transaksi";
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
<h1 class="h3 mb-2 text-gray-800">Laporan Transaksi Penyewaan</h1>
          <h1 class="h6 mb-2 text-danger">Date : <?php echo date('l, d-M-Y') ?></h1>
</div>
<form method="post" action="laporan_transaksi.php">
<div class="card o-hidden border-left-danger shadow h-100 my-0">
      <div class="card-body p-4">
        <!-- Nested Row within Card Body -->
        <div class="form-group">
          <div class="form-group row"> 
          <table>
          <tr>
            <td width="150"> <label for="example-search-input">Pilih Tangal :</label></td>
            <td width="250"> 
              <input id="From" type="text" width="217" name="From" required placeholder="Dari Tanggal" />
            </td>
            <td width="250"> 
              <input  id="to" type="text"name="to"width="217"  placeholder="Sampai Tanggal"  required /></td>
            <td>
              <input type="button" name="tampilkan" id="tampilkan" value="Tampilkan Laporan" class="btn btn-success"/>
</td></tr>
        </table>

     
   
 <script>
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
        $('#From').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd',
            maxDate: function () {
                return $('#to').val();
            }
        });
        $('#to').datepicker({
            uiLibrary: 'bootstrap4',
            iconsLibrary: 'fontawesome',
            format:'yyyy-mm-dd',
            minDate: function () {
                return $('#From').val();
            }
        });
    </script>
</div></div></div></div>

            <br>
<div id="data_transaksi">
            <div class="card border-left-danger shadow h-100 my-0 shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-danger">Laporan Transaksi Penyewaan</h6>
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
                      <th>Detail</th>
                      </tr>
                  </thead>

                  <?php
          $result = mysql_query("SELECT * FROM qw_transaksi where status_transaksi = 'Selesai'");
          $no = 1;
                    while ($row = mysql_fetch_array($result)) {
            
                        ?>

                                            <tr>
<td><?php echo $no?> </td> 
<td><?php echo $row['id_booking'] ?></td>
<td><?php echo $row['nama_customer'] ?></td>
<td><?php echo $row['tgl_sewa'] ?></td>
<td><?php echo $row['nama_mobil']?></td>
<td><?php echo $row['plat_nomor']?> </td>
<td><?php echo $row['jml_hari']?> Hari </td>
<td><?php echo $row['nominal_bayar']?> </td>
<td><?php echo $row['denda']?> </td>
<td><?php echo $row['tgl_selesai']?> </td>

<td><?php echo $row['status_transaksi']?> </td>
  <td width="100" align="center"> <a href="?menu=data_transaksi_detail&edit&id=<?php echo $row['id_transaksi'] ?>"><input  type="submit" name="edit" value="Detail" class="btn btn-primary"></a></td>

                        </tr>
                    
          <?php  $no++;  }
          ?>
                </table>  </form>
              </div>
            </div>
            </div>
    </div>


         </body>

         
</html>
<script src="../js/jquery-ui.js"></script>
<!-- Script -->
<script>
$(document).ready(function(){
  $.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd'
  });
  $('#tampilkan').click(function(){
    var From = $('#From').val();
    var to = $('#to').val();
    if(From != '' && to != '')
    {
      $.ajax({
        url:"operasi_laporan.php",
        method:"POST",
        data:{From:From, to:to},
        success:function(data)
        {
          $('#data_transaksi').html(data);
        }
      });
    }
    else
    {
      alert("Please Select the Date");
    }
  });
});
</script>