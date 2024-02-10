<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="alert/css/sweetalert.css">
</head>
<body>

<?php
include "../config/conn.php";

if($_GET['act']=="update_profil"){
    $tgl = date("Y-m-d");

            $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
            $nama = $_FILES['file']['name'];
            $x = explode('.', $nama);
            $ekstensi = strtolower(end($x));
            $ukuran	= $_FILES['file']['size'];
            $file_tmp = $_FILES['file']['tmp_name'];

            $sql=mysql_query("select * from user_sekolah where idu = '$_POST[idu]'");
            $rs=mysql_fetch_array($sql);
            $nama_sk=$rs['nama']."-".$rs['sekolah']."-".$nama;
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
		    if($ukuran < 50044070){			
            move_uploaded_file($file_tmp, 'file_sk/'.$nama_sk);
            
            
			$query = mysql_query("UPDATE user_sekolah set 
            sekolah                 = '$_POST[sekolah]',
            npsn                    = '$_POST[npsn]',
            nama_ks                 = '$_POST[nama_ks]',
            nip_ks                  = '$_POST[nip_ks]',
            alamat                  = '$_POST[alamat]',
            kelurahan               = '$_POST[kelurahan]',
            kecamatan               = '$_POST[kecamatan]',
            area                    = '$_POST[area]',
            nama                    = '$_POST[nama]',
            no_hp                   = '$_POST[no_hp]',
            no_rekening             = '$_POST[no_rekening]',
            nama_rekening           = '$_POST[nama_rekening]',
            nama_bank               = '$_POST[nama_bank]',
            file_data               = '$nama_sk',
            tgl_input               = '$tgl' where idu = '$_POST[idu]'");

			if($query){
				echo "
                <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Data Terupdate',
                            type: 'success',
                            timer: 5000
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('../profil.php');
                 } ,5000); 
                </script>";
			}else{
				echo "
                <script type='text/javascript'>
                 setTimeout(function () { 
                 swal({
                            title: 'Gagal Tersimpan',
                            type: 'warning',
                            timer: 2000
                        });  
                 },10); 
                 window.setTimeout(function(){ 
                  window.location.replace('../profil.php');
                 } ,2000); 
                </script>";
			}
		    }else{
			echo "
            <script type='text/javascript'>
             setTimeout(function () { 
             swal({
                        title: 'Ukuran File Terlalu Besar',
                        type: 'warning',
                        timer: 2000
                    });  
             },10); 
             window.setTimeout(function(){ 
              window.location.replace('../profil.php');
             } ,2000); 
            </script>";;
		    }
	       }else{
		echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Ekstensi File Tidak Diperbolehkan',
                    type: 'warning',
                    timer: 2000
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('../profil.php');
         } ,2000); 
        </script>";
           }
    }
?>

<?php

include "../config/conn.php";

if($_GET['act']=="registrasi_user"){
    $tgl = date("Y-m-d");

    $cek_user=mysql_num_rows(mysql_query("SELECT * FROM user_sekolah WHERE nip='$_POST[nip]'"));
if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Email Sudah Ada Yang Menggunakan!!!");
              window.location="../sign-in.php";
              </script>';
              exit();
}
$cek_user=mysql_num_rows(mysql_query("SELECT * FROM user_sekolah WHERE sekolah='$_POST[sekolah]'"));
if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Daftar Sekolah Sudah Ada Yang Menggunakan!!!");
              window.location="../sign-in.php";
              </script>';
              exit();
}
$cek_user=mysql_num_rows(mysql_query("SELECT * FROM user_sekolah WHERE npsn='$_POST[npsn]'"));
if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("NPSN Sekolah Sudah Ada Yang Menggunakan!!!");
              window.location="../sign-in.php";
              </script>';
              exit();
}
    mysql_query("INSERT INTO user_sekolah(nip,nama,sekolah,npsn,pass,jabatan,level,tgl_input,stts,tgl_aktifasi,nama_ks,nip_ks,no_hp,nip_ops,jenjang,status_sekolah,locking,file_data) 
    VALUES
    ('$_POST[nip]','$_POST[nama]','$_POST[sekolah]','$_POST[npsn]','$_POST[pass]','$_POST[jabatan]','$_POST[level]','$tgl','$_POST[stts]','$_POST[tgl_aktifasi]','$_POST[nama_ks]','-','$_POST[no_hp]','-','$_POST[jenjang]','$_POST[status_sekolah]','$_POST[locking]','kop_cabdin.jpg')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Registrasi Berhasil',
                text: 'Cabdin Akan Aktifasi Akkun Anda',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../sign-in.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="buka_kunci_bos"){

    $sql=mysql_query("select * from tb_dana_bos where id_bos='$_POST[id_bos]' and idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");
    $rs=mysql_fetch_array($sql);
    if ($rs["status"] == 0) {
        echo '<script language="javascript">
              alert ("Kuncian Anggaran 1 Tahun Sudah Terbuka");
              window.location="../modules/dinas/tabel.php";
              </script>';
              exit();
}

    mysql_query("UPDATE tb_dana_bos set 
    status       ='0' where id_bos='$_POST[id_bos]' and idu='$_POST[idu]' and id_tapel='$_POST[id_tapel]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Buka Kunci Berhasil Dilakukan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tabel.php');
     } ,2000); 
    </script>";
	}

