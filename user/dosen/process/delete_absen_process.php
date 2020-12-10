<?php
SESSION_START();
include "../../../database.php";

$db = new Database();

$nip = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

// Get form id
$form_id = $_GET['form_id'];

if($token && $nip){
    // Query dosen
    $result = $db->execute("SELECT * FROM dosen_tbl
WHERE nip = '".$nip."' AND token = '".$token."'");

    // If not dosen, ...
    if(!$result){
        // Redirect to login
        header("Location: ../../login.php");
    }

    if (isset($form_id)) {
        $delete_absen = $db->execute("DELETE FROM absen_form_tbl WHERE form_id = $form_id");

        if($delete_absen){
            $_SESSION['notification'] = "Absen berhasil didelete";
            header("Location: ../dashboarddosen.php");
        } else{
            $_SESSION['notification'] = "Absen gagal didelete";
            header("Location: ../dashboarddosen.php");
        }
    }
} else{
    header("Location: ../../login.php");
}
?>