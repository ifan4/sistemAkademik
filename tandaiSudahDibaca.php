<?php
require "koneksi.php";

if (isset($_GET["idMhs"])) {

    $idMhs =  $_GET["idMhs"];
    mysqli_query($koneksi, "DELETE FROM pemberitahuan_mhs WHERE idMhs = $idMhs");
    header("location: mhs/index.php");
    exit;
}
