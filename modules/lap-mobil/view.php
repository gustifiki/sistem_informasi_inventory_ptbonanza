<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Mobil PT. Bonanza Travel Ilham Makmur

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-mobil/cetak.php" target="_blank">
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
          <!-- tampilan tabel karyawan   -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Plat Mobil</th>
                <th class="center">Nama Mobil</th>
                <th class="center">Masa Berlaku STNK</th>
                <th class="center">Warna Mobil</th>
                <th class="center">Tahun</th>
                <th class="center">Bahan Bakar</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel karyawan
            $query = mysqli_query($mysqli, "SELECT plat_mobil,nama_mobil,masa_stnk,warna_mobil,tahun_mobil,bahan_bakar FROM mobil ORDER BY nama_mobil ASC")
                                            or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[plat_mobil]</td>
                      <td width='180'>$data[nama_mobil]</td>
                      <td width='100' align='right'>$data[masa_stnk]</td>
                      <td width='100' align='right'>$data[warna_mobil]</td>
                      <td width='80' class='center'>$data[tahun_mobil]</td>
                      <td width='80'>$data[bahan_bakar]</td>
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