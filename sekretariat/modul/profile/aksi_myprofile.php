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

// Hapus Data Pegawai
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_pegawai WHERE nip='$_GET[id]'");
  header('location:../../media.php?p=pegawai');
}

// Input Data Pegawai
elseif ($act=='input'){
   
    mysql_query("INSERT INTO tbl_pegawai(nip,
                                    nama,
                                    jenis_kelamin,
                                    alamat,
                                    kota,
                                    tmpt_lahir,
									tgl_lahir,
                                    email,
                                    jabatan) 
                            VALUES('$_POST[nip]',
									'$_POST[nama]',
                                   '$_POST[jeniskelamin]',
                                   '$_POST[alamat]',                           
                                   '$_POST[kota]',
                                   '$_POST[tmpt_lahir]',
								   '$_POST[tgl_lahir]',                           
                                   '$_POST[email]',
                                   '$_POST[jabatan]')");
  header('location:../../media.php?p=pegawai');
  
}

// Update Data Kelas
elseif ($act=='update'){
    mysql_query("UPDATE tbl_pegawai SET nama = '$_POST[nama]',
                                   jenis_kelamin = '$_POST[jeniskelamin]',
                                   alamat       = '$_POST[alamat]',
                                   kota      = '$_POST[kota]',
                                   tmpt_lahir  = '$_POST[tmpt_lahir]',
								   tgl_lahir       = '$_POST[tgl_lahir]',
                                   email      = '$_POST[email]',
                                   jabatan    = '$_POST[jabatan]'
                             WHERE nip   = '$_POST[id]'");
    header('location:../../media.php?p=pegawai');
}
}
?>
