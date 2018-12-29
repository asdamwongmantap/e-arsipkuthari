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
  mysql_query("DELETE FROM tbl_lokasiarsip WHERE kd_lokasiarsip='$_GET[id]'");
  header('location:../../media.php?p=lokasiarsip');
}

// Input Data Pengguna
elseif ($act=='input'){
    mysql_query("INSERT INTO tbl_lokasiarsip(kd_lokasiarsip,
                                    lokasiarsip) 
                            VALUES('$_POST[kd_lokasiarsip]',
									'$_POST[lokasiarsip]')");
  header('location:../../media.php?p=lokasiarsip');
  
}
elseif ($act=='update'){
    mysql_query("UPDATE tbl_lokasiarsip SET lokasiarsip = '$_POST[lokasiarsip]'
                                   WHERE kd_lokasiarsip   = '$_POST[id]'");
	header('location:../../media.php?p=lokasiarsip');
							 }
	
}
?>