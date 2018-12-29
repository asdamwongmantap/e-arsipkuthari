<?php
require_once("koneksi.php");  

// Cek email kustomer di database
$cek_email=mysql_num_rows(mysql_query("SELECT username FROM tbl_login WHERE username='$_POST[username]'"));
// Kalau email sudah ada yang pakai

if (empty($_POST['password'])){
  echo "<script>window.alert('Masukkan Password Baru Anda')</script>";
 echo "<meta http-equiv='refresh' content='0; url=lupapassword.php'>";
}

$username = $_POST['username'];
$password=$_POST['password'];

// simpan data kustomer 
mysql_query("UPDATE tbl_login SET password=md5('$password') where username='$username'");
			 
			 
 echo "<script>window.alert('Password Berhasil Di Ganti, Klik OK untuk melanjutkan')</script>";
 echo "<meta http-equiv='refresh' content='0; url=index.php'>";

?>