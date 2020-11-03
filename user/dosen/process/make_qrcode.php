<?php
include "../../../phpqrcode/qrlib.php";

// Get id
$param = $_GET['id'];

ob_start("callback");

$codeText = $param;

$debugLog = ob_get_contents();
ob_end_clean();

QRcode::png($codeText); // Output