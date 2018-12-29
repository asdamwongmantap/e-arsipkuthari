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

// Hapus Data Kelas
if ($act=='hapus'){
  mysql_query("DELETE FROM tbl_arsip WHERE no_arsip='$_GET[id]'");
  header('location:../../media.php?p=arsip');
}

// Input Data Kelas
elseif ($act=='input'){


$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
$lokasi_file    = $_FILES['berkas']['tmp_name'];

  
   
     mysql_query("INSERT INTO tbl_arsip(no_arsip,
                                    tgl_arsip,
                                    perihal,
                                    lampiran,
                                    kd_jenis,
									nip,
									kd_lokasiarsip,
									nm_file,
									a_masuk) 
                            VALUES('$_POST[no_arsip]',
									'$_POST[tgl_arsip]',
                                   '$_POST[perihal]',                     
                                   '$_POST[lampiran]',
                                   '$_POST[kd_jenis]',
								   '$_POST[nip]',
								   '$_POST[kd_lokasiarsip]',
								   '$nama_file',
								   '$_POST[a_masuk]')");
								   
  move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  echo "<script>alert('Upload Arsip berhasil'); window.location = 'media.php?hal=arsip'</script>";
  header('location:../../media.php?p=arsip');
  
 }


 
// Update Data Kelas
elseif ($act=='update'){
	$tipe  = $_FILES['berkas']['type'];
$ukuran = $_FILES['berkas']['size'];
$nama_file = $_FILES['berkas']['name'];
$lokasi_file    = $_FILES['berkas']['tmp_name'];
// Apabila File tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE tbl_arsip SET tgl_arsip = '$_POST[tgl_arsip]',
                                   perihal      = '$_POST[perihal]',
                                  lampiran  = '$_POST[lampiran]',
                                  kd_jenis = '$_POST[kd_jenis]',
                                  nip = '$_POST[nip]',
								  kd_lokasiarsip = '$_POST[kd_lokasiarsip]',
                                   a_masuk = '$_POST[a_masuk]'
                             WHERE no_arsip   = '$_POST[no_arsip]'");
    header('location:../../media.php?p=arsip');
	}
	else
	{
	  mysql_query("UPDATE tbl_arsip SET tgl_arsip = '$_POST[tgl_arsip]',
                                   perihal      = '$_POST[perihal]',
                                  lampiran  = '$_POST[lampiran]',
                                  kd_jenis = '$_POST[kd_jenis]',
                                  nip = '$_POST[nip]',
								  kd_lokasiarsip = '$_POST[kd_lokasiarsip]',
								  nm_file = '$nama_file',
                                   a_masuk = '$_POST[a_masuk]'
                             WHERE no_arsip   = '$_POST[no_arsip]'");
	 move_uploaded_file($_FILES['berkas']['tmp_name'], 'berkas/'.$_FILES['berkas']['name']);
  header('location:../../media.php?p=arsip');
	
	}
	
}
}
?>
