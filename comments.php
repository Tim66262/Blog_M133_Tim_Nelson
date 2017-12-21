<?php
  $uId = getUserIdFromSession();
  //if (basename(__FILE__) != basename($_SERVER['SCRIPT_FILENAME'])) {
   //this is included
   if($uId != 0){
   include_once("entries_private.php");
   }else{
	   include_once("entries_public.php");
   }
   if(isset($_GET['bid'])){
  $uId=$_GET['bid'];
  }else{
	   $uId=getUserIdFromSession();
  }
	//}

	if(isset($_GET['eid'])){
  $eId=$_GET['eid'];
  }else{
	   $eId=getMaxEntryId(1);
  }

  
	
?>

  <?php
	if (strlen($meldung) > 0) {
	  echo "<div class='col-md-7'>";
	  echo $meldung;
	  echo "</div>";
	}
	if ($eId > 0) {
	  $entry = getEntry($eId);
	  if (is_array($entry)) {
		echo "<div class='col-md-4'>";
		echo "<h4>Kommentare</h4>";
		$comments = getComments($eId);
		foreach($comments as $comment) {
		  $datetime = date("d.m.Y H:i:s", $comment[2]);
		  $cId = $comment[0];
		  echo "<p>";
		  if($uId != 0){
		  echo "<a href='index.php?function=comments&killC=true&cid=$cId&eid=$eId' title='Beitrag löschen''><span class='glyphicon glyphicon-remove'></span></a>";
		  }
		  echo htmlentities($comment[4]).", $datetime<br />";
		  echo "<small>".nl2br(htmlspecialchars($comment[3]))."</small><br />";
		  echo "</p>";
		}
		echo "<form name='formular' method='post' action='".$_SERVER['PHP_SELF']."?function=comments&eid=$entry[0]&bid=$uId'>";
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
	  }
	}
	?>
