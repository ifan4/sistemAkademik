<?php
require "../koneksi.php";
session_start();


if (!isset($_SESSION["loginDosen"])) {
    header("location: ../index.php");
    exit;
}


$idDosen = $_SESSION["dataDosen"]["idDosen"];

//ambil data tabel mata kuliah yang diampu oleh dosen ini
$ambil_tb_mk = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE idDosen = $idDosen");

//ambil data tabel tugas yang dibuat oleh dosen ini
$ambil_tabel_tugas = mysqli_query($koneksi, "SELECT * FROM tugas, mataKuliah WHERE tugas.idMK = mataKuliah.idMK and matakuliah.idDosen = $idDosen");

if (isset($_POST["tambah-file"])) {
    $idMK = $_POST["mk"];
    $judul = $_POST["judul"];
    $deskripsi = $_POST["deskripsi"];
    $namaFile = $_FILES["inputFile"]["name"];
    move_uploaded_file($_FILES["inputFile"]["tmp_name"], "files/" . $namaFile);
    mysqli_query($koneksi, "INSERT INTO tugas VALUES('', $idMK, '$judul', '$deskripsi', '$namaFile')");

    if (mysqli_affected_rows($koneksi) > 0) {
        echo "<script>
                alert('Tugas Berhasil Ditambahkan!');
            </script>
        ";
        require "../notif.php";
        $ambil_tb_mk = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE idMK = $idMK");
        $dataMK = mysqli_fetch_assoc($ambil_tb_mk);
        $namaMK = $dataMK["namaMK"];
        if (notifToAllMhs("Tugas Baru $namaMK", "Tugas: $judul") <= 0) {
            echo "<script> alert('Gagal input notifikasi tugas!') </script>";
        }

        header("Refresh:0");
    }
}



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
            <nav class="nav flex-column bg-dark-dosen" style="height: 800px; " id="sidebar-dashboard">
                <h3 class="text-center text-white my-3">Dosen</h3>
                <hr class="border">

                <a href="index.php" class="text-decoration-none btn-outline-primary ">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Home</span>
                    </div>
                </a>
                <a href="#" class="text-decoration-none btn-outline-secondary bg-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-card-heading"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Input Tugas</span>
                    </div>
                </a>

            </nav>
        </div>
        <!-- END OF SIDEBAR SECTION -->

        <div class="col-10 g-0">
            <!-- header -->
            <div class="d-flex justify-content-between align-items-center py-3 pt-4 px-5 text-white" style="background-color: #363740e8;">
                <h5>
                    <i class="bi bi-card-heading me-2"></i>
                    Input Tugas
                </h5>

                <h6 class="rounded-3 p-2 ">
                    <?= $_SESSION["dataDosen"]["namaDosen"] ?>
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

            <!--LIST TUGAS-->
            <section class="py-4 bg-light">
                <div class="container col-10 mb-3">
                    <div class="kotak bg-white p-4">
                        <div class="header d-flex flex-row justify-content-between">
                            <h4>List Tugas</h4>
                            <a href="#" class="btn btn-outline-secondary btn-dark text-white" data-bs-toggle="modal" data-bs-target="#modal-tambah-tugas">
                                <i class="bi bi-pencil me-1"></i>
                                Input Tugas
                            </a>
                        </div>
                        <hr>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Mata Kuliah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($dataTugas = mysqli_fetch_assoc($ambil_tabel_tugas)) : ?>
                                    <tr>
                                        <td>
                                            <a href="list-tugas-mhs.php?idTugas=<?= $dataTugas["idTugas"] ?>&judulTugas=<?= $dataTugas['judul'] ?>" class="text-decoration-none">
                                                <?= $dataTugas["judul"] ?>
                                            </a>
                                        </td>
                                        <td><?= $dataTugas["namaMK"] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
            <!--END OF List Tugas-->

            <!-- Modal Tambah Tugas -->
            <div class="modal fade" id="modal-tambah-tugas" tabindex="-1" aria-labelledby="modal-tambah-tugas" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body py-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Tugas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr class="mt-2">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="container-fluid px-0 mb-5">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="mk" class="form-label">Mata Kuliah</label>
                                            <select name="mk" id="mk" class="form-select">
                                                <?php while ($dataMK = mysqli_fetch_assoc($ambil_tb_mk)) : ?>
                                                    <option value="<?= $dataMK["idMK"] ?>"><?= $dataMK["namaMK"] ?></option>
                                                <?php endwhile ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Judul</label>
                                            <input required type="text" class="form-control" id="judul" name="judul">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jurusan" class="form-label">Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="angkatan" class="form-label">File Tugas</label>
                                            <input required type="file" class="form-control" id="inputFile" name="inputFile" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-dark mx-auto px-lg-3 mt-5" name="tambah-file">Tambah</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- END OF MODAL Tambah Tugas  -->




        </div>
    </div>



    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>