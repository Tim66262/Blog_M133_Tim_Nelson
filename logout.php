<?php
  session_destroy();
  header("Location: index.php?function=login&bid=0");
  exit;
?>
