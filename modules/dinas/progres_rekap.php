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
                    TABEL PROGRES PENGERJAAN
                    <small>Berdasarkan Pengerjaan Input per Menu di Tiap Lembaga</small>
                </h2>
            </div>
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>PROGRESS PENGERJAAN PADA (Tahun Anggaran <?php echo $rs_tapel['tapel'] ?> / <?php echo $rs_semester['semester'] ?>)</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nama Lembaga</th>
                                            <th>NPSN</th>
                                            <th class="text-center">Status Input</th>
                                            <th class="text-center">Pagu Per Tahun</th>
                                            <th class="text-center">Belanja Per Tahun</th>
                                            <th class="text-center">Belanja SNP Per Tahun</th>
                                            <th class="text-center">Pagu Triwulan</th>
                                            <th class="text-center">Belanja Triwulan</th>
                                            <th class="text-center">Belanja 8 SNP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM user_sekolah where jenjang='$_GET[jenjang]' and status_sekolah='$_GET[status_sekolah]'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from tb_dana_bos where id_tapel='$_GET[id_tapel]' and idu='$rs[idu]'");
        $bos=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' and idu='$rs[idu]'");
        $rkas=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' and idu='$rs[idu]'");
        $reali=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi_snp where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' and idu='$rs[idu]'");
        $snp_reali=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_pengesahan where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' and idu='$rs[idu]'");
        $sah=mysql_fetch_array($sqlw);
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                    <tr>
                                            <td><?php echo $rs['sekolah'] ?></td>
                                            <td><?php echo $rs['npsn'] ?></td>
                                            <td class="text-center">
                                            <?php
                                            if($sah['stts']=="1"){
                                            ?>  
                                            <span class="label bg-purple">PENGAJUAN</span>
                                            <?php
                                            } else if ($sah['stts']=="2") {
                                            ?>
                                            <span class="label bg-orange">REVISI</span>
                                            <?php
                                            } else if ($sah['stts']=="3") {
                                            ?>
                                            <span class="label bg-green">PENGESAHAN</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">PROSES INPUT</span>
                                            <?php
                                            }
                                            ?>
                                            </td>

                                            <td class="text-center">
                                            <?php
                                            if($bos['progres_bos']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            if($bos['progres_belanja']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            if($bos['progres_snp']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            if($rkas['progres_pagu']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            if($reali['progres_belanja']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                            <td class="text-center">
                                            <?php
                                            if($snp_reali['progres_snp']=="1"){
                                            ?>  
                                            <span class="label bg-green">SUDAH</span>
                                            <?php
                                            }else{
                                            ?>
                                            <span class="label bg-red">BELUM</span>
                                            <?php
                                            }
                                            ?>
                                            </td>
                                    </tr>
<?php
}
}
?>
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
<?php }} ?>