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
	$edit = mysql_query("SELECT * FROM view_arsip WHERE no_arsip='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	if ($r['a_masuk'] == "Arsip Masuk")
{

    $option1 = "<input type=\"radio\" name=\"a_masuk\"
                value=\"Arsip Masuk\" checked>";

    $option2 = "<input type=\"radio\" name=\"a_masuk\"
                value=\"Arsip Keluar\">";

}

else if ($r['a_masuk'] == "Arsip Keluar")

     {
        $option1 = "<input type=\"radio\" name=\"a_masuk\"

                    value=\"Arsip Masuk\">";
        $option2 = "<input type=\"radio\" name=\"a_masuk\"

                    value=\"Arsip Keluar\" checked>";
     }
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Rincian Data Arsip</div>
					<div class='panel-body'>
						<div class='col-md-6'>
		<form method='post' role='form' action='modul/laporan/disposisi.php' enctype='multipart/form-data'>";
						echo "
								<div class='form-group'>
									<label>Nomor Arsip</label>
									<input class='form-control' value='$r[no_arsip]' name='no_arsip'>
								</div>
								<div class='form-group'>
									<label>Tanggal</label>
									<input class='form-control'type='date' value='$r[tgl_arsip]' name='tgl_arsip' >
								</div>
								<div class='form-group'>
									<label>Perihal</label>
									<input class='form-control' name='perihal' value='$r[perihal]'>
								</div>
								<div class='form-group'>
									<label>Lampiran</label>
									<input class='form-control' name='lampiran' value='$r[lampiran]'>
								</div>
								<div class='form-group'>
									<label>Jenis Arsip</label>
									<select class='form-control' name='kd_jenis' id='s2_1' style='width: 100%;'>";
										 $tampil=mysql_query("SELECT * FROM tbl_jenisarsip ORDER BY kd_jenis");
								  if ($r[kd_jenis]==0){
									echo "<option value=0 selected>- Pilih Jenis Surat -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_jenis]==$w[kd_jenis]){
									  echo "<option value=$r[kd_jenis] selected>$r[desc_jenis]</option>";
									}
									else{
									  echo "<option value=$w[kd_jenis] selected>$w[desc_jenis]</option>";
									}
								  }                           
                       echo"</select>
								</div><div class='form-group'>
									<label>Lokasi Penyimpanan</label>
									<select class='form-control' name='kd_lokasiarsip' id='s2_1' style='width: 100%;'>
								  ";
										$tampil=mysql_query("SELECT * FROM tbl_lokasiarsip ORDER BY kd_lokasiarsip");
								  if ($r[kd_jenis]==0){
									echo "<option value=0 selected>- Pilih Lokasi Penyimpanan -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[kd_lokasiarsip]==$w[kd_lokasiarsip]){
									  echo "<option value=$r[kd_lokasiarsip] selected>$r[lokasiarsip]</option>";
									}
									else{
									  echo "<option value=$w[kd_lokasiarsip] selected>$w[lokasiarsip]</option>";
									}
								  }                           
                       echo"</select>
								</div><div class='form-group'>
									<label>Apakah Arsip Ini Adalah Arsip Masuk</label>
									<div class='span5'>".$option1." Ya 
							".$option2." Tidak
							</div>
								</div><div class='form-group'>
									<label>Upload File</label>
									<input type='file' name='berkas'><br>$r[nm_file]</br>
									<br>* Apabila File tidak diubah, dikosongkan saja.</br>
								</div>
								<input type='hidden' value='$r[nip]' name='nip'/>
								<input type='submit' class='btn btn-primary' value='Cetak Lembar Disposisi'>
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