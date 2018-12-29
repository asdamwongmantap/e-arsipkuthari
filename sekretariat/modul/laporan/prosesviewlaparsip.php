<?php
include "../../../koneksi.php";
?>

  
  <?php
		$LAP=$_POST['lap'];		
		if ($LAP=='Laporan Arsip Keseluruhan')
		{
		
		header('location:laparsipall.php');
		
		}
		elseif ($LAP=='Laporan Arsip Masuk')
		{
		
		header('location:laparsipmasuk.php');
		
		}
		elseif ($LAP=='Laporan Arsip Keluar')
		{
		
		header('location:laparsipkeluar.php');
		
		}
		
		?>