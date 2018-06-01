<!DOCTYPE html>
<html lang="en">

  <head>

    <?php require 'header.php'; ?>
    <style type="text/css">
.borderless td, .borderless th {
    border: none;
}
    </style>
  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navbar.php'; ?>
    <?php
      $id = $_POST['id'];
      $bayar = $_POST['bayar'];
      $data = $konek->query("SELECT * FROM `transaksi` WHERE id = '$id'  group by nama_pelanggan");
      $i = 1;
    ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">NOTA PEMBAYARAN
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-12">
              <?php
                  foreach ($data as $d) {
                  $idcustomer = $d['id'];
                  $nama_pelanggan = $d['nama_pelanggan'];
                ?>
                <div class="col-md-4">
                <table class="table borderless">
                  <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <td><?php echo $d['nama_pelanggan']; ?></td>
                  </tr>
                  <tr>
                    <th>Nomor Meja</th>
                    <th>:</th>
                    <td><?php echo $d['no_meja']; ?></td>
                  </tr>
                </table>
                </div>
                <div class="col-md-12">
                  <table class="table table-hover">
                    <th>Nama Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                  <?php
                    $nama = $d['nama_pelanggan'];
                    $pesan = $konek->query("SELECT * FROM `daftar_menu`, `transaksi` WHERE transaksi.nama_pelanggan = '$nama_pelanggan' AND transaksi.id_menu = daftar_menu.id  ");
                    $update = $konek->query("UPDATE `transaksi` SET `bayar`=$bayar,`ket`='OK' WHERE nama_pelanggan LIKE '%$nama%'");
                    $total = 0;
                    $semua = 0;
                    foreach ($pesan as $p) {
                      $hrg = $p['harga']*$p['jumlah'];
                      $total += $hrg;
                      ?>
                      <tr>
                        <td><?php echo $p['nama_menu'];?></td>
                        <td><?php echo $p['jumlah'];?></td>
                        <td>Rp <?php echo number_format($p['harga'],2,',','.');?></td>
                        <td>Rp <?php echo number_format($hrg,2,',','.');?></td>
                      </tr>
                    <?php }?>
                    <tr>
                      <td colspan="3"><strong>Total</strong></td>
                      <td><strong>Rp <?php echo number_format($total,2,',','.'); ?></strong></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Bayar</strong></td>
                      <td><strong>Rp <?php echo number_format($bayar,2,',','.'); ?></strong></td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Kembalian</strong></td>
                      <td><strong>Rp <?php echo number_format($bayar-$total,2,',','.'); ?></strong></td>
                    </tr>
                    </table>
                  </div>
              <?php 
              
              $i++;} ?>
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
