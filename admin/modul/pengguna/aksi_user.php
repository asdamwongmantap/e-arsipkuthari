<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../../koneksi.php";
// include "../../../config/library.php";
// include "../../../config/fungsi_thumb.php";
// include "../../../config/fungsi_seo.php";

$p=$_GET[p];
$act=$_GET[act];

// Hapus Data Pengguna
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_login WHERE username='$_GET[id]'");
  header('location:../../media.php?p=pengguna');
}

// Input Data Pengguna
elseif ($act=='input'){
    mysql_query("INSERT INTO tbl_login(username,
                                    password,
                                    level) 
                            VALUES('$_POST[username]',
									md5('$_POST[password]'),                         
                                   '$_POST[level]')");
  header('location:../../media.php?p=pengguna');
  
}
elseif ($act=='update'){
    mysql_query("UPDATE tbl_login SET password = md5('$_POST[password]'),
                                   level = '$_POST[level]'
                             WHERE username   = '$_POST[id]'");
	header('location:../../media.php?p=pengguna');
							 }
	
}
?>