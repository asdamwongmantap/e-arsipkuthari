<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if ($_GET['p']=='home')
{ 
include "home.php";
}
else
if ($_GET['p']=='myprofile')
{ 
include "modul/profile/myprofile.php";
}
else
if ($_GET['p']=='arsip')
{ 
include "modul/arsip/arsip.php";
}
else
if ($_GET['p']=='arsipmasuk')
{ 
include "modul/arsip/arsipmasuk.php";
}
else
if ($_GET['p']=='arsipkeluar')
{ 
include "modul/arsip/arsipkeluar.php";
}
else
if ($_GET['p']=='gantipassword')
{ 
include "modul/gantipassword/gantipass.php";
}
else
if ($_GET['p']=='jenisarsip')
{ 
include "modul/jenisarsip/jenisarsip.php";
}
else
if ($_GET['p']=='lokasiarsip')
{ 
include "modul/lokasiarsip/lokasiarsip.php";
}
else
if ($_GET['p']=='pegawai')
{ 
include "modul/pegawai/pegawai.php";
}
else
if ($_GET['p']=='pengguna')
{ 
include "modul/pengguna/user.php";
}
else
if ($_GET['p']=='laporanarsipall')
{ 
include "modul/laporan/laporanarsipall.php";
}
else
if ($_GET['p']=='lembardisposisi')
{ 
include "modul/laporan/lembardisposisi.php";
}
else
if ($_GET['p']=='haldisposisi')
{ 
include "modul/laporan/haldisposisi.php";
}
else
{
include "not_found.php";	
}

?>
</body>
</html>