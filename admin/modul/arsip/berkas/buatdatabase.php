<html>
<head>
<title>Cara Membuat Databasse</title>
<body>
<?php
include 'header.php';
?>
<table border="1" width="1343">
<tr>
	<td width="300"><a href="index.php"><center>Beranda</td>
	<td colspan="2" rowspan="15"><p><center><h1>Cara Membuat Database : </h1></center>
								<br> tuliskan : cd\ (apabila anda menaruh file webservernya di direktori c:)
								<br> lalu ketikkan cd xampp (disini saya memakai xampp sebagai webserver)
								<br> lalu ketikkan cd mysql
								<br> lalu ketikkan cd bin
								<br> lalu ketikkan mysql -u root -p
								<br> lalu tekan enter 2x
								<br> ketik tulisan ini di CMD Prompt : create database 2011_12_008;
								<br> lalu tekan enter
								<br> lalu ketik tulisan ini di CMD Prompt : use 2011_12_008;
								<br> kemudian kita buat tabel ktp dengan menuliskan : create table  ktp(
 nik varchar(8) not null,
 nama varchar(100) not null,
 tempatlahir varchar(25) not null,
 tanggallahir date not null,
 alamat text not null,
 agama varchar(20) not null,
 status varchar(25) not null,
 pekerjaan varchar(30) not null,
 kewarganegaraan varchar(3) not null,
 berlakuhingga date not null,
 primary key (nik));
<br> kemudian kita tekan enter
<br> lalu kita buat tabel kk dengan menuliskan :  create table kk(
 nokk varchar(8) not null,
 namakepalakeluarga varchar(50) not null,
 alamat text not null,
 kodepos varchar(5) not null,
 provinsi varchar(50) not null,
 primary key(nokk));
<br> lalu kita buat tabel kartukredit dengan menuliskan :  create table kartukredit(
 nokartu varchar(8) not null,
 namadepan varchar(25) not null,
 namabelakang varchar(25) not null,
 alamat text not null,
 provinsi varchar(20) not null,
 kodepos varchar(5) not null,
 notelp varchar(20) not null,
 email text not null,
 primary key (nokartu));
<br> dan akhirnya database pun selesai
	</td>
</tr>
<tr>
	<td><a href="jawabanno1.php"><center>Jawaban No 1</td>
</tr>
<tr>
	<td><a href="jawabanno2.php"><center>Jawaban No 2</td>
</tr>
<tr>
	<td height="30"><a href="ADMIN2/formdatapenduduk.php"><center>Data Penduduk</td>
</tr>
<tr>
	<td><a href="ADMIN2/formdatakartukeluarga.php"><center>Data Kartu Keluarga </td>
</tr>
<tr>
	<td><a href="ADMIN2/formdatakartukredit.php"><center>Data Kartu Kredit</td>
</tr>
<tr>
	<td><a href="buatdatabase.php"><center>Cara Membuat Database</td>
</tr>
<tr>
	<td><a href="ADMIN2/formdatadiri.php"><center>Data Diri</td>
</tr>
<tr>
	<td><a href="ADMIN2/formbukutamu.php"><center>Buku Tamu</td>
</tr>
<tr>
	<td><a href="ADMIN2/formpmb.php"><center>Pendaftaran Mahasiswa Baru</td>
</tr>
<tr>
	<td height="200"><center>IKLAN....</td>
</tr>
</table>
<?php
include 'footer.php';
?>
</body>
</head>
</html>