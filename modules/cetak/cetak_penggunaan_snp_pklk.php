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

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CABDINPAS</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
	<style>
	.tableheader{
	background:#CCCCFF;
	color:#FF6666;
	text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
	height:30px;
}
	
#column_padding{
	padding-left:2%;
}
		
td a {
	text-decoration:none;
	color:#0033CC;
	/8text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;*/
}
	
td a:hover{
	color:yellow;
	text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}
	
#rowHover:hover {
	background:#FF6666;;
}
		
#removeborder{
	border:0px;
	height:35px;
}
		
.form{
	margin:0px;
	margin-left:15px;
}

input[type="text"]{
	width:95%;
}

input[type="radio"]{
	width:20%;
}

.tableadd {
	background:#CCCCCC;
	padding:20px;
	border:solid 1px;
}

#berhasil {
	width:20%;
	background:#009933;
	color:#fff;
	text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
}

#row_button {
	
}

#button_tambah{
	background:blue;
	color:#FFFFFF;
	padding:3px;
	border:solid 1px yellow;
	margin-left:1%;
}

.wrapper {
    display:flex;
    align-items:center;
    width:400px;
    height:400px;
    background:#eee;
}
</style>

<style type="text/css">
    body { font-family: "Calibri"; }
    p { font-family: "Calibri"; }
    div { font-family: "Calibri"; }
    </style>

<style>
@page {
  size: landscape;
}
</style>

</head>
<body onload="window.print();window.close();">

