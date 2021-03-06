<?php
  session_start();
  require_once("include/functions.php");
  require_once("include/functions_db.php");
  require_once("include/functions_db_plus.php");
  ///////////////////////
  define("DBNAME", "db/blog.db");
  $killE = "";
  $killC = "";
  // Datenbankverbindung herstellen, diesen Teil nicht ändern!
  if (!file_exists(DBNAME)) exit("Die Datenbank 'blog.db' konnte nicht gefunden werden!");
  $db = new SQLite3(DBNAME);
  setValue("cfg_db", $db);
  ////////////////////////////////////
  // Einfacher Dispatcher: Aufruf der Funktionen via index.php?function=xy
  if (isset($_GET['function'])) $function = $_GET['function'];
  else $function = "login";
  $uid =getUserIdFromSession();
  // Prüfung, ob bereits ein Blog ausgewählt worden ist
   if (isset($_GET['bid'])){ 
		$bId = $_GET['bid'];
		}
  else{ $bId = 0;
  }
  if (isset($_GET['eid'])) {
		$eId = $_GET['eid'];
		}
  else { $eId = 0;
  }
  if (isset($_GET['killE'])){ 
	$killE = true;
  }
  if (isset($_GET['killC'])){ 
	$killC = true;
  }
  else{ $killE = false;
  $killC = false;
  }
  
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="utf-8">
<!--
  Die nächsten 4 Zeilen sind Bootstrap, falls nicht gewünscht entfernen.
-->
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="include/functions.js"></script>
  <title>Blog-Projekt</title>
</head>

<body>
<!--
  nav, div und ul class="..." ist Bootstrap, falls nicht gewünscht entfernen oder anpassen.
  Die Einteilung der Website in verschiedene Bereiche (Menü-, Content-Bereich, usw.) kann auch selber mit div realisiert werden.
-->
  <nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
      <div class="navbar-header">
		<a class="navbar-brand"><?php
    if($uid>0){
      echo "Blog ".getUserName($uid); }
    else{
      echo "Blog ".getUserName($bId);
    }?></a>

      </div>
      <ul class="nav navbar-nav">
		<?php
		if($uid>0){
		  echo "<li><a href='index.php?function=entries_private&bid=$uid&eid=$eId'>Beiträge anzeigen</a></li>";
      echo "<li><a href='index.php?function=addblog&eid=0'>Beiträge hinzufügen</a></li>";
      echo "<li><a href='index.php?function=logout&bid=$uid&eid=$eId'>Logout</a></li>";
    }
    else{
		  echo "<li><a href='index.php?function=login&bid=$bId&eid=$eId'>Login</a></li>";
		  echo "<li><a href='index.php?function=blogs&bid=$bId&eid=$eId'>Blog wählen</a></li>";
		  if(!isset($_SESSION['uid'])){
		  echo "<li class='disabled'><a>Beiträge anzeigen</a></li>";
		  }else{
			  echo "<li><a href='index.php?function=entries_public&bid=$bId&eid=$eId'>Beiträge anzeigen</a></li>";
		  }
		}
		?>
      </ul>
	</div>
  </nav>
  <div class="container" style="margin-top:80px">
  <?php
    // Für jede Funktion, die mit ?function=xy in der URL übergeben wird, muss eine Datei (in diesem Fall xy.php) existieren.
	// Diese Datei wird aufgerufen, um den Content der Seite aufzubereiten und anzuzeigen.
	if (!file_exists("$function.php")) exit("Die Datei '$function.php' konnte nicht gefunden werden!");
	require_once("$function.php");
  ?>
  </div>
</body>
</html>
<?php
  // Datenbankverbindung schliessen, diesen Teil nicht ändern!
  $db = getValue('cfg_db');
  $db->close();
?>
