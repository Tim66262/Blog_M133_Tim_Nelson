<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
  //var_dump($_GET('bid'));
  $entrys = getEntries($_GET['bid']);
  //var_dump($entrys);
 foreach ($entrys as $entry) {
	 echo "<div>";
   echo "<h4>".$entry["title"]."</h4>";
   echo  $entry["content"]."</div>";
	//var_dump($entry);
  }
?>