<?php 
$no=0;
$sql=mysql_query("select * from tb_ref_snp");
$rs=mysql_fetch_array($sql);{

    $sql=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
    $rsemseter=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
    $rtapel=mysql_fetch_array($sql);

    $sql=mysql_query("select * from user_sekolah where idu='$_GET[idu]'");
    $ralamat=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tgl where id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $tgl_sah=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_rkas where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_dana_bos where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]'");
    $r_bos=mysql_fetch_array($sql);
    $total_snp_1_8=($r_bos['snp_1'] + $r_bos['snp_2'] + $r_bos['snp_3'] + $r_bos['snp_4'] + $r_bos['snp_5'] + $r_bos['snp_6'] + $r_bos['snp_7'] + $r_bos['snp_8']);

    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='1'");
    $r_snp_1=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='2'");
    $r_snp_2=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='3'");
    $r_snp_3=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='4'");
    $r_snp_4=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='5'");
    $r_snp_5=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='6'");
    $r_snp_6=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='7'");
    $r_snp_7=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_realisasi_snp where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]' and id_snp='8'");
    $r_snp_8=mysql_fetch_array($sql);
    $total_snp_1=($r_snp_1['snp_1'] + $r_snp_1['snp_2'] + $r_snp_1['snp_3'] + $r_snp_1['snp_4'] + $r_snp_1['snp_5'] + $r_snp_1['snp_6'] + $r_snp_1['snp_7'] + $r_snp_1['snp_8'] + $r_snp_1['snp_9'] + $r_snp_1['snp_10'] + $r_snp_1['snp_11'] + $r_snp_1['snp_12']);
    $total_snp_2=($r_snp_2['snp_1'] + $r_snp_2['snp_2'] + $r_snp_2['snp_3'] + $r_snp_2['snp_4'] + $r_snp_2['snp_5'] + $r_snp_2['snp_6'] + $r_snp_2['snp_7'] + $r_snp_2['snp_8'] + $r_snp_2['snp_9'] + $r_snp_2['snp_10'] + $r_snp_2['snp_11'] + $r_snp_2['snp_12']);
    $total_snp_3=($r_snp_3['snp_1'] + $r_snp_3['snp_2'] + $r_snp_3['snp_3'] + $r_snp_3['snp_4'] + $r_snp_3['snp_5'] + $r_snp_3['snp_6'] + $r_snp_3['snp_7'] + $r_snp_3['snp_8'] + $r_snp_3['snp_9'] + $r_snp_3['snp_10'] + $r_snp_3['snp_11'] + $r_snp_3['snp_12']);
    $total_snp_4=($r_snp_4['snp_1'] + $r_snp_4['snp_2'] + $r_snp_4['snp_3'] + $r_snp_4['snp_4'] + $r_snp_4['snp_5'] + $r_snp_4['snp_6'] + $r_snp_4['snp_7'] + $r_snp_4['snp_8'] + $r_snp_4['snp_9'] + $r_snp_4['snp_10'] + $r_snp_4['snp_11'] + $r_snp_4['snp_12']);
    $total_snp_5=($r_snp_5['snp_1'] + $r_snp_5['snp_2'] + $r_snp_5['snp_3'] + $r_snp_5['snp_4'] + $r_snp_5['snp_5'] + $r_snp_5['snp_6'] + $r_snp_5['snp_7'] + $r_snp_5['snp_8'] + $r_snp_5['snp_9'] + $r_snp_5['snp_10'] + $r_snp_5['snp_11'] + $r_snp_5['snp_12']);
    $total_snp_6=($r_snp_6['snp_1'] + $r_snp_6['snp_2'] + $r_snp_6['snp_3'] + $r_snp_6['snp_4'] + $r_snp_6['snp_5'] + $r_snp_6['snp_6'] + $r_snp_6['snp_7'] + $r_snp_6['snp_8'] + $r_snp_6['snp_9'] + $r_snp_6['snp_10'] + $r_snp_6['snp_11'] + $r_snp_6['snp_12']);
    $total_snp_7=($r_snp_7['snp_1'] + $r_snp_7['snp_2'] + $r_snp_7['snp_3'] + $r_snp_7['snp_4'] + $r_snp_7['snp_5'] + $r_snp_7['snp_6'] + $r_snp_7['snp_7'] + $r_snp_7['snp_8'] + $r_snp_7['snp_9'] + $r_snp_7['snp_10'] + $r_snp_7['snp_11'] + $r_snp_7['snp_12']);
    $total_snp_8=($r_snp_8['snp_1'] + $r_snp_8['snp_2'] + $r_snp_8['snp_3'] + $r_snp_8['snp_4'] + $r_snp_8['snp_5'] + $r_snp_8['snp_6'] + $r_snp_8['snp_7'] + $r_snp_8['snp_8'] + $r_snp_8['snp_9'] + $r_snp_8['snp_10'] + $r_snp_8['snp_11'] + $r_snp_8['snp_12']);
    $akum_total_snp_1_8=($total_snp_1 + $total_snp_2 + $total_snp_3 + $total_snp_4 + $total_snp_5 + $total_snp_6 + $total_snp_7 + $total_snp_8);
    
    $akum_snp_1=($r_snp_1['snp_1'] + $r_snp_2['snp_1'] + $r_snp_3['snp_1'] + $r_snp_4['snp_1'] + $r_snp_5['snp_1'] + $r_snp_6['snp_1'] + $r_snp_7['snp_1'] + $r_snp_8['snp_1']);
    $akum_snp_2=($r_snp_1['snp_2'] + $r_snp_2['snp_2'] + $r_snp_3['snp_2'] + $r_snp_4['snp_2'] + $r_snp_5['snp_2'] + $r_snp_6['snp_2'] + $r_snp_7['snp_2'] + $r_snp_8['snp_2']);
    $akum_snp_3=($r_snp_1['snp_3'] + $r_snp_2['snp_3'] + $r_snp_3['snp_3'] + $r_snp_4['snp_3'] + $r_snp_5['snp_3'] + $r_snp_6['snp_3'] + $r_snp_7['snp_3'] + $r_snp_8['snp_3']);
    $akum_snp_4=($r_snp_1['snp_4'] + $r_snp_2['snp_4'] + $r_snp_3['snp_4'] + $r_snp_4['snp_4'] + $r_snp_5['snp_4'] + $r_snp_6['snp_4'] + $r_snp_7['snp_4'] + $r_snp_8['snp_4']);
    $akum_snp_5=($r_snp_1['snp_5'] + $r_snp_2['snp_5'] + $r_snp_3['snp_5'] + $r_snp_4['snp_5'] + $r_snp_5['snp_5'] + $r_snp_6['snp_5'] + $r_snp_7['snp_5'] + $r_snp_8['snp_5']);
    $akum_snp_6=($r_snp_1['snp_6'] + $r_snp_2['snp_6'] + $r_snp_3['snp_6'] + $r_snp_4['snp_6'] + $r_snp_5['snp_6'] + $r_snp_6['snp_6'] + $r_snp_7['snp_6'] + $r_snp_8['snp_6']);
    $akum_snp_7=($r_snp_1['snp_7'] + $r_snp_2['snp_7'] + $r_snp_3['snp_7'] + $r_snp_4['snp_7'] + $r_snp_5['snp_7'] + $r_snp_6['snp_7'] + $r_snp_7['snp_7'] + $r_snp_8['snp_7']);
    $akum_snp_8=($r_snp_1['snp_8'] + $r_snp_2['snp_8'] + $r_snp_3['snp_8'] + $r_snp_4['snp_8'] + $r_snp_5['snp_8'] + $r_snp_6['snp_8'] + $r_snp_7['snp_8'] + $r_snp_8['snp_8']);
    $akum_snp_9=($r_snp_1['snp_9'] + $r_snp_2['snp_9'] + $r_snp_3['snp_9'] + $r_snp_4['snp_9'] + $r_snp_5['snp_9'] + $r_snp_6['snp_9'] + $r_snp_7['snp_9'] + $r_snp_8['snp_9']);
    $akum_snp_10=($r_snp_1['snp_10'] + $r_snp_2['snp_10'] + $r_snp_3['snp_10'] + $r_snp_4['snp_10'] + $r_snp_5['snp_10'] + $r_snp_6['snp_10'] + $r_snp_7['snp_10'] + $r_snp_8['snp_10']);
    $akum_snp_11=($r_snp_1['snp_11'] + $r_snp_2['snp_11'] + $r_snp_3['snp_11'] + $r_snp_4['snp_11'] + $r_snp_5['snp_11'] + $r_snp_6['snp_11'] + $r_snp_7['snp_11'] + $r_snp_8['snp_11']);
    $akum_snp_12=($r_snp_1['snp_12'] + $r_snp_2['snp_12'] + $r_snp_3['snp_12'] + $r_snp_4['snp_12'] + $r_snp_5['snp_12'] + $r_snp_6['snp_12'] + $r_snp_7['snp_12'] + $r_snp_8['snp_12']);



    $no++;
    $tgl = $tgl_sah['tanggal_sah'];


    function tgl_indo($tgl){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tgl);
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
    }
