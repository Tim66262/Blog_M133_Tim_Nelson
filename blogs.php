<?php
<<<<<<< HEAD
  $userId = getUserIdFromSession();
  // Falls der Benutzer bereits angemeldet ist, wechselt die App in den Member-Bereich
  if ($userId > 0) {
    header("Location: index.php?function=".getValue('cfg_func_member')[0]);
	exit;
=======
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
  $blogs = getUserNames();
  foreach($blogs as $blog){
	  echo "<div><a href='index.php?function=entries_public&bid=".$blog['uid']."' title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
>>>>>>> parent of b782709... farbe bei blog wählen
  }
?>
<div class="row">
	<?php
	  // instanzirung der Variabeln für spalten
	  $anzahlSpalte = 4;
	  $spalte = 1;
	  $blogs = getUserNames();
	  $listeBenutzer = [];
	  // Die Autoren auf die Spalten aufteilen
	  foreach ($blogs as $blog) {
		$listeBenutzer[$spalte][] = $blog;
		$spalte++;
		if ($spalte > $anzahlSpalte) $spalte = 1;
	  }
	  // Schlaufe über alle Spalten
	  for ($spalte=1; $spalte<=$anzahlSpalte; $spalte++) {
		echo "<div class='col-md-3'>";
		// Schlaufe über den listeBenutzer zum erzeugen der einträge
		foreach ($listeBenutzer[$spalte] as $blog) {
		  if ($blog[0] == $blogId) $active = " active";
		  else $active = "";
		  echo "<div class='list-group'>";
		  echo "<a class='list-group-item$active' href='index.php?function=entries_public&bid=".$blog[0]."&eid=".getMaxEntryId($blog[0])."' title='Blog auswählen'>";
		  echo "<h4 class='list-group-item-heading'>".htmlspecialchars($blog[1])."</h4>";
		  echo "</a>";
		  echo "</div>";
		}
		echo "</div>";
	  }
	?>
</div>