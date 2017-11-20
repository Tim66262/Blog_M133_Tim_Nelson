<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
  $blogs = getUserNames();
<<<<<<< HEAD
  foreach($blogs as $blog){
	  echo "<div><a href='index.php?function=entries_public&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
=======
  $getBid = $_GET['bid'];
  foreach($blogs as $blog){
	  if($getBid == $blog['uid']){
	  echo "<div style='background-color:red;'><a href='index.php?function=entries_public&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
	  }else{
		  echo "<div><a href='index.php?function=entries_public&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
	  }
>>>>>>> parent of f632cd3... Fertige Version muss varibal angepasst werden
  }
?>
