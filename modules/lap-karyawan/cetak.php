<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");

$no = 1;
// fungsi query untuk menampilkan data dari tabel karyawan
$query = mysqli_query($mysqli, "SELECT id_karyawan,nama_pegawai,tanggal_lahir,jenis_kelamin,telepon,jabatan FROM karyawan ORDER BY nama_pegawai ASC")
                                or die('Ada kesalahan pada query tampil Data Karyawan: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN DATA KARYAWAN PT. BONANZA TRAVEL ILHAM MAKMUR</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA KARYAWAN PT. BONANZA TRAVEL ILHAM MAKMUR
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">ID PEGAWAI</th>
                        <th height="20" align="center" valign="middle">NAMA</th>
                        <th height="20" align="center" valign="middle">TANGGAL LAHIR</th>
                        <th height="20" align="center" valign="middle">JENIS KELAMIN</th>
                        <th height="20" align="center" valign="middle">TELEPON</th>
                        <th height="20" align="center" valign="middle">JABATAN</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[id_karyawan]</td>
                        <td style='padding-left:5px;' width='180' height='13' valign='middle'>$data[nama_pegawai]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[tanggal_lahir]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[jenis_kelamin]</td>
                        <td style='padding-right:10px;' width='80' height='13' align='right' valign='middle'>$data[telepon]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[jabatan]</td>
                    </tr>";
            $no++;
        }
        ?>  
                </tbody>
            </table>

            <div id="footer-tanggal">
                Pekanbaru, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-jabatan">
                Pimpinan
            </div>
            <br>
            <br>
            <br>
            <div id="footer-nama">
                Ilham Fitroh Saputro
            </div>
        </div>
    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="LAPORAN DATA KARYAWAN PT. BONANZA TRAVEL.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';
// panggil library html2pdf
require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P','F4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>