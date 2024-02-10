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
</style>

<style type="text/css">
    body { font-family: "Calibri"; }
    p { font-family: "Calibri"; }
    div { font-family: "Calibri"; }
    </style>
    
</head>
<body onload="window.print();window.close();">

<?php 

$sql=mysql_query("select * from tb_realisasi where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
$rs=mysql_fetch_array($sql);{
    $sql=mysql_query("select * from tb_realisasi where idu='$_GET[idu]' and id_semester='1' and id_tapel='$_GET[id_tapel]'");
    $r_realisasi_2=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
    $rsemseter=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
    $rtapel=mysql_fetch_array($sql);

    $sql=mysql_query("select * from user_sekolah where idu='$_GET[idu]'");
    $ralamat=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_rkas where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $rkas=mysql_fetch_array($sql);
    $sql=mysql_query("select * from tb_rkas where idu='$_GET[idu]' and id_semester='1' and id_tapel='$_GET[id_tapel]'");
    $rkas_2=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tgl where id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $tgl_sah=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_dana_bos where idu='$_GET[idu]' and id_tapel='$_GET[id_tapel]'");
    $r_bos=mysql_fetch_array($sql);
    }

    $tgl = $tgl_sah['tanggal_sah'];$tgl = $tgl_sah['tanggal_sah'];

    $total_belanja_pegawai =($r_bos['belanja_pegawai'] - $rs['belanja_pegawai']);
    $total_belanja_barang =($r_bos['belanja_barang'] - $rs['belanja_barang']);
    $total_belanja_alat =($r_bos['belanja_modal_alat'] - $rs['belanja_modal_alat']);
    $total_belanja_aset =($r_bos['belanja_modal_aset'] - $rs['belanja_modal_aset']);
    $total_belanja_all = ( $total_belanja_pegawai +  $total_belanja_barang +  $total_belanja_alat +  $total_belanja_aset);

    $total_anggaran=($r_bos['belanja_pegawai'] + $r_bos['belanja_barang'] + $r_bos['belanja_modal_alat'] + $r_bos['belanja_modal_aset']);
    $total_anggaran_triwulan=($rs['belanja_pegawai'] + $rs['belanja_barang'] + $rs['belanja_modal_alat'] + $rs['belanja_modal_aset']);
    $total_anggaran_triwulan_lalu=($r_realisasi_2['belanja_pegawai'] + $r_realisasi_2['belanja_barang'] + $r_realisasi_2['belanja_modal_alat'] + $r_realisasi_2['belanja_modal_aset']);

    $sisa_guna_bos=($rkas['akum_bos_lalu_ini'] - $total_anggaran_triwulan);
    $sisa_guna_bos_2=($rkas_2['dana_bos_triwulan'] - $total_anggaran_triwulan_lalu);

    $tambah_guna_bos_tw_1_2=($rkas['dana_bos_triwulan'] + $rkas_2['dana_bos_triwulan']);
    $sanding_guna_bos_tw_2=($r_bos['dana'] - $tambah_guna_bos_tw_1_2);
    $sanding_triwulan_lalu_ini=($rkas['dana_bos_triwulan_lalu'] + $rkas['dana_bos_triwulan']);

    $sanding_belanja_pegawai=($r_realisasi_2['belanja_pegawai'] + $rs['belanja_pegawai']);
    $sanding_belanja_barang=($r_realisasi_2['belanja_barang'] + $rs['belanja_barang']);
    $sanding_belanja_alat=($r_realisasi_2['belanja_modal_alat'] + $rs['belanja_modal_alat']);
    $sanding_belanja_aset=($r_realisasi_2['belanja_modal_aset'] + $rs['belanja_modal_aset']);
    $total_sanding_belanja=($sanding_belanja_pegawai + $sanding_belanja_barang + $sanding_belanja_alat + $sanding_belanja_aset);
    $sanding_belanja_pegawai_bos=($r_bos['belanja_pegawai'] - $sanding_belanja_pegawai);
    $sanding_belanja_barang_bos=($r_bos['belanja_barang'] - $sanding_belanja_barang);
    $sanding_belanja_alat_bos=($r_bos['belanja_modal_alat'] - $sanding_belanja_alat);
    $sanding_belanja_aset_bos=($r_bos['belanja_modal_aset'] - $sanding_belanja_aset);
    $total_sanding_belanja_bos_1_2=($sanding_belanja_pegawai_bos + $sanding_belanja_barang_bos + $sanding_belanja_alat_bos + $sanding_belanja_aset_bos);
    $sanding_total_sanding_belanja_bos_1_2=($r_bos['dana'] - $total_sanding_belanja_bos_1_2);
    $sanding_total_triwulan_lalu_ini=($sanding_triwulan_lalu_ini - $total_anggaran_triwulan);


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
    <table>
    <tbody>
		<tr>
            <td style="text-align: center;"><font face="Arial Black">REALISASI PENGGUNAAN</td></font>
        </tr>
		<tr>
            <td style="text-align: center;"><font face="Arial Black">DANA BANTUAN OPERASIONAL SEKOLAH (BOS)</td></font>
        </tr>
        <tr>
            <td style="text-align: center;">TAHUN ANGGARAN <?php echo "$rtapel[tapel]"?></td>
        </tr>
        <tr>
            <td style="text-align: center;">Pada <?php echo "$rsemseter[semester]"?></td>
        </tr>
    </tbody>
	</table>
	</center>
    <hr>
    <br>

	<table>
    <tbody>
        <tr>
            <td>Nama Lembaga</td>
            <td>:</td>
            <td><b><?php echo "$sekolah"?></b></td>
        </tr>
		<tr>
            <td>Kelurahan</td>
            <td>:</td>
            <td><?php echo "$ralamat[kelurahan]"?></td>
        </tr>
		<tr>
            <td>Kab./Kota</td>
            <td>:</td>
            <td>Pasuruan</td>
        </tr>
		<tr>
            <td>Provinsi</td>
            <td>:</td>
            <td>Jawa Timur<td>
        </tr>
    </tbody>
	</table>

	<br></br>
	
	<table border="1" width="100%" style="border-collapse:collapse;" align="center">
    	<tr>
										<th>No.</th>
                                        <th width="250px" class="text-center">URAIAN</th>
                                        <th class="text-center">JUMLAH ANGGARAN</th>
                                        <th class="text-center">REALISASI S.D TRIWULAN LALU</th>
                                        <th class="text-center">REALISASI TRIWULAN INI</th>
                                        <th class="text-center">JUMLAH REALISASI S.D TRIWULAN INI</th>
                                        <th class="text-center">SELISIH</th>
        </tr>
		<tr>
                                        <th class="text-center">1</th>
                                        <th class="text-center">2</th>
                                        <th class="text-center">3</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">5</th>
                                        <th class="text-center">6</th>
                                        <th class="text-center">7</th>
        </tr>
        <tr id="rowHover">
        <tr>
                                        
                                        <td colspan="7"><strong>A. PENERIMAAN</strong></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Saldo Awal</td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Bantuan Operasional Sekolah</td>
                                        <td align="right"><?php echo number_format((double)"$r_bos[dana]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$rkas_2[dana_bos_triwulan]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double) "$rkas[dana_bos_triwulan]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double) "$tambah_guna_bos_tw_1_2", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double) "$sanding_guna_bos_tw_2", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Saldo Triwulan sebelumnya</td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                        <td align="right"><?php echo number_format((double) "$rkas[dana_bos_triwulan_lalu]", 0, ",", ".")?></td>
                                        <td align="right"></td>
                                        <td align="right"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>TOTAL PENERIMAAN</strong></td>
                                        <td align="right"> <?php echo number_format((double)"$r_bos[dana]", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double) "$rkas_2[dana_bos_triwulan]", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double) "$sanding_triwulan_lalu_ini", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double) "$tambah_guna_bos_tw_1_2", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double) "$sanding_guna_bos_tw_2", 0, ",", ".")?></td>
                                    </tr>
        </tr>

		<tr>
                                        
                                        <td colspan="7"><strong>B. PENGELUARAN</strong></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Belanja Pegawai</td>
                                        <td align="right"><?php echo number_format((double)"$r_bos[belanja_pegawai]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$r_realisasi_2[belanja_pegawai]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$rs[belanja_pegawai]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_pegawai", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_pegawai_bos", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Belanja Barang dan Jasa BOS</td>
                                        <td align="right"><?php echo number_format((double)"$r_bos[belanja_barang]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$r_realisasi_2[belanja_barang]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$rs[belanja_barang]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_barang", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_barang_bos", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td rowspan="2">3</td>
                                        <td>Belanja Modal Peralatan dan Mesin</td>
                                        <td align="right"><?php echo number_format((double)"$r_bos[belanja_modal_alat]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$r_realisasi_2[belanja_modal_alat]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$rs[belanja_modal_alat]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_alat", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_alat_bos", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        
                                        <td>Belanja Modal Aset Tetap Lainnya</td>
                                        <td align="right"><?php echo number_format((double)"$r_bos[belanja_modal_aset]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$r_realisasi_2[belanja_modal_aset]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$rs[belanja_modal_aset]", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_aset", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_belanja_aset_bos", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>TOTAL PENGGUNAAN</strong></td>
                                        <td align="right"> <?php echo number_format((double)"$total_anggaran", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double)"$total_anggaran_triwulan_lalu", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double)"$total_anggaran_triwulan", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double)"$total_sanding_belanja", 0, ",", ".")?></td>
                                        <td align="right"> <?php echo number_format((double)"$total_sanding_belanja_bos_1_2", 0, ",", ".")?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" rowspan><strong>C. SALDO DANA SAAT INI</strong></td>
                                        <td align="right"><?php echo number_format((double)"$sisa_guna_bos_2", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sanding_total_triwulan_lalu_ini", 0, ",", ".")?></td>
                                        <td align="right"><?php echo number_format((double)"$sisa_guna_bos", 0, ",", ".")?></td>
                                        <td align="right"></td>
                                    </tr>
        </tr>
    </table>
    <table>
    <tbody>
        <tr>
            <td><br></br></td>
            <td><br></br></td>
            <td><br></br></td>
            <td><br></br></td>
            <td><br></br></td>
        </tr>
        <tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">Pasuruan, <?php echo tgl_indo("$tgl")?></p></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">Kepala <?php echo "$sekolah"?></p></td>
        </tr>
		<tr>
            <td><br></br><br></br><br></br></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 3.5in;"><b><?php echo "$ralamat[nama_ks]"?></b></p></td>
        </tr>
        <tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">NIP. <?php echo "$ralamat[nip_ks]"?></p></td>
        </tr>
    </tbody>
	</table>
 
	<script>
		window.print();
	</script>
	
</body>
</html>