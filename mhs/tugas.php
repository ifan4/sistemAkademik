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
            <div class="d-flex justify-content-between align-items-center py-3 pt-4 px-5 text-white" style="background-color: #1d2939ee;">
                <h5>
                    <i class="bi bi-book-half me-2"></i>
                    Pembelajaran
                    <div class="dropdown d-inline-block ">
                        <a href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell-fill text-white position-relative ms-2">
                                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-2 border-light rounded-circle"> </span>
                            </i>
                        </a>
                        <ul class="dropdown-menu notif" aria-labelledby="dropdownMenuLink">
                            <li class="text-center fw-bold">Pemberitahuan</li>
                            <hr>
                            <li><a class="dropdown-item text-wrap border-bottom p-2" href="#">
                                    <h6>Title</h6>
                                    <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum illo fugit, quam perspiciatis blanditiis nulla delectus eius reiciendis dolor porro.</p>
                                </a>
                            </li>
                            <li><a class="dropdown-item text-wrap border-bottom p-2" href="#">
                                    <h6>Title</h6>
                                    <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorum illo fugit, quam perspiciatis blanditiis nulla delectus eius reiciendis dolor porro.</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </h5>
                <h6 class="bg-danger rounded-3 p-2">
                    <a href="#" class="text-decoration-none link-light">
                        <i class="me-2 bi bi-box-arrow-left"></i>
                        Log Out
                    </a>
                </h6>
            </div>

            <div class="container text-secondary overflow-hidden">
                <div class="row p-4 px-5">
                    <div class="col-12 bg-primary text-white rounded-3 p-4 shadow-sm mb-3">
                        <h4><?= $_GET["namaMK"] ?></h4>
                    </div>
                    <div class="col-12 bg-primary text-white g-0 bg-dark py-4 px-3">
                        <h6 class="text-white">
                            Tugas:
                            Development css e-commerce
                        </h6>
                    </div>
                    <div class="col-12 bg-white p-4">
                        <table class="table table-striped">
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td>lorem ipsum</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio aut quia sapiente blanditiis adipisci quasi enim et repellat magni temporibus, debitis facilis, aliquam est modi!</td>
                            </tr>
                            <tr>
                                <td>File</td>
                                <td>:</td>
                                <td>lorem.pdf</td>
                            </tr>
                            <tr>
                                <td>Upload Tugas</td>
                                <td>:</td>
                                <td>
                                    <form action="">
                                        <input type="file" name="inputUpload" id="inputUploadTugas">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td class="text-danger">belum dikumpulkan</td>
                            </tr>
                            <tr>
                                <td>Nilai</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>



    <script src="../script/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>