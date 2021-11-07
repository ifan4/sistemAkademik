<?php
require "../koneksi.php";
session_start();

if (!$_SESSION["loginMhs"]) {
    header("location: ../index.php");
    exit;
}



//DEKLARASI ID MAHASISWA PADA TABEL MAHASISWA YANG DIDAPATKAN DARI SESSION SAAT LOGIN
$idMhs = $_SESSION["dataMhs"]["idMhs"];


//Deklarasi id pada tabel tugas yang didapatkan dari page link sebelumnya
$idTugas = $_GET["idTugas"];


$ambil_tb_tugas = mysqli_query($koneksi, "SELECT * FROM tugas WHERE idTugas = $idTugas");
$ambil_tb_pengumuman_mhs = mysqli_query($koneksi, "SELECT * FROM pemberitahuan_mhs WHERE idMhs = $idMhs ORDER BY id_pem_mhs DESC");
$totNotif = mysqli_num_rows($ambil_tb_pengumuman_mhs);

$dataTugas = mysqli_fetch_assoc($ambil_tb_tugas);


if (isset($_POST["submit-tugas"])) {
    $nilai = "";
    $status = "Sudah Dikumpulkan";

    $namaFile = $_FILES["inputUpload"]["name"];
    move_uploaded_file($_FILES["inputUpload"]["tmp_name"], "files/" . $namaFile);

    mysqli_query($koneksi, "INSERT INTO tugas_mhs VALUES ('', $idMhs, $idTugas, '$nilai', '$namaFile', '$status')");

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "
        <script>
            alert('Tugas berhasil dikumpulkan!');
        </script>
        ";
    }
}

//cek status mahasiswa sudah mengumpulkan atau belum
function cekStatus()
{
    global $idMhs, $koneksi, $idTugas;
    $ambil_tb_tugas_mhs = mysqli_query($koneksi, "SELECT * FROM tugas_mhs WHERE idMhs = $idMhs and idTugas = $idTugas");
    if (mysqli_num_rows($ambil_tb_tugas_mhs) == 1) {
        return true;
    } else {
        return false;
    }
}
function getDataTugasMhs()
{
    global $idMhs, $idTugas, $koneksi;
    $ambil_tb_tugas_mhs = mysqli_query($koneksi, "SELECT * FROM tugas_mhs WHERE idMhs = $idMhs and idTugas = $idTugas");
    $tugas_mhs = mysqli_fetch_assoc($ambil_tb_tugas_mhs);

    return $tugas_mhs;
}





require "../download-mhs.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>

    <link rel="stylesheet" href="../css/style.css">

    <!-- IMPORT BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

</head>

