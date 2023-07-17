<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Karyawan PT. Bonanza Travel Ilham Makmur

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-karyawan/cetak.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel karyawan -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Karyawan</th>
                <th class="center">Nama</th>
                <th class="center">Tanggal Lahir</th>
                <th class="center">Jenis Kelamin</th>
                <th class="center">Telepon</th>
                <th class="center">Jabatan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT id_karyawan,nama_pegawai,tanggal_lahir,jenis_kelamin,telepon,jabatan FROM karyawan ORDER BY nama_pegawai ASC")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_karyawan]</td>
                      <td width='180'>$data[nama_pegawai]</td>
                      <td width='100' align='right'>$data[tanggal_lahir]</td>
                      <td width='100' align='right'>$data[jenis_kelamin]</td>
                      <td width='80' class='center'>$data[telepon]</td>
                      <td width='80'>$data[jabatan]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content