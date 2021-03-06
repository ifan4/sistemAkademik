<?php
require "../koneksi.php";
session_start();

if (isset($_SESSION["loginAdmin"])) {
    header("location: index.php");
    exit;
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $ambil_data_dosen = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' and password = $password");
    $dataAdmin = mysqli_fetch_assoc($ambil_data_dosen);
    if (mysqli_affected_rows($koneksi) ==  1) {
        $_SESSION["loginAdmin"] = true;
        $_SESSION["dataAdmin"] = $dataAdmin;

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
                    <h3 class="text-white text-center bg-success p-3">Login Admin</h3>
                    <form class="p-5" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
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