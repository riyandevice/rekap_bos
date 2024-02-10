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
if($_GET['act']=='edit_data'){
	?>
<?php
$sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas_1=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas_2=mysql_fetch_array($sqlw);

    $rkas_total = ($rkas['progres_bos'] + $rkas['progres_snp'] + $rkas['progres_belanja'])
    
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
                                PENYUSUNAN RKAS BOS PER TRIWULAN
                            </h2><br>
                            <div class="alert bg-teal">
                                TOMBOL KIRIM PENGESAHAN, HANYA BERLAKU SEKALI JIKA SUDAH FIX DAN TOMBOL MENJADI NON-AKTIF  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                <small><b>Jika ada Perubahan silahkan Hubungi Operator BOS Cabang Dinas</b></small>
                            </div><br>
                                        <?php
                                        if($rkas_total==""){
                                        ?>  
                                        <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="red" class="btn bg-red waves-effect">KIRIM PENGESAHAN DANA PAGU BOS PER 1 TAHUN</button>
                                        </div>
                                        <?php
                                        } else if ($rkas_total==1) {
                                        ?>
                                        <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="red" class="btn bg-red waves-effect">KIRIM PENGESAHAN DANA PAGU BOS PER 1 TAHUN</button>
                                        </div>
                                        <?php
                                        } else if ($rkas_total==2) {
                                        ?>
                                        <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="red" class="btn bg-red waves-effect">KIRIM PENGESAHAN DANA PAGU BOS PER 1 TAHUN</button>
                                        </div>
                                        <?php
                                        } else if ($rkas_total==3) {
                                        ?>
                                        <a href="../../modules/act_simpan_penggunaan.php?act=pengesahan_dana_bos&id_bos=<?php echo $rkas['id_bos'] ?>" onclick="javascript: return confirm('Anda yakin Pengesahan ini ?')">
                                        <button type="button" class="btn bg-green waves-effect m-r-20">KIRIM PENGESAHAN DANA PAGU BOS PER 1 TAHUN</button></a>
                                        <?php
                                        }else{
                                        ?>
                                        <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="red" class="btn bg-red waves-effect">KIRIM PENGESAHAN DANA PAGU BOS PER 1 TAHUN</button>
                                        </div>
                                        <?php
                                        }
                                        ?>

                                <br></br>
                            <div class="alert bg-pink">
                                <h4>PAGU ANGGARAN DALAM 1 TAHUN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas[dana]", 0, ",", ".")?><br></br>
                                PAGU BELANJA PEGAWAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas[belanja_pegawai]", 0, ",", ".")?><br></br>
                                PAGU BELANJA BARANG DAN JASA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas[belanja_barang]", 0, ",", ".")?><br></br>
                                PAGU BELANJA MODAL PERALATAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas[belanja_modal_alat]", 0, ",", ".")?><br></br>
                                PAGU BELANJA MODAL ASET &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas[belanja_modal_aset]", 0, ",", ".")?></h4>
                            </div>
                                        

                                        <?php
                                        if($rkas['status']=="1"){
                                        ?>  
                                        <a href="#">
                                        <button type="button" class="btn bg-red waves-effect m-r-20">NON-AKTIF</button></a>
                                        <?php
                                        } else if ($rkas['status']=="0") {
                                        ?>
                                        
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#editbosModal">EDIT DANA BOS 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['status']=="2") {
                                        ?>
                                        
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#editbosModal">EDIT DANA BOS 1 TAHUN</button>
                                        <?php
                                        } else {
                                        ?>
                                        
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#bosModal">BUAT DANA BOS 1 TAHUN</button>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        if($rkas['status']=="1"){
                                        ?>  
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">EDIT BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['progres_belanja']=="0") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisieditbelanjabosModal">BUAT BELANJA BOS 1 TAHUN</button>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">BUAT BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['progres_belanja']=="1") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisieditbelanjabosModal">EDIT BELANJA BOS 1 TAHUN</button>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">EDIT BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['progres_snp']=="") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisieditbelanjabosModal">BUAT BELANJA BOS 1 TAHUN</button>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">BUAT BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['progres_snp']=="1") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">EDIT BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else if ($rkas['status']=="2") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisieditbelanjabosModal">REVISI BELANJA BOS 1 TAHUN</button>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjasnpbosModal">REVISI BELANJA SNP 1 TAHUN</button>
                                        <?php
                                        } else {
                                        ?>
                                        <button type="button" class="btn bg-red waves-effect m-r-20">NON-AKTIF</button></a>
                                        <!---button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#belanjabosModal">BUAT BELANJA BOS 1 TAHUN</button>-->
                                        <?php
                                        }
                                        ?>


                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Pagu Triwulan</th>
                                            <th>Sisa Dana BOS Lalu</th>
                                            <th>Total</th>
                                            <th>Pengembangan Kompetensi Lulusan</th>
                                            <th>Pengembangan standar isi</th>
                                            <th>Pengembangan standar proses</th>
                                            <th>Pengembangan pendidik dan tenaga Kependidikan</th>
                                            <th>Pengembangan sarana dan prasarana</th>
                                            <th>Pengembangan standar pengelolaan</th>
                                            <th>Pengembangan standar pembiayaan</th>
                                            <th>Pengembangan dan implementasi sistem penilaian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);
		
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                        <tr>
                                        <td><?php echo number_format((double)"$rs[dana_bos]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[sisa_lalu]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[dana]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_1]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_2]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_3]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_4]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_5]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_6]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_7]", 0, ",", ".")?></td>
                                        <td><?php echo number_format((double)"$rs[snp_8]", 0, ",", ".")?></td>
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

             <!-- Large Size -->
             <div class="modal fade" id="bosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">DANA BOS 1 TAHUN</h4>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1' ");
                                $rs=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=tambah_dana_bos" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rs[id_tapel]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="dana_bos" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  placeholder="Pagu Anggaran Dalam 1 Tahun" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                <label>Dana Sisa Lalu</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="sisa_lalu" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->

            <!-- Large Size -->
            <div class="modal fade" id="editbosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">EDIT DANA BOS 1 TAHUN</h4>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=edit_tambah_dana_bos" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rsbos[id_tapel]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="dana_bos" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[dana_bos]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="sisa_lalu" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[sisa_lalu]"?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->

            <!-- Large Size -->
            <div class="modal fade" id="editbelanjabosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">PAGU BELANJA ANGGARAN BOS 1 TAHUN</h4>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1' ");
                                $rs=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=tambah_belanja_bos_tahun" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rsbos[id_tapel]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Belanja Pegawai</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_pegawai" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Barang dan Jasa (Barang dan Jasa BOS)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_barang" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Peralatan dan Mesin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_alat" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Aset Tetap Lainnya</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_aset" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->

            <!-- Large Size -->
            <div class="modal fade" id="revisieditbelanjabosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">REVISI PAGU BELANJA ANGGARAN BOS 1 TAHUN</h4>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1' ");
                                $rs=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=tambah_belanja_bos_tahun" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rsbos[id_tapel]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Belanja Pegawai</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_pegawai" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[belanja_pegawai]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Barang dan Jasa (Barang dan Jasa BOS)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_barang" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[belanja_barang]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Peralatan dan Mesin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_alat" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[belanja_modal_alat]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Aset Tetap Lainnya</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_aset" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[belanja_modal_aset]"?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->


            <!-- Large Size -->
            <div class="modal fade" id="belanjasnpbosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">DANA BELANJA ANGGARAN</h4>
                            <div class="alert bg-red">
                            <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="dana_bos_digunakan"></label>
                            </div>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1' ");
                                $rs=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=ajuan_snp_1_tahun" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rsbos[id_tapel]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>Pengembangan Kompetensi Lulusan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_1" id="snp_1" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar isi</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_2" id="snp_2" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar proses</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_3" id="snp_3" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan pendidik dan tenaga Kependidikan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_4" id="snp_4" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan sarana dan prasarana</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_5" id="snp_5" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar pengelolaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_6" id="snp_6" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar pembiayaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_7" id="snp_7" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan dan implementasi sistem penilaian</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_8" id="snp_8" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-header">
                                <h4 class="modal-title" id="largeModalLabel">DANA BELANJA ANGGARAN</h4>
                                    <div class="alert bg-red">
                                <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="dana_bos_digunakan_2"></label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->

            <!-- Large Size -->
            <div class="modal fade" id="revisibelanjasnpbosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">REVISI DANA BELANJA ANGGARAN</h4>
                            
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1' ");
                                $rs=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=ajuan_snp_1_tahun" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$rsbos[id_tapel]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label>Pengembangan Kompetensi Lulusan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_1" id="snp_1" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_1]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar isi</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_2" id="snp_2" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_2]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar proses</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_3" id="snp_3" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_3]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan pendidik dan tenaga Kependidikan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_4" id="snp_4" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_4]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan sarana dan prasarana</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_5" id="snp_5" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_5]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar pengelolaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_6" id="snp_6" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_6]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan standar pembiayaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_7" id="snp_7" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_7]"?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan dan implementasi sistem penilaian</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_8" id="snp_8" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rsbos[snp_8]"?>" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect">SIMPAN</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
            <!-- Large Size -->

            <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">INFORMASI.....!!!</h4>
                        </div>
                        <div class="modal-body">
                            <h2 class="text-center">Mohon Maaf....!!</h2><br>
                            <center><img src="../../images/user.png" width="185" height="275"/></center><br>
                            <p class="text-center">Tombol Kirim akan Aktif Jika Sudah Membuat Dana Diterima selama 1 Tahun,<br>Belanja 4 Modal selama 1 tahun, Belanja Berdasarkan 8 SNP</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                        </div>
                    </div>
                </div>
            </div>
            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript"  src="rupiah.js"></script>

    <script>
    function sum_belanja_bos() {
      var snp_1         = document.getElementById('snp_1').value;
      var snp_2         = document.getElementById('snp_2').value;
      var snp_3         = document.getElementById('snp_3').value;
      var snp_4         = document.getElementById('snp_4').value;
      var snp_5         = document.getElementById('snp_5').value;
      var snp_6         = document.getElementById('snp_6').value;
      var snp_7         = document.getElementById('snp_7').value;
      var snp_8         = document.getElementById('snp_8').value;
      var pemda_bos           = <?php echo "$rkas[dana]";?>;
      var result = parseInt(pemda_bos) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8);
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan_2').value = result;
      }
    }
    </script>

    <script>
    function sum_belanja_bos2() {
      var snp_1         = document.getElementById('snp_1').value;
      var snp_2         = document.getElementById('snp_2').value;
      var snp_3         = document.getElementById('snp_3').value;
      var snp_4         = document.getElementById('snp_4').value;
      var snp_5         = document.getElementById('snp_5').value;
      var snp_6         = document.getElementById('snp_6').value;
      var snp_7         = document.getElementById('snp_7').value;
      var snp_8         = document.getElementById('snp_8').value;
      var pemda_bos           = <?php echo "$rkas[dana]";?>;
      var result = parseInt(pemda_bos) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8);
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan').value = result;
      }
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
    <script src="../../js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

</body>

</html>
<?php }}}?>