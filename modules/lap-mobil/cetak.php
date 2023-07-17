<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";

$hari_ini = date("d-m-Y");

$no = 1;
// fungsi query untuk menampilkan data dari tabel obat
$query = mysqli_query($mysqli, "SELECT plat_mobil,nama_mobil,masa_stnk,warna_mobil,tahun_mobil,bahan_bakar FROM mobil ORDER BY nama_mobil ASC")
                                or die('Ada kesalahan pada query tampil Data Obat: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>LAPORAN DATA MOBIL PT. BONANZA TRAVEL ILHAM MAKMUR</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
            LAPORAN DATA MOBIL PT. BONANZA TRAVEL ILHAM MAKMUR
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">PLAT MOBIL</th>
                        <th height="20" align="center" valign="middle">NAMA MOBIL</th>
                        <th height="20" align="center" valign="middle">MASA BERLAKU STNK</th>
                        <th height="20" align="center" valign="middle">WARNA MOBIL</th>
                        <th height="20" align="center" valign="middle">TAHUN</th>
                        <th height="20" align="center" valign="middle">BAHAN BAKAR</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[plat_mobil]</td>
                        <td style='padding-left:5px;' width='100' height='13' valign='middle'>$data[nama_mobil]</td>
                        <td style='padding-right:10px;' width='120' height='13' align='right' valign='middle'>$data[masa_stnk]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='left' valign='middle'>$data[warna_mobil]</td>
                        <td style='padding-right:10px;' width='60' height='13' align='center' valign='middle'>$data[tahun_mobil]</td>
                        <td width='110' height='13' align='center' valign='middle'>$data[bahan_bakar]</td>
                    </tr>";
            $no++;
        }
        ?>  
                </tbody>
            </table>

            <div id="footer-tanggal">
                Pekanbaru, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div>
            <div id="footer-nama">
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
$filename="LAPORAN DATA MOBIL PT. BONANZA TRAVEL.pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
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