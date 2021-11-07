<?php
require "koneksi.php";

//mengambil notif mahasiswa
function ambilNotifMhs($idMhs)
{
    global $koneksi;

    $ambil_data_notif = mysqli_query($koneksi, "SELECT * FROM pemberitahuan_mhs WHERE idMhs = $idMhs");

    $data = [];

    while ($temp = mysqli_fetch_assoc($ambil_data_notif)) {
        $data[] = $temp;
    }

    return $data;
}

//=======TESTING=======

// var_dump(ambilNotifMhs(1));

// if (inputToAllMhs("testJudul", "lorem ipsum dolor sit amet") > 0) {
//     echo "<script> alert('Berhasil input pengumuman!') </script>";
// } else {
//     echo "<script> alert('Gagal input pengumuman!') </script>";
// }

// if (notifScoreSubmitted(2, "Dimas", "RPL") > 0) {
//     echo "<script> alert('Berhasil input pengumuman!') </script>";
// } else {
//     echo "<script> alert('Gagal input pengumuman!') </script>";
// }


//input pengumuman ke seluruh mahasiswa
function notifToAllMhs($judul, $deskripsi)
{
    global $koneksi;
    $waktu = getWaktu("date");

    $ambil_data_mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

    $data = [];

    while ($temp = mysqli_fetch_assoc($ambil_data_mhs)) {
        $idMhs = $temp["idMhs"];
        mysqli_query($koneksi, "INSERT INTO pemberitahuan_mhs VALUES('', '$waktu', '$judul', '$deskripsi', $idMhs)");
    }

    return mysqli_affected_rows($koneksi);
}

//Input pengumuman saat dosen submit NILAI ke mahasiswa
function notifScoreSubmitted($idMhs, $fileHasil)
{
    global $koneksi;
    $waktu = getWaktu("date");
    $judul = "Tugas Sudah dinilai";
    $deskripsi = "Tugas anda pada file $fileHasil telah dinilai oleh dosen, silahkan cek pada halaman tugas.";

    mysqli_query($koneksi, "INSERT INTO pemberitahuan_mhs VALUES('','$waktu', '$judul', '$deskripsi', $idMhs)");

    return mysqli_affected_rows($koneksi);
}





function getWaktu($param)
{
    date_default_timezone_set("Asia/Jakarta");

    if ($param == "date") {
        // $waktu = date("j-m-Y");
        $waktu = date("Y-m-j");
    } elseif ($param == "jam") {
        $waktu = date("G:i");
    }
    return $waktu;
}
