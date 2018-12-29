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
  mysql_query("DELETE FROM tbl_jenisarsip WHERE kd_jenis='$_GET[id]'");
  header('location:../../media.php?p=jenisarsip');
}

// Input Data Pengguna
elseif ($act=='input'){
    mysql_query("INSERT INTO tbl_jenisarsip(kd_jenis,
                                    desc_jenis) 
                            VALUES('$_POST[kd_jenis]',
									'$_POST[desc_jenis]')");
  header('location:../../media.php?p=jenisarsip');
  
}
elseif ($act=='update'){
    mysql_query("UPDATE tbl_jenisarsip SET desc_jenis = '$_POST[desc_jenis]'
                                   WHERE kd_jenis   = '$_POST[id]'");
	header('location:../../media.php?p=jenisarsip');
							 }
	
}
?>