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
    $sqlw=mysql_query("select * from tb_semester");
    $rsemester=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_tapel");
    $rtapel=mysql_fetch_array($sqlw);
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
                    TABEL PENGESAHAN PENYUSUNAN RKAS DAN REKAP DANA BOS
                    <small>Dana Bantuan Operasional Sekolah (BOS)</small>
                </h2>
            </div>

            
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DAFTAR PENGESAHAN PENYUSUNAN RKAS DAN REKAP DANA BOS
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
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_tapel where status='1'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_sptjm where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
        $rs_sptjm_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_sptjm where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
        $rs_sptjm_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_sptjm where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
        $rs_sptjm_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_sptjm where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
        $rs_sptjm_4=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_semester");
        $rsemester=mysql_fetch_array($sqlw);

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

        $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
        $rs_real_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
        $rs_real_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
        $rs_real_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
        $rs_real_4=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
        $rs_real_snp_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
        $rs_real_snp_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
        $rs_real_snp_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
        $rs_real_snp_4=mysql_fetch_array($sqlw);

        $sqlw=mysql_query("select * from tb_pengesahan where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
        $rs_sah_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_pengesahan where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
        $rs_sah_2=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_pengesahan where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
        $rs_sah_3=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_pengesahan where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
        $rs_sah_4=mysql_fetch_array($sqlw);

        $total_sync_1 = ($rs_wulan_1['progres_pagu'] + $rs_real_1['progres_belanja'] + $rsbos['progres_bos'] + $rsbos['progres_belanja'] + $rsbos['progres_snp'] + $rs_real_snp_1['progres_snp']  + $rs_sah_1['stts']);
        $total_sync_2 = ($rs_wulan_2['progres_pagu'] + $rs_real_2['progres_belanja'] + $rsbos['progres_bos'] + $rsbos['progres_belanja'] + $rsbos['progres_snp'] + $rs_real_snp_2['progres_snp']  + $rs_sah_2['stts']);
        $total_sync_3 = ($rs_wulan_3['progres_pagu'] + $rs_real_3['progres_belanja'] + $rsbos['progres_bos'] + $rsbos['progres_belanja'] + $rsbos['progres_snp'] + $rs_real_snp_3['progres_snp']  + $rs_sah_3['stts']);
        $total_sync_4 = ($rs_wulan_4['progres_pagu'] + $rs_real_4['progres_belanja'] + $rsbos['progres_bos'] + $rsbos['progres_belanja'] + $rsbos['progres_snp'] + $rs_real_snp_4['progres_snp']  + $rs_sah_4['stts']);
		
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                            <?php
                                            if($rs_sah_1['stts']=='2'){
                                            ?>  
                                            <div class="alert bg-cyan">
                                            CATATAN INFORMASI REVISI PADA TRI WULAN 1 (SATU):  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                            <label class="font-bold col-black"><strong><?php echo"$rs_sah_1[ket]";?><strong></label>
                                            </div><br>
                                            <?php
                                            } else {
                                            ?>
                                            
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if($rs_sah_2['stts']=='2'){
                                            ?>  
                                            <div class="alert bg-cyan">
                                            CATATAN INFORMASI REVISI PADA TRI WULAN 2 (DUA):  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                            <label class="font-bold col-black"><strong><?php echo"$rs_sah_2[ket]";?><strong></label>
                                            </div><br>
                                            
                                            <?php
                                            } else {
                                            ?>
                                            
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if($rs_sah_3['stts']=='2'){
                                            ?>  
                                            <div class="alert bg-cyan">
                                            CATATAN INFORMASI REVISI PADA TRI WULAN 3 (TIGA):  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                            <label class="font-bold col-black"><strong><?php echo"$rs_sah_3[ket]";?><strong></label>
                                            </div><br>
                                            
                                            <?php
                                            } else {
                                            ?>
                                            
                                            <?php
                                            }
                                            ?>

                                            <?php
                                            if($rs_sah_4['stts']=='2'){
                                            ?>  
                                            <div class="alert bg-cyan">
                                            CATATAN INFORMASI REVISI PADA TRI WULAN 4 (EMPAT):  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                            <label class="font-bold col-black"><strong><?php echo"$rs_sah_4[ket]";?><strong></label>
                                            </div><br>
                                            
                                            <?php
                                            } else {
                                            ?>
                                            
                                            <?php
                                            }
                                            ?>
                                        
                                        
                                        <tr>
                                        <td><?php echo"$no";?></td>
                                        <td><?php echo"$rs[tapel]";?></td>
                                        <td align=center>Rp. <?php echo number_format((double)"$rsbos[dana]", 0, ",", ".")?>
                                        </td>

                                        <td align=center>Rp. <?php echo number_format((double)"$rs_wulan_1[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                            <?php
                                            if($total_sync_1 == 6){
                                            ?>  
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_jadi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>">
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">DIJINKAN MENGAJUKAN</button></a>
                                            <?php
                                            } else if ($total_sync_1 == 7) {
                                            ?>
                                            <button type="button" class="btn bg-orange waves-effect m-r-20">PROSES PENGAJUAN</button><br></br>
                                            <label class="text-center">Tgl : <?php echo"$rs_sah_1[tgl_input]";?></label>
                                            <?php
                                            } else if ($total_sync_1 == 8) {
                                            ?>
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_revisi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">REVISI</button></a>
                                            <?php
                                            } else if ($total_sync_1 == 9) {
                                            ?>
                                            <a href="../../modules/smk/act_tgl_sptjm_tw_1.php?act=edit_data&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>&id_sp=<?php echo"$rs_sptjm_1[id_sp]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">CETAK SPTJM</button></a><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_d_1()">CETAK GUNA</button><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_snp_1()">CETAK 8 SNP</button>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-red waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">Rp. <?php echo number_format((double)"$rs_wulan_2[dana_bos_triwulan]", 0, ",", ".")?>
                                        <br></br>
                                        <?php
                                            if($total_sync_2 == 6){
                                            ?>  
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_jadi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>">
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">DIJINKAN MENGAJUKAN</button></a>
                                            <?php
                                            } else if ($total_sync_2 == 7) {
                                            ?>
                                            <button type="button" class="btn bg-orange waves-effect m-r-20">PROSES PENGAJUAN</button><br></br>
                                            <label class="text-center">Tgl : <?php echo"$rs_sah_1[tgl_input]";?></label>
                                            <?php
                                            } else if ($total_sync_2 == 8) {
                                            ?>
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_revisi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">REVISI</button></a>
                                            <?php
                                            } else if ($total_sync_2 == 9) {
                                            ?>
                                            <a href="../../modules/smk/act_tgl_sptjm_tw_2.php?act=edit_data_ku&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>&id_sp=<?php echo"$rs_sptjm_2[id_sp]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">CETAK SPTJM</button></a><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_d_2()">CETAK GUNA</button><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_snp_2()">CETAK 8 SNP</button>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-red waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">Rp. <?php echo number_format((double)"$rs_wulan_3[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                        <?php
                                            if($total_sync_3 == 6){
                                            ?>  
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_jadi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>">
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">DIJINKAN MENGAJUKAN</button></a>
                                            <?php
                                            } else if ($total_sync_3 == 7) {
                                            ?>
                                            <button type="button" class="btn bg-orange waves-effect m-r-20">PROSES PENGAJUAN</button><br></br>
                                            <label class="text-center">Tgl : <?php echo"$rs_sah_1[tgl_input]";?></label>
                                            <?php
                                            } else if ($total_sync_3 == 8) {
                                            ?>
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_revisi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">REVISI</button></a>
                                            <?php
                                            } else if ($total_sync_3 == 9) {
                                            ?>
                                            <a href="../../modules/smk/act_tgl_sptjm_tw_3.php?act=edit_data_ku&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>&id_sp=<?php echo"$rs_sptjm_3[id_sp]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">CETAK SPTJM</button></a><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_d_3()">CETAK GUNA</button><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_snp_3()">CETAK 8 SNP</button>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-red waves-effect m-r-20">TIDAK AKTIF</button>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">Rp. <?php echo number_format((double)"$rs_wulan_4[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                        <?php
                                            if($total_sync_4 == 6){
                                            ?>  
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_jadi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>">
                                            <button type="button" class="btn bg-purple waves-effect m-r-20">DIJINKAN MENGAJUKAN</button></a>
                                            <?php
                                            } else if ($total_sync_4 == 7) {
                                            ?>
                                            <button type="button" class="btn bg-orange waves-effect m-r-20">PROSES PENGAJUAN</button><br></br>
                                            <label class="text-center">Tgl : <?php echo"$rs_sah_1[tgl_input]";?></label>
                                            <?php
                                            } else if ($total_sync_4 == 8) {
                                            ?>
                                            <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_revisi&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>">
                                            <button type="button" class="btn bg-red waves-effect m-r-20">REVISI</button></a>
                                            <?php
                                            } else if ($total_sync_4 == 9) {
                                            ?>
                                            <a href="../../modules/smk/act_tgl_sptjm_tw_4.php?act=edit_data_ku&idu=<?php echo"$uidi";?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>&id_sp=<?php echo"$rs_sptjm_4[id_sp]";?>">
                                            <button type="button" class="btn bg-green waves-effect m-r-20">CETAK SPTJM</button></a><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_d_4()">CETAK GUNA</button><br></br>
                                            <button type="button" class="btn bg-green waves-effect m-r-20" onClick="print_snp_4()">CETAK 8 SNP</button>
                                            <?php
                                            } else {
                                            ?>
                                            <button type="button" class="btn bg-red waves-effect m-r-20">TIDAK AKTIF</button>
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

    <script>
		function print_d_1(){
			window.open("../../modules/cetak/cetak_penggunaan_tw_1.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_sptjm_1(){
			window.open("../../modules/cetak/cetak_sptjm_tw_1.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>","_blank");
		}
	</script>

<script>
		function print_d_2(){
			window.open("../../modules/cetak/cetak_penggunaan_tw_2.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_sptjm_2(){
			window.open("../../modules/cetak/cetak_sptjm_tw_2.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>","_blank");
		}
	</script>

<script>
		function print_d_3(){
			window.open("../../modules/cetak/cetak_penggunaan_tw_3.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_sptjm_3(){
			window.open("../../modules/cetak/cetak_sptjm_tw_3.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>","_blank");
		}
	</script>

<script>
		function print_d_4(){
			window.open("../../modules/cetak/cetak_penggunaan_tw_4.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_sptjm_4(){
			window.open("../../modules/cetak/cetak_sptjm_tw_4.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>","_blank");
		}
	</script>

    <script>
		function print_snp_1(){
			window.open("../../modules/cetak/cetak_penggunaan_snp_smk.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_snp_2(){
			window.open("../../modules/cetak/cetak_penggunaan_snp_smk.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_2[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_2[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_snp_3(){
			window.open("../../modules/cetak/cetak_penggunaan_snp_smk.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_3[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_3[id_semester]";?>","_blank");
		}
	</script>
    <script>
		function print_snp_4(){
			window.open("../../modules/cetak/cetak_penggunaan_snp_smk.php?idu=<?php echo $uidi?>&id_tapel=<?php echo"$rs_wulan_4[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_4[id_semester]";?>","_blank");
		}
	</script>
    
    
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