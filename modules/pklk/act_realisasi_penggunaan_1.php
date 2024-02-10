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

<script>
    function formatCurrency(num) {
        
        num = num.toString().replace(/\$|\,/g,'');
        if(isNaN(num))
            num = "0";
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num*100+0.50000000001);
            cents = num%100;
            num = Math.floor(num/100).toString();

        if(cents<10)
            cents = "0" + cents;
            for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
                num = num.substring(0,num.length-(4*i+3))+'.'+
                num.substring(num.length-(4*i+3));

        return (((sign)?'':'-') + 'Rp. ' + num + ',' + cents);
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
    $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_1=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_2=mysql_fetch_array($sqlw);
    
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
                    TABEL REALISASI PENGGUNAAN DANA BOS
                    <small>Dana Bantuan Operasional Sekolah (BOS)</small>
                </h2>
            </div>
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENYUSUNAN REALISASI PENGGUNAAN DANA BOS
                                Tahun Anggaran :
                                <?php 
                                $userss = $_GET['idu'];
                                $sqlj=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
                                $rsj=mysql_fetch_array($sqlj);
                                
                                echo "$rsj[tapel]";
                                ?>
                                / pada
                                <?php 
                                $sqlj=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
                                $rswkk=mysql_fetch_array($sqlj);
                                
                                echo "$rswkk[semester]";
                                ?>
                            </h2><br>
                            <div class="alert bg-cyan">
                                TOMBOL KIRIM PENGESAHAN, HANYA BERLAKU SEKALI JIKA SUDAH FIX DAN TOMBOL MENJADI NON-AKTIF  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                <small><b>Jika ada Perubahan silahkan Hubungi Operator BOS Cabang Dinas</b></small>
                            </div><br>
                                        

<?php
$sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='1'");
    $rkas_1a=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='2'");
    $rkas_2a=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='3'");
    $rkas_3a=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='4'");
    $rkas_4a=mysql_fetch_array($sqlw);

    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_new=mysql_fetch_array($sqlw);

    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_new2=mysql_fetch_array($sqlw);
    
?>
                                        
                                       <?php
                                        if($rkas_new2['progres_pagu']==""){
                                        ?>
                                        <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="red" class="btn bg-red waves-effect">BUAT ANGGARAN BELANJA TRI WULAN</button>
                                        </div>
                                        <?php
                                        } else if ($rkas_new['progres_belanja']=="") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#editbelanjabosModal">
                                            <i class="material-icons">money</i>
                                        <span>ANGGARAN BELANJA TRI WULAN</span></button>

                                        <?php
                                        } else if ($rkas_new['status']=="2") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#revisieditbelanjabosModal">
                                            <i class="material-icons">money</i>
                                        <span>REVISI ANGGARAN BELANJA TRI WULAN</span></button>
                                        
                                        <?php
                                        } else if ($rkas_new['status']=="0") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#revisieditbelanjabosModal">
                                            <i class="material-icons">money</i>
                                        <span>EDIT BELANJA TRI WULAN</span></button>
                                        <?php
                                        }else{
                                        ?>
                                        
                                        <?php
                                        }
                                        }
                                        ?><br></br>
<?php
$sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_1=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_2=mysql_fetch_array($sqlw);
    
