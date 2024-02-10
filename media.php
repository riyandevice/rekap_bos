<?php
session_start();
if(!empty($_SESSION['nama_id'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$jenjang=$_SESSION['jenjang'];
$idd=$_SESSION['id'];

include "config/conn.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CABDINPAS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

     <!-- JQuery DataTable Css -->
     <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p><img src="images/user.png" class="text-center" width="118" height="155"/></p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">SIM - MANAGEMEN CABDIN PAS</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
<?php
$sql = mysql_query("SELECT * FROM user where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
?>      
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div>
                    <img src="images/user.png" width="48" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$rs[nama_id]";?></div>
                    <div class="email"><?php echo"$rs[nama]";?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            
            <?php include "inc/main_blade.php";?>

            <?php include "inc/footer.php";?>

        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <?php 
                        $sqlI=mysql_query("select * from user_sekolah where stts='1' and jenjang='pklk'");
                        $sqlI1=mysql_num_rows($sqlI);

                        $pklk=($sqlI1);
                        ?>
                        <div class="content">
                            <div class="text">USER PKLK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo number_format($pklk);?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <?php 
                        $sqlI=mysql_query("select * from user_sekolah where stts='1' and jenjang='sma'");
                        $sqlI1=mysql_num_rows($sqlI);

                        $sma=($sqlI1);
                        ?>
                        <div class="content">
                            <div class="text">USER SMA</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo number_format($sma);?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <?php 
                        $sqlI=mysql_query("select * from user_sekolah where stts='1' and jenjang='smk'");
                        $sqlI1=mysql_num_rows($sqlI);

                        $smk=($sqlI1);
                        ?>
                        <div class="content">
                            <div class="text">USER SMK</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo number_format($smk);?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <?php 
                        $sqlI=mysql_query("select * from user_sekolah where stts='1'");
                        $sqlI1=mysql_num_rows($sqlI);

                        $all_user=($sqlI1);
                        ?>
                        <div class="content">
                            <div class="text">TOTAL USER</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo number_format($all_user);?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

             <!-- Basic Example -->
             <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <img src="images/logo-bos.png" width="125" alt="User" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a target="_blank" href="https://bos.kemdikbud.go.id/index.php/home">
                            <button type="button" class="btn bg-red waves-effect">MASUK WEBSITE BOS</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a target="_blank" href="https://data.dikdasmen.kemdikbud.go.id/sso/auth/?response_type=code&client_id=laporbos&state=100100&redirect_uri=https://bos.kemdikbud.go.id/index.php/callback_dapodik">
                            <button type="button" class="btn bg-purple waves-effect">LOGIN OPERATOR</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a target="_blank" href="https://siplah.kemdikbud.go.id/">
                            <button type="button" class="btn bg-blue waves-effect">MASUK WEBSITE SIPLAH</button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <a target="_blank" href="http://dapo.dikdasmen.kemdikbud.go.id/">
                            <button type="button" class="btn bg-orange waves-effect">MASUK WEBSITE DAPODIK</button></a>
                        </div>
                        <div class="body">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="images/img_bos_1.png"/>
                                    </div>
                                    <div class="item">
                                        <img src="images/img_bos_2.png"/>
                                    </div>
                                    <div class="item">
                                        <img src="images/img_bos_3.png"/>  
                                    </div>
                                    <div class="item">
                                        <img src="images/img_bos_4.png"/>  
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- #END# Basic Example -->

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR LAPORAN DANA BOS DITERIMA LEMBAGA
                            </h2>
                            <small class="col-pink">Daftar Lampiran Merupakan Daftar Lembaga yang sudah Melakukan Input <code>Realisasi Penggunaan</code> di Tiap Triwulan</small>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th style="background-color: gainsboro;" rowspan="2">Nama Lembaga</th>
                                            <th style="background-color: gainsboro;" rowspan="2">NPSN</th>
                                            <th style="background-color: gainsboro;" colspan="2" class="text-center">Triwulan 1</th>
                                            <th style="background-color: gainsboro;" colspan="2" class="text-center">Triwulan 2</th>
                                            <th style="background-color: gainsboro;" colspan="2" class="text-center">Triwulan 3</th>
                                            <th style="background-color: gainsboro;" colspan="2" class="text-center">Triwulan 4</th>
                                        </tr>
                                        <tr>
                                            <th style="background-color: gainsboro;">Penerimaan</th>
                                            <th style="background-color: gainsboro;">Penggunaan</th>
                                            <th style="background-color: gainsboro;">Penerimaan</th>
                                            <th style="background-color: gainsboro;">Penggunaan</th>
                                            <th style="background-color: gainsboro;">Penerimaan</th>
                                            <th style="background-color: gainsboro;">Penggunaan</th>
                                            <th style="background-color: gainsboro;">Penerimaan</th>
                                            <th style="background-color: gainsboro;">Penggunaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM user_sekolah ORDER BY jenjang DESC");
while($rs=mysql_fetch_array($sql))
	{
        $sqlw=mysql_query("select * from tb_tapel where status='1'");
        $rs_tapel=mysql_fetch_array($sqlw);

		$sqlw=mysql_query("select * from tb_rkas where idu='$rs[idu]' and id_semester='1' and id_tapel='$rs_tapel[id_tapel]'");
        $rs_tri_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$rs[idu]' and id_semester='1' and id_tapel='$rs_tapel[id_tapel]'");
        $reali_1=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_rkas where idu='$rs[idu]' and id_semester='2' and id_tapel='$rs_tapel[id_tapel]'");
        $rs_tri_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$rs[idu]' and id_semester='2' and id_tapel='$rs_tapel[id_tapel]'");
        $reali_2=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_rkas where idu='$rs[idu]' and id_semester='3' and id_tapel='$rs_tapel[id_tapel]'");
        $rs_tri_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$rs[idu]' and id_semester='3' and id_tapel='$rs_tapel[id_tapel]'");
        $reali_3=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_rkas where idu='$rs[idu]' and id_semester='4' and id_tapel='$rs_tapel[id_tapel]'");
        $rs_tri_4=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$rs[idu]' and id_semester='4' and id_tapel='$rs_tapel[id_tapel]'");
        $reali_4=mysql_fetch_array($sqlw);
		
$no++;
	
?>
                                        <tr>
                                            <td><b><?php echo"$rs[sekolah]";?></b></td>
                                            <td class="text-center"><?php echo"$rs[npsn]";?></td>
                                            <td class="text-center"><?php echo number_format((double)"$rs_tri_1[dana_bos_triwulan]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$reali_1[total]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$rs_tri_2[dana_bos_triwulan]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$reali_2[total]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$rs_tri_3[dana_bos_triwulan]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$reali_3[total]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$rs_tri_4[dana_bos_triwulan]", 0, ",", ".")?></td>
                                            <td class="text-center"><?php echo number_format((double)"$reali_4[total]", 0, ",", ".")?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->



            <div class="block-header">
                <h2>
                    DIAGRAM DANA BOS BERDASARKAN MODAL 4 BELANJA DAN 8 (DELAPAN) SNP
                </h2>
            </div>

            <div class="row clearfix">
                <!-- Line Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PENGGUNAAN DANA BOS BERDASAR 8 SNP</h2>
                            
                        </div>
                        <div class="body">
                            <canvas id="line_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Line Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PENGGUNAAN DANA BOS BERDASAR 4 MODAL BELANJA</h2>
                        
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>

            <div class="row clearfix">
                <!-- Radar Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>RADAR CHART</h2>
                            
                        </div>
                        <div class="body">
                            <canvas id="radar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Radar Chart -->
                <!-- Pie Chart -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>PIE CHART</h2>
                        
                        </div>
                        <div class="body">
                            <canvas id="pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    
    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/index.js"></script>

    <script>
    <?php
    include "config/conn.php";

    
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='1'");
    $data = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='2'");
    $data2 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='3'");
    $data3 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='4'");
    $data4 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='5'");
    $data5 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='6'");
    $data6 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='7'");
    $data7 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='8'");
    $data8 = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(belanja_pegawai) as jumlah from tb_realisasi");
    $b_pegawai = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(belanja_barang) as jumlah from tb_realisasi");
    $b_barang = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(belanja_modal_alat) as jumlah from tb_realisasi");
    $b_alat = mysql_fetch_array($qry);
    $qry = mysql_query("select SUM(belanja_modal_aset) as jumlah from tb_realisasi");
    $b_aset = mysql_fetch_array($qry);
    ?>

        $(function () {
    new Chart(document.getElementById("line_chart").getContext("2d"), getChartJs('line'));
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("radar_chart").getContext("2d"), getChartJs('radar'));
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie')); });

    function getChartJs(type) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["SNP 1", "SNP 2", "SNP 3", "SNP 4", "SNP 5", "SNP 6", "SNP 7", "SNP 8"],
                datasets: [{
                    label: "My First dataset",
                    data: [<?php echo"$data[jumlah]";?>, <?php echo"$data2[jumlah]";?>, <?php echo"$data3[jumlah]";?>, <?php echo"$data4[jumlah]";?>, <?php echo"$data5[jumlah]";?>, <?php echo"$data6[jumlah]";?>, <?php echo"$data7[jumlah]";?>, <?php echo"$data8[jumlah]";?>],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["B. Pegawai", "B. Barang & Jasa", "B. Modal Alat", "B. Modal Aset"],
                datasets: [{
                    label: "My First dataset",
                    data: [<?php echo"$b_pegawai[jumlah]";?>, <?php echo"$b_barang[jumlah]";?>, <?php echo"$b_alat[jumlah]";?>, <?php echo"$b_aset[jumlah]";?>],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["B. Pegawai", "B. Barang & Jasa", "B. Modal Alat", "B. Modal Aset"],
                datasets: [{
                    label: "My First dataset",
                    data: [<?php echo"$b_pegawai[jumlah]";?>, <?php echo"$b_barang[jumlah]";?>, <?php echo"$b_alat[jumlah]";?>, <?php echo"$b_aset[jumlah]";?>],
                    borderColor: 'rgba(0, 188, 212, 0.8)',
                    backgroundColor: 'rgba(0, 188, 212, 0.5)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [<?php echo"$data[jumlah]";?>, <?php echo"$data2[jumlah]";?>, <?php echo"$data3[jumlah]";?>, <?php echo"$data4[jumlah]";?>, <?php echo"$data5[jumlah]";?>, <?php echo"$data6[jumlah]";?>, <?php echo"$data7[jumlah]";?>, <?php echo"$data8[jumlah]";?>],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(213, 30, 99)",
                        "rgb(225, 193, 7)",
                        "rgb(0, 158, 212)",
                        "rgb(0, 118, 262)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "SNP-1",
                    "SNP-2",
                    "SNP-3",
                    "SNP-4",
                    "SNP-5",
                    "SNP-6",
                    "SNP-7",
                    "SNP-8"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}
</script>
</body>

</html>
<?php }} ?>