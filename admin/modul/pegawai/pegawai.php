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
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Data Pegawai</div>
					<div class='panel-body'><a class='btn btn-success' href='?p=pegawai&aksi=tambah' style='float:right;color:#ffffff;font-weight:bold;font-family:verdana;'> Tambah Data</a></div>
					<div class='panel-body'>
						<table data-toggle='table' data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' data-pagination='true' data-sort-name='lokasiarsip' data-sort-order='desc'>
						    <thead>
						    <tr>
						        <th data-field='state' data-checkbox='true' >NIP</th>
									<th data-field='nip' data-sortable='true'>NIP</th>
                                    <th data-field='nama' data-sortable='true'>Nama Pegawai</th>
                                    <th data-field='jenis_kelamin' data-sortable='true'>Jenis Kelamin</th>
                                    <th data-field='kota' data-sortable='true'>Kota</th>
									<th data-field='tmpt_lahir' data-sortable='true'>Tempat Lahir</th>
									<th data-field='tgl_lahir' data-sortable='true'>Tanggal Lahir</th>
									<th data-field='email' data-sortable='true'>Email</th>
									<th data-field='jabatan' data-sortable='true'>Jabatan</th>
						        <th data-field='hapus' data-sortable='true'>Hapus</th>
						    </tr>
						    </thead>
							<tbody>";
							$tp=mysql_query('SELECT * FROM tbl_pegawai ORDER BY nip ASC');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td><a href='?p=pegawai&aksi=edit&id=$r[nip]'>$r[nip]</a></td>
                                    <td>$r[nama]</td>
                                    <td>$r[jenis_kelamin]</td>
                                    <td>$r[kota]</td>
									<td>$r[tmpt_lahir]</td>
									<td>$r[tgl_lahir]</td>
									<td>$r[email]</td>
									<td>$r[jabatan]</td>
									<td><a class='btn btn-danger' href='$aksi?act=hapus&id=$r[nip]'>HAPUS</a></td>
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
					<div class='panel-heading'>Input Data Pegawai</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/pegawai/aksi_pegawai.php?act=input' enctype='multipart/form-data'>";
							echo "
								<div class='form-group'>
									<label>NIP</label>
									<input class='form-control' name='nip'>
								</div>
								<div class='form-group'>
									<label>Nama</label>
									<input class='form-control' name='nama' >
								</div>
								<div class='form-group'>
									<label>Jenis Kelamin</label>
									<div class='span9'><input type='radio' name='jeniskelamin' value='Pria'/> Pria
							<input type='radio' name='jeniskelamin' value='Wanita'/> Wanita</div>
								</div>
								<div class='form-group'>
									<label>Alamat</label>
									<input class='form-control' name='alamat' >
								</div>
								<div class='form-group'>
									<label>Kota</label>
									<input class='form-control' name='kota'>
								</div>
								<div class='form-group'>
									<label>Tempat Lahir</label>
									<input class='form-control' name='tmpt_lahir' >
								</div>
								<div class='form-group'>
									<label>Tanggal Lahir</label>
									<input class='form-control' name='tgl_lahir'><font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font>
								</div>
								<div class='form-group'>
									<label>Email</label>
									<input class='form-control' type='email' name='email' >
								</div>
								<div class='form-group'>
									<label>Jabatan</label>
									<input class='form-control' name='jabatan' >
								</div>
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
	$edit = mysql_query("SELECT * FROM tbl_pegawai WHERE nip='$_GET[id]'");
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

                    value=\"Pria\">";
        $option2 = "<input type=\"radio\" name=\"jeniskelamin\"

                    value=\"Wanita\" checked>";
     }
	echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Edit Data Pegawai</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/pegawai/aksi_pegawai.php?act=update' enctype='multipart/form-data'>";
							echo "
								<input type=hidden name=id value=$r[nip]>
								<div class='form-group'>
									<label>Nama</label>
									<input class='form-control' name='nama' value='$r[nama]'>
								</div>
								<div class='form-group'>
									<label>Jenis Kelamin</label>
									<div class='span9'>".$option1." Pria 
									".$option2." Wanita 
							</div>
								</div>
								<div class='form-group'>
									<label>Alamat</label>
									<input class='form-control' name='alamat' value='$r[alamat]'>
								</div>
								<div class='form-group'>
									<label>Kota</label>
									<input class='form-control' name='kota' value='$r[kota]'>
								</div>
								<div class='form-group'>
									<label>Tempat Lahir</label>
									<input class='form-control' name='tmpt_lahir' value='$r[tmpt_lahir]'>
								</div>
								<div class='form-group'>
									<label>Tanggal Lahir</label>
									<input class='form-control' name='tgl_lahir' value='$r[tgl_lahir]'><font style='font-style:italic;font-size:0.9em;'>Tahun-Bulan-Tanggal</font>
								</div>
								<div class='form-group'>
									<label>Email</label>
									<input class='form-control' type='email' name='email' value='$r[email]'>
								</div>
								<div class='form-group'>
									<label>Jabatan</label>
									<select class='form-control' name='jabatan' id='s2_1' style='width: 100%;'>";
								  $tampil=mysql_query("SELECT * FROM tbl_pegawai GROUP BY jabatan ORDER BY jabatan");
								  if ($r[jabatan]==0){
									echo "<option value=0 selected>- Pilih Jabatan -</option>";
								  }   
								  
                                  while($w=mysql_fetch_array($tampil)){
									if ($r[jabatan]==$w[jabatan]){
									  echo "<option value=$r[jabatan] selected>$r[jabatan]</option>";
									}
									else{
									  echo "<option value=$w[jabatan] selected>$w[jabatan]</option>";
									}
								  }                                
                       echo"</select>
								</div>
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