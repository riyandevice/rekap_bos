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

<script>
    function formatCurrency(num2) {
        
        num2 = num2.toString().replace(/\$|\,/g,'');
        if(isNaN(num2))
            num2 = "0";
            sign = (num2 == (num2 = Math.abs(num2)));
            num2 = Math.floor(num2*100+0.50000000001);
            cents = num2%100;
            num2 = Math.floor(num2/100).toString();

        if(cents<10)
            cents = "0" + cents;
            for (var i = 0; i < Math.floor((num2.length-(1+i))/3); i++)
                num2 = num2.substring(0,num2.length-(4*i+3))+'.'+
                num2.substring(num2.length-(4*i+3));

        return (((sign)?'':'-') + 'Rp. ' + num2 + ',' + cents);
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
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_1=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_2=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
    $semester=mysql_fetch_array($sqlw);
    
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
                            </div>
                                       

                                <br></br>
                            <div class="alert bg-pink">
                                <h4>DANA BOS DITERIMA ( <?php echo"$semester[semester]";?> ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_1[dana_bos_triwulan]", 0, ",", ".")?><br></br>
                                
                                </h4>
                            </div>
<?php
$sql = mysql_query("SELECT * FROM tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='$_GET[id_semester]'");
    $realisasi=mysql_fetch_array($sqlw);
    
?>
                                        <?php
                                        if($rs['status']=="0"){
                                        ?>  
                                        <!--button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#belanjaModal">BUAT PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <?php
                                        } else if ($rkas['status']=="0") {
                                        ?>
                                        <!---button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjaModal">EDIT PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <!--button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#belanjaModal">BUAT PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <?php
                                        } else if ($rkas['status']=="1") {
                                        ?>
                                        
                                        <!--button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#editsbelanjaModal">REVISI PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <?php
                                        } else if ($rkas['ajuan']=="2") {
                                        ?>
                                        
                                        <!---button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjaModal">REVISI PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <?php
                                        } else if ($realisasi['status']=="1") {
                                        ?>
                                        
                                        <!---button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#revisibelanjaModal">REVISI PAGU ANGGARAN PER TRIWULAN</button>-->
                                        <?php
                                        } else {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#belanjaModal">BUAT PAGU ANGGARAN PER TRIWULAN</button>
                                        <!---button type="button" class="btn bg-purple waves-effect m-r-20" data-toggle="modal" data-target="#belanjabosModal">BUAT BELANJA BOS 1 TAHUN</button>-->
                                        <?php
                                        }
                                        }
                                        ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Triwulan</th>
                                            <th>Pagu Triwulan</th>
                                            <th>Sisa Dana BOS Lalu</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
        $rsbos=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
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
                                        <td><?php echo"$no";?></td>
                                        <td><?php echo"$rssemester[semester]";?></td>
                                        <td>Rp. <?php echo number_format("$rs[dana_bos_triwulan]", 0, ",", ".")?></td>
                                        <td>Rp. <?php echo number_format("$rs[dana_bos_triwulan_lalu]", 0, ",", ".")?></td>
                                        <td>Rp. <?php echo number_format("$rs[akum_bos_lalu_ini]", 0, ",", ".")?></td>
                                        <td>
                                        <?php
                                        if($rs['status']=="1"){
                                        ?>  
                                        <a href="#">
                                        <button type="button" class="btn bg-purple waves-effect m-r-20">NON-AKTIF</button></a>
                                        <?php
                                        } else if ($rs['status']=="2") {
                                        ?>
                                            <button type="button" class="btn bg-red waves-effect" data-toggle="modal" data-target="#revisibelanjaModal">
                                            <i class="material-icons">settings</i>
                                            <span>REVISI</span></button>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="../../modules/act_simpan_penggunaan_pklk.php?act=hapus_pagu_triwulan&id_rkas=<?php echo $rs['id_rkas'] ?>" onclick="javascript: return confirm('Anda yakin hapus ?')">
                                            <button type="button" class="btn bg-red waves-effect">
                                            <i class="material-icons">delete</i>
                                            <span>HAPUS</span></button></a>
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

            <!-- Large Size -->
            <div class="modal fade" id="belanjaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">PERHITUNGAN DANA BOS</h4>
                            <div class="alert bg-pink">
                            <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="replika_sisa_bos"  readonly></label>
                            </div>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1'");
                                $rstapel=mysql_fetch_array($sql);
                        ?>
                        <form action="../../modules/act_simpan_penggunaan_pklk.php?act=tambah_pagu" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="sisa_bos" id="sisa_bos" />
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="font-bold col-pink">JUMLAH DANA BOS TRIWULAN INI</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="dana_bos_triwulan" id="dana_bos_triwulan" class="form-control" onkeyup="sum_penggunaan_bos(); sum_penggunaan_bos2(); document.getElementById('format').innerHTML = formatCurrency(this.value);" id="num" onkeypress="return hanyaAngka(event)"  placeholder="Pagu Anggaran Dana BOS" />
                                            <span id="format"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                    <label>Dana Sisa Lalu</label>
                                            <div class="form-line">
                                            <input type="hidden" name="dana_bos_triwulan_lalu" class="form-control" onkeypress="return hanyaAngka(event)"  value="0" />
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
            <div class="modal fade" id="revisibelanjaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">PERHITUNGAN DANA BOS</h4>
                            <div class="alert bg-pink">
                            <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="replika_sisa_bos_2a"  readonly></label>
                            </div>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1'");
                                $rstapel=mysql_fetch_array($sql);
                        ?>
                        <form action="../../modules/simpan.php?act=edit_tambah_pagu" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="sisa_bos" id="sisa_bos" />
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="font-bold col-pink">REVISI JUMLAH DANA BOS TRIWULAN INI</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="dana_bos_triwulan" id="dana_bos_triwulan_2aa" class="form-control" onkeyup="sum_penggunaan_bos(); sum_penggunaan_bos2aaa(); document.getElementById('format2').innerHTML = formatCurrency(this.value);" id="num2" onkeypress="return hanyaAngka(event)"  placeholder="Pagu Anggaran Dana BOS" />
                                            <span id="format2"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                    <label>Dana Sisa Lalu</label>
                                            <div class="form-line">
                                            <input type="hidden" name="dana_bos_triwulan_lalu" class="form-control" onkeypress="return hanyaAngka(event)"  value="0" />
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
            <div class="modal fade" id="editsbelanjaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">DANA BOS ANDA YANG TELAH DISUSUNS</h4>
                            <div class="alert bg-pink">
                            <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="replika_sisa_bos_2"  ></label>
                            </div>
                        </div>
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_tapel where status='1'");
                                $rstapel=mysql_fetch_array($sql);
                        ?>
                        <form action="../../modules/act_simpan_penggunaan_pklk.php?act=tambah_pagu" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_bos" value="<?php echo "$rsbos[id_bos]"?>"/>
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="sisa_bos" id="sisa_bos_2" />
                        <input type="hidden" name="id_tapel" value="<?php echo "$rstapel[id_tapel]"?>"/>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <label class="font-bold col-pink">JUMLAH DANA BOS TRIWULAN INI</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="dana_bos_triwulan" id="dana_bos_triwulan2" class="form-control" onkeyup="sum_penggunaan_bos_sisa(); sum_penggunaan_bos_sisa2();" onkeypress="return hanyaAngka(event)"  placeholder="Pagu Anggaran Dana BOS" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <div class="form-group form-group-lg">
                                    <label>PILIH TRIWULAN PENETAPAN</label>
                                    <select class="form-control" name="id_semester">
                                    <option value="1"> --- TRIWULAN 1 (SATU) --- </option>
                                    <option value="2"> --- TRIWULAN 2 (DUA) --- </option>
                                    <option value="3"> --- TRIWULAN 3 (TIGA) --- </option>
                                    <option value="4"> --- TRIWULAN 4 (EMPAT) --- </option>
                                    </select>
                                </div>
                                </div><br>
                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="hidden" name="dana_bos_triwulan_lalu" class="form-control" onkeypress="return hanyaAngka(event)"  value="0" />
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

    <?php
    $sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
    while($rs=mysql_fetch_array($sql)){
        $akalan = "$_GET[id_semester]";
        $hitung = ($akalan - 1);
        $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
        $rkas=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
        $rkas_1=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
        $reali=mysql_fetch_array($sqlw);
        
    ?>
    <script>
    function sum_penggunaan_bos() {
        var pagu = document.getElementById('dana_bos_triwulan').value;
      var snp_1 = <?php echo "$rkas[dana]";?>;
      var result = parseInt(snp_1) - parseInt(pagu);
      if (!isNaN(result)) {
         document.getElementById('sisa_bos').value = result;
      }
    }
    </script>

<script>
    function sum_penggunaan_bos2() {
        var pagu = document.getElementById('dana_bos_triwulan').value;
      var snp_1 = <?php echo "$rkas[dana]";?>;
      var result = parseInt(snp_1) - parseInt(pagu);
      if (!isNaN(result)) {
         document.getElementById('replika_sisa_bos').value = result;
      }
    }
    </script>

<script>
    function sum_penggunaan_bos2aaa() {
        var pagu = document.getElementById('dana_bos_triwulan_2aa').value;
      var snp_1 = <?php echo "$rkas[dana]";?>;
      var result = parseInt(snp_1) - parseInt(pagu);
      if (!isNaN(result)) {
         document.getElementById('replika_sisa_bos_2a').value = result;
      }
    }
    </script>

<script>
    function sum_penggunaan_bos_sisa() {
      var pagu = document.getElementById('dana_bos_triwulan2').value;
      var snp_1 = <?php echo "$reali[sisa_bos_digunakan]";?>;
      var result = parseInt(snp_1) - parseInt(pagu);
      if (!isNaN(result)) {
         document.getElementById('sisa_bos_2').value = result;
      }
    }
    </script>

<script>
    function sum_penggunaan_bos_sisa2() {
    var pagu = document.getElementById('dana_bos_triwulan2').value;
      var snp_1 = <?php echo "$reali[sisa_bos_digunakan]";?>;
      var result = parseInt(snp_1) - parseInt(pagu);
      if (!isNaN(result)) {
         document.getElementById('replika_sisa_bos_2').value = result;
      }
    }
    </script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

</body>

</html>
<?php }}}} ?>