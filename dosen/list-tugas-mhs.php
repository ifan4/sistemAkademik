<?php
require "../koneksi.php";
session_start();


if (!isset($_SESSION["loginDosen"])) {
    header("location: ../index.php");
    exit;
}

$idTugas = $_GET["idTugas"];


$ambil_tb_tugas = mysqli_query($koneksi, "SELECT * FROM tugas_mhs, mahasiswa WHERE tugas_mhs.idTugas =  $idTugas and tugas_mhs.idMhs = mahasiswa.idMhs");



if (isset($_POST["submit-nilai"])) {
    $idTugas_mhs = $_POST["idTugas_mhs"];
    $nilai = $_POST["nilai"];

    mysqli_query($koneksi, "UPDATE tugas_mhs SET nilai = '$nilai' where idTugas_mhs = $idTugas_mhs");

    if (mysqli_affected_rows($koneksi) > 0) {

        require "../notif.php";
        $ambil_data_tugas_mhs = mysqli_query($koneksi, "SELECT * FROM tugas_mhs WHERE idTugas_mhs = $idTugas_mhs");
        $data_tugas_mhs = mysqli_fetch_assoc($ambil_data_tugas_mhs);
        $idMhs = $data_tugas_mhs["idMhs"];
        if (notifScoreSubmitted($idMhs, $_POST["fileHasil"]) <= 0) {
            echo "<script> alert('Gagal input pengumuman!') </script>";
        }


        header("Refresh:0");
        echo "
            <script>
                alert('Nilai Berhasil Ditambahkan!');
            </script>
            ";
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
                <a href="input-tugas.php" class="text-decoration-none btn-outline-secondary bg-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-card-heading"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Input Tugas</span>
                    </div>
                </a>

            </nav>
        </div>
        <!-- END OF SIDEBAR SECTION -->

        <div class="col-10 g-0">
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

            <!--LIST TUGAS-->
            <section class="py-4 bg-light">
                <div class="container col-10 mb-3">
                    <div class="kotak bg-white p-4">

                        <h4>
                            List Tugas Mahasiswa:
                            <?= $_GET["judulTugas"] ?>
                        </h4>

                        <hr>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                while ($data_tgs_mhs = mysqli_fetch_assoc($ambil_tb_tugas)) : ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $data_tgs_mhs["nama"] ?></td>
                                        <td><?= $data_tgs_mhs["nim"] ?></td>
                                        <td><?= $data_tgs_mhs["fileHasil"] ?></td>
                                        <td>
                                            <button onclick="kirimId(<?= $data_tgs_mhs['idTugas_mhs'] ?>,  '<?= $data_tgs_mhs['nama'] ?>', '<?= $data_tgs_mhs['nim'] ?>', '<?= $data_tgs_mhs['fileHasil'] ?>', '<?= $data_tgs_mhs['nilai'] ?>')" id="btn-nilai" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal-beri-nilai" idTugas_mhs="<?= $data_tgs_mhs["idTugas_mhs"] ?>">Beri Nilai</button>
                                        </td>
                                    </tr>
                                <?php endwhile ?>
                                <script>
                                    function kirimId(id, nama, nim, fileHasil, nilai) {

                                        console.log("test");
                                        let btn_nilai = document.getElementById("btn-nilai");
                                        let inputID = document.getElementById("inputID");
                                        let inputNama = document.getElementById("inputNama");
                                        let inputNim = document.getElementById("inputNim");
                                        let linkFileHasil = document.getElementById("linkFileHasil");
                                        let inputFileHasil = document.getElementById("inputFileHasil");
                                        let status = document.getElementById("status");
                                        let nilaiOption = document.getElementById("option-default");

                                        inputID.value = id;
                                        inputNama.value = nama;
                                        inputNim.value = nim;
                                        linkFileHasil.innerText = fileHasil;
                                        linkFileHasil.href = "../download-dosen.php?fileTugas=" + fileHasil;
                                        inputFileHasil.value = fileHasil;


                                        if (nilai != "") {
                                            nilaiOption.innerHTML = nilai;
                                            status.value = "Sudah Dinilai";
                                            status.style = "background-color: green;";
                                        }

                                    }
                                </script>

                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
            <!--END OF List Tugas-->

            <!-- Modal Tambah Tugas -->
            <div class="modal fade" id="modal-beri-nilai" tabindex="-1" aria-labelledby="modal-beri-nilai" aria-hidden="true">

                ?>
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body py-4">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title" id="exampleModalLabel">Beri Nilai</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <hr class="mt-2">
                            <form action="" method="POST">
                                <div class="container-fluid px-0">
                                    <div class="row">
                                        <input type="hidden" id="inputID" name="idTugas_mhs">
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input required type="text" class="form-control" id="inputNama" name="nama" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nim" class="form-label">NIM</label>
                                            <input required type="text" class="form-control" id="inputNim" name="nim" disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">File Hasil</label>
                                            <a href="#" class="btn btn-primary d-block" id="linkFileHasil"> </a>
                                            <input type="hidden" name="fileHasil" id="inputFileHasil">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nilai" class="form-label">Nilai</label>
                                            <select name="nilai" id="nilai" class="form-select">
                                                <option id="option-default" selected hidden>Pilih Nilai disini</option>
                                                <option>A-</option>
                                                <option>B+</option>
                                                <option>B</option>
                                                <option>B-</option>
                                                <option>C</option>
                                                <option>D</option>
                                                <option>E</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="judul" class="form-label">Status</label>
                                            <input required type="text" class="form-control text-white" id="status" name="status" value="belum dinilai" style="background-color: red;" disabled>
                                        </div>
                                        <button type="submit" class="btn btn-outline-success px-lg-3 w-100 mt-4" name="submit-nilai">submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- END OF MODAL Tambah Tugas  -->




        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>