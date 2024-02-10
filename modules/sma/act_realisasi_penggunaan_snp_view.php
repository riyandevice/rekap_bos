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
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
	<?php
if($_GET['act']=='edit_data'){
	?>
	                        <?php                            
                            	$sql=mysql_query("select * from tb_realisasi_snp where id_g='$_GET[id_g]'");
                                $rs=mysql_fetch_array($sql);
                                $sql=mysql_query("select * from tb_ref_snp where id_snp='$rs[id_snp]'");
								$ref_snp=mysql_fetch_array($sql);
                            ?>
                        <div class="header">
                            <h2>
                                EDIT DATA SNP ( <?php echo "$ref_snp[item]"?> )
                            </h2>
                            
                        </div>
                        <div class="body">
                                    <form method="post" role="form" action="../../modules/act_simpan_penggunaan_sma.php?act=revisi_ajuan_snp">
                                    <input type="hidden" name="id_g" value="<?php echo $_GET["id_g"] ?>"/>
                                    <input type="hidden" name="id_semester" value="<?php echo $rs["id_semester"] ?>"/>
                                    <input type="hidden" name="id_tapel" value="<?php echo $rs["id_tapel"] ?>"/>
                                    <input type="hidden" name="idu" value="<?php echo $uidi ?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <label>Pengembangan Perpustakaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_1" id="snp_1" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_1"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penerimaan Peserta Didik Baru</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_2" id="snp_2" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_2"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Pembelajaran dan Ekstrakurikuler</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_3" id="snp_3" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_3"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Evaluasi Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_4" id="snp_4" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_4"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengelolaan Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_5" id="snp_5" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_5"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan Profesi GTK, serta Pengembangan Manajemen Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_6" id="snp_6" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_6"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Langganan Daya dan Jasa</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_7" id="snp_7" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_7"] ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pemeliharaan dan Perawatan Sarana dan Prasarana Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_8" id="snp_8" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_8"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembayaran Honor</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_9" id="snp_9" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_9"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembelian Alat Multi Media Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_10" id="snp_10" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_10"] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                            <input type="hidden" name="snp_11" id="snp_11" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_11"] ?>" />
                                        </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                            <input type="hidden" name="snp_12" id="snp_12" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="<?php echo $rs["snp_12"] ?>" />
                                        </div>
                                </div>

                                </div>
								<button type="submit" class="btn bg-purple waves-effect">SIMPAN</button>
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

</body>

</html>
<?php }} ?>