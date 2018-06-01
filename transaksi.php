<!DOCTYPE html>
<html lang="en">

  <head>

    <?php require 'header.php'; ?>
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navbar.php'; ?>
    <?php
      $data = $konek->query("SELECT * FROM `transaksi` group by nama_pelanggan");
      $i = 1;
    ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Input Pesanan
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-12">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Pemesan</th>
                <th>Menu yang Dipesan</th>
                <th>Tanggal Transaksi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($data as $d) {
                  $idcustomer = $d['id'];
                  $nama_pelanggan = $d['nama_pelanggan'];
                ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $d['nama_pelanggan']; ?></td>
                <td>
                  <table class="table table-hover">
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                  <?php
                    $pesan = $konek->query("SELECT * FROM `daftar_menu`, `transaksi` WHERE transaksi.nama_pelanggan = '$nama_pelanggan' AND transaksi.id_menu = daftar_menu.id  ");
                    // var_dump($pesan);
                    $total = 0;
                    $semua = 0;
                    foreach ($pesan as $p) {
                      $hrg = $p['harga']*$p['jumlah'];
                      $total += $hrg;
                      $semua += $total;
                      ?>
                      <tr>
                        <td><?php echo $p['nama_menu'];?></td>
                        <td><?php echo $p['jumlah'];?></td>
                        <td><?php echo $p['harga'];?></td>
                        <td><?php echo $hrg;?></td>
                      </tr>
                    <?php }?>
                    <tr>
                      <td colspan="3">Total</></td>
                      <td><strong><?php echo $total; ?></strong></td>
                    </tr>
                    </table>
                    
                </td>
                <td><?php echo $d['tanggal']; ?></td>
                <script type="text/javascript">
                  function cek<?php echo $idcustomer; ?>() {
                    var angka = document.getElementById('bayar<?php echo $idcustomer;?>').value;
                    if (angka < <?php echo $total;?>) {
                      document.getElementById("cek<?php echo $idcustomer;?>").innerHTML="Maaf, uang anda tidak cukup.";
                      document.getElementById("button<?php echo $idcustomer;?>").disabled = true;
                    }else{
                      document.getElementById("cek<?php echo $idcustomer;?>").innerHTML="";
                      document.getElementById("button<?php echo $idcustomer;?>").disabled = false;
                    }
                    
                  }
                  </script>
                  <?php
                    if ($p['ket'] != 'OK') {
                  ?>
                <td><form method="POST" action="nota.php" class="form-horizontal">
                  <div class="row text-right" style="padding-bottom:10px;">
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="bayar" id="bayar<?php echo $idcustomer; ?>" onkeyup="cek<?php echo $idcustomer;?>()">
                      <p id="cek<?php echo $idcustomer;?>" style="color:red;"></p>
                      <input type="hidden" class="form-control" name="id" value="<?php echo $idcustomer; ?>">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" id="button<?php echo $idcustomer;?>" disabled="true">BAYAR</button>
                </form></td>
                <?php  }else{?>
                <td><strong>SUDAH BAYAR</strong></td>
                <?php }?>
              </tr>

              <?php 
              
              $i++;} ?>
            </tbody>
          </table>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <?php require 'script.php'; ?>
    <script type="text/javascript">
      $(function() {
          $('#search').on('keyup', function() {
              var pattern = $(this).val();
              $('.searchable-container .items').hide();
              $('.searchable-container .items').filter(function() {
                  return $(this).text().match(new RegExp(pattern, 'i'));
              }).show();
          });
      });
    </script>
  </body>

</html>
