<?php
include "/config/koneksi.php";
$direktori = "/berkas/"; // folder tempat penyimpanan file yang boleh didownload

$data = mysql_query ("select*from tbl_arsip where no_arsip=" . $_REQUEST['id']);
if ($row = mysql_fetch_assoc($data)) {
$filename = $row['nm_file']; 
 }

 header("Content-Disposition: attachment; filename=\"".basename($filename)."\";" );
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".filesize($direktori.$filename));
  readfile("$direktori$filename");

 exit();
?>