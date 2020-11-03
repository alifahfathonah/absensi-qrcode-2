<?php
SESSION_START();
include "../../../database.php";

$db = new Database();

$nip = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

// Get all register fields
$nama_matkul = $_POST['nama_matkul'];
$kelas = $_POST['kelas'];
$program_studi = $_POST['program_studi'];
$pertemuan = $_POST['pertemuan'];
$tanggal = $_POST['tanggal'];
$qrcode = "";

if($token && $nip){
    // Query dosen
    $result = $db->execute("SELECT * FROM dosen_tbl
WHERE nip = '".$nip."' AND token = '".$token."'");

    // If not dosen, ...
    if(!$result){
        // Redirect to login
        header("Location: ../../login.php");
    }

    if(isset($nama_matkul) && isset($kelas) && isset($program_studi) &&
        isset($pertemuan) && isset($tanggal)){

        $qrcode = "$nama_matkul+$kelas+$program_studi+$pertemuan+$tanggal";
//        echo $qrcode;
//        echo '<br><img src="make_qrcode.php?id='.$qrcode.'"/>';

        $add_form = $db->execute("INSERT INTO absen_form_tbl(nip, nama_matkul, kelas, program_studi, pertemuan, tanggal, qrcode)
VALUES('".$nip."', '".$nama_matkul."', '".$kelas."',
'".$pertemuan."', '".$program_studi."', '".$tanggal."', '".$qrcode."')");

        if($add_form){
            $_SESSION['notification'] = "Berhasil menambah absen";
        } else{
            $_SESSION['notification'] = "Gagal menambah absen";
        }
    }
} else{
    header("Location: ../../login.php");
}

header("Location: ../dashboarddosen.php");