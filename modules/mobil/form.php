<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Mobil
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=mobil"> Data Mobil </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/mobil/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // 
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(plat_mobil,0) as kode FROM mobil
                                                ORDER BY plat_mobil DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil plat_mobil : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data plat_mobil
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat plat_mobil
              $buat_id   = str_pad($kode, 0, "0", STR_PAD_LEFT);
              $plat_mobil = "ID$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Plat Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="plat_mobil" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_mobil" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Masa Berlaku STNK</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="masa_stnk" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Warna Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="warna_mobil" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tahun_mobil" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bahan Bakar</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bahan_bakar" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Bensin">Bensin</option>
                    <option value="Solar">Solar</option>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=mobil" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel mobil
      $query = mysqli_query($mysqli, "SELECT plat_mobil,nama_mobil,masa_stnk,warna_mobil,tahun_mobil,bahan_bakar FROM mobil WHERE plat_mobil='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data mobil : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Data Mobil
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=mobil"> Data Mobil </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/mobil/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Plat Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="plat_mobil" value="<?php echo $data['plat_mobil']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_mobil" autocomplete="off" value="<?php echo $data['nama_mobil']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Masa Berlaku STNK</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="masa_stnk" autocomplete="off" value="<?php echo $data['masa_stnk']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Warna Mobil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="warna_mobil" autocomplete="off" value="<?php echo $data['warna_mobil']; ?>" required>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tahun_mobil" autocomplete="off" value="<?php echo $data['tahun_mobil']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Bahan Bakar</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="bahan_bakar" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value="<?php echo $data['bahan_bakar']; ?>"><?php echo $data['bahan_bakar']; ?></option>
                    <option value="Bensin">Bensin</option>
                    <option value="Solar">Solar</option>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=mobil" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>