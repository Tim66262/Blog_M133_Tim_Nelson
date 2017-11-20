<?php
  session_start();
  require_once("include/functions.php");
  require_once("include/functions_db.php");
  if (isset($_GET['function'])) $function = $_GET['function'];
  else $function = "login";
  // Wenn es sich um eine Funktion des Member-Bereichs handelt
  if (in_array($function, getValue('cfg_func_member'))) $area = "member";
  else $area = "login";
  $userId = getUserIdFromSession();
  if (isset($_GET['bid'])) $blogId = $_GET['bid'];
  else $blogId = 0;
  if (isset($_GET['eid'])) $entryId = $_GET['eid'];
  else $entryId = 0;
  if (isset($_GET['delete'])) $delete = true;
  else $delete = false;

?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
<<<<<<< HEAD
=======
<!-- 
  Die nächsten 4 Zeilen sind Bootstrap, falls nicht gewünscht entfernen.
-->
>>>>>>> parent of e294d0a... dfdfdf
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-filestyle.min.js"></script>
  <script src="include/functions.js"></script>
  <title>Blog-Projekt</title>
</head>

<body>
<<<<<<< HEAD
  <nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
      <div class="navbar-header">
		<a class="navbar-brand"><?php echo getMenuTitle($area, $function, $userId, $blogId); ?></a>
      </div>
      <ul class="nav navbar-nav">
		<?php echo getMenu($area, $function, $blogId, $entryId, $delete); ?>
=======
<!-- 
  nav, div und ul class="..." ist Bootstrap, falls nicht gewünscht entfernen oder anpassen.
  Die Einteilung der Website in verschiedene Bereiche (Menü-, Content-Bereich, usw.) kann auch selber mit div realisiert werden.
-->
  <nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
      <div class="navbar-header">
		<a class="navbar-brand"><?php echo "Blog (Namen einsetzen...)"; ?></a>
      </div>
      <ul class="nav navbar-nav">
		<?php 
		  echo "<li><a href='index.php?function=login&bid=$blogId'>Login</a></li>";
		  echo "<li><a href='index.php?function=blogs&bid=$blogId'>Blog wählen</a></li>";
		  echo "<li><a href='index.php?function=entries_public&bid=$blogId'>Beiträge anzeigen</a></li>";
		?>
>>>>>>> parent of e294d0a... dfdfdf
      </ul>
	</div>
  </nav>
  <div class="container" style="margin-top:80px">
  <?php
	if (!file_exists("$function.php")) exit("Die Datei '$function.php' konnte nicht gefunden werden!");
	require_once("$function.php");
  ?>
  </div>
</body>
</html>
<?php
  $db = getValue('cfg_db');
  $db->close();
?>