?>

<?php

include "../config/conn.php";

if($_GET['act']=="dis_pengesahan"){
    $tgl = date("Y-m-d");

    mysql_query("UPDATE tb_dana_bos set 
    status       ='0' where id_bos='$_GET[id_bos]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Pengesahan Berhasil Dibatalkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/pengesahan.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="aktifasi"){
    $tgl = date("Y-m-d");
    mysql_query("UPDATE user_sekolah set 
    stts='1',
    tgl_aktifasi='$tgl' where idu='$_GET[idu]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Sudah Diaktifasikan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tabel.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="disaktifasi"){
    $tgl = date("Y-m-d");
    mysql_query("update user_sekolah set 
    stts='0',
    tgl_aktifasi='$tgl' where idu='$_GET[idu]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Dinon-aktifkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tabel.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="unaktif_semester"){

    mysql_query("UPDATE tb_semester set 
    status       ='0' where id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Di Non-Aktifkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/semester.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="aktif_semester"){

    mysql_query("UPDATE tb_semester set 
    status       ='1' where id_semester='$_GET[id_semester]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Di Aktifkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/semester.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="tambah_tapel"){

    $cek_user=mysql_num_rows(mysql_query("SELECT * FROM tb_tapel WHERE tapel='$_POST[tapel]'"));
    if ($cek_user > 0) {
        echo '<script language="javascript">
              alert ("Tahun Pelajaran Sudah Ada");
              window.location="../modules/dinas/th_pelajaran.php";
              </script>';
              exit();
}

    mysql_query("INSERT INTO tb_tapel(tapel,status) 
    VALUES(
    '$_POST[tapel]',
    '$_POST[status]')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Ditambahkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/th_pelajaran.php');
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

if($_GET['act']=="hapus_tapel"){

    $aktifasikan = mysql_query("DELETE from tb_tapel where id_tapel='$_GET[id_tapel]'");

	if($aktifasikan){
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Data Dihapus',
                    text: 'Data Terhapus dari Database!',
                    type: 'success',
                    timer: 3000
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('../modules/dinas/th_pelajaran.php');
         } ,3000); 
        </script>";
}
}
?>

<?php
include "../config/conn.php";

// Turn off all error reporting
error_reporting(0);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

if($_GET['act']=="hapus_user_sekolah"){

    $aktifasikan = mysql_query("DELETE from user_sekolah where idu='$_GET[idu]'");

	if($aktifasikan){
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Data Dihapus',
                    text: 'Data User Terhapus!',
                    type: 'success',
                    timer: 3000
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('../modules/dinas/tabel.php');
         } ,3000); 
        </script>";
}
}
?>

<?php
include "../config/conn.php";

if($_GET['act']=="tambah_tgl"){

    mysql_query("INSERT INTO tb_tgl(tanggal_sah,id_semester,id_tapel) 
    VALUES(
    '$_POST[tanggal_sah]',
    '$_POST[id_semester]',
    '$_POST[id_tapel]')");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Ditambahkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tgl_sptjm.php');
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

if($_GET['act']=="hapus_tgl"){

    $aktifasikan = mysql_query("DELETE from tb_tgl where id_tgl='$_GET[id_tgl]'");

	if($aktifasikan){
        echo "
        <script type='text/javascript'>
         setTimeout(function () { 
         swal({
                    title: 'Data Dihapus',
                    text: 'Data Terhapus dari Database!',
                    type: 'warning',
                    timer: 3000
                });  
         },10); 
         window.setTimeout(function(){ 
          window.location.replace('../modules/dinas/tgl_sptjm.php');
         } ,3000); 
        </script>";
}
}
?>

<?php
include "../config/conn.php";

if($_GET['act']=="aktif_tanggal"){

    mysql_query("UPDATE tb_tgl set 
    status       ='1' where id_tgl='$_GET[id_tgl]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Di Aktifkan',
                type: 'success',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tgl_sptjm.php');
     } ,2000); 
    </script>";
	}

?>

<?php
include "../config/conn.php";

if($_GET['act']=="unaktif_tanggal"){

    mysql_query("UPDATE tb_tgl set 
    status       ='0' where id_tgl='$_GET[id_tgl]'");

	echo "
    <script type='text/javascript'>
     setTimeout(function () { 
     swal({
                title: 'Berhasil Di Non-Aktifkan',
                type: 'warning',
                timer: 2000
            });  
     },10); 
     window.setTimeout(function(){ 
      window.location.replace('../modules/dinas/tgl_sptjm.php');
     } ,2000); 
    </script>";
	}

?>

<script type="text/javascript" src="alert/js/jquery-2.1.4.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>