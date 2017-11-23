<?php
  $userId = getUserIdFromSession();
  // Falls der Benutzer bereits angemeldet ist, wechselt die App in den Member-Bereich
  if ($userId > 0) {
    header("Location: index.php?function=".getValue('cfg_func_member')[0]);
	exit;
  }
  if(isset($_GET['eid'])){
  $entryId=$_GET['eid'];
  }else{
	   $entryId=getMaxEntryId(1);
  }
  $name = "";
  $kommentar = "";
  $meldung = "";


?>
<<<<<<< HEAD
=======
<div class="row">
  <div class="col-md-4">
	<?php
	  $entries = getEntries($blogId);
	  foreach($entries as $entry) {
		if ($entry[0] == $entryId) {
		  $active = " active";
		} else {
		  $active = "";
		}
		echo "<div class='list-group'>";
		echo "<a class='list-group-item$active' href='index.php?function=entries_public&bid=$blogId&eid=$entry[0]' title='Beitrag anzeigen'>";
		$datetime = date("d.m.Y H:i:s", $entry[1]);
		echo "<h4 class='list-group-item-heading'>".htmlspecialchars($entry[2]).", ".$datetime."</h4>";
		$string = htmlspecialchars(substr($entry[3],0,95))."...";
		echo "<p class='list-group-item-text'>".$string."</p>";
		echo "</a>";
		echo "</div>";
	  }
	?>
  </div>
  <?php
	if (strlen($meldung) > 0) {
	  echo "<div class='col-md-7'>";
	  echo $meldung;
	  echo "</div>";
	}

	if ($entryId > 0) {
	  $entry = getEntry($entryId);
	  if (is_array($entry)) {
		echo "<div class='col-md-7'>";
		$datetime = date("d.m.Y H:i:s", $entry[1]);
		echo "<h3>".htmlspecialchars($entry[2]).", ".$datetime."</h3>";
		echo nl2br(htmlspecialchars($entry[3]));
		echo "<p>&nbsp;</p>";


	  }
	}
	?>
</div>


>>>>>>> 146ffd19557809188bd12523e28a73f148617f66
