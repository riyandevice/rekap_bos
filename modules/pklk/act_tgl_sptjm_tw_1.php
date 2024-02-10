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
    <section>
    <?php
if($_GET['act']=='edit_data'){
	?>
                        <?php                            
                            	$sql=mysql_query("select * from user_sekolah where idu='$_GET[idu]'");
                                $user=mysql_fetch_array($sql);
                            ?>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div>
                    <img src="../../images/user.png" width="48" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo"$user[nama]";?></div>
                    <div class="email"><?php echo"$user[nip]";?></div>
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
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
	                        <?php                            
                            	$sql=mysql_query("select * from tb_sptjm where id_sp='$_GET[id_sp]' and idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
                                $rs=mysql_fetch_array($sql);

                                $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
                                $rs_wulan_1=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
                                $rs_wulan_2=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
                                $rs_wulan_3=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
                                $rs_wulan_4=mysql_fetch_array($sqlw);

                                $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='1'");
                                $rs_reali_1=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='2'");
                                $rs_reali_2=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='3'");
                                $rs_reali_3=mysql_fetch_array($sqlw);
                                $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$rs[id_tapel]' and id_semester='4'");
                                $rs_reali_4=mysql_fetch_array($sqlw);
                            ?>
                        <div class="header">
                            <h2>
                               INPUT TANGGAL SPTJM
                            </h2>
                            
                        </div>

                        <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h3>SISA DANA BOS TRIWULAN : Rp. <?php echo number_format((double)"$rs_reali_1[dana_bos_digunakan]", 0, ",", ".")?></h3>
                            </div>

                        <div class="body">
                                    <form method="post" role="form" action="../../modules/act_simpan_penggunaan_pklk.php?act=tgl_sptjm_akhir">
                                    <input type="hidden" name="id_sp" value="<?php echo $_GET["id_sp"] ?>"/>
                                    <input type="hidden" name="id_semester" value="<?php echo $rs_wulan_1["id_semester"] ?>"/>
                                    <input type="hidden" name="id_tapel" value="<?php echo $rs_wulan_1["id_tapel"] ?>"/>
                                    <input type="hidden" name="idu" value="<?php echo $uidi ?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Sisa Saldo Bank</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="sisa_bank" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["sisa_bank"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Sisa Saldo Tunai</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="sisa_tunai" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["sisa_tunai"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Nomor Surat</label><br>
                                    <small>Diambil dari Nomor Surat di Masing-Masing Lembaga</small>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="no_surat" class="form-control" value="<?php echo $rs["no_surat"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                </div>
								<button type="submit" class="btn bg-purple waves-effect">SIMPAN</button>
                                <button type="button" class="btn bg-green waves-effect" onClick="print_sptjm_1()">CETAK SPTJM</button>
                            </div>
        </div>

    </section>

    <script type="text/javascript"  src="rupiah.js"></script>
    
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

    <script>
		function print_sptjm_1(){
			window.open("../../modules/cetak/cetak_sptjm_tw_1.php?idu=<?php echo $uidi?>&id_sp=<?php echo"$rs[id_sp]";?>&id_tapel=<?php echo"$rs_wulan_1[id_tapel]";?>&id_semester=<?php echo"$rs_wulan_1[id_semester]";?>","_blank");
		}
	</script>

</body>

</html>
<?php }} ?>