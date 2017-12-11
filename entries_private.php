<?php
  $userId = getUserIdFromSession();

  if(isset($_GET['eid'])){
  $eId=$_GET['eid'];
  }else{
	   $entryId=getMaxEntryId(1);
  }
  $name = "";
  $kommentar = "";
  $meldung = "";
	if ($killE) {
	if (deleteEntry($eId)) {
	  $entryId = 0;
	  $meldung = "<div class='alert alert-success'><p>Der Beitrag wurde erfolgreich gelöscht.</p></div>";
	} else {
	  $meldung = "<div class='alert alert-danger'>Der Beitrag konnte nicht gelöscht werden.</div>";
	}
  }

?>

<div class="row">
  <div class="col-md-4">
	<?php
	  $entries = getEntries($uid);
	  foreach($entries as $entry) {
		if ($entry[0] == $eId) {
		  $active = " active";
		} else {
		  $active = "";
		}
		echo "<div class='list-group'>";
		echo "<a class='list-group-item$active' href='index.php?function=entries_private&eid=$entry[0]' title='Beitrag anzeigen'>";
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
	
	if ($eId > 0) {
	  $entry = getEntry($eId);
	  if (is_array($entry)) {
		echo "<div class='col-md-6'>";
		$datetime = date("d.m.Y H:i:s", $entry[1]);
		echo "<h3>".htmlspecialchars($entry[2]).", ".$datetime."</h3>";
		echo nl2br(htmlspecialchars($entry[3]));
		echo "<p>&nbsp;</p>";
		echo "</div>";
		echo "<div class='col-md-2'>";
		echo "<a href='index.php?function=addblog&eid=$entry[0]' title='Beitrag bearbeiten'><span class='glyphicon glyphicon-pencil'></span></a>";
		echo "<a href='index.php?function=entries_private&killE=true&eid=$entry[0]' title='Beitrag löschen' onclick='return confirmDelete();'><span class='glyphicon glyphicon-remove'></span></a>";
		echo "</div>";
		

	  }
	}
	?>
</div>
