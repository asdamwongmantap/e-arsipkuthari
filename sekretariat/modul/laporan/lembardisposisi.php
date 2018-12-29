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
echo "<div class='content'>
	   <div class='workplace'>
		<div class='dr'><span></span></div>
		  <div class='row-fluid'>
                <div class='span12'>                    
                    <div class='head clearfix'>
                        <div class='isw-grid'></div>
                        <h1>Data arsip</h1>                               
                    </div>
                    <div class='block-fluid table-sorting clearfix'>
						<div class='cari'>Cari	: <input type='text' name='cari' style='height:20px; margin-top:10px;'></div>
                        <table cellpadding='0' cellspacing='0' width='100%' class='table' id='tSortable'>
                            <thead>
                                <tr>
                                    <th><input type='checkbox' name='checkbox'/></th>
									<th width='7%'>No. Arsip</th>
                                    <th width='13%'>Tgl Arsip</th>
                                    <th width='5%'>Perihal</th>
                                    
									<th width='15%'>Jenis Arsip</th>
									<th width='25%'>Lokasi</th>
									<th width='20%'>Nama File</th>
                                    <th width='15%'>Aksi</th>       
                                </tr>
                            </thead>
                            <tbody>";

							$tp=mysql_query('SELECT * FROM view_arsip WHERE a_masuk="Arsip Masuk" AND desc_jenis="Surat" ORDER BY no_arsip ASC');
							while($r=mysql_fetch_array($tp)){
							
							$no_arsip=$r[no_arsip];
							$deskripsi=$r[tgl_arsip];
							$filetype=$r[filetype];
							$filename=$r[filename];
							
							
                             echo"<tr>
                                    <td><input type='checkbox' name='checkbox'/></td>
									<td>$r[no_arsip]</td>
                                    <td>$r[tgl_arsip]</td>
									<td>$r[perihal]</td>
                                   
                                    <td>$r[desc_jenis]</td>
									<td>$r[lokasiarsip]</td>
									<td>$r[nm_file]</td>
									
                                    <td><a href='?p=haldisposisi&id=$r[no_arsip]'>Cetak Lembar Disposisi</a></td>
                                    
                                </tr>";
							}
                               
                                        
                        echo"</tbody>
                        </table>";
						$tp=mysql_query('SELECT count(no_arsip) as jumlah_data FROM tbl_arsip WHERE a_masuk="Arsip Masuk"');
							while($r=mysql_fetch_array($tp)){
						echo "
						<div class='jumlahdata' style='margin-right:10px;float:right;'>Jumlah arsip Yang Disimpan Sebanyak : $r[jumlah_data]</div>";}
					echo "
                    </div>
                </div>                                
            </div>            
            <div class='dr'><span></span></div>            
        </div>
    </div>";    

break;

			}//penutup switch
}//penutup session
?>    
</body>
</html>