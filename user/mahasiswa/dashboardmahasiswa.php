<?php
SESSION_START();
include "../../database.php";

$db = new Database();

$nim = (isset($_SESSION['nim_nip'])) ? $_SESSION['nim_nip'] : "";
$token = (isset($_SESSION['token'])) ? $_SESSION['token'] : "";

if($token && $nim){
    // Query mahasiswa
    $result = $db->execute("SELECT * FROM mahasiswa_tbl
WHERE nim = '".$nim."' AND token = '".$token."'");

    // If not mahasiswa, ...
    if(!$result){
        // Redirect to login
        header("Location: ../../login.php");
    }

    $userdata = $db->get("SELECT nim, nama_lengkap
    FROM mahasiswa_tbl
    WHERE nim = '".$nim."'");

    $userdata = mysqli_fetch_assoc($userdata);
} else{
    header("Location: ../../login.php");
}

$notification = (isset($_SESSION['notification'])) ? $_SESSION['notification'] : "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>DASHBOARD | ABSENSI CODE QR</title>

    <!-- Favicons -->
    <link href="../../img/favicon.png" rel="icon">
    <link href="../../img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--external css-->
    <link href="../../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../../css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="../../lib/gritter/css/jquery.gritter.css" />
    <!-- Custom styles for this template -->
    <link href="../../css/style.css" rel="stylesheet">
    <link href="../../css/style-responsive.css" rel="stylesheet">
    <script src="../../lib/chart-master/Chart.js"></script>
    <script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>
    <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="dashboardmahasiswa.php" class="logo"><b>DASHBOARD <span>MAHASISWA</span></b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" id="logout" href="#">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <p class="centered">
                    <img src="../../assets/img/profil.jpg" class="img-circle" width="80">
                </p><br>
                <h5 class="centered"><?php echo $userdata['nama_lengkap']?></h5>
                <h5 class="centered"><?php echo $userdata['nim']?></h5><br><br>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- /col-md-4 -->
            <br><br>
            <div class="col-md-12 col-sm-4 mb">
                <div class="green-panel">
                    <div class="green-header">
                        <h3>Click QR Below to Scan</h3>
                        <p>
                            <a href="#" id="btn-scan-qr">
                                <img src="../../assets/img/scan-me.png" width="100">
                            </a>
                        </p>

                        <canvas hidden="" id="qr-canvas"></canvas>
                        <br>
                        <div class="text-center" id="qr-result">
                            <form method="post" action="process/submit_qrcode.php">
                                <p>
                                    <label>
                                        Data:
                                        <input class="form-control" id="outputData" type="text" name="data_qrcode" placeholder="Insert QR text" value="" required>
                                    </label>
                                </p>
                                <p>
                                    <button class="btn btn-small btn-theme03">SUBMIT</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <!--main content end-->

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyrights <strong>Absensi QR</strong>. By Kelompok 6
            </p>
            <div class="credits">
                <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
            </div>
            <a href="index.html#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="qrCodeScanner.js"></script>
<script src="../../lib/jquery/jquery.min.js"></script>

<script src="../../lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../../lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="../../lib/jquery.scrollTo.min.js"></script>
<script src="../../lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../../lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="../../lib/common-scripts.js"></script>
<script type="text/javascript" src="../../lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="../../lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="../../lib/sparkline-chart.js"></script>
<script src="../../lib/zabuto_calendar.js"></script>
<script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                type: "text",
                label: "Special event",
                badge: "00"
            }, {
                type: "block",
                label: "Regular event",
            }]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var OnOneClick = function() {
        swal({
            title: "Apakah anda yakin ingin keluar?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((logout) => {
                if (logout) {
                    window.location.href = '../logout.php'
                }
            });
    };

    var OneClick = document.getElementById("logout");
    OneClick.addEventListener('click', OnOneClick, false);
</script>
</body>

</html>

<?php
$db->setNotification($notification);
?>