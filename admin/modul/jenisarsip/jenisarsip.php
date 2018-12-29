<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/jenisarsip/aksi_jenisarsip.php";
switch($_GET[aksi]){
default:
echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Data Jenis Arsip</div>
					<div class='panel-body'><a class='btn btn-success' href='?p=jenisarsip&aksi=tambah' style='float:right;color:#ffffff;font-weight:bold;font-family:verdana;'> Tambah Data</a></div>
					<div class='panel-body'>
						<table data-toggle='table' data-show-refresh='true' data-show-toggle='true' data-show-columns='true' data-search='true' data-select-item-name='toolbar1' data-pagination='true' data-sort-name='desc_jenis' data-sort-order='desc'>
						    <thead>
						    <tr>
						        <th data-field='state' data-checkbox='true' >No. Arsip</th>
						        <th data-field='kd_jenis' data-sortable='true'>Kode</th>
						        <th data-field='desc_jenis'  data-sortable='true'>Jenis Arsip</th>
						        <th data-field='hapus' data-sortable='true'>Hapus</th>
						    </tr>
						    </thead>
							<tbody>";
							$tp=mysql_query('SELECT * FROM tbl_jenisarsip');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td><a href='?p=jenisarsip&aksi=edit&id=$r[kd_jenis]'>$r[kd_jenis]</a></td>
                                    <td>$r[desc_jenis]</td>
									<td><a class='btn btn-danger' href='$aksi?act=hapus&id=$r[kd_jenis]'>HAPUS</a></td>
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
					<div class='panel-heading'>Input Data Jenis Arsip</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/jenisarsip/aksi_jenisarsip.php?act=input' enctype='multipart/form-data'>";
							echo "
								<div class='form-group'>
									<label>Kode Jenis Arsip</label>
									<input class='form-control' name='kd_jenis'>
								</div>
								<div class='form-group'>
									<label>Deskripsi Jenis Arsip</label>
									<input class='form-control' name='desc_jenis' >
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
	$edit = mysql_query("SELECT * FROM tbl_jenisarsip WHERE kd_jenis='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
	echo "<div class='row'>
			<div class='col-lg-12'>
				<div class='panel panel-default'>
					<div class='panel-heading'>Edit Data Jenis Arsip</div>
					<div class='panel-body'>
						<div class='col-md-6'>
							<form method='post' role='form' action='modul/jenisarsip/aksi_jenisarsip.php?act=update' enctype='multipart/form-data'>";
							echo "
								<input type=hidden name=id value=$r[kd_jenis]>
								<div class='form-group'>
									<label>Deskripsi Jenis Arsip</label>
									<input class='form-control' name='desc_jenis' value='$r[desc_jenis]' >
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