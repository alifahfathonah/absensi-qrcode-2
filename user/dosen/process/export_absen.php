<?php

SESSION_START();
include "../../../database.php";

$db = new Database();

$nip = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

// Get all register field
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

    if(isset($_GET['export']) && isset($form_id)){
        $attendance_data = $db->get("SELECT mahasiswa_tbl.nim as nim,
    mahasiswa_tbl.nama_lengkap as nama_lengkap,
    kehadiran_tbl.tanggal_absen as tanggal_absen
    FROM mahasiswa_tbl, kehadiran_tbl,dosen_tbl
    WHERE kehadiran_tbl.form_id = " . $form_id . " AND 
    kehadiran_tbl.nim = mahasiswa_tbl.nim AND
    dosen_tbl.nip = '" . $nip . "'
    ORDER BY kehadiran_tbl.tanggal_absen ASC");

        if($attendance_data) {
            // Get absen data
            $absen_data = $db->get("SELECT form_id, nama_matkul, kelas, pertemuan, tanggal, program_studi, qrcode
        FROM absen_form_tbl
        WHERE nip = '" . $nip . "' AND form_id = " . $form_id);

            $absen_data = mysqli_fetch_assoc($absen_data);

            $filename = $absen_data['nama_matkul']."_".$absen_data['kelas']."_".
                $absen_data['pertemuan']."_".$absen_data['tanggal'].".csv";

            $output = fopen($filename, "w");

            // Title
            fputcsv($output, array('NIM', 'Nama Mahasiswa', 'Tanggal Absen'));

            while ($row = mysqli_fetch_assoc($attendance_data)) {
                fputcsv($output, $row);
            }

            header("Content-Description: File Transfer");
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=' . $filename);

            readfile($filename);

            unlink($filename);
            fclose($output);

            exit();
        } else{
            echo "Data Mahasiswa belum ada";
            header("Location: ../view_absen.php");
        }
    }
} else{
    header("Location: ../../login.php");
}