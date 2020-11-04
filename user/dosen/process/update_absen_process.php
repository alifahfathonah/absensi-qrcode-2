<?php
SESSION_START();
include "../../../database.php";

$db = new Database();

$nip = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

// Get all register fields
$form_id = $_POST['form_id'];
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

        $qrcode = md5("$nama_matkul $kelas $program_studi $pertemuan $tanggal");

        $update_form = $db->execute("UPDATE absen_form_tbl
        SET nama_matkul = '".$nama_matkul."',
        kelas = '".$kelas."',
        program_studi = '".$program_studi."',
        pertemuan = '".$pertemuan."',
        tanggal = '".$tanggal."',
        qrcode = '".$qrcode."' 
        WHERE form_id = ".$form_id);

        if($update_form){
            $_SESSION['notification'] = "Berhasil mengupdate absen";
        } else{
            $_SESSION['notification'] = "Gagal mengupdate absen";
        }
    }
} else{
    header("Location: ../../login.php");
}

header("Location: ../dashboarddosen.php");