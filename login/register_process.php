<?php
SESSION_START();
include "../database.php";

$db = new Database();

// Get all register fields
$mhs_or_dosen = $_POST['mhs_or_dosen'];
$nama_lengkap = $_POST['nama_lengkap'];
$nim_nip = $_POST['nim_nip'];
$token = "";
$password = md5($_POST['password']);
$password2 = md5($_POST['password2']);

// Check password
if($password == $password2) {
    // Check nama_lengkap and nim_nip
    if($nama_lengkap && $nim_nip) {
        $result = false;

        // If sign up as dosen, ...
        if ($mhs_or_dosen == 1) {
            $result = $db->execute("INSERT INTO dosen_tbl(nip, nama_lengkap, password, token) 
VALUES('".$nim_nip."', '".$nama_lengkap."', '".$password."', '".$token."')");
        } // If sign up as mahasiswa, ...
        else if ($mhs_or_dosen == 2) {
            $result = $db->execute("INSERT INTO mahasiswa_tbl(nim, nama_lengkap, password, token) 
VALUES('".$nim_nip."', '".$nama_lengkap."', '".$password."', '".$token."')");
        }

        if($result){
            $_SESSION['notification'] = "Register user berhasil";
        } else{
            $_SESSION['notification'] = "Register user gagal";
        }
    }
} else{
    $_SESSION['notification'] = "Password tidak sama";
}

header("Location: ../login.php");