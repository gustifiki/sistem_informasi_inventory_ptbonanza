<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> Data Karyawan </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id karyawan
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_karyawan,3) as kode FROM karyawan
                                                ORDER BY id_karyawan DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_karyawan : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data id_karyawan
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat id_karyawan
              $buat_id   = str_pad($kode, 3, "0", STR_PAD_LEFT);
              $id_karyawan = "ID$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID Karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_karyawan" value="<?php echo $id_karyawan; ?>"required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_pegawai" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tanggal_lahir" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="jenis_kelamin" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telepon" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jabatan" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
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
      // fungsi query untuk menampilkan data dari tabel karyawan
      $query = mysqli_query($mysqli, "SELECT id_karyawan,nama_pegawai,tanggal_lahir,jenis_kelamin,telepon,jabatan FROM karyawan WHERE id_karyawan='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data karyawan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Data Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=karyawan"> Data Karyawan </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/karyawan/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Karyawan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_karyawan" value="<?php echo $data['id_karyawan']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_pegawai" autocomplete="off" value="<?php echo $data['nama_pegawai']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tanggal_lahir" autocomplete="off" value="<?php echo $data['tanggal_lahir']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="jenis_kelamin" data-placeholder="-- Pilih --" autocomplete="off" required>
                    <option value="<?php echo $data['jenis_kelamin']; ?>"><?php echo $data['jenis_kelamin']; ?></option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telepon" autocomplete="off" value="<?php echo $data['telepon']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jabatan" autocomplete="off" value="<?php echo $data['jabatan']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=karyawan" class="btn btn-default btn-reset">Batal</a>
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