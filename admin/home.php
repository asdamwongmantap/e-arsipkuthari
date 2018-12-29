<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/arsip/aksi_arsip.php";
switch($_GET[aksi]){
default:
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Dashboard</div>
					<div class='panel-body'>
						<center><h2>SELAMAT DATANG</h2?
					</div>
				</div>
			</div>
		</div>";    

break;

			}//penutup switch
}//penutup session
?>    
</body>
</html>