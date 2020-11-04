<?php

SESSION_START();
include "../../../database.php";

$db = new Database();

$nim = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

// Get register fields
$qrcode = $_POST['data_qrcode'];

if($token && $nim){
    // Query dosen
    $result = $db->execute("SELECT * FROM dosen_tbl
WHERE nip = '".$nim."' AND token = '".$token."'");

    // If not dosen, ...
    if(!$result){
        // Redirect to login
        header("Location: ../../login.php");
    }

    $check_qrcode = $db->get("SELECT form_id
    FROM absen_form_tbl
    WHERE qrcode = '".$qrcode."'");

    // If there is qr code, ...
    if($check_qrcode){
        // Get query
        $check_qrcode = mysqli_fetch_assoc($check_qrcode);

        $check_mhs = $db->get("SELECT nim
FROM kehadiran_tbl
WHERE form_id='".$check_qrcode['form_id']."' AND
nim = '".$nim."'");

        // If there is no result, insert mhs into absen
        if(mysqli_fetch_row($check_mhs) == 0) {
            $insert_mhs = $db->execute("INSERT INTO kehadiran_tbl(form_id, nim, tanggal_absen)
VALUES('" . $check_qrcode['form_id'] . "', '" . $nim . "', NOW())");

            if ($insert_mhs) {
                $_SESSION['notification'] = "Anda dinyatakan hadir";
            } else {
                $_SESSION['notification'] = "Gagal hadir";
            }
        } else{ // If there is result, don't let mahasiswa insert another
            $_SESSION['notification'] = "Anda tidak dapat melakukan scan QRCode yang sama karena Anda sudah mengisi absen ini";
        }
    } else{ // else, ...
        $_SESSION['notification'] = "QRCode Salah";
    }

} else{
    header("Location: ../../login.php");
}

header("Location: ../dashboardmahasiswa.php");