<?php
include "config/conn.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cabdin Pasuruan</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

        <style>
			body{
                background-image: url(images/login.jpg);
                background-repeat: repeat-x;
			}
		</style>

        <!--Kode untuk mencegah seleksi teks, block teks dll.-->
    <script type="text/javascript">
    function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
    </script>
    
    <!--Kode untuk mematikan fungsi klik kanan di blog-->
    <script type="text/javascript">
    function mousedwn(e){try{if(event.button==2||event.button==3)return false}catch(e){if(e.which==3)return false}}document.oncontextmenu=function(){return false};document.ondragstart=function(){return false};document.onmousedown=mousedwn
    </script>
    
    <style type="text/css">
    * : (input, textarea) {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
    
    }
    </style>
    <style type="text/css">
    img {
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        }
    </style>
    
    <!--Kode untuk mencegah shorcut keyboard, view source dll.-->
    <script type="text/javascript">
    window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
    </script>
    <script type="text/javascript">
    document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
    </script>
</head>

<body class="signup-page">
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
    <div class="signup-box">
        <div class="card">
            <div class="body">
                <form name="form1" action="modules/simpan.php?act=registrasi_user" id='form_combo' method="post" enctype="multipart/form-data">
                <input type="hidden" value="user" name="level"/>
                <input type="hidden" value="0" name="stts"/>
                <input type="hidden" value="0" name="tgl_aktifasi"/>
                <input type="hidden" value="0" name="nama_ks"/>
                <input type="hidden" value="0" name="nip_ks"/>
                <input type="hidden" value="0" name="no_hp"/>
                <input type="hidden" value="0" name="nip_ops"/>
                <input type="hidden" value="0" name="locking"/>
                    <div class="msg">Form Daftar Pengguna Baru</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nama" onkeyup="this.value = this.value.toUpperCase()" placeholder="Name Lengkap Anda" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <label>Status</label>
                        <select class="form-control" name="status_sekolah" onchange="showKab()" required>
                            <option value="#"> --- Silahkan Pilih Status Sekolah --- </option>
                            <?php
                            $prov = mysql_query("SELECT * FROM tb_sekolah GROUP BY status_sekolah asc");
                            while($hasil = mysql_fetch_array($prov)){
                            echo "<option value='$hasil[status_sekolah]'>$hasil[status_sekolah_by]</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>Asal Lembaga Anda</label>
                        <select class="form-control show-tick" data-live-search="true" name="sekolah" id="lembaga_sekolah" onchange="showJenjang(); showNPSN()" required>
                            <option value="#"> --- Silahkan Pilih Asal Lembaga Anda --- </option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label>Jenjang Lembaga</label>
                        <select class="form-control" name="jenjang" id="jenjang_sekolah">
                            <option value="#"> --- Silahkan Pilih Status Jenjang --- </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label>NPSN Lembaga</label>
                        <select class="form-control" name="npsn" id="npsn_sekolah">
                            <option value="#"> --- Silahkan Pilih NPSN --- </option>
                        </select>
                    </div>

                    <div class="input-group">
                    <label>Jabatan</label>
                        <select class="form-control" name="jabatan" required>
                        <option value="Bendahara"> --- Bendahara BOS --- </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="nip" placeholder="Email Pengguna" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="pass" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">DAFTARKAN BARU</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="sign-in">Sudah mempunyai User Pengguna!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <script language='javascript'>
    function showKab()
    {

    <?php

    include "config/conn.php";

    // membaca semua propinsi

    $query = "SELECT * FROM tb_sekolah ORDER BY id ASC";
    $hasil = mysql_query($query);

    // membuat if untuk masing-masing pilihan  beserta isi option untuk combobox kedua

    while ($data = mysql_fetch_array($hasil))
    {

    $prov = $data['status_sekolah'];

    // membuat IF untuk masing-masing 
    echo "if (document.form1.status_sekolah.value == \"".$prov."\")";
    echo "{";

    // membuat option

    $query2 = "SELECT * FROM tb_sekolah WHERE status_sekolah = '$prov' ORDER BY status_sekolah ASC";

    $hasil2 = mysql_query($query2);

    $content = "document.getElementById('lembaga_sekolah').innerHTML = \"";

    while ($data2 = mysql_fetch_array($hasil2))

    {

    $content .= "<option value='".$data2['lembaga']."'>".$data2['lembaga']."</option>";

    }

    $content .= "\"";

    echo $content;

    echo "}\n";

    }
    ?>
    }
    </script>








<script language='javascript'>
    function showJenjang()
    {

    <?php

    include "config/conn.php";

    // membaca semua propinsi

    $query = "SELECT * FROM tb_sekolah ORDER BY id ASC";
    $hasil = mysql_query($query);

    // membuat if untuk masing-masing pilihan  beserta isi option untuk combobox kedua

    while ($data = mysql_fetch_array($hasil))
    {

    $prov = $data['lembaga'];

    // membuat IF untuk masing-masing 
    echo "if (document.form1.sekolah.value == \"".$prov."\")";
    echo "{";

    // membuat option

    $query2 = "SELECT * FROM tb_sekolah WHERE lembaga = '$prov' ORDER BY lembaga ASC";

    $hasil2 = mysql_query($query2);

    $content = "document.getElementById('jenjang_sekolah').innerHTML = \"";

    while ($data2 = mysql_fetch_array($hasil2))

    {

    $content .= "<option value='".$data2['jenjang']."'>".$data2['jenjang']."</option>";

    }

    $content .= "\"";

    echo $content;

    echo "}\n";

    }
    ?>
    }
    </script>

    <script language='javascript'>
    function showJenjang()
    {

    <?php

    include "config/conn.php";

    // membaca semua propinsi

    $query = "SELECT * FROM tb_sekolah ORDER BY id ASC";
    $hasil = mysql_query($query);

    // membuat if untuk masing-masing pilihan  beserta isi option untuk combobox kedua

    while ($data = mysql_fetch_array($hasil))
    {

    $prov = $data['lembaga'];

    // membuat IF untuk masing-masing 
    echo "if (document.form1.sekolah.value == \"".$prov."\")";
    echo "{";

    // membuat option

    $query2 = "SELECT * FROM tb_sekolah WHERE lembaga = '$prov' ORDER BY lembaga ASC";

    $hasil2 = mysql_query($query2);

    $content = "document.getElementById('jenjang_sekolah').innerHTML = \"";

    while ($data2 = mysql_fetch_array($hasil2))

    {

    $content .= "<option value='".$data2['jenjang']."'>".$data2['jenjang']."</option>";

    }

    $content .= "\"";

    echo $content;

    echo "}\n";

    }
    ?>
    }
    </script>


<script language='javascript'>
    function showNPSN()
    {

    <?php

    include "config/conn.php";

    // membaca semua propinsi

    $query = "SELECT * FROM tb_sekolah ORDER BY id ASC";
    $hasil = mysql_query($query);

    // membuat if untuk masing-masing pilihan  beserta isi option untuk combobox kedua

    while ($data = mysql_fetch_array($hasil))
    {
    $prov = $data['lembaga'];
    // membuat IF untuk masing-masing 
    echo "if (document.form1.sekolah.value == \"".$prov."\")";
    echo "{";
    // membuat option
    $query2 = "SELECT * FROM tb_sekolah WHERE lembaga = '$prov' ORDER BY lembaga ASC";
    $hasil2 = mysql_query($query2);
    $content = "document.getElementById('npsn_sekolah').innerHTML = \"";
    while ($data2 = mysql_fetch_array($hasil2))
    {
    $content .= "<option value='".$data2['npsn']."'>".$data2['npsn']."</option>";
    }

    $content .= "\"";

    echo $content;

    echo "}\n";

    }
    ?>
    }
    </script>
    

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>

</body>

</html>