<html>
<head>
<title>SIMARSIP PT. MAA KUTHARI GLOBAL</title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'/>
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<!--[if lt IE 9]>
 <script src=”https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js”></script>
   <script src=”https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js”></script>
<![endif]-->    
	
<link rel="icon" type="image/png" id="favicon"
          href=""/>
</head>
<body>	
			<?php
	 session_start();
	  require_once("koneksi.php");  
	function antiinjection($data){
	$filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	return $filter_sql;
	}
	  $username = antiinjection($_POST['username']);
	  $password = antiinjection(md5($_POST['password']));
	  $cekuser = mysql_query("SELECT * FROM tbl_login WHERE username = '$username'");
	  $jumlah = mysql_num_rows($cekuser);
	  $hasil = mysql_fetch_array($cekuser); 
	  $level = $hasil['level'];
	  if($jumlah==0) {
	  echo "<section>
  <span></span>
  <h1>Member Login</h1>
  <form method='post'>
    Data Tidak Ditemukan
  </form>
  
  <h2>
    <a href='login.php'>Back</a>
  </h2>
</section>";
	 } else {
	  if($password <> $hasil['password']) {
	   echo "<section>
  <span></span>
  <h1>Member Login</h1>
  <form method='post' action='proseslogin.php'>
    <input placeholder='Username' type='text' name='username'>
    <input placeholder='Password Salah' type='password' name='password'>
	<input type='submit' value='LOGIN'>
  </form>
  
  <h2>
     <a href='lupapassword.php'>Forgot Password?</a>
  </h2>
</section>";
	  } 
	  else 
	    {
	   if ($level=='Administrator'){
	   $_SESSION['username'] = "$username";
	   header('location:admin/media.php?p=home');
	  }
	  elseif ($level=='Sekretaris')
	  {
	  $_SESSION['username'] = "$username";
	   header('location:sekretariat/media.php?p=home');
	  }
	  /*else
	  {
	  $_SESSION['username'] = "$username";
	   header('location:dosen/media.php?hal=home');
	  }*/
	  }
	 }
	?>

</body>
</html>