?>
                            <div class="alert bg-green">
                                <h4>DANA BOS DITERIMA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_1[akum_bos_lalu_ini]", 0, ",", ".")?><br></br>
                                PENGGUNAAN DANA BOS &nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[total]", 0, ",", ".")?><br></br>
                                SISA DANA BOS DIGUNAKAN &nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[dana_bos_digunakan]", 0, ",", ".")?><br></br>
                                PAGU BELANJA PEGAWAI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[belanja_pegawai]", 0, ",", ".")?><br></br>
                                PAGU BELANJA BARANG DAN JASA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[belanja_barang]", 0, ",", ".")?><br></br>
                                PAGU BELANJA MODAL PERALATAN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[belanja_modal_alat]", 0, ",", ".")?><br></br>
                                PAGU BELANJA MODAL ASET &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[belanja_modal_aset]", 0, ",", ".")?></h4>
                            </div>
                                        
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Belanja Pegawai</th>
                                            <th>Belanja Barang Jasa</th>
                                            <th>Belanja Modal Alat</th>
                                            <th>Belanja Modal Aset</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi'");
        $rsbos=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_semester where id_semester='$rs[id_semester]'");
        $rssemester=mysql_fetch_array($sqlw);
		
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                        <tr>
                                        <td>Rp. <?php echo number_format("$rs[belanja_pegawai]", 0, ",", ".")?></td>
                                        <td>Rp. <?php echo number_format("$rs[belanja_barang]", 0, ",", ".")?></td>
                                        <td>Rp. <?php echo number_format("$rs[belanja_modal_alat]", 0, ",", ".")?></td>
                                        <td>Rp. <?php echo number_format("$rs[belanja_modal_aset]", 0, ",", ".")?></td>
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
             <div class="modal fade" id="editbelanjabosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' ");
                                $rkas_12=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan_pklk.php?act=ajuan_belanja" method="post" enctype="multipart/form-data">
                        <div class="alert bg-pink alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <label>Rp. <input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text" class="form-control" id="dana_bos_digunakan2"></label>
                        </div>
                        
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                        <input type="hidden" name="dana_bos_digunakan" id="dana_bos_digunakan"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Belanja Pegawai (Honorarium Guru Tidak Tetap)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_pegawai" id="belanja_pegawai" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); document.getElementById('format').innerHTML = formatCurrency(this.value);" id="num" onkeypress="return hanyaAngka(event)"  value="0" />
                                            <span id="format"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Barang dan Jasa (Barang dan Jasa BOS)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_barang" id="belanja_barang" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); document.getElementById('format2').innerHTML = formatCurrency(this.value);" id="num" onkeypress="return hanyaAngka(event)"  value="0" />
                                            <span id="format2"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Peralatan dan Mesin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_alat" id="belanja_modal_alat" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); document.getElementById('format3').innerHTML = formatCurrency(this.value);" id="num" onkeypress="return hanyaAngka(event)"  value="0" />
                                            <span id="format3"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Aset Tetap Lainnya</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_aset" id="belanja_modal_aset" class="form-control" onkeyup="sum_belanja_bos(); sum_belanja_bos2(); document.getElementById('format4').innerHTML = formatCurrency(this.value);" id="num" onkeypress="return hanyaAngka(event)"  value="0" />
                                            <span id="format4"></span>
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
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' ");
                                $rkas_12=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan_pklk.php?act=rev_ajuan_belanja" method="post" enctype="multipart/form-data">
                        <div class="alert bg-pink alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <label>Rp. <input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text" class="form-control" id="dana_bos_digunakan_rev_2"></label>
                        </div>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                        <input type="hidden" name="dana_bos_digunakan" id="dana_bos_digunakan_rev"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Belanja Pegawai (Honorarium Guru Tidak Tetap)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_pegawai" id="belanja_pegawai2" class="form-control" onkeyup="sum_belanja_rev_bos(); sum_belanja_rev_bos2();" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rkas_12[belanja_pegawai]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Barang dan Jasa (Barang dan Jasa BOS)</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_barang" id="belanja_barang2" class="form-control" onkeyup="sum_belanja_rev_bos(); sum_belanja_rev_bos2();" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rkas_12[belanja_barang]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Peralatan dan Mesin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_alat" id="belanja_modal_alat2" class="form-control" onkeyup="sum_belanja_rev_bos(); sum_belanja_rev_bos2();" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rkas_12[belanja_modal_alat]"?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label>Belanja Modal Aset Tetap Lainnya</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="belanja_modal_aset" id="belanja_modal_aset2" class="form-control" onkeyup="sum_belanja_rev_bos(); sum_belanja_rev_bos2();" onkeypress="return hanyaAngka(event)"  value="<?php echo "$rkas_12[belanja_modal_aset]"?>" />
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
                            <p class="text-center">Tombol Buat Anggaran Belanja akan Aktif Jika Sudah Membuat Anggaran Selama 1 Triwulan Berjalan.</p>
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

    <script>
    function sum_belanja_bos() {
      var belanja_pegawai       = document.getElementById('belanja_pegawai').value;
      var belanja_barang        = document.getElementById('belanja_barang').value;
      var belanja_modal_alat    = document.getElementById('belanja_modal_alat').value;
      var belanja_modal_aset    = document.getElementById('belanja_modal_aset').value;
      var snp_1 = <?php echo "$rkas_1[akum_bos_lalu_ini]";?>;
      var result = parseInt(snp_1) - (parseInt(belanja_pegawai) + parseInt(belanja_barang) + parseInt(belanja_modal_alat) + parseInt(belanja_modal_aset));
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan').value = result;
      }
    }
    </script>

    <script>
    function sum_belanja_bos2() {
      var belanja_pegawai       = document.getElementById('belanja_pegawai').value;
      var belanja_barang        = document.getElementById('belanja_barang').value;
      var belanja_modal_alat    = document.getElementById('belanja_modal_alat').value;
      var belanja_modal_aset    = document.getElementById('belanja_modal_aset').value;
      var snp_1 = <?php echo "$rkas_1[akum_bos_lalu_ini]";?>;
      var result = parseInt(snp_1) - (parseInt(belanja_pegawai) + parseInt(belanja_barang) + parseInt(belanja_modal_alat) + parseInt(belanja_modal_aset));
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan2').value = result;
      }
    }
    </script>

<script>
    function sum_belanja_rev_bos() {
      var belanja_pegawai       = document.getElementById('belanja_pegawai2').value;
      var belanja_barang        = document.getElementById('belanja_barang2').value;
      var belanja_modal_alat    = document.getElementById('belanja_modal_alat2').value;
      var belanja_modal_aset    = document.getElementById('belanja_modal_aset2').value;
      var snp_1 = <?php echo "$rkas_1[akum_bos_lalu_ini]";?>;
      var result = parseInt(snp_1) - (parseInt(belanja_pegawai) + parseInt(belanja_barang) + parseInt(belanja_modal_alat) + parseInt(belanja_modal_aset));
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan_rev').value = result;
      }
    }
    </script>

    <script>
    function sum_belanja_rev_bos2() {
      var belanja_pegawai       = document.getElementById('belanja_pegawai2').value;
      var belanja_barang        = document.getElementById('belanja_barang2').value;
      var belanja_modal_alat    = document.getElementById('belanja_modal_alat2').value;
      var belanja_modal_aset    = document.getElementById('belanja_modal_aset2').value;
      var snp_1 = <?php echo "$rkas_1[akum_bos_lalu_ini]";?>;
      var result = parseInt(snp_1) - (parseInt(belanja_pegawai) + parseInt(belanja_barang) + parseInt(belanja_modal_alat) + parseInt(belanja_modal_aset));
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan_rev_2').value = result;
      }
    }
    </script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

</body>

</html>
<?php }}} ?>