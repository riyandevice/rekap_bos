<?php
session_start();
if(!empty($_SESSION['nama'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$jab=$_SESSION['jabatan'];
$sekolah=$_SESSION['sekolah'];
$jenjang=$_SESSION['jenjang'];


include "../../config/conn.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CABDINPAS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

    <script>
		function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
	</script>

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
                <a class="navbar-brand" href="#">SIM - MANAGEMEN CABDIN PAS</a>
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
                    <img src="../../images/user.png" width="48" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$rs[nama]";?></div>
                    <div class="email"><?php echo"$rs[nip]";?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="../../profil.php"><i class="material-icons">person</i>Profil</a></li>
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
                    TABEL RKAS DANA BOS
                    <small>Dana Bantuan Operasional Sekolah (BOS)</small>
                </h2>
            </div>
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR RKAS BOS PER TAHUN ANGGARAN
                            </h2>
                            
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tahun Anggaran</th>
                                            <th>Dana BOS 1 tahun</th>
                                            <th>Triwulan 1</th>
                                            <th>Triwulan 2</th>
                                            <th>Triwulan 3</th>
                                            <th>Triwulan 4</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Tahun Anggaran</th>
                                            <th>Dana BOS 1 tahun</th>
                                            <th>Triwulan 1</th>
                                            <th>Triwulan 2</th>
                                            <th>Triwulan 3</th>
                                            <th>Triwulan 4</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_tapel");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$rs[id_tapel]'");
        $rsbos=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]'");
        $rsrkas=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
        $rs_wulan_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
        $rs_wulan_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
        $rs_wulan_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
        $rs_wulan_4=mysql_fetch_array($sqlw);
		
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                        <tr>
                                        <td><?php echo"$no";?></td>
                                        <td><?php echo"$rs[tapel]";?></td>
                                        <td>Rp. <?php echo number_format((double)"$rsbos[dana]", 0, ",", ".")?>
                                        <br></br>
                                        <?php
                                        if($rsbos['status']=="1"){
                                        ?>  
                                        <a href="../../modules/smk/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                        <button type="button" class="btn bg-green waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                        <?php
                                        } else if ($rsbos['status']=="2") {
                                        ?>
                                        <a href="../../modules/smk/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                        <button type="button" class="btn bg-orange waves-effect m-r-20">REVISI</button></a>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="../../modules/smk/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                        <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                        <?php
                                        }
                                        ?>
                                        </td>

                                        <td>Rp. <?php echo number_format((double)"$rs_wulan_1[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                            <?php
                                            if($rs_wulan_1['status']=="1"){
                                            ?>  
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_1.php?act=edit_data&id_semester=1&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                            <?php
                                            } else if ($rsbos['status']=="") {
                                            ?>
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            } else if ($rsbos['status']=="0") {
                                            ?>
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            } else if ($rsbos['status']=="1") {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_1.php?act=edit_data&id_semester=1&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                            <?php
                                            } else if ($rs_wulan_1['status']=="") {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_1.php?act=edit_data&id_semester=1&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                            <?php
                                            } else {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_1.php?act=edit_data&id_semester=1&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>Rp. <?php echo number_format((double)"$rs_wulan_2[dana_bos_triwulan]", 0, ",", ".")?>
                                        <br></br>
                                            <?php
                                            if($rs_wulan_2['status']=="1"){
                                            ?>  
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_2.php?act=edit_data&id_semester=2&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                            <?php
                                            } else if ($rs_wulan_1['status']=="1") {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_2.php?act=edit_data&id_semester=2&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>Rp. <?php echo number_format((double)"$rs_wulan_3[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                            <?php
                                            if($rs_wulan_3['status']=="1"){
                                            ?>  
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_3.php?act=edit_data&id_semester=3&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                            <?php
                                            } else if ($rs_wulan_2['status']=="1") {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_3.php?act=edit_data&id_semester=3&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>Rp. <?php echo number_format((double)"$rs_wulan_4[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                            <?php
                                            if($rs_wulan_4['status']=="1"){
                                            ?>  
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_4.php?act=edit_data&id_semester=4&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">SUDAH DISUSUN</button></a>
                                            <?php
                                            } else if ($rs_wulan_3['status']=="1") {
                                            ?>
                                            <a href="../../modules/smk/act_susun_rkas_bos_tw_4.php?act=edit_data&id_semester=4&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs[id_tapel]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">SUSUN PAGU</button></a>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">TIDAK AKTIF</button>
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
            </div>
            <!-- #END# Basic Examples -->
                    </div>
                </div>
            </div>
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