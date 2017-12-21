<?php
  $uId = getUserIdFromSession();
 
  if(isset($_GET['eid'])){
  $entryId=$_GET['eid'];
  }else{
	   $entryId=getMaxEntryId(1);
  }
  if(isset($_GET['bid'])){
  $uId=$_GET['bid'];
  }else{
	   $uId=getUserIdFromSession();
  }
  
  $cId ="";
  $name = "";
  $kommentar = "";
  $meldung = "";
  if (isset($_POST["name"]) && isset($_POST["kommentar"])) {
	if ((strlen($_POST["name"]) < 4) || (strlen($_POST["kommentar"]) < 5)) {
	  $name = $_POST["name"];
	  $kommentar = $_POST["kommentar"];
	  $meldung = "<br /><div class='alert alert-danger'>Name muss minimum 4 und Kommentar mininumum 5 Zeichen enthalten.</div>";
	} elseif (addComment($eId, $_POST["name"], $_POST["kommentar"]) > 0) {
	  $meldung = "<br /><div class='alert alert-success'>Der Kommentar wurde erfolgreich hinzugefügt.</div>";
	} else {
	  $meldung = "<br /><div class='alert alert-danger'>Der Kommentar konnte nicht eingefügt werden.</div>";
	}
  }
  if ($killC) {
	  $cId=$_GET['cid'];
	if (deleteComment($cId)) {
	  $eId = 0;
	  $meldung = "<div class='alert alert-success'><p>Der Beitrag wurde erfolgreich gelöscht.</p></div>";
	} else {
	  $meldung = "<div class='alert alert-danger'>Der Beitrag konnte nicht gelöscht werden.</div>";
	}
  }


?>

<div class="row">
  <div class="col-md-4">
	<?php
	  $entries = getEntries($uId);
	  foreach($entries as $entry) {
		if ($entry[0] == $eId) {
		  $active = " active";
		} else {
		  $active = "";
		}
		echo "<div class='list-group'>";
		echo "<a class='list-group-item$active' href='index.php?function=entries_public&bid=$uId&eid=$entry[0]' title='Beitrag anzeigen'>";
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
		echo "</div>";
		echo "<div class='col-md-4'>";
		echo "<h4>Kommentare</h4>";
		$comments = getComments($eId);
		foreach($comments as $comment) {
		  $datetime = date("d.m.Y H:i:s", $comment[2]);
		  $cId = $comment[0];
		  echo "<p>";
		  echo htmlentities($comment[4]).", $datetime<br />";
		  echo "<small>".nl2br(htmlspecialchars($comment[3]))."</small><br />";
		  echo "</p>";
		}
		

	  }
	}
	echo "<form name='formular' method='post' action='".$_SERVER['PHP_SELF']."?function=entries_public&eid=$entry[0]&bid=$uId'>";
		echo "<div class='form-group'>";
		echo "<input type='text' class='form-control' id='name' name='name' placeholder='Name minimum 4 Zeichen' value='$name' />";
		echo "</div>";
		echo "<div class='form-group'>";
		echo "<textarea class='form-control' id='kommentar' name='kommentar' rows='5' placeholder='Kommentar mininum 5 Zeichen'>$kommentar</textarea>";
		echo "</div>";
		echo "<div style='text-align:right';>";
		echo "<button type='submit' class='col-md-6 btn btn-red'>Senden</button>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
	?>
</div>


