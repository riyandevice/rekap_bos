<?php
session_start();
include "config/conn.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cabdin Pasuruan</title>
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

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <link href="login_assets/log/css/bootstrap.min.cosmo.css" rel="stylesheet">
    <link href="login_assets/log/css/full-slider.css" rel="stylesheet">
    <link href="resources/css/w3.css" rel="stylesheet">

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

    <style type="text/css">
    .containers{border:1px solid #8eaec3;width:500px;margin:auto;padding:10px;background-image:radial-gradient(circle 484px at 49.4%19%,rgb(161,195,217)0%,rgb(108,134,150)100.2%);border-radius:4px;box-shadow:15px 19px 50px #698698cc;border-bottom:5px solid #8d202f;border-top:3px solid #8d202f}.box{border:0px solid #000;width:100%;height:100%}.box_login{margin:20px;color:white;border:0px solid #fff;content:'';height:100%}
    body{background:url(resources/images/swirl_pattern.png);color:#111;font-size:100%;padding:40px 0px}
    .ribbon-start,.ribbon,.ribbon-end{background-color:#a32536;background-image:-webkit-gradient(linear,100%0%,0%100%,from(transparent),color-stop(0.25,transparent),color-stop(0.25,hsla(0,0%,0%,.15)),color-stop(0.50,hsla(0,0%,0%,.15)),color-stop(0.50,transparent),color-stop(0.75,transparent),color-stop(0.75,hsla(0,0%,0%,.15)),to(hsla(0,0%,0%,.15)));background-image:-webkit-linear-gradient(right top,transparent 0%,transparent 25%,hsla(0,0%,0%,.15)25%,hsla(0,0%,0%,.15)50%,transparent 50%,transparent 75%,hsla(0,0%,0%,.15)75%,hsla(0,0%,0%,.15)100%);background-image:-moz-linear-gradient(left bottom,transparent 0%,transparent 25%,hsla(0,0%,0%,.15)25%,hsla(0,0%,0%,.15)50%,transparent 50%,transparent 75%,hsla(0,0%,0%,.15)75%,hsla(0,0%,0%,.15)100%);background-image:-ms-linear-gradient(right bottom,transparent 0%,transparent 25%,hsla(0,0%,0%,.15)25%,hsla(0,0%,0%,.15)50%,transparent 50%,transparent 75%,hsla(0,0%,0%,.15)75%,hsla(0,0%,0%,.15)100%);background-image:-o-linear-gradient(right bottom,transparent 0%,transparent 25%,hsla(0,0%,0%,.15)25%,hsla(0,0%,0%,.15)50%,transparent 50%,transparent 75%,hsla(0,0%,0%,.15)75%,hsla(0,0%,0%,.15)100%);background-image:linear-gradient(right bottom,transparent 0%,transparent 25%,hsla(0,0%,0%,.15)25%,hsla(0,0%,0%,.15)50%,transparent 50%,transparent 75%,hsla(0,0%,0%,.15)75%,hsla(0,0%,0%,.15)100%);-webkit-background-size:3px 3px;-moz-background-size:3px 3px;-ms-background-size:3px 3px;-o-background-size:3px 3px;background-size:3px 3px}.ribbon-start,.ribbon,.ribbon-end{height:60px;float:left;position:relative;width:75px}.ribbon-start,.ribbon-end{overflow:hidden}.ribbon-start{-webkit-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),17px 1px 2px hsla(0,0%,0%,.4);-moz-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),17px 1px 2px hsla(0,0%,0%,.4);box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),17px 1px 2px hsla(0,0%,0%,.25)}.ribbon-end{-webkit-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),-17px 1px 2px hsla(0,0%,0%,.4);-moz-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),-17px 1px 2px hsla(0,0%,0%,.4);box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),-17px 1px 2px hsla(0,0%,0%,.25)}.ribbon{margin:0-36px;top:90px;width:114.8%;z-index:10;-webkit-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),0 2px 5px hsla(0,0%,0%,.4);-moz-box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),0 2px 5px hsla(0,0%,0%,.4);box-shadow:inset 0-25px 25px hsla(0,0%,0%,.2),inset 0 0 0 2px hsla(0,0%,100%,.25),inset 0 0 0 1px hsla(0,0%,0%,.75),0 2px 5px hsla(0,0%,0%,.25)}.ribbon:after,.ribbon:before{border-top:25px solid #014266;bottom:-25px;content:'';height:0;position:absolute;width:0}.ribbon:after{border-left:25px solid transparent;left:0}.ribbon:before{border-right:25px solid transparent;right:0}.ribbon-start:after,.ribbon-start:before,.ribbon-end:after,.ribbon-end:before{content:'';height:50px;position:absolute;top:0;width:50px;-webkit-transform:rotate(45deg);-moz-transform:rotate(45deg);-ms-transform:rotate(45deg);-o-transform:rotate(45deg);transform:rotate(45deg)}.ribbon-start:after,.ribbon-end:after{background:#a6a6a6}.ribbon-start:after{left:-20px}.ribbon-end:after{right:-20px}.ribbon-start:before,.ribbon-end:before{background:hsla(0,0%,0%,.5)}.ribbon-start:before{left:-19px}.ribbon-end:before{right:-19px}.ribbon ul,.ribbon li{list-style:none;margin:0;padding:0}.ribbon a{color:#f6f6f6;display:block;float:left;font:1em/48px georgia,serif;text-align:center;text-decoration:none;text-shadow:0 1px 1px hsla(0,0%,0%,.25);width:100px}.ribbon a:hover,.ribbon a:focus{text-shadow:0 1px 1px hsla(0,0%,0%,.25),0 0 5px hsla(0,0%,100%,.5)}.ribbon a:active{position:relative;top:1px}.content{background:#f6f6f6;margin:-50px 65px;padding:100px 20px 20px;position:relative;width:340px;z-index:5;-webkit-box-shadow:inset 0 0 0 1px hsla(0,0%,0%,.5),inset 0 0 50px hsla(0,0%,0%,.2),0 2px 5px hsla(0,0%,0%,.25);-moz-box-shadow:inset 0 0 0 1px hsla(0,0%,0%,.5),inset 0 0 50px hsla(0,0%,0%,.2),0 2px 5px hsla(0,0%,0%,.25);box-shadow:inset 0 0 0 1px hsla(0,0%,0%,.5),inset 0 0 50px hsla(0,0%,0%,.2),0 2px 5px hsla(0,0%,0%,.25)}.judul{font-size:30px;color:white;margin-top:5px;width:100%;font-weight:bold;text-align:center}.logo{content:'';height:80px;width:100%;text-align:center;margin-top:-50px}.gap{content:'';height:155px}.form-control{background:#ececec;color:#393939;font-size:14px;border-top:0px solid transparent;border-left:0px solid transparent;border-right:0px solid transparent}
    input:-webkit-autofill{-webkit-box-shadow:0 0 0px 1000px #333335 inset;-webkit-text-fill-color:#22A6F1!important}
    @media screen and(max-width:570px){.containers{width:100%}.ribbon:before,.ribbon:after{display:none}.ribbon{width:100%;margin:auto}}.progres{display:none;position:absolute;bottom:0%;background:black;width:100%;opacity:0.8;z-index:999999;color:white;margin:auto;text-align:center;padding-top:20px;padding-bottom:20px}
    </style>
</head>

<br/><br/>
<body class="login-app">
<div class="containers">
<div class="box">
<div class="logo">
<img src="images/jatim.gif" width="115px">
<br>
<!---h4 style="font-weight:bold;color:white">Dinas Pendidikan Provinsi Jawa Timur</h4>
<h4 style="font-weight:bold;color:white;font-size:12px">Cabang Dinas Pendidikan Kota Kabupaten Pasuruan Raya</h4>-->
</div><div class="ribbon"><div class="judul"><h4 style="font-weight:bold;color:white">CABANG DINAS PENDIDIKAN WILAYAH PASURUAN</h4>
<h4 style="font-weight:bold;color:white;font-size:12px">(Kabupaten Pasuruan - Kota Pasuruan)</h4></div>
</div><!--<div class="content"><h1>Title</h1><h2>Sub Title</h2><p>BLABLABLA CONTENT</p></div>​ -->
<div class="gap"></div>
<div class="box_login">
<form id="sign_in" action="cek_login.php" method="POST" class="form-horizontal">
<div class="form-group">
<div class="col-lg-12">
<input type="text" class="form-control" id="username" name="username" placeholder="Username ..." required></div>
</div>
<br>
<div class="form-group">
<div class="col-lg-12">
<input type="password" class="form-control" id="password" name="password" placeholder="Password ..." required></div>
</div>
<div class="form-group">
<div class="col-lg-12">
<br>
<select class="form-control">
<?php
$sql = mysql_query("SELECT * FROM tb_tapel where status='1'");
while($rs=mysql_fetch_array($sql))
{
?>             
<option selected>Tahun Anggaran <?php echo"$rs[tapel]";?></option>
<!--<option value="20152">Genap 2015/2016</option>
<option value="20151">Ganjil 2015/2016</option>
<option value="20142">Genap 2014/2015</option>-->
</select>
<?php
}
?>
<br>
</div>
</div><div class="form-group">
<div class="col-sm-5" style="padding-right:0px">
<input type="submit" class="btn btn-primary login" value="Login" style="width:100%"></div>
<div class="col-sm-2" style="padding-top:10px;text-align:center"><i>Atau</i></div>
<div class="col-sm-5" style="padding-left:0px"><a class="btn btn-success" href="register.php"
style="width:100%">Registrasi</a></div></div></form></div>
© <script>document.write(new Date().getFullYear());</script>. <a href="#">SIM BOS by Cabdin Wilayah Pasuruan</a>
</div></div>
</body>

</html>