<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/arsip/aksi_arsip.php";
$unduh="modul/arsip/downloadarsip.php";
switch($_GET[aksi]){
default:
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Data Arsip Keseluruhan</div>
					<div class='panel-body'><a class='btn btn-warning' href='modul/laporan/laparsipall.php' style='float:right;color:#ffffff;font-weight:bold;font-family:verdana;'> Cetak Laporan Arsip Keseluruhan</a></div>
					<div class='panel-body'>
						<table data-toggle='table' data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' data-pagination='true' data-sort-name='tgl_arsip' data-sort-order='desc'>
						    <thead>
						    <tr>
						        <th data-field='state' data-checkbox='true' >No. Arsip</th>
						        <th data-field='no_arsip' data-sortable='true'>No. Arsip</th>
						        <th data-field='tgl_arsip'  data-sortable='true'>Tanggal</th>
						        <th data-field='perihal' data-sortable='true'>Perihal</th>
								<th data-field='nm_file' data-sortable='true'>File</th>
								<th data-field='lokasiarsip' data-sortable='true'>Lokasi</th>
								<th data-field='hapus' data-sortable='true'>Hapus</th>
						    </tr>
						    </thead>
							<tbody>";
							$tp=mysql_query('SELECT * FROM view_arsip ORDER BY no_arsip ASC');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td><a href='?p=arsip&aksi=edit&id=$r[no_arsip]'>$r[no_arsip]</a></td>
                                    <td>$r[tgl_arsip]</td>
									<td>$r[perihal]</td>
                                    <td>$r[nm_file]</td>
									<td>$r[lokasiarsip]</td>
                                    <td><a class='btn btn-danger' href='$aksi?act=hapus&id=$r[no_arsip]'>HAPUS</a>&nbsp;<a class='btn btn-primary' href='modul/arsip/berkas/$r[nm_file]'>Download</a></td>
                                </tr>";
							}
						echo "</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>";    

break;
case "tambah":
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Input Data Arsip</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/arsip/aksi_arsip.php?act=input' enctype='multipart/form-data'>";
							$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
					     $bln_skrg = $array_bulan[date('n')];
						//$bln_skrg = date("m");
						$thn_skrg = date ("Y");
						$nojawaban=mysql_query("select * from tbl_arsip order by no_arsip DESC LIMIT 0,1");
						$data=mysql_fetch_array($nojawaban);
						$kodeawal=$data['no_arsip']+1;
						if($kodeawal<10){
						$kode=$kodeawal.'/K1/'.$bln_skrg.'/'.$thn_skrg;
						}elseif($kodeawal > 9 && $kodeawal <=99){
						$kode=$kodeawal.'/K1/'.$bln_skrg.'/'.$thn_skrg;
						}else{
						$kode=$kodeawal.'/K1/'.$bln_skrg.'/'.$thn_skrg;}
						echo "
								<div class='form-group'>
									<label>Nomor Arsip</label>
									<input class='form-control' value='$kode' name='no_arsip'>
								</div>
								<div class='form-group'>
									<label>Tanggal</label>
									<input class='form-control'type='date' name='tgl_arsip' >
								</div>
								<div class='form-group'>
									<label>Perihal</label>
									<input class='form-control' name='perihal' >
								</div>
								<div class='form-group'>
									<label>Lampiran</label>
									<input class='form-control' name='lampiran' >
								</div>
								<div class='form-group'>
									<label>Jenis Arsip</label>
									<select class='form-control' name='kd_jenis' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Jenis Arsip -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_jenisarsip ORDER BY kd_jenis");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_jenis]>$r[desc_jenis]</option>";
										}                               
                       echo"</select>
								</div><div class='form-group'>
									<label>Lokasi Penyimpanan</label>
									<select class='form-control' name='kd_lokasiarsip' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Lokasi Penyimpanan -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_lokasiarsip ORDER BY kd_lokasiarsip");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[kd_lokasiarsip]>$r[lokasiarsip]</option>";
										}                               
                       echo"</select>
								</div><div class='form-group'>
									<label>Apakah Arsip Ini Adalah Arsip Masuk</label>
									<div class='span5'><input type='radio' name='a_masuk' value='Arsip Masuk'/> Ya
							<input type='radio' name='a_masuk' value='Arsip Keluar'/> Tidak</div>
								</div><div class='form-group'>
									<label>Upload File</label>
									<input type='file' name='berkas'>
									<br>* Apabila File tidak diubah, dikosongkan saja.</br>
								</div>
								<input type='hidden' value='".$_SESSION['username']."' name='nip'/>
								<input type='submit' class='btn btn-primary' value='Simpan'>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>";
echo "";
break;
case "edit":
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
					<div class='panel-heading'>Edit Data Arsip</div>
					<div class='panel-body'>
						<div class='col-md-6'>
		<form method='post' role='form' action='modul/arsip/aksi_arsip.php?act=update' enctype='multipart/form-data'>";
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
								<input type='submit' class='btn btn-primary' value='Simpan'>
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