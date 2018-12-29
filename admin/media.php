<?php
session_start();
error_reporting(0);
if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
 include "403.html";
}
else{
include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SIMARSIP PT. MAA KUTHARI GLOBAL</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>SIM</span>ARSIP</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="?p=myprofile"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<center><a class="btn btn-primary" href="?p=arsip&aksi=tambah" style="color:#ffffff;font-weight:bold;font-family:verdana;"><svg class="glyph stroked plus-sign"><use xlink:href="#stroked-plus-sign"></use></svg> Upload Arsip</a></center>
			<p>&nbsp;</p>
		<ul class="nav menu">
			<li><a href="?p=pegawai"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Pegawai</a></li>
			<li><a href="?p=pengguna"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Pengguna</a></li>
			<li><a href="?p=arsip"><svg class="glyph stroked open-folder"><use xlink:href="#stroked-open-folder"></use></svg> Semua Arsip</a></li>
			<li><a href="?p=arsipmasuk"><svg class="glyph stroked open-letter"><use xlink:href="#stroked-open-letter"></use></svg> Arsip Masuk</a></li>
			<li><a href="?p=jenisarsip"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"></use></svg> Jenis Arsip</a></li>
			<li><a href="?p=lokasiarsip"><svg class="glyph stroked tag"><use xlink:href="#stroked-map"></use></svg> Lokasi Penyimpanan</a></li>
			<li><a href="?p=arsipkeluar"><svg class="glyph stroked email"><use xlink:href="#stroked-email"></use></svg> Arsip Keluar</a></li>
		</ul>

	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">		
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">SI MANAJEMEN ARSIP PT. MAA KUTHARI GLOBAL</h3>
			</div>
		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<?php
					include "konten.php";
				?>  
			</div>
		</div><!--/.row-->
		
		
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>
</html>
<?php
}
?>