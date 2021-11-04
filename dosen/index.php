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

                <a href="#" class="text-decoration-none btn-outline-secondary bg-secondary">
                    <div class="d-flex align-items-center px-4 py-3 text-white">
                        <i class="bi bi-house-door-fill"></i>
                        <span class="ms-3 text-sidebar" aria-current="page">Home</span>
                    </div>
                </a>
                <a href="input-tugas.php" class="text-decoration-none btn-outline-primary ">
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
                    <i class="bi bi-house-door-fill me-2"></i>
                    Home
                </h5>

                <h6 class="bg-danger rounded-3 p-2">
                    <i class="ms-2 bi bi-box-arrow-left"></i>
                    Log Out
                </h6>
            </div>

            <div class="container text-secondary">
                <div class="row p-4 px-5">
                    <div class="col-12 bg-white p-4 shadow-sm">
                        <h4 class="text-center">Selamat datang di portal sistem akademik Dosen!</h4>

                    </div>
                </div>
            </div>


        </div>
    </div>



    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>