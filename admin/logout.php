<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda Keluar Dari Halaman Administrator'); window.location = '../login.php'</script>";
?>
