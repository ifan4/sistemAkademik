<?php
if (isset($_GET["fileTugas"])) {
    $filename = basename($_GET["fileTugas"]);
    $filepath = "dosen/files/" . $filename;
    if (!empty($filename) && file_exists($filepath)) {


        //define headers
        header("Cache-Control: public");
        header("Content-Description: FILeTransfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Emcoding: binary");

        readfile($filepath);
        exit;
    } else {
        echo "This File Does not exist.";
    }
}
