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
					<div class='panel-heading'>Data Arsip Masuk</div>
					<div class='panel-body'><a class='btn btn-warning' href='modul/laporan/laparsipmasuk.php' style='float:right;color:#ffffff;font-weight:bold;font-family:verdana;'> Cetak Laporan Arsip Masuk</a></div>
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
							$tp=mysql_query('SELECT * FROM view_arsip where a_masuk="Arsip Masuk" ORDER BY no_arsip ASC');
							while($r=mysql_fetch_array($tp)){
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td><a href='?p=arsip&aksi=edit&id=$r[no_arsip]'>$r[no_arsip]</a></td>
                                    <td>$r[tgl_arsip]</td>
									<td>$r[perihal]</td>
                                    <td>$r[nm_file]</td>
									<td>$r[lokasiarsip]</td>
                                    <td><a class='btn btn-danger' href='$aksi?act=hapus&id=$r[no_arsip]'>HAPUS</a>&nbsp;<a class='btn btn-primary' href='?p=haldisposisi&id=$r[no_arsip]'>Cetak Lembar Disposisi</a></td>
                                </tr>";
							}
						echo "</tbody>
						</table>
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