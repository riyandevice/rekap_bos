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
// Turn off all error reporting
error_reporting(0);

$sql = mysql_query("SELECT * FROM user_sekolah where idu='$uidi'");
while($rs=mysql_fetch_array($sql)){
    $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_rkas where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_1=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_2=mysql_fetch_array($sqlw);
    $sqlw=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $rkas_3=mysql_fetch_array($sqlw);
    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
                                while ($rskk=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
                                $jumlah_s[] = $rskk['total'];
                                }
                                //Total
                                $jumlah_snp = array_sum($jumlah_s);
    
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
                    TABEL REALISASI PENGGUNAAN DANA BOS 8 (DELAPAN) SNP
                    <small>Dana Bantuan Operasional Sekolah (BOS)</small>
                </h2>
            </div>
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENYUSUNAN PENGGUNAAN DANA BOS 8 (DELAPAN) SNP
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
                            <div class="alert bg-red">
                                TOMBOL KIRIM PENGESAHAN, HANYA BERLAKU SEKALI JIKA SUDAH FIX DAN TOMBOL MENJADI NON-AKTIF  <img align="right" style=”float:right;” src="../../images/logo-bos.png" width="135" height="75"/><br>
                                <small><b>Jika ada Perubahan silahkan Hubungi Operator BOS Cabang Dinas</b></small>
                            </div><br>
                                        <?php
                                        if($rkas_2['progres_belanja']=="1"){
                                        ?>  
                                        <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#editbelanjabosModal">
                                            <i class="material-icons">money</i>
                                        <span>BUAT ANGGARAN BELANJA SNP</span></button>
                                        <?php
                                        } else if ($rkas_2['progres_belanja']=="") {
                                        ?>
                                         <div class="button-demo js-modal-buttons">
                                        <button type="button" data-color="purple" class="btn bg-purple waves-effect">BUAT ANGGARAN BELANJA SNP</button>
                                        </div>
                                        <?php
                                        } else if ($rkas_3['status']=="0") {
                                        ?>
                                        <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#editsbelanjabosModal">
                                            <i class="material-icons">money</i>
                                        <span>LANJUT ANGGARAN BELANJA SNP</span></button>
                                            <?php
                                        } else if ($rkas_3['status']=="2") {
                                        ?>
                                            
                                            <button type="button" class="btn bg-purple waves-effect" data-toggle="modal" data-target="#editsbelanjabosModal">
                                            <i class="material-icons">money</i>
                                            <span>LANJUT ANGGARAN BELANJA SNP</span></button>
                                        <?php
                                        }else{
                                        ?>
                                        
                                        <?php
                                        }
                                        ?>
                                        <br></br>
                            <div class="alert bg-purple">
                                <h4>DANA BOS DITERIMA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_1[akum_bos_lalu_ini]", 0, ",", ".")?><br></br>
                                DANA ANGGARAN BELANJA 4 MODAL&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$rkas_2[total]", 0, ",", ".")?><br></br>
                                DANA ANGGARAN BELANJA 8 SNP &nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Rp. <?php echo number_format((double)"$jumlah_snp", 0, ",", ".")?><br></br>
                                
                                
                                </h4>
                            </div>
                                        
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>SNP</th>
                                            <th>Pengembangan Perpustakaan</th>
                                            <th>Penerimaan Peserta Didik Baru</th>
                                            <th>Kegiatan Pembelajaran & Ekstrakurikuler</th>
                                            <th>Kegiatan Evaluasi Pembelajaran</th>
                                            <th>Pengelolaan Sekolah</th>
                                            <th>Pengembangan Profesi GTK, serta Pengembangan Manajemen Sekolah</th>
                                            <th>Langganan Daya dan Jasa</th>
                                            <th>Pemeliharaan dan Perawatan Sarana dan Prasarana Sekolah</th>
                                            <th>Pembayaran Honor</th>
                                            <th>Pembelian Alat Multi Media Pembelajaran</th>
                                            <th>Penyelenggaraan Kegiatan Uji Kompetensi dan Sertifikasi Kejuruan</th>
                                            <th>Penyelenggaraan Bursa Kerja Khusus (BKK) SMK dan/atau Praktek Kerja Industri (Prakerin)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$no=0;
$sql = mysql_query("SELECT * FROM tb_realisasi_snp where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
while($rs=mysql_fetch_array($sql))
	{
		$sqlw=mysql_query("select * from user_sekolah where idu='$uidi'");
        $rsw=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_dana_bos where idu='$uidi'");
        $rsbos=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_semester where id_semester='$rs[id_semester]'");
        $rssemester=mysql_fetch_array($sqlw);
        $sqlw=mysql_query("select * from tb_ref_snp where id_snp='$rs[id_snp]'");
        $rs_snp=mysql_fetch_array($sqlw);
		
$no++;
if($_SESSION['level']==""){

if($rsb['id']==$_SESSION['id']){
	
?>                             
<?php
}
}else{
?>
                                        <tr>
                                        <td>
                                        <?php
                                        if($rs['status']=="1"){
                                        ?>  
                                        <button type="button" class="btn bg-purple waves-effect m-r-20">NON-AKTIF</button>
                                        <?php
                                        }else{
                                        ?>
                                        <a href="../../modules/smk/act_realisasi_penggunaan_snp_view.php?act=edit_data&id_g=<?php echo $rs['id_g'] ?>">
                                            <button type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                            <i class="material-icons">search</i></a>
                                        <?php
                                        }
                                        ?>
                                        <td>
                                        <?php echo $rs_snp['item'] ?>
                                        </td>
                                        </td>
                                        <td><?php echo number_format("$rs[snp_1]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_2]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_3]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_4]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_5]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_6]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_7]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_8]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_9]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_10]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_11]", 0, ",", ".")?></td>
                                        <td><?php echo number_format("$rs[snp_12]", 0, ",", ".")?></td>
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
                                $sql=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' ");
                                $rkas_12=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=ajuan_snp" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                    <label>PILIH SNP YANG AKAN DIANGGARKAN</label>
                                    <select class="form-control" name="id_snp">
                                        <?php 
                                            $sql=mysql_query("select * from tb_ref_snp group by id_snp ASC");
                                            while($rst=mysql_fetch_array($sql)){
                                            echo "<option value='$rst[id_snp]'>$rst[id_snp].) $rst[item]</option>";        
                                            }
                                        ?>
                                    </select>
                                    </div>
                            </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan Perpustakaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_1" id="snp_1" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penerimaan Peserta Didik Baru</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_2" id="snp_2" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Pembelajaran dan Ekstrakurikuler</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_3" id="snp_3" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Evaluasi Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_4" id="snp_4" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengelolaan Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_5" id="snp_5" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan Profesi GTK, serta Pengembangan Manajemen Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_6" id="snp_6" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Langganan Daya dan Jasa</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_7" id="snp_7" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pemeliharaan dan Perawatan Sarana dan Prasarana Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_8" id="snp_8" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembayaran Honor</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_9" id="snp_9" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembelian Alat Multi Media Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_10" id="snp_10" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penyelenggaraan Kegiatan Uji Kompetensi dan Sertifikasi Kejuruan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_11" id="snp_11" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penyelenggaraan BKK SMK dan/atau Prakerin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_12" id="snp_12" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
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
            <div class="modal fade" id="editsbelanjabosModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-body">
                        <?php 
	                        $sql=mysql_query("select * from tb_dana_bos where idu='$uidi'");
                            $rsbos=mysql_fetch_array($sql);{
                                $sql=mysql_query("select * from tb_realisasi_snp where idu='$uidi' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]' ");
                                $rkas_12=mysql_fetch_array($sql);		
                        ?>
                        <form action="../../modules/act_simpan_penggunaan.php?act=ajuan_snp" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idu" value="<?php echo "$uidi"?>"/>
                        <input type="hidden" name="id_tapel" value="<?php echo "$_GET[id_tapel]"?>"/>
                        <input type="hidden" name="id_semester" value="<?php echo "$_GET[id_semester]"?>"/>
                            <div class="row clearfix">
                            <div class="col-sm-12">
                                    <div class="form-group form-group-lg">
                                    <label>PILIH SNP YANG AKAN DIANGGARKAN</label>
                                    <select class="form-control" name="id_snp">
                                        <?php 
                                            $sql=mysql_query("select * from tb_ref_snp group by id_snp desc");
                                            while($rst=mysql_fetch_array($sql)){
                                            echo "<option value='$rst[id_snp]'>$rst[item]</option>";        
                                            }
                                        ?>
                                    </select>
                                    </div>
                            </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan Perpustakaan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_1" id="snp_1a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penerimaan Peserta Didik Baru</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_2" id="snp_2a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Pembelajaran dan Ekstrakurikuler</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_3" id="snp_3a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Kegiatan Evaluasi Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_4" id="snp_4a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengelolaan Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_5" id="snp_5a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pengembangan Profesi GTK, serta Pengembangan Manajemen Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_6" id="snp_6a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Langganan Daya dan Jasa</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_7" id="snp_7a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pemeliharaan dan Perawatan Sarana dan Prasarana Sekolah</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_8" id="snp_8a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembayaran Honor</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_9" id="snp_9a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Pembelian Alat Multi Media Pembelajaran</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_10" id="snp_10a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penyelenggaraan Kegiatan Uji Kompetensi dan Sertifikasi Kejuruan</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_11" id="snp_11a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <label>Penyelenggaraan BKK SMK dan/atau Prakerin</label>
                                    <div class="form-group form-group-lg">
                                        <div class="form-line">
                                            <input type="text" name="snp_12" id="snp_12a" class="form-control" onkeyup="convertToRupiah(this);" onkeypress="return hanyaAngka(event)"  value="0" />
                                        </div>
                                    </div>
                                </div>

                                <!---div class="modal-header">
                                <h4 class="modal-title" id="largeModalLabel">DANA BELANJA ANGGARAN</h4>
                                    <div class="alert bg-red">
                                <label>Rp. &nbsp;&nbsp;&nbsp;&nbsp;<input style="color: black; font-family: Verdana,Arial,Helvetica,Georgia; font-size: 17px;" type="text"  id="dana_bos_digunakan_2a"></label>
                                    </div>
                                </div>-->

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
                            <p class="text-center">Tombol Buat Anggaran Belanja SNP akan Aktif Jika Sudah Membuat Anggaran 4 Belanja Modal Selama 1 Triwulan Berjalan.</p>
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

    <?php
        // Turn off all error reporting
    error_reporting(0);

    // Report all errors except E_NOTICE
    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
                                while ($r=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
                                $jumlah[] = $r['total'];
                                }
                                //Total
                                $jumlahnya = array_sum($jumlah);
    ?>

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
      var snp_1         = document.getElementById('snp_1').value;
      var snp_2         = document.getElementById('snp_2').value;
      var snp_3         = document.getElementById('snp_3').value;
      var snp_4         = document.getElementById('snp_4').value;
      var snp_5         = document.getElementById('snp_5').value;
      var snp_6         = document.getElementById('snp_6').value;
      var snp_7         = document.getElementById('snp_7').value;
      var snp_8         = document.getElementById('snp_8').value;
      var snp_9         = document.getElementById('snp_9').value;
      var snp_10        = document.getElementById('snp_10').value;
      var snp_11        = document.getElementById('snp_11').value;
      var snp_12        = document.getElementById('snp_12').value;
      var pemda_bos           = <?php echo "$rkas_2[total]";?>;
      var result = parseInt(pemda_bos) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8) - parseInt(snp_9) - parseInt(snp_10) - parseInt(snp_11) - parseInt(snp_12);
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
      var snp_9         = document.getElementById('snp_9').value;
      var snp_10        = document.getElementById('snp_10').value;
      var snp_11        = document.getElementById('snp_11').value;
      var snp_12        = document.getElementById('snp_12').value;
      var pemda_bos           = <?php echo "$rkas_2[total]";?>;
      var result = parseInt(pemda_bos) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8) - parseInt(snp_9) - parseInt(snp_10) - parseInt(snp_11) - parseInt(snp_12);
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan').value = result;
      }
    }
    </script>

<script>
    function sum_belanja_bos_a() {
      var snp_1         = document.getElementById('snp_1a').value;
      var snp_2         = document.getElementById('snp_2a').value;
      var snp_3         = document.getElementById('snp_3a').value;
      var snp_4         = document.getElementById('snp_4a').value;
      var snp_5         = document.getElementById('snp_5a').value;
      var snp_6         = document.getElementById('snp_6a').value;
      var snp_7         = document.getElementById('snp_7a').value;
      var snp_8         = document.getElementById('snp_8a').value;
      var snp_9         = document.getElementById('snp_9a').value;
      var snp_10        = document.getElementById('snp_10a').value;
      var snp_11        = document.getElementById('snp_11a').value;
      var snp_12        = document.getElementById('snp_12a').value;
      var pemda_bos           = <?php echo "$rkas_2[total]";?>;
      var total_snp           = <?php echo "$jumlahnya";?>;
      var result = parseInt(pemda_bos) - parseInt(total_snp) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8) - parseInt(snp_9) - parseInt(snp_10) - parseInt(snp_11) - parseInt(snp_12);
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan_2a').value = result;
      }
    }
    </script>

    <script>
    function sum_belanja_bos2a() {
      var snp_1         = document.getElementById('snp_1a').value;
      var snp_2         = document.getElementById('snp_2a').value;
      var snp_3         = document.getElementById('snp_3a').value;
      var snp_4         = document.getElementById('snp_4a').value;
      var snp_5         = document.getElementById('snp_5a').value;
      var snp_6         = document.getElementById('snp_6a').value;
      var snp_7         = document.getElementById('snp_7a').value;
      var snp_8         = document.getElementById('snp_8a').value;
      var snp_9         = document.getElementById('snp_9a').value;
      var snp_10        = document.getElementById('snp_10a').value;
      var snp_11        = document.getElementById('snp_11a').value;
      var snp_12        = document.getElementById('snp_12a').value;
      var pemda_bos           = <?php echo "$rkas_2[total]";?>;
      var total_snp           = <?php echo "$jumlahnya";?>;
      var result = parseInt(pemda_bos) - parseInt(total_snp) - parseInt(snp_1) - parseInt(snp_2) - parseInt(snp_3) - parseInt(snp_4) - parseInt(snp_5) - parseInt(snp_6) - parseInt(snp_7) - parseInt(snp_8) - parseInt(snp_9) - parseInt(snp_10) - parseInt(snp_11) - parseInt(snp_12);
      if (!isNaN(result)) {
         document.getElementById('dana_bos_digunakan_a').value = result;
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
<?php }} ?>