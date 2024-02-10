<?php
session_start();
if(!empty($_SESSION['nama_id'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$jenjang=$_SESSION['jenjang'];
$idd=$_SESSION['id'];

include "../../config/conn.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cabdin Pasuruan</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

     <!-- JQuery DataTable Css -->
     <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
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
            <p><img src="../../images/user.png" class="text-center" width="118" height="155"/></p>
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
                <a class="navbar-brand" href="#">SIM - MANAGAMENENT CABDIN PAS</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
<?php
$sql = mysql_query("SELECT * FROM user where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
    $rs_semester=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
    $rs_tapel=mysql_fetch_array($sqlw);

?>      
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$rs[nama_id]";?></div>
                    <div class="email"><?php echo"$rs[nama]";?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <?php include "../../inc/main_blade2.php";?>

            <?php include "../../inc/footer.php";?>
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    GRAFIK GAMBARAN PENERIMAAN ANGGARAN DANA BOS
                    <small>Berdasarkan Pengerjaan Input Realisasi di Tiap Lembaga</small>
                </h2>
            </div>
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="row clearfix">
               <!-- Pie Chart -->
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BERDASARKAN 4 (EMPAT) BELANJA MODAL</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="pie_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Pie Chart -->
                <!-- Bar Chart -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>BERDASARKAN 8 SNP TIAP LEMBAGA</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart" height="150"></canvas>
                        </div>
                    </div>
                </div>
                <!-- #END# Bar Chart -->
            </div>

                        <div class="header">
                            <h2>REKAPITULASI PENERIMAAN ANGGARAN DANA BOS (Tahun Anggaran <?php echo $rs_tapel['tapel'] ?>)</h2>
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
$sql = mysql_query("SELECT * FROM user_sekolah where jenjang='$_GET[jenjang]' and status_sekolah='$_GET[status_sekolah]'");
while($rs=mysql_fetch_array($sql))
	{
        $sqlw=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
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
                <!-- #END# Task Info -->
        </div>
    </section>


    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Chart Plugins Js -->
    <script src="../../plugins/chartjs/Chart.bundle.js"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <script>
<?php
include "../../config/conn.php";

$sql = mysql_query("SELECT * FROM user_sekolah where jenjang='$_GET[jenjang]' and status_sekolah='$_GET[status_sekolah]'");
while($rs=mysql_fetch_array($sql))
	{
        $sqlw=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
        $rs_tapel=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from user_sekolah where jenjang='$_GET[jenjang]' and status_sekolah='$_GET[status_sekolah]'");
        $rs_user=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_realisasi where id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $realisasi=mysql_fetch_array($sqlw);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='1' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='2' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data2 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='3' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data3 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='4' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data4 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='5' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data5 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='6' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data6 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='7' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data7 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(total) as jumlah from tb_realisasi_snp where id_snp='8' and id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $data8 = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(belanja_pegawai) as jumlah from tb_realisasi where id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $b_pegawai = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(belanja_barang) as jumlah from tb_realisasi where id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $b_barang = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(belanja_modal_alat) as jumlah from tb_realisasi where id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $b_alat = mysql_fetch_array($qry);
        $qry = mysql_query("select SUM(belanja_modal_aset) as jumlah from tb_realisasi where id_tapel='$_GET[id_tapel]' and idu='$rs_user[idu]'");
        $b_aset = mysql_fetch_array($qry);
    }
?>
    $(function () {
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
    new Chart(document.getElementById("pie_chart").getContext("2d"), getChartJs('pie'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["SNP-1", "SNP-2", "SNP-3", "SNP-4", "SNP-5", "SNP-6", "SNP-7", "SNP-8"],
                datasets: [{
                    label: "Total Realisasi",
                    data: [<?php echo"$data2[jumlah]";?>, <?php echo"$data3[jumlah]";?>, <?php echo"$data4[jumlah]";?>, <?php echo"$data5[jumlah]";?>, <?php echo"$data6[jumlah]";?>, <?php echo"$data7[jumlah]";?>, <?php echo"$data8[jumlah]";?>],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
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
                    data: [<?php echo"$b_pegawai[jumlah]";?>, <?php echo"$b_barang[jumlah]";?>, <?php echo"$b_alat[jumlah]";?>, <?php echo"$b_aset[jumlah]";?>],
                    backgroundColor: [
                        "rgb(233, 30, 99)",
                        "rgb(255, 193, 7)",
                        "rgb(0, 188, 212)",
                        "rgb(139, 195, 74)"
                    ],
                }],
                labels: [
                    "Belanja Pegawai",
                    "Belanja Barang",
                    "Belanja Modal Alat",
                    "Belanja Modal Aset"
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


    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/pages/index.js"></script>

</body>

</html>
<?php }} ?>