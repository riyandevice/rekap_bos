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
                    TABEL PENGESAHAN PENYUSUNAN
                    <small>Silahkan Klik Tombol untuk membatalkan Pengesahan</small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR PENGESAHAN PENYUSUNAN ANGGARAN PER TAHUN DANA BOS
                            </h2>

                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Lembaga</th>
                                            <th>NPSN</th>
                                            <th>Status</th>
                                            <th>Jenis Triwulan</th>
                                            <th>Status Rekap</th>
                                            <th>Aksi 1</th>
                                            <th>Aksi 2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM user_sekolah where stts='1'");
while($rs=mysql_fetch_array($sql))
	{

        $sqlw=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
        $rsw=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_pengesahan where idu='$rs[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
        $sah=mysql_fetch_array($sqlw);
		
$no++;
	
?> 
                                        <tr>
                                            <td><?php echo"$rs[sekolah]";?></td>
                                            <td><?php echo"$rs[npsn]";?></td>
                                            <?php
if($rs['status_sekolah']=="S"){
?>                              
                                            <td class="text-center">
                                            Swasta
                                            </td>
<?php
}else{
?>
                                            <td class="text-center">
                                            Negeri
                                            </td>
<?php
}
?>
                                        <td><?php echo"$rsw[semester]";?></td>
                                        <td class="text-center">
                                        <?php
                                        if($sah['stts']=="1"){
                                        ?>  
                                        <button type="button" class="btn bg-green waves-effect m-r-20">USULAN</button>
                                        <?php
                                        } else if ($sah['stts']=="2") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20">REVISI</button>
                                        <?php
                                        } else if ($sah['stts']=="3") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20">DISAHKAN</button>
                                        <?php
                                        }else{
                                        ?>
                                        <button type="button" class="btn bg-red waves-effect m-r-20">PROSES</button>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                        if($sah['stts']=="2"){
                                        ?>  
                                        <button type="button" class="btn bg-red waves-effect m-r-20">PROSES REVISI</button>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="../../modules/dinas/notif.php?act=notif_edit&idu=<?php echo"$rs[idu]";?>&id_tapel=<?php echo"$_GET[id_tapel]";?>&id_semester=<?php echo"$_GET[id_semester]";?>">
                                        <button type="button" class="btn bg-red waves-effect m-r-20">REVISI REKAP</button></a>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                        if($sah['stts']=="3"){
                                        ?>  
                                        <button type="button" class="btn bg-green waves-effect m-r-20">NO-ACTION</button>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_sah&idu=<?php echo"$rs[idu]";?>&id_tapel=<?php echo"$_GET[id_tapel]";?>&id_semester=<?php echo"$_GET[id_semester]";?>">
                                        <button type="button" class="btn bg-green waves-effect m-r-20">DISAHKAN</button></a>
                                        <?php
                                        }
                                        ?>
                                        </td>
                                            
                                        </tr>
<?php
}
?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
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

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
<?php }} ?>