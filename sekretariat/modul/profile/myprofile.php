<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/pegawai/aksi_pegawai.php";
switch($_GET[aksi]){
default:
	$edit = mysql_query("SELECT * FROM tbl_pegawai WHERE nip='".$_SESSION['username']."'");
    $r    = mysql_fetch_array($edit);
	if ($r['jeniskelamin'] == "Pria")
{

    $option1 = "<input type=\"radio\" name=\"jeniskelamin\"
                value=\"Pria\" checked>";

    $option2 = "<input type=\"radio\" name=\"jeniskelamin\"
                value=\"Wanita\">";

}
// jika jenis kelamin Wanita, maka radiobutton Wanita
// dicek
else if ($r['jenis_kelamin'] == "Wanita")

     {
        $option1 = "<input type=\"radio\" name=\"jeniskelamin\"
                    value=\"Pria\" disabled>";
        $option2 = "<input type=\"radio\" name=\"jeniskelamin\"

                    value=\"Wanita\" checked disabled>";
     }
	echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>My Profile</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' enctype='multipart/form-data'>";
							echo "
							<table width='100%'>
							<tr><td width='20%' rowspan='3'>
								<div class='form-group'>
									<div style='border:1px solid black;margin-left:5px;margin-right:5px;margin-top:5px;margin-bottom:5px;height:150px;'><img src='img/iconuser.jpg' style='height:150px;'></div>
								</div></td><td>
								<div class='form-group' style='padding-left:20px;'>
									<label>NIP</label>
									<label>:</label>
									<label>$r[nip]</label>
								</div></td></tr>
								<tr><td>
								<div class='form-group' style='padding-left:20px;'>
									<label>Nama</label>
									<label>:</label>
									<label>$r[nama]</label>
								</div></td></tr>
								<tr><td>
								<div class='form-group' style='padding-left:20px;'>
									<label>Jenis Kelamin</label>
									<label>:</label>
									<label>$r[jenis_kelamin]</label>
								</div></td></tr>
								<tr><td>&nbsp</td><td>
								<div class='form-group' style='padding-left:20px;'>
									<label>Alamat</label>
									<label>:</label>
									<label>$r[alamat]</label>
								</div>
								<div class='form-group' style='padding-left:20px;'>
									<label>Kota</label>
									<label>:</label>
									<label>$r[kota]</label>
								</div>
								<div class='form-group' style='padding-left:20px;'>
									<label>Tempat Lahir</label>
									<label>:</label>
									<label>$r[tmpt_lahir]</label>
								</div>
								<div class='form-group' style='padding-left:20px;'>
									<label>Tanggal Lahir</label>
									<label>:</label>
									<label>$r[tgl_lahir]</label>
								</div>
								<div class='form-group' style='padding-left:20px;'>
									<label>Email</label>
									<label>:</label>
									<label>$r[email]</label>
								</div>
								<div class='form-group' style='padding-left:20px;'>
									<label>Jabatan</label>
									<label>:</label>
									<label>$r[jabatan]</label>
								</div>
								</td>
								</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class='dr'><span></span></div>";
echo "";
break;

			}//penutup switch
}//penutup session
?>    
</body>
</html>