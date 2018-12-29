<?php
session_start();
?>
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
          href="img/logokuthari.png"/>
</head>
<body>

 <section>
  <span></span>
  <h1>SIM ARSIP<br><font style="font-size:10pt;font-weight:bold;font-family:arial;">PT. MAA KUTHARI GLOBAL</font></h1>
  <form method="post" action="proseslogin.php">
    <input placeholder='NIP' type='text' name='username'>
    <input placeholder='Password' type='password' name='password'>
	<input type="submit" value="LOGIN">
  </form>
  
  <h2>
    <a href='lupapassword.php'>Lupa Password ?</a>
  </h2>
</section>

</body>
</html>
