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
			.text_content{
				text-indent: 40px;
			}
            .text_content1{
				text-indent: 120px;
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

    $sql=mysql_query("select * from tb_semester where id_semester='$_GET[id_semester]'");
    $rsemseter=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tapel where id_tapel='$_GET[id_tapel]'");
    $rtapel=mysql_fetch_array($sql);

    $sql=mysql_query("select * from user_sekolah where idu='$_GET[idu]'");
    $user_sekolah=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_tgl where id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $tgl_sah=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_sptjm where id_sp='$_GET[id_sp]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $tgl_sptjm=mysql_fetch_array($sql);

    $sql=mysql_query("select * from tb_rkas where idu='$_GET[idu]' and id_semester='$_GET[id_semester]' and id_tapel='$_GET[id_tapel]'");
    $r_tri_1=mysql_fetch_array($sql);

    $uang_sisa=$tgl_sptjm['sisa_tunai'];
    $uang_bank=$tgl_sptjm['sisa_bank'];
    $akum_sisa_dana=($uang_sisa + $uang_bank);
    }

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
    <img src="../../modules/file_sk/<?php echo"$user_sekolah[file_data]";?>" width="680px" height="97px">
    </center>
	<center>
    <table>
    <tbody>
		<tr>
            <td style="text-align: center;"><font face="Arial Black"><u>SURAT PERNYATAAN TANGGUNG JAWAB MUTLAK</u></td></font>
        </tr>
		<tr>
            <td style="text-align: center;">No. <?php echo "$tgl_sptjm[no_surat]"?></td>
        </tr>
    </tbody>
	</table>
	</center>
    <br>
    <table>
    <tbody>
		<tr>
            <td>Nama Lembaga&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>:</td>
            <td><?php echo "$sekolah"?></td>
        </tr>
		<tr>
            <td>NPSN</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>:</td>
            <td><?php echo "$user_sekolah[npsn]"?><td>
        </tr>
    </tbody>
	</table>

    <p class="text_content" style="text-align: justify;">Saya yang bertanda tangan dibawah ini menyatakan bahwa bertanggung jawab 
    secara formal dan material atas kebenaran realisasi penerimaan 
    dan pengeluaran Dana BOS serta kebenaran perhitungan dan setoran pajak yang telah dipungut atas penggunaan Dana BOS pada <?php echo "$rsemseter[semester]"?> tahun anggaran <?php echo "$rtapel[tapel]"?> dengan rincian sebagai berikut :</p>
    <table>
    <tbody>
    <b>A. Penerimaan Dana BOS</b>
        <tr>
            <td>1).</td>
            <td>Triwulan 1 (satu)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$r_tri_1[akum_bos_lalu_ini]", 0, ",", ".")?></td>
        </tr>
		<tr>
            <td>2).</td>
            <td>Triwulan 2 (dua)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right">0</td>
        </tr>
        <tr>
            <td>3).</td>
            <td>Triwulan 3 (tiga)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right">0</td>
        </tr>
        <tr>
            <td>4).</td>
            <td>Triwulan 4 (empat)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right">0</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>____________________</td>
            <td>__+</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>JUMLAH</td>
            <td></td>
            <td >Rp. <?php echo number_format((double)"$r_tri_1[akum_bos_lalu_ini]", 0, ",", ".")?></td>
        </tr>
    </tbody>
	</table>
<br>
<table>
    <tbody>
    <b>B. Pengeluaran Dana BOS</b>
        <tr>
            <td>1).</td>
            <td>Belanja Pegawai</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$rs[belanja_pegawai]", 0, ",", ".")?></td>
        </tr>
		<tr>
            <td>2).</td>
            <td>Belanja Barang Jasa</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$rs[belanja_barang]", 0, ",", ".")?></td>
        </tr>
        <tr>
            <td>3).</td>
            <td>Belanja Modal Alat & Mesin</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$rs[belanja_modal_alat]", 0, ",", ".")?></td>
        </tr>
        <tr>
            <td>4).</td>
            <td>Belanja Modal Aset Lainnya</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$rs[belanja_modal_aset]", 0, ",", ".")?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>____________________</td>
            <td>__+</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>JUMLAH</td>
            <td></td>
            <td >Rp. <?php echo number_format((double)"$rs[total]", 0, ",", ".")?></td>
        </tr>
    </tbody>
	</table>
    <br>
    <table>
    <tbody>
    <b>C. Sisa Dana Bos</b>
        <tr>
            <td>1).</td>
            <td>Sisa Kas Tunai&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$tgl_sptjm[sisa_tunai]", 0, ",", ".")?></td>
        </tr>
		<tr>
            <td>2).</td>
            <td>Sisa di Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td>:</td>
            <td></td>
            <td>Rp.</td>
            <td style="text-align: right"><?php echo number_format((double)"$tgl_sptjm[sisa_bank]", 0, ",", ".")?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>____________________</td>
            <td>__+</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>JUMLAH</td>
            <td></td>
            <td >Rp. <?php echo number_format((double)"$akum_sisa_dana", 0, ",", ".")?></td>
        </tr>
    </tbody>
	</table>

    <p class="text_content" style="text-align: justify;">Bukti-bukti atas belanja tersebut pada huruf B disimpan pada Lembaga
     untuk kelengkapan administrasi dan keperluan pemeriksaan sesuai peraturan perundang-undangan. Apabila bukti-bukti tersebut 
     tidak benar yang mengakibatkan kerugian daerah, 
    saya bertanggungjawab sepenuhnya atas kerugian daerah dimaksud sesuai kewenangan saya berdasarkan ketentuan perundang-undangan. </p>
    <p class="text_content" style="text-align: justify;"> Demikian surat pernyataan ini dibuat dengan 
    sebenarnya dan bermaterai cukup untuk dipergunakan sebagaimana mestinya.</p>

    <table>
    <tbody>
        <tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">Pasuruan, <?php echo tgl_indo("$tgl")?></p></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">Kepala <?php echo "$sekolah"?></p></td>
        </tr>
		<tr>
            <td><br></br><br></br></td>
        </tr>
		<tr>
            <td><p style="text-align: justify; text-indent: 3.5in;"><b><?php echo "$user_sekolah[nama_ks]"?></b></p></td>
        </tr>
        <tr>
            <td><p style="text-align: justify; text-indent: 3.5in;">NIP. <?php echo "$user_sekolah[nip_ks]"?></p></td>
        </tr>
    </tbody>
	</table>
    
 
	<script>
		window.print();
	</script>
	
</body>
</html>