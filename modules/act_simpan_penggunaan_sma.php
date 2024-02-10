<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="alert/css/sweetalert.css">
</head>
<body>

<!--------------------- sma ---------------------------------------->

<?php

include "../config/conn.php";

if($_GET['act']=="tambah_dana_bos"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["sisa_lalu"];
    $belanja_2 = $_POST["dana_bos"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $total = ($belanja_1a + $belanja_2a);

    mysql_query("INSERT INTO tb_dana_bos(idu,id_tapel,sisa_lalu,dana,dana_bos,belanja_pegawai,belanja_barang,belanja_modal_alat,belanja_modal_aset,snp_1,snp_2,snp_3,snp_4,snp_5,snp_6,snp_7,snp_8,status,tgl_input,progres_bos,progres_belanja) 
    VALUES
    ('$_POST[idu]','$_POST[id_tapel]','$belanja_1a','$total','$belanja_2a','0','0','0','0','0','0','0','0','0','0','0','0','0','$tgl','1','0')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana BOS Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="edit_tambah_dana_bos"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["sisa_lalu"];
    $belanja_2 = $_POST["dana_bos"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $total = ($belanja_1a + $belanja_2a);

    mysql_query("UPDATE tb_dana_bos set 
    sisa_lalu       ='$belanja_1',
    dana            ='$total',
    dana_bos        ='$belanja_2a' where id_bos='$_POST[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana BOS Berhasil Diedit',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="tambah_belanja_bos_tahun"){
    $tgl = date("Y-m-d");

    $sql=mysql_query("select * from tb_dana_bos where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
    $rs=mysql_fetch_array($sql);
    $belanja_1 = $_POST["belanja_pegawai"];
    $belanja_2 = $_POST["belanja_barang"];
    $belanja_3 = $_POST["belanja_modal_alat"];
    $belanja_4 = $_POST["belanja_modal_aset"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $total = ($belanja_1a + $belanja_2a + $belanja_3a + $belanja_4a);
    if ($total > $rs["dana"]) {
        echo '<script language="javascript">
              alert ("Pagu Belanja melebihi Dana BOS Dianggarkan dalam 1 Tahun!!!");
              window.location="../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]";
              </script>';
              exit();
}

    mysql_query("UPDATE tb_dana_bos set 
    belanja_pegawai         ='$belanja_1a',
    belanja_barang          ='$belanja_2a',
    belanja_modal_alat      ='$belanja_3a',
    belanja_modal_aset      ='$belanja_4a',
    progres_belanja       ='1' where id_bos='$_POST[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pagu Belanja Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="tambah_pagu"){
    $tgl = date("Y-m-d");
    $belanja_1 = $_POST["dana_bos_triwulan"];
    $belanja_2 = $_POST["dana_bos_triwulan_lalu"];
    $total = ($belanja_1 + $belanja_2);

$sql=mysql_query("SELECT * from tb_dana_bos WHERE idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
$rsbos=mysql_fetch_array($sql);
if ($rsbos['dana'] < $total) {
        echo '<script language="javascript">
              alert ("Dana BOS Yang Anda Anggarkan Kurang dari Pagu Anggaran!!!");
              window.location="../home.php";
              </script>';
              exit();
}
$sisa_bos_pagu = ($rsbos['dana'] - $total);

    mysql_query("INSERT INTO tb_rkas(idu,id_semester,id_tapel,id_bos,sisa_dana_bos_pagu,sisa_bos,dana_bos_triwulan,dana_bos_triwulan_lalu,akum_bos_lalu_ini,status,tgl_input,progres_pagu) 
    VALUES
    ('$_POST[idu]','$_POST[id_semester]','$_POST[id_tapel]','$_POST[id_bos]',$sisa_bos_pagu ,'$_POST[sisa_bos]','$_POST[dana_bos_triwulan]','$_POST[dana_bos_triwulan_lalu]','$total','0','$tgl','1')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pagu Belanja Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_tw_1.php?act=edit_data&id_semester=$_POST[id_semester]&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="edit_tambah_pagu"){
    $tgl = date("Y-m-d");
    $belanja_1 = $_POST["dana_bos_triwulan"];
    $belanja_2 = $_POST["dana_bos_triwulan_lalu"];
    $total = ($belanja_1 + $belanja_2);

$sql=mysql_query("SELECT * from tb_dana_bos WHERE idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
$rsbos=mysql_fetch_array($sql);
if ($rsbos['dana'] < $total) {
        echo '<script language="javascript">
              alert ("Dana BOS Yang Anda Anggarkan Kurang dari Pagu Anggaran!!!");
              window.location="../home.php";
              </script>';
              exit();
}
$sisa_bos_pagu = ($rsbos['dana'] - $total);

    mysql_query("INSERT INTO tb_rkas(idu,id_semester,id_tapel,id_bos,sisa_dana_bos_pagu,sisa_bos,dana_bos_triwulan,dana_bos_triwulan_lalu,akum_bos_lalu_ini,status,tgl_input,progres_pagu) 
    VALUES
    ('$_POST[idu]','$_POST[id_semester]','$_POST[id_tapel]','$_POST[id_bos]',$sisa_bos_pagu ,'$_POST[sisa_bos]','$_POST[dana_bos_triwulan]','$_POST[dana_bos_triwulan_lalu]','$total','0','$tgl','1')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pagu Belanja Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="hapus_pagu_triwulan"){
    $tgl = date("Y-m-d");

    mysql_query("DELETE from tb_rkas where id_rkas='$_GET[id_rkas]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana Belanja Berhasil Dihapus',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_rkas.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="hapus_bos"){
    $tgl = date("Y-m-d");

    mysql_query("DELETE from tb_dana_bos where id_bos='$_GET[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana Berhasil Dihapus',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_pagu"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_rkas set 
    status       ='1' where id_rkas='$_GET[id_rkas]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_rkas.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_dana_bos"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_dana_bos set 
    status       ='1' where id_bos='$_GET[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_rkas.php');
     } ,2000); 
    </script>";
	}

?>

<!--------------------- sma ---------------------------------------->

<!----------------------- sma ------------------------------->
<?php

include "../config/conn.php";

if($_GET['act']=="ajuan_snp_1_tahun"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["snp_1"];
    $belanja_2 = $_POST["snp_2"];
    $belanja_3 = $_POST["snp_3"];
    $belanja_4 = $_POST["snp_4"];
    $belanja_5 = $_POST["snp_5"];
    $belanja_6 = $_POST["snp_6"];
    $belanja_7 = $_POST["snp_7"];
    $belanja_8 = $_POST["snp_8"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $belanja_5a= str_replace(".", "", $belanja_5);
    $belanja_6a= str_replace(".", "", $belanja_6);
    $belanja_7a= str_replace(".", "", $belanja_7);
    $belanja_8a= str_replace(".", "", $belanja_8);

    mysql_query("UPDATE tb_dana_bos set 
    snp_1           ='$belanja_1a',
    snp_2           ='$belanja_2a',
    snp_3           ='$belanja_3a',
    snp_4           ='$belanja_4a',
    snp_5           ='$belanja_5a',
    snp_6           ='$belanja_6a',
    snp_7           ='$belanja_7a',
    snp_8           ='$belanja_8a',
    progres_snp     ='1' where id_bos='$_POST[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Belanja 8 SNP Berhasil Dibuat',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="tgl_sptjm_akhir"){

    $tgl = date("Y-m-d");
    $sisa_bank = $_POST["sisa_bank"];
    $sisa_tunai = $_POST["sisa_tunai"];

    //membuang titik dengan menggunakan fungsi replace
    $sisa_banka= str_replace(".", "", $sisa_bank);
    $sisa_tunaia= str_replace(".", "", $sisa_tunai);

    $total = ($sisa_banka + $sisa_tunaia);

    $sql=mysql_query("SELECT * from tb_realisasi WHERE idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");
    $rs_total=mysql_fetch_array($sql);
    if ($total > $rs_total['dana_bos_digunakan']) {
            echo '<script language="javascript">
                alert ("Dana Sisa Yang Anda Anggarkan Melebihi dari Pagu Anggaran!!!");
                window.location="../modules/sma/act_pengesahan.php";
                </script>';
                exit();
    }

    mysql_query("UPDATE tb_sptjm set 
    sisa_bank               ='$sisa_banka',
    sisa_tunai              ='$sisa_tunaia',
    no_surat                ='$_POST[no_surat]',
    tgl_input               ='$tgl' where id_sp='$_POST[id_sp]'");

    

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Tanggal SPTJM Berhasil Dibuat',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_pengesahan.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['act']=="ajuan_belanja"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["belanja_pegawai"];
    $belanja_2 = $_POST["belanja_barang"];
    $belanja_3 = $_POST["belanja_modal_alat"];
    $belanja_4 = $_POST["belanja_modal_aset"];
    $dana_bos_digunakan = $_POST["dana_bos_digunakan"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $dana_bos_digunakana= str_replace(".", "", $dana_bos_digunakan);

    $sql=mysql_query("select * from tb_dana_bos where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
    $rs=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_rkas where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");
    $rsk=mysql_fetch_array($sql);
    $total = ($belanja_1a + $belanja_2a + $belanja_3a + $belanja_4a);
    $sisa_bos_gunakan = ($rs["dana"] - $dana_bos_digunakana);

    if ($total > $sisa_bos_gunakan) {
        echo '<script language="javascript">
              alert ("Pagu Belanja melebihi Dana BOS Dianggarkan dalam 1 Tahun!!!");
              window.location="../modules/sma/act_pilih.php";
              </script>';
              exit();
    }

    if ($total > $rsk["akum_bos_lalu_ini"]) {
        echo '<script language="javascript">
              alert ("Pagu Belanja melebihi Dana Pagu Dianggarkan dalam 1 Triwulan!!!");
              window.location="../modules/sma/act_pilih.php";
              </script>';
              exit();
    }

    mysql_query("INSERT INTO tb_realisasi(idu,id_tapel,id_semester,dana_bos_digunakan,belanja_pegawai,belanja_barang,belanja_modal_alat,belanja_modal_aset,total,sisa_bos_digunakan,status,tgl_input,progres_belanja) 
    VALUES
    ('$_POST[idu]','$_POST[id_tapel]','$_POST[id_semester]','$dana_bos_digunakana','$belanja_1a','$belanja_2a','$belanja_3a','$belanja_4a','$total','$sisa_bos_gunakan','0','$tgl','1')");


    mysql_query("INSERT INTO tb_sptjm(idu,id_tapel,id_semester,sisa_bank,sisa_tunai,tgl_input) 
    VALUES
    ('$_POST[idu]','$_POST[id_tapel]','$_POST[id_semester]','0','0','0')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana BOS Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_realisasi_penggunaan_1.php?idu=$_POST[idu]&id_tapel=$_POST[id_tapel]&id_semester=$_POST[id_semester]');
     } ,2000); 
    </script>";
	}
?>

<?php
include "../config/conn.php";

// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['act']=="rev_ajuan_belanja"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["belanja_pegawai"];
    $belanja_2 = $_POST["belanja_barang"];
    $belanja_3 = $_POST["belanja_modal_alat"];
    $belanja_4 = $_POST["belanja_modal_aset"];
    $dana_bos_digunakan = $_POST["dana_bos_digunakan"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $dana_bos_digunakana= str_replace(".", "", $dana_bos_digunakan);

    $sql=mysql_query("select * from tb_dana_bos where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
    $rs=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_rkas where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");
    $rsk=mysql_fetch_array($sql);
    $total = ($belanja_1a + $belanja_2a + $belanja_3a + $belanja_4a);
    $sisa_bos_gunakan = ($rs["dana"] - $dana_bos_digunakana);

    if ($total > $sisa_bos_gunakan) {
        echo '<script language="javascript">
              alert ("Pagu Belanja melebihi Dana BOS Dianggarkan dalam 1 Tahun!!!");
              window.location="../home.php";
              </script>';
              exit();
    }

    if ($total > $rsk["akum_bos_lalu_ini"]) {
        echo '<script language="javascript">
              alert ("Pagu Belanja melebihi Dana Pagu Dianggarkan dalam 1 Triwulan!!!");
              window.location="../home.php";
              </script>';
              exit();
    }

    mysql_query("UPDATE tb_realisasi set 
    dana_bos_digunakan              ='$_POST[dana_bos_digunakan]',
    belanja_pegawai                 ='$belanja_1a',
    belanja_barang                  ='$belanja_2a',
    belanja_modal_alat              ='$belanja_3a',
    belanja_modal_aset              ='$belanja_4a',
    total                           ='$total',
    sisa_bos_digunakan              ='$sisa_bos_gunakan',
    progres_belanja                     ='1' where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana BOS Berhasil Diedit',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_realisasi_penggunaan_1.php?idu=$_POST[idu]&id_tapel=$_POST[id_tapel]&id_semester=$_POST[id_semester]');
     } ,2000); 
    </script>";
	}
?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_realisasi set 
    status       ='1' where id_realisasi='$_GET[id_realisasi]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_jadi"){

    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    while ($rskk=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
    $jumlah_s1[] = $rskk['total'];
                                }
                                //Total
    $jumlah_snp = array_sum($jumlah_s1);

    $sqlw=mysql_query("select * from tb_realisasi where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $realisasi=mysql_fetch_array($sqlw);

    if ($jumlah_snp < $realisasi['total']) {
        echo '<script language="javascript">
              alert ("Belanja SNP anda kurang dari Dana Anggaran Belanja !!!");
              window.location="../modules/sma/act_pengesahan.php";
              </script>';
              exit();
    }

    $tgl = date("Y-m-d");

    mysql_query("INSERT INTO tb_pengesahan(idu,id_tapel,id_semester,ket,stts,tgl_input,stts_terima,tgl_terima) 
    VALUES
    ('$_GET[idu]','$_GET[id_tapel]','$_GET[id_semester]','0','1','$tgl','0','0')");

    mysql_query("UPDATE tb_rkas set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_realisasi set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_realisasi_snp set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                text: 'Tunggu Konfirmasi OP Cabdin',
                type: 'success',
                timer: 3000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_pengesahan.php');
     } ,3000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_revisi"){
    $tgl = date("Y-m-d");

    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    while ($rskk=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
    $jumlah_s1[] = $rskk['total'];
                                }
                                //Total
    $jumlah_snp = array_sum($jumlah_s1);

    $sqlw=mysql_query("select * from tb_realisasi where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $realisasi=mysql_fetch_array($sqlw);

    if ($jumlah_snp < $realisasi['total']) {
        echo '<script language="javascript">
              alert ("Belanja SNP anda kurang dari Dana Anggaran Belanja !!!");
              window.location="../modules/sma/act_pengesahan.php";
              </script>';
              exit();
    }

    mysql_query("UPDATE tb_pengesahan set 
    stts       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_rkas set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_realisasi set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_realisasi_snp set 
    status       ='1' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                text: 'Tunggu Konfirmasi OP Cabdin',
                type: 'success',
                timer: 3000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,3000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_sah"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_pengesahan set 
    stts       ='3' where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                type: 'success',
                timer: 3000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/pilih_pengesahan.php');
     } ,3000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_dinas_rev"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_pengesahan set 
    ket        ='$_POST[ket]',
    stts       ='2' where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");

    mysql_query("UPDATE tb_rkas set 
    status       ='0' where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");

    mysql_query("UPDATE tb_realisasi set 
    status       ='0' where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");

    mysql_query("UPDATE tb_realisasi_snp set 
    status       ='0' where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Revisi Berhasil Dikirim',
                type: 'success',
                timer: 3000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/pilih_pengesahan.php');
     } ,3000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="pengesahan_snp_rev"){
    $tgl = date("Y-m-d");

    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    while ($rskk=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
    $jumlah_s1[] = $rskk['total'];
                                }
                                //Total
    $jumlah_snp = array_sum($jumlah_s1);

    $sqlw=mysql_query("select * from tb_realisasi where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");
    $realisasi=mysql_fetch_array($sqlw);


    if ($jumlah_snp < $realisasi['total']) {
        echo '<script language="javascript">
              alert ("Belanja SNP anda kurang dari Dana Anggaran Belanja !!!");
              window.location="../home.php";
              </script>';
              exit();
    }

    mysql_query("UPDATE tb_realisasi_snp set 
    status       ='1' where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

    mysql_query("UPDATE tb_pengesahan set 
    stts       ='4' where id_tapel='$_GET[id_tapel]' and id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dikirim',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="hapus_pagu"){
    $tgl = date("Y-m-d");

    mysql_query("DELETE from tb_realisasi where id_realisasi='$_GET[id_realisasi]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana Belanja Berhasil Dihapus',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_susun_rkas_bos_1_tahun.php?act=edit_data&idu=$_POST[idu]&id_tapel=$_POST[id_tapel]');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="hapus_snp"){
    $tgl = date("Y-m-d");

    mysql_query("DELETE from tb_realisasi_snp where id_g='$_GET[id_g]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana SNP Berhasil Dihapus',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../home.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['act']=="ajuan_snp"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["snp_1"];
    $belanja_2 = $_POST["snp_2"];
    $belanja_3 = $_POST["snp_3"];
    $belanja_4 = $_POST["snp_4"];
    $belanja_5 = $_POST["snp_5"];
    $belanja_6 = $_POST["snp_6"];
    $belanja_7 = $_POST["snp_7"];
    $belanja_8 = $_POST["snp_8"];
    $belanja_9 = $_POST["snp_9"];
    $belanja_10 = $_POST["snp_10"];
    $belanja_11 = $_POST["snp_11"];
    $belanja_12 = $_POST["snp_12"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $belanja_5a= str_replace(".", "", $belanja_5);
    $belanja_6a= str_replace(".", "", $belanja_6);
    $belanja_7a= str_replace(".", "", $belanja_7);
    $belanja_8a= str_replace(".", "", $belanja_8);
    $belanja_9a= str_replace(".", "", $belanja_9);
    $belanja_10a= str_replace(".", "", $belanja_10);
    $belanja_11a= str_replace(".", "", $belanja_11);
    $belanja_12a= str_replace(".", "", $belanja_12);
    $total_snp = ($belanja_1a + $belanja_2a + $belanja_3a + $belanja_4a + $belanja_5a + $belanja_6a + $belanja_7a + $belanja_8a + $belanja_9a + $belanja_10a + $belanja_11a + $belanja_12a);

    $sql=mysql_query("select * from tb_realisasi where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");
    $rs=mysql_fetch_array($sql);

    if ($total_snp > $rs["total"] ) {
        echo '<script language="javascript">
              alert ("Anggaran Belanja melebihi Dana Dianggarkan!!!");
              window.location="../modules/sma/act_pilih_snp.php";
              </script>';
              exit();
    }

    if ($total_snp == 0 ) {
        echo '<script language="javascript">
              alert ("Anggaran Belanja Anda Belum Ditentukan!!!");
              window.location="../modules/sma/act_pilih_snp.php";
              </script>';
              exit();
    }

    $cek_user=mysql_num_rows(mysql_query("SELECT * FROM tb_realisasi_snp WHERE id_snp='$_POST[id_snp]' and id_semester='$_POST[id_semester]' and id_tapel='$_POST[id_tapel]' and idu='$_POST[idu]'"));
    if ($cek_user > 0) {
            echo '<script language="javascript">
                alert ("Anggaran SNP sudah ada untuk dianggarkan !!!");
                window.location="../modules/sma/act_pilih_snp.php";
                </script>';
                exit();
    }
    // Turn off all error reporting
    error_reporting(0);

    // Report all errors except E_NOTICE
    error_reporting(E_ALL & ~E_NOTICE);

    $sql=mysql_query("SELECT * FROM tb_realisasi_snp where idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]' and id_semester='$_POST[id_semester]'");
                                while ($r=mysql_fetch_array($sql)){
                                //Looping Untuk menampilkan data (namabarang,jumlah,harga)
                                $jumlah[] = $r['total'];
                                }
                                //Total
                                $jumlahnya = array_sum($jumlah);
    if ($jumlahnya >= $rs["total"]) {
            echo '<script language="javascript">
                alert ("Anggaran SNP Melebihi yang dianggarkan !!!");
                window.location="../modules/sma/act_pilih_snp.php";
                </script>';
                exit();
    }

    mysql_query("INSERT INTO tb_realisasi_snp(idu,id_tapel,id_semester,id_snp,snp_1,snp_2,snp_3,snp_4,snp_5,snp_6,snp_7,snp_8,snp_9,snp_10,snp_11,snp_12,total,progres_snp,status,tgl_input) 
    VALUES
    ('$_POST[idu]','$_POST[id_tapel]','$_POST[id_semester]','$_POST[id_snp]','$belanja_1a','$belanja_2a','$belanja_3a','$belanja_4a','$belanja_5a','$belanja_6a','$belanja_7a',
    '$belanja_8a','$belanja_9a','$belanja_10a','$belanja_11a','$belanja_12a','$total_snp','1','0','$tgl')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana BOS Berhasil Disimpan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_realisasi_penggunaan_snp.php?idu=$_POST[idu]&id_tapel=$_POST[id_tapel]&id_semester=$_POST[id_semester]');
     } ,2000); 
    </script>";
	}
?>

<?php
include "../config/conn.php";

// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['act']=="revisi_ajuan_snp"){
    $tgl = date("Y-m-d");

    $belanja_1 = $_POST["snp_1"];
    $belanja_2 = $_POST["snp_2"];
    $belanja_3 = $_POST["snp_3"];
    $belanja_4 = $_POST["snp_4"];
    $belanja_5 = $_POST["snp_5"];
    $belanja_6 = $_POST["snp_6"];
    $belanja_7 = $_POST["snp_7"];
    $belanja_8 = $_POST["snp_8"];
    $belanja_9 = $_POST["snp_9"];
    $belanja_10 = $_POST["snp_10"];
    $belanja_11 = $_POST["snp_11"];
    $belanja_12 = $_POST["snp_12"];

    //membuang titik dengan menggunakan fungsi replace
    $belanja_1a= str_replace(".", "", $belanja_1);
    $belanja_2a= str_replace(".", "", $belanja_2);
    $belanja_3a= str_replace(".", "", $belanja_3);
    $belanja_4a= str_replace(".", "", $belanja_4);
    $belanja_5a= str_replace(".", "", $belanja_5);
    $belanja_6a= str_replace(".", "", $belanja_6);
    $belanja_7a= str_replace(".", "", $belanja_7);
    $belanja_8a= str_replace(".", "", $belanja_8);
    $belanja_9a= str_replace(".", "", $belanja_9);
    $belanja_10a= str_replace(".", "", $belanja_10);
    $belanja_11a= str_replace(".", "", $belanja_11);
    $belanja_12a= str_replace(".", "", $belanja_12);
    $total_snp = ($belanja_1a + $belanja_2a + $belanja_3a + $belanja_4a + $belanja_5a + $belanja_6a + $belanja_7a + $belanja_8a + $belanja_9a + $belanja_10a + $belanja_11a + $belanja_12a);

    if ($total_snp == 0 ) {
        echo '<script language="javascript">
              alert ("Anggaran Belanja Anda Belum Ditentukan!!!");
              window.location="../home.php";
              </script>';
              exit();
    }

    mysql_query("UPDATE tb_realisasi_snp set 
    snp_1           ='$belanja_1a',
    snp_2           ='$belanja_2a',
    snp_3           ='$belanja_3a',
    snp_4           ='$belanja_4a',
    snp_5           ='$belanja_5a',
    snp_6           ='$belanja_6a',
    snp_7           ='$belanja_7a',
    snp_8           ='$belanja_8a',
    snp_9           ='$belanja_9a',
    snp_10          ='$belanja_10a',
    snp_11          ='$belanja_11a',
    snp_12          ='$belanja_12a',
    total           ='$total_snp',
    tgl_input       ='$tgl' where id_g='$_POST[id_g]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dana 8 SNP Berhasil Diupdate',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/sma/act_realisasi_penggunaan_snp.php?idu=$_POST[idu]&id_tapel=$_POST[id_tapel]&id_semester=$_POST[id_semester]');
     } ,2000); 
    </script>";
	}
?>

<!----------------------- sma ------------------------------->

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>