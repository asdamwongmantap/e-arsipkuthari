<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/pengguna/aksi_user.php";
switch($_GET[aksi]){
default:
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Data Pengguna</div>
					<div class='panel-body'><a class='btn btn-success' href='?p=pengguna&aksi=tambah' style='float:right;color:#ffffff;font-weight:bold;font-family:verdana;'> Tambah Data</a></div>
					<div class='panel-body'>
						<table data-toggle='table' data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' data-pagination='true' data-sort-name='desc_jenis' data-sort-order='desc'>
						    <thead>
						    <tr>
						        <th data-field='state' data-checkbox='true' >NIP</th>
						        <th data-field='username' data-sortable='true'>NIP</th>
						        <th data-field='password'  data-sortable='true'>Password</th>
								<th data-field='level'  data-sortable='true'>Level</th>
						        <th data-field='hapus' data-sortable='true'>Hapus</th>
						    </tr>
						    </thead>
							<tbody>";
							$tp=mysql_query('SELECT * FROM tbl_login');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td><a href='?p=pengguna&aksi=edit&id=$r[username]'>$r[username]</a></td>
                                    <td>$r[password]</td>
									<td>$r[level]</td>
									<td><a class='btn btn-danger' href='$aksi?act=hapus&id=$r[username]'>HAPUS</a></td>
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
					<div class='panel-heading'>Input Data Pengguna</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/pengguna/aksi_user.php?act=input' enctype='multipart/form-data'>";
							echo "
								<div class='form-group'>
									<label>Nama Pegawai</label>
									<select class='form-control' name='username' id='s2_1' style='width: 100%;'>
								  <option value=0 selected>- Pilih Pegawai -</option>";
										$tampil=mysql_query("SELECT * FROM tbl_pegawai ORDER BY nip ASC");
										while($r=mysql_fetch_array($tampil)){
										  echo "<option value=$r[nip]>$r[nama]</option>";
										}                               
                       echo"</select>
								</div>
								<div class='form-group'>
									<label>Password</label>
									<input class='form-control' name='password' type='password'>
								</div>
								<div class='form-group'>
									<label>Level</label>
									<input class='form-control' name='level' >
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
	$edit = mysql_query("SELECT * FROM tbl_login WHERE username='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Edit Data Pengguna</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/pengguna/aksi_user.php?act=update' enctype='multipart/form-data'>";
							echo "
								<input type=hidden name=id value=$r[username]>
								<div class='form-group'>
									<label>Password</label>
									<input class='form-control' name='password' value='$r[password]' type='password'>
								</div>
								<div class='form-group'>
									<label>Level</label>
									<input class='form-control' name='level' value='$r[level]' >
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