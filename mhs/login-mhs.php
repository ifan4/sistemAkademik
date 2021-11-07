<?php
session_start();
require "../koneksi.php";

if (isset($_POST["submit"])) {
    $nim = $_POST["nim"];
    $password = $_POST["password"];

    $ambil_data_mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = $nim and password = $password");
    $dataMhs = mysqli_fetch_assoc($ambil_data_mhs);



    if (mysqli_affected_rows($koneksi) == 1) {
        $_SESSION["loginMhs"] = true;
        $_SESSION["dataMhs"] = $dataMhs;

        header("location: index.php");
        exit;
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

<body class="bg-special-green">
    <div class="container position-absolute start-50 top-50 translate-middle">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="bg-white rounded-3 p shadow rounded-3">
                    <h3 class="text-white text-center bg-success p-3">Login Mahasiswa</h3>
                    <form class="p-5" action="" method="POST">
                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <button type="submit" class="btn btn-success w-100" name="submit">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>