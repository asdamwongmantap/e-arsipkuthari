<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda Keluar Dari Halaman User'); window.location = '../login.php'</script>";
?>
