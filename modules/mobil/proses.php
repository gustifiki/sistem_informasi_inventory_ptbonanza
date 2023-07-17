<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $plat_mobil  = mysqli_real_escape_string($mysqli, trim($_POST['plat_mobil']));
            $nama_mobil  = mysqli_real_escape_string($mysqli, trim($_POST['nama_mobil']));
            $masa_stnk = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['masa_stnk'])));
            $warna_mobil = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['warna_mobil'])));
            $tahun_mobil     = mysqli_real_escape_string($mysqli, trim($_POST['tahun_mobil']));
            $bahan_bakar     = mysqli_real_escape_string($mysqli, trim($_POST['bahan_bakar']));

            $created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel mobil
            $query = mysqli_query($mysqli, "INSERT INTO mobil(plat_mobil,nama_mobil,masa_stnk,warna_mobil,tahun_mobil,bahan_bakar,created_user,updated_user) 
                                            VALUES('$plat_mobil','$nama_mobil','$masa_stnk','$warna_mobil','$tahun_mobil','$bahan_bakar','$created_user','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=mobil&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['plat_mobil'])) {
                // ambil data hasil submit dari form
                $plat_mobil  = mysqli_real_escape_string($mysqli, trim($_POST['plat_mobil']));
                $nama_mobil  = mysqli_real_escape_string($mysqli, trim($_POST['nama_mobil']));
                $masa_stnk = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['masa_stnk'])));
                $warna_mobil = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['warna_mobil'])));
                $tahun_mobil     = mysqli_real_escape_string($mysqli, trim($_POST['tahun_mobil']));
                $bahan_bakar     = mysqli_real_escape_string($mysqli, trim($_POST['bahan_bakar']));

                $updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel mobil
                $query = mysqli_query($mysqli, "UPDATE mobil SET  nama_mobil       = '$nama_mobil',
                                                                    masa_stnk      = '$masa_stnk',
                                                                    warna_mobil      = '$warna_mobil',
                                                                    tahun_mobil          = '$tahun_mobil',
                                                                    bahan_bakar         = '$bahan_bakar',
                                                                    updated_user    = '$updated_user'
                                                              WHERE plat_mobil       = '$plat_mobil'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=mobil&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $plat_mobil = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel mobil
            $query = mysqli_query($mysqli, "DELETE FROM mobil WHERE plat_mobil='$plat_mobil'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=mobil&alert=3");
            }
        }
    }       
}       
?>