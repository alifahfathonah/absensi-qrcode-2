<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <a href="dashboarddosen.php" class="logo"><b>DASHBOARD <span>DOSEN</span></b></a>
        <!--logo end-->
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="../../index.php">+</a></li>
                <li><a class="logout" href="../../index.php">Logout</a></li>
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
                    <a href="profile.html">
                        <img src="../../img/ui-sam.jpg" class="img-circle" width="80">
                    </a>
                </p><br>
                <h5 class="centered">Sam Soffes</h5>
                <h5 class="centered">123456789</h5><br><br>

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
            <div class="row">
                <div class="col-lg-12 main-chart">
                    <!--CUSTOM CHART START -->
                    <div class="row">
                        <!-- ABSEN PANEL -->
                        <!-- <div class="col-md-4 mb"> -->
                        <div class="col-md-4 mb">
                            <!-- WHITE PANEL - TOP USER -->
                            <div class="white-panel pn">
                                <div class="white-header">
                                    <br>
                                    <h5>@Nama Mata Kuliah</h5>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-5">
                                        <p><img src="../../img/code.png" width="80"></p>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="text-left">
                                            <p>Pertemuan Ke : </p>
                                            <p>Tanggal : </p>
                                            <p>Departemen : </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->

            <!--main content end-->

            <!--main content start-->
            <!-- row -->
            <div class="row mt">
                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Detail Absen </h4>
                            <hr>
                            <thead>
                            <tr>
                                <th> NO </th>
                                <th><i class=""></i>NIM</th>
                                <th><i class=""></i>Nama Mahasiswa</th>
                                <th><i class=""></i>Tanggal Absen</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>D1211181001</td>
                                <td>Alfian Aldy Hamdani</td>
                                <td>1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /content-panel -->
                </div>
                <!-- /col-md-12 -->
            </div>
            <!-- /row -->
        </section>
    </section>
    <!-- /MAIN CONTENT -->

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
</body>

</html>