<body>
    <div class="container-fluid row g-0">
        <!-- SIDEBAR SECTION -->
        <div class="col-2">
            <nav class="nav flex-column bg-dark-mhs" style="height: 800px; " id="sidebar-dashboard">
                <h3 class="text-center text-white my-3">Sistem Akademik</h3>
                <hr class="border">

                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-person"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Profile</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-newspaper"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Informasi</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-book"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Perkuliahan</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-wallet"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Beasiswa</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-123"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Penilaian Dosen</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-building"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">KKN</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-envelope"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">SKPI</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-mortarboard"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Wisuda</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-cash"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">UKT</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-journals"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Laporan</span>
                    </div>
                </a>
                <a href="index.php" class="text-decoration-none btn-outline-secondary bg-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-book-half"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Pembelajaran</span>
                    </div>
                </a>

            </nav>
        </div>
        <!-- END OF SIDEBAR SECTION -->

        <div class="col-10 g-0">
            <!-- header -->
            <div class="d-flex justify-content-between align-items-center py-3 pt-4 px-5 text-white" style="background-color: #1d2939ee;">
                <h5>
                    <i class="bi bi-book-half me-2"></i>
                    Pembelajaran
                </h5>
                <div class="dropdown d-inline-block ">
                    <a href="#" data-bs-toggle="dropdown">
                        <i class="fs-4 bi bi-bell-fill text-white position-relative ms-2">
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-1 border-light rounded-circle" style="font-size: 12px;"> <?= $totNotif ?> </span>
                        </i>
                    </a>
                    <ul class="dropdown-menu notif overflow-auto" aria-labelledby="dropdownMenuLink" style="max-height: 400px;">
                        <div class="d-flex justify-content-around">
                            <li class="text-center fw-bold">Pemberitahuan</li>
                            <a href="../tandaiSudahDibaca.php?idMhs=<?= $idMhs ?>" class="text-decoration-none">tandai sudah dibaca</a>

                        </div>
                        <hr>
                        <?php
                        while ($dataPengumumanMhs = mysqli_fetch_assoc($ambil_tb_pengumuman_mhs)) :
                        ?>
                            <li><a class="dropdown-item text-wrap border-bottom p-2" href="#">
                                    <h6><?= $dataPengumumanMhs["judul_pem_mhs"] ?></h6>
                                    <p class=""><?= $dataPengumumanMhs["desc_pem_mhs"] ?></p>
                                </a>
                            </li>
                        <?php endwhile ?>
                    </ul>
                </div>

                <h6 class="rounded-3 p-2 ">
                    <?= $_SESSION["dataMhs"]["nama"] ?>
                    <i class=" fs-3 ms-1 bi bi-person-circle align-middle"></i>

                </h6>

                <h6 class="bg-danger rounded-3 p-2">
                    <a href="../logout.php" class="text-decoration-none link-light">
                        <i class="me-2 bi bi-box-arrow-left"></i>
                        Log Out
                    </a>
                </h6>
            </div>
            <!-- end of header -->

            <div class="container text-secondary overflow-hidden">
                <div class="row p-4 px-5">
                    <div class="col-12 bg-primary text-white rounded-3 p-4 shadow-sm mb-3">
                        <h4><?= $_GET["namaMK"] ?></h4>
                    </div>
                    <div class="col-12 bg-primary text-white g-0 bg-dark py-4 px-3">
                        <h6 class="text-white">
                            Tugas:
                            <?= $dataTugas["judul"] ?>
                        </h6>
                    </div>
                    <div class="col-12 bg-white p-4">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <tr>
                                    <td>Judul</td>
                                    <td>:</td>
                                    <td><?= $dataTugas["judul"] ?></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>:</td>
                                    <td><?= $dataTugas["desc"] ?></td>
                                </tr>
                                <tr>
                                    <td>File</td>
                                    <td>:</td>
                                    <td>
                                        <a href="../download-mhs.php?fileTugas=<?= $dataTugas["fileTugas"] ?>">
                                            <?= $dataTugas["fileTugas"] ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- the algorithm: 
                                Jika ada id mahasiswa dan id tugas ini pada tabel tugas_mhs maka munculkan SUDAH DIKUMPULKAN -->
                                    <td>Status</td>
                                    <td>:</td>
                                    <?php if (cekStatus()) : ?>
                                        <td class="text-success">Sudah Dikumpulkan</td>

                                    <?php else : ?>
                                        <td class="text-danger">belum dikumpulkan</td>
                                    <?php endif ?>
                                </tr>
                                <tr>
                                    <!-- the algorithm: 
                                Jika ada id mahasiswa dan id tugas ini pada tabel tugas_mhs DAN nilai != "" (kosong) maka munculkan nilainya  -->
                                    <td>Nilai</td>
                                    <td>:</td>
                                    <?php if (!cekStatus()) : ?>
                                        <td></td>
                                    <?php else : ?>
                                        <td class="fs-4"> <?= getDataTugasMhs()["nilai"] ?> </td>
                                    <?php endif ?>
                                </tr>

                                <tr>
                                    <td>Upload Tugas</td>
                                    <td>:</td>
                                    <td>
                                        <?php if (!cekStatus()) : ?>
                                            <input type="file" name="inputUpload" id="inputUploadTugas" required>
                                        <?php else : ?>
                                            <a href="../download-dosen.php?fileTugas=<?= getDataTugasMhs()["fileHasil"] ?>"> <?= getDataTugasMhs()["fileHasil"] ?> </a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-center">
                                <!-- THE ALGORITHM:
                                Jika ada id mahasiswa dan id tugas ini pada tabel tugas_mhs maka disable button submit -->
                                <?php if (!cekStatus()) : ?>
                                    <button type="submit" class="btn btn-success w-100" name="submit-tugas">Submit Tugas</button>
                                <?php else : ?>
                                    <button type="submit" class="btn btn-success w-100" name="submit-tugas" disabled>Submit Tugas</button>
                                <?php endif ?>
                            </div>
                        </form>
                    </div>

                </div>
            </div>


        </div>
    </div>



    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>