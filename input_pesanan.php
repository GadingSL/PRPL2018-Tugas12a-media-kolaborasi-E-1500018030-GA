<!DOCTYPE html>
<html lang="en">

  <head>

    <?php require 'header.php'; ?>

  </head>

  <body>

    <!-- Navigation -->
    <?php require 'navbar.php'; ?>
    <?php
      $makanan = $konek->query("SELECT * FROM daftar_menu WHERE kategori = 'makanan'");
      $minuman = $konek->query("SELECT * FROM daftar_menu WHERE kategori = 'minuman'");
    ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4">Input Pesanan
      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">
        <div class="col-md-12">
          <form class="form-horizontal" method="POST" action="insert_order.php">
            <div class="row text-right" style="padding-bottom:10px;">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="nama" pattern=".{3,}">
              </div>
            </div>
            <div class="row text-right" style="padding-bottom:10px;">
              <label for="inputPassword3" class="col-sm-3 control-label">Nomor Meja</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="no_meja">
              </div>
            </div>
            <div class="row" style="padding-bottom:10px;">
              <label for="inputPassword3" class="col-sm-3 control-label text-right">Daftar Makanan</label>
              <div class="col-sm-6">
                <div class="row"> 
                  <?php foreach ($makanan as $x) {?>
                    <div class="col-sm-6">
                      <div class="searchable-container">
                          <div class="info-block block-info clearfix">
                              <div class="square-box pull-left">
                                  <span class="glyphicon glyphicon-tags glyphicon-lg"></span>
                              </div>
                              <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                  <label class="btn btn-default">
                                      <div class="bizcontent">
                                          <input type="checkbox" name="menu[]" autocomplete="off" value="<?php echo $x['id']; ?>">
                                          <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                          <p><strong><?php echo $x['nama_menu']; ?></strong></p>
                                      </div>
                                  </label>
                              </div>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah[]">
                              </div>
                          </div>
                      </div>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="row" style="padding-bottom:10px;">
              <label for="inputPassword3" class="col-sm-3 control-label text-right">Daftar Minuman</label>
              <div class="col-sm-6">
                <div class="row"> 
                  <?php foreach ($minuman as $x) {?>
                    <div class="col-sm-6">
                      <div class="searchable-container">
                          <div class="info-block block-info clearfix">
                              <div class="square-box pull-left">
                                  <span class="glyphicon glyphicon-tags glyphicon-lg"></span>
                              </div>
                              <div data-toggle="buttons" class="btn-group bizmoduleselect">
                                  <label class="btn btn-default">
                                      <div class="bizcontent">
                                          <input type="checkbox" name="menu[]" autocomplete="off" value="<?php echo $x['id']; ?>">
                                          <span class="glyphicon glyphicon-ok glyphicon-lg"></span>
                                          <p><strong><?php echo $x['nama_menu']; ?></strong></p>
                                      </div>
                                  </label>
                              </div>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="jumlah[]">
                              </div>
                          </div>
                      </div>
                    </div>
                  <?php }?>
                </div>
              </div>
            </div>
            <div class="row text-right" style="padding-bottom:10px;">
              <label for="inputPassword3" class="col-sm-3 control-label">Tanggal Order</label>
              <div class="col-sm-6">
                <input type="hidden" value="<?php echo date('Y-m-d') ?>" name="tanggal" >
                <input type="text" class="form-control" value="<?php echo date('D, d F Y') ?>" disabled>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-offset-2 col-sm-9 text-right">
                <button type="submit" class="btn btn-primary btn-lg">ORDER</button>
              </div>
            </div>
          </form>
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
