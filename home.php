<?php
session_start();
if(!empty($_SESSION['nama'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$jab=$_SESSION['jabatan'];
$sekolah=$_SESSION['sekolah'];
$jenjang=$_SESSION['jenjang'];


include "config/conn.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CABDINPAS</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

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
$sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
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
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$rs[nama]";?></div>
                    <div class="email"><?php echo"$rs[nip]";?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profil.php"><i class="material-icons">person</i>Profil</a></li>
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

            <!-- Animated -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROGRES PENGINPUTAN SELAMA 1 TAHUN ANGGARAN
                            </h2>
                        </div>
                        <div class="body">
                        <?php
                        $sql = mysql_query("SELECT * FROM tb_tapel where status='1'");
                        while($rs=mysql_fetch_array($sql)){
                            $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$rs[id_tapel]'");
                            $rsbos=mysql_fetch_array($sqlw);

                            $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_semester='1' and id_tapel='$rs[id_tapel]'");
                            $rs_tri_1=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_semester='2' and id_tapel='$rs[id_tapel]'");
                            $rs_tri_2=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_semester='3' and id_tapel='$rs[id_tapel]'");
                            $rs_tri_3=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_semester='4' and id_tapel='$rs[id_tapel]'");
                            $rs_tri_4=mysql_fetch_array($sqlw);

                            $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_semester='1' and id_tapel='$rs[id_tapel]'");
                            $realisasi_1=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_semester='2' and id_tapel='$rs[id_tapel]'");
                            $realisasi_2=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_semester='3' and id_tapel='$rs[id_tapel]'");
                            $realisasi_3=mysql_fetch_array($sqlw);
                            $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_semester='4' and id_tapel='$rs[id_tapel]'");
                            $realisasi_4=mysql_fetch_array($sqlw);

                            $total_1 = (($rsbos['progres_bos'] + $rsbos['progres_snp'] + $rsbos['progres_belanja']) + ($rs_tri_1['progres_pagu'] + $rs_tri_2['progres_pagu'] + $rs_tri_3['progres_pagu'] + $rs_tri_4['progres_pagu'] + $realisasi_1['progres_belanja'] + $realisasi_2['progres_belanja'] + $realisasi_3['progres_belanja'] + $realisasi_4['progres_belanja'])*15);

                        ?>
                            <label>Progres Penginputan RKAS dan Rekap Dana BOS</labeL>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                     aria-valuemax="0" style="width: <?php echo"$total_1";?>%">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Animated -->
            <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">INFORMASI APLIKASI</h4>
                        </div>
                        <div class="modal-body">
                            1. Bendahara Menyusun RKAS Dana BOS<br>
                            2. Bendahara Input Rekap Total RKAS <br>&nbsp;&nbsp;&nbsp;&nbsp;(Pagu Anggaran, Pagu 4 Modal Belanja, Pagu 8 SNP - 1 Tahun)<br>
                            3. Bendahara Input Per Triwulan Dana Bos Diterima, Belanja 4 Modal, 8 (delapan) SNP<br>
                            4. Bendahara Cetak SPTJM / Cetak Realisasi / Cetak Penggunaan 8 SNP <br>&nbsp;&nbsp;&nbsp;&nbsp;(Jika Disahkan Cabang Dinas)<br>
                            5. Jika Ditolak, maka Bendahara merevisi kembali<br>
                            <img src="images/alur.png" width="570" height="300" alt="User" />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP NOTIF</button>
                        </div>
                    </div>
                </div>
            </div>
        
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
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/pages/ui/modals.js"></script>
    <script src="js/pages/index.js"></script>

    <script>
    $('#mdModal').modal('show');
    </script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
<?php }}} ?>