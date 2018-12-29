<?php
$hostmysql="localhost";
$username="root";
$password="";
$database="simarsip_kuthari";	

$conn=mysql_connect("$hostmysql","$username","$password");
if (!$conn) die("Gagal Melakukan Koneksi");              

mysql_select_db($database,$conn) or die ("Database Tidak Ditemukan diserver")
?>