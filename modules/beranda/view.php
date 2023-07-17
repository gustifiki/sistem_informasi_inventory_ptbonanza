  <!-- Content Header (Page header) --> <section class="content-header"> <h1>
  <i class="fa fa-car icon-title"></i> PT. Bonanza Travel Ilham Makmur Pekanbaru </h1> </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Pendataan PT. Bonanza Travel Ilham Makmur Pekanbaru.
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT COUNT(id_karyawan) as jumlah FROM karyawan")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Karyawan</p>
          </div>
          <div class="icon">
            <i class="fa fa-folder"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_karyawan&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel mobil
            $query = mysqli_query($mysqli, "SELECT COUNT(plat_mobil) as jumlah FROM mobil")
                                            or die('Ada kesalahan pada query tampil Data mobil: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Mobil</p>
          </div>
          <div class="icon">
            <i class="fa fa-car"></i>
          </div>
          <?php  
          if ($_SESSION['hak_akses']!='Manajer') { ?>
            <a href="?module=form_mobil&form=add" class="small-box-footer" title="Tambah Data" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#fae019;color:#fff" class="small-box">
          <div class="inner">
            <?php  
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT COUNT(id_karyawan) as jumlah FROM karyawan")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Laporan Karyawan</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_karyawan" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div style="background-color:#2c3f50;color:#fff" class="small-box">
          <div class="inner">
            <?php   
            // fungsi query untuk menampilkan data dari tabel mobil
            $query = mysqli_query($mysqli, "SELECT COUNT(plat_mobil) as jumlah FROM mobil")
                                            or die('Ada kesalahan pada query tampil Data mobil: '.mysqli_error($mysqli));

            // tampilkan data
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['jumlah']; ?></h3>
            <p>Data Laporan Mobil</p>
          </div>
          <div class="icon">
            <i class="fa fa-file-text-o"></i>
          </div>
          <a href="?module=lap_mobil" class="small-box-footer" title="Cetak Laporan" data-toggle="tooltip"><i class="fa fa-print"></i></a>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
  </section><!-- /.content -->