?>
 
	<center>
		<p><h3>REKAPITULASI REALISASI PENGGUNAAN DANA BOS<br>
        PERIODE TANGGAL : <?php echo "$rsemseter[status]"?> ( <?php echo "$rsemseter[semester]"?> )<br>
        TAHUN ANGGARAN <?php echo "$rtapel[tapel]"?></h3></p>
	</center>

	<table>
    <tbody>
    <tr>
            <td>Nama Lembaga</td>
            <td>:</td>
            <td><b><?php echo "$sekolah"?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kelurahan : <?php echo "$ralamat[kelurahan]"?></td>
        </tr>
		<tr>
            <td>Kab./Kota</td>
            <td>:</td>
            <td>Pasuruan</td>
        </tr>
    </tbody>
	</table>
	<table border="1" width="100%" style="border-collapse:collapse;" align="center">
    	                            <tr>
										<th rowspan="2">No.</th>
                                        <th rowspan="2" width="250px" class="text-center">PROGRAM / KEG.</th>
                                        <th rowspan="2" class="text-center">PAGU</th>
                                        <th colspan="13" class="text-center">PENGGUNAAN DANA BOS SMK</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Pengembangan Perpustakaan</th>
                                        <th class="text-center">Penerimaan Peserta Didik Baru</th>
                                        <th class="text-center">Kegiatan Pembelajaran dan Ekstrakurikuler</th>
                                        <th class="text-center">Kegiatan Evaluasi Pembelajaran</th>
                                        <th class="text-center">Pengelolaan Sekolah</th>
                                        <th class="text-center">Pengembangan Profesi Guru dan Tenaga Kependidikan, serta Pengembangan Manajemen Sekolah</th>
                                        <th class="text-center">Langganan Daya dan Jasa</th>
                                        <th class="text-center">Pemeliharaan dan Perawatan Sarana dan Prasarana Sekolah</th>
                                        <th class="text-center">Pembayaran Honor</th>
                                        <th class="text-center">Pembelian Alat Multi Media Pembelajaran</th>
                                        <th class="text-center">Penyelenggaraan BKK SMALB, Prakerin atau PKL, dan Pemagangan</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">1</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">3</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">5</th>
                                        <th class="text-center">6</th>
                                        <th class="text-center">7</th>
                                        <th class="text-center">8</th>
                                        <th class="text-center">9</th>
                                        <th class="text-center">10</th>
                                        <th class="text-center">11</th>
                                        <th class="text-center">12</th>
                                        <th class="text-center">13</th>
                                        <th class="text-center">14</th>
                                        <th class="text-center">15</th>
                                    </tr>
                        <tr id="rowHover">
                                    <tr>
                                        <td>1</td>
                                        <td>Standar Komp. Lulusan</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_1[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_1", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Standar isi</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_2[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_3", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Standar proses</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_3[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_3", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Pengembangan pendidik dan tenaga Kependidikan</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_4[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_4", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Pengembangan sarana dan prasarana</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_5[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_5", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Standar pengelolaan</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_6[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_6", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Standar pembiayaan</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_7[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_7", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Pengembangan dan implementasi sistem penilaian</td>
                                        <td align=center><?php echo number_format((double)"$r_bos[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_1]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_2]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_3]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_4]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_5]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_6]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_7]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_8]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_9]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_10]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$r_snp_8[snp_12]", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_8", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align=center><b>J U M L A H</b></td>
                                        <td align=center><?php echo number_format((double)"$total_snp_1_8", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_1", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_2", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_3", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_4", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_5", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_6", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_7", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_8", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_9", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_10", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_snp_12", 0, ",", ".")?></td>
                                        <td align=center><?php echo number_format((double)"$akum_total_snp_1_8", 0, ",", ".")?></td>
                                    </tr>
                        </tr>
<?php
}
?>
    </table>
    <table>
    <tbody>
        <tr>
            <td><br></br></td>
            <td><br></br></td>
            <td><br></br></td>
        </tr>
        <tr>
            <td><p style="text-align: justify; text-indent: 0.5in;">Mengetahui,</p></td>
            <td><p style="text-align: justify; text-indent: 6.5in;">Pasuruan, <?php echo tgl_indo("$tgl")?></p></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 0.5in;">Kepala <?php echo "$sekolah"?></p></td>
            <td><p style="text-align: justify; text-indent: 6.5in;">Bendahara / Penanggungjawab Kegiatan</p></td>
        </tr>
		<tr>
            <td><br></br><br></br></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 0.5in;"><b><?php echo "$ralamat[nama_ks]"?></b></p></td>
            <td><p style="text-align: justify; text-indent: 6.5in;"><b><?php echo "$ralamat[nama]"?></b></p></td>
        </tr>
        <tr>
            <td><p style="text-align: justify; text-indent: 0.5in;">NIP. <?php echo "$ralamat[nip_ks]"?></p></td>
            <td><p style="text-align: justify; text-indent: 6.5in;">NIP. <?php echo "$ralamat[nip_ops]"?></p></td>
        </tr>
    </tbody>
	</table>
 
	<script>
		window.print();
	</script>
	
</body>
</html>