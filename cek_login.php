<?php
include "config/conn.php";

$pass=$_POST['password'];

$user=$_POST['username'];

	$sql=mysql_query("select * from user where nama='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
		if($count>0){
			session_start();
				$_SESSION['idu']=$rs['idu'];
				$_SESSION['nama_id']=$rs['nama_id'];
				$_SESSION['nama']=$rs['nama'];
				$_SESSION['jabatan']=$rs['jabatan'];
				$_SESSION['level']=$rs['level'];
				$_SESSION['jenjang']=$rs['jenjang'];
				$_SESSION['id']=$rs['id'];

			header('location:media');
			
		}else{
			
			$gr=($_POST['password']);
			$sqlz=mysql_query("select * from user_sekolah where nip='$user' and pass='$gr' and stts='1'");
			$countz=mysql_num_rows($sqlz);
			$rsz=mysql_fetch_array($sqlz);
		if($countz>0){
					session_start();
						$_SESSION['idu']=$rsz['idu'];
						$_SESSION['nip']=$rsz['nip'];
						$_SESSION['nama']=$rsz['nama'];
						$_SESSION['jabatan']=$rsz['jabatan'];
						$_SESSION['level']="user";
						$_SESSION['jenjang']="smk";
						$_SESSION['sekolah']=$rsz['sekolah'];
						$_SESSION['jenjang']=$rsz['jenjang'];
		
		  
		
					header('location:home');

}else{
	
			header('location:salah_pass');	
}
}
?>