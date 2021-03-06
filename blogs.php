<div class="row">
	<?php
	  // instanzirung der Variabeln für spalten
	  $anzahlSpalte = 4;
	  $spalte = 1;
	  $blogs = getUserNames();
	  $listeBenutzer = [];
	  // Die Items auf die Spalten aufteilen
	  foreach ($blogs as $blog) {
		$listeBenutzer[$spalte][] = $blog;
		$spalte++;
		if ($spalte > $anzahlSpalte) $spalte = 1;
	  }
	  for ($spalte=1; $spalte<=$anzahlSpalte; $spalte++) {
		echo "<div class='col-md-3'>";
		foreach ($listeBenutzer[$spalte] as $blog) {
		  if ($blog[0] == $bId) $active = " active";
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