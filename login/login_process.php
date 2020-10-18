<?php
include "../database.php";

$db = new Database();

// Get all register fields
$nim_nip = $_POST['nim_nip'];
$password = md5($_POST['password']);

// Query dosen
$result = $db->get("SELECT nip FROM dosen_tbl WHERE nip = '".$nim_nip."' AND password = '".$password."'");

// If dosen, ...
if($result){
    $_SESSION['notification'] = "Berhasil login, Selamat datang";
    $token = md5($nim_nip."dosen".date("Y-m-d H:i:s"));

    // Update token in dosen_tbl
    $db->execute("UPDATE dosen_tbl SET token = '".$token."' WHERE nip = '".$nim_nip."'");

    $_SESSION['token'] = $token;
    $_SESSION['nim_nip'] = $nim_nip;

    // Go to dashboarddosen.php
    header("Location: ../user/dosen/dashboarddosen.php");
}
// If not dosen, ...
else{
    // Query mahasiswa
    $result = $db->get("SELECT nim FROM mahasiswa_tbl WHERE nim = '".$nim_nip."' AND password = '".$password."'");

    // If mahasiswa, ...
    if($result){
        $_SESSION['notification'] = "Berhasil login, Selamat datang";
        $token = md5($nim_nip."mahasiswa".date("Y-m-d H:i:s"));

        // Update token in dosen_tbl
        $db->execute("UPDATE mahasiswa_tbl SET token = '".$token."' WHERE nim = '".$nim_nip."'");

        $_SESSION['token'] = $token;
        $_SESSION['nim_nip'] = $nim_nip;

        // Go to dashboarddosen.php
        header("Location: ../user/mahasiswa/dashboardmahasiswa.php");
    }
    // Login failed as dosen and mahasiswa
    else{
        $_SESSION["notification"] = "Gagal login, coba lagi";
        // Go back to login.php
        header('Location: ../login.php');
    }
}