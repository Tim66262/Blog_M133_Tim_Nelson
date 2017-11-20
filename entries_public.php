<?php
  // Alle Blogeinträge holen, die Blog-ID ist in der Variablen $blogId gespeichert (wird in index.php gesetzt)
  // Hier Code... (Schlaufe über alle Einträge dieses Blogs)

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blog-Beiträge und der Ausgabe mit PHP ersetzt werden
<<<<<<< HEAD
  $entrys = getEntry(4);
  foreach ($entrys as $entry) {
    echo "<h4>".$entry['title']."</h4>";
  }
?>
  <div>
  <h4>Hipster Ipsum, 01.11.2016 16:42:12</h4>
  Neutra truffaut blog, 90's microdosing gochujang fingerstache helvetica etsy. Shoreditch fashion axe tote bag wayfarers normcore, freegan hot chicken sriracha 8-bit brunch actually live-edge quinoa. Trust fund sustainable forage tilde, etsy gentrify 8-bit poutine blog swag lomo pug. Truffaut ugh pinterest, umami tofu hoodie cronut. Crucifix skateboard single-origin coffee, vape slow-carb pork belly direct trade everyday carry photo booth schlitz venmo franzen. Air plant viral stumptown pabst disrupt. Readymade mumblecore tumeric kitsch hashtag, godard trust fund.
  </div>
=======
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

>>>>>>> parent of f632cd3... Fertige Version muss varibal angepasst werden
