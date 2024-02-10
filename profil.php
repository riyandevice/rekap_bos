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

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Light Gallery Plugin Css -->
    <link href="plugins/light-gallery/css/lightgallery.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profil</a></li>
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="images/user.png" width="120" height="175" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo"$usre";?></h3>
                                <p><?php echo"$jab";?></p>
                                <p><?php echo"$sekolah";?></p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <button class="btn btn-primary btn-lg waves-effect btn-block" data-toggle="modal" data-target="#biodatabosModal">BIO BENDAHARA SEKOLAH</button>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>KOP LEMBAGA</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">notes</i>
                                        Keterangan<br></br>
                                    </div>
                                    <?php
                                            $sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
                                            while($rs=mysql_fetch_array($sql))
	                                                    {
                                    ?> 
                                                <a href="modules/file_sk/<?php echo"$rs[file_data]";?>" data-sub-html="Demo Description">
                                                <img class="img-responsive thumbnail" src="modules/file_sk/<?php echo"$rs[file_data]";?>" width="180px" height="197px">
                                                </a>
                                                <?php } ?> 
                                    <div class="content">
                                        Klik Gambar untuk Memperbesar (zoom)<br></br>
                                    </div>
                                    <div class="profile-footer">
                                    <!---button class="btn btn-primary btn-lg waves-effect btn-block">GANTI SK</button>-->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Update Profiles</a></li>
                                </ul>

                                <div class="tab-content">
                                    
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                            <div class="body">
                            <form action="modules/simpan.php?act=update_profil" method="post" enctype="multipart/form-data">
                                        <?php
                                            $sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
                                            while($rs=mysql_fetch_array($sql))
	                                                    {
                                                            
                                        ?> 
                                <div class="row clearfix">
                                <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Lembaga</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="sekolah" value="<?php echo $rs['sekolah'] ?>" class="form-control" placeholder="Nama Lembaga Naungan Anda" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NPSN Lembaga</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="npsn" value="<?php echo $rs['npsn']?>" class="form-control" placeholder="NPSN Lembaga Naungan Anda" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Kepala Lembaga</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_ks" value="<?php echo $rs['nama_ks']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kepala Sekolah dengan Gelar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NIP Kepala</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nip_ks" value="<?php echo $rs['nip_ks']?>" class="form-control" placeholder="NIP Kepala Sekolah Bila PNS, Bila Tidak isi (-)">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat Lembaga</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="alamat" value="<?php echo $rs['alamat']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Alamat Lembaga">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Kelurahan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kelurahan" value="<?php echo $rs['kelurahan']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kelurahan" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Kecamatan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="kecamatan" value="<?php echo $rs['kecamatan']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kepala Sekolah dengan Gelar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Area Lembaga</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div>
                                            <select class="form-control" name="area" required>
                                            <option value="#"> --- Pilih Area Lembaga --- </option>
                                            <option value="KOTA PASURUAN"> --- Kota Pasuruan --- </option>
                                            <option value="KAB. PASURUAN"> --- Kabupaten Pasuruan --- </option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Bendahara</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama" value="<?php echo $rs['nama']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="Nama Operator Sekolah" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No HP Bendahara</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="no_hp" value="<?php echo $rs['no_hp']?>" class="form-control" onkeyup="this.value = this.value.toUpperCase()" placeholder="No. HP aktif Operator Sekolah" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No. Rekening</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="no_rekening" value="<?php echo $rs['no_rekening']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kepala Sekolah dengan Gelar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Rekening BOS</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_rekening" value="<?php echo $rs['nama_rekening']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kepala Sekolah dengan Gelar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Bank</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_bank" value="<?php echo $rs['nama_bank']?>" onkeyup="this.value = this.value.toUpperCase()" class="form-control" placeholder="Nama Kepala Sekolah dengan Gelar" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label>Upload Kop Surat Lembaga</label>
                                <input type="file" name="file" required/> 
                                <small>Format hanya Support pada File berekstensi png,jpeg,jpg</small>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" type="file" class="btn btn-primary m-t-15 waves-effect">PERBARUI</button>
                                    </div>
                                </div>
                            </form>
                            <?php } ?> 
                        </div>


                        <!-- Large Size -->
             <div class="modal fade" id="biodatabosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                    <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                        <tr>
                                            <th style="background-color: yellow;">Nama Lembaga</th>
                                            <th style="background-color: yellow;">NPSN</th>
                                            <th style="background-color: yellow;" class="text-center">Nama Bendahara</th>
                                            <th style="background-color: yellow;" class="text-center">No. HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM user_sekolah ORDER BY jenjang DESC");
while($rs=mysql_fetch_array($sql))
	{
		
$no++;
	
?>
                                        <tr>
                                            <td><b><?php echo"$rs[sekolah]";?></b></td>
                                            <td class="text-center"><?php echo"$rs[npsn]";?></td>
                                            <td><?php echo"$rs[nama]";?></td>
                                            <td class="text-center"><?php echo"$rs[no_hp]";?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            <!-- Large Size -->
                        
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
    <script src="js/pages/examples/profile.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="js/pages/medias/image-gallery.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
<?php }} ?>