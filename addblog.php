<?php
  $uId = getUserIdFromSession();
  $title = "";
  $content = "";
  $alert = "";
  if(isset($_GET['eid'])){
	  $eId = $_GET['eid'];
	  }
		else{ $eId = 0;
		}
  if($eId!= 0){
	  $entry = getEntry($eId);
	  if (is_array($entry)) {
	  $title = $entry[2];
	  $content = $entry[3];
	  }
  }
  
  if (isset($_POST["title"]) && isset($_POST["content"])) {
	if ((strlen($_POST["title"]) < 10) || (strlen($_POST["content"]) < 20)) {
			
	  $title = $_POST["title"];
	  $content = $_POST["content"];
	  $alert = "<br /><div class='alert alert-danger'>Der Title sollte mindestens 10 Zeichen haben und Beitrag mindestens 20 Zeichen haben.</div>";
	   
	  
	}
	elseif (updateEntry($eId, $_POST["title"], $_POST["content"])) {
		$title = $_POST["title"];
	  $content = $_POST["content"];
		$alert = "<br /><div class='alert alert-success'>Beitrag ist erfolgreich update worden.</div>";
	}
	elseif (addEntry($uId, $_POST["title"], $_POST["content"])) {
		$alert = "<br /><div class='alert alert-success'>Beitrag ist erfolgreich erstellt worden.</div>";
	} else {
	  $alert = "<br /><div class='alert alert-danger'>Beitrag konnte nicht hinzugefügt werden.</div>";
	}
	
	
  }
 
  
?>
<div class="col-md-12">
  <form class="form" method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=addblog&eid=$eId"; ?>">
	<div class="form-group">
	  <label for="title">Title</label>
	  <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" placeholder="Mindestens 10 Zeichen">
	</div>
	<div class="form-group">
	  <label for="content">Content</label>
	  <textarea class="form-control" id="content" name="content" rows="10" placeholder="Mindestens 20 Zeichen"><?php echo $content; ?></textarea>
	</div>
	<?php
if($eId!= 0){
	echo "<button type='submit' class='col-md-4 btn btn-success'>speichern</button>";
	echo	"<a  href='index.php?function=entries_private&killE=true&eid=$eId' class='col-md-4 btn btn-red'>Löschen</a>";
	echo	"<a  href='index.php' class='col-md-4 btn btn-warning'>abbrechen</a>";
}else{
	echo "<button type='submit' class='col-md-6 btn btn-success'>speichern</button>";
	echo	"<a  href='index.php' class='col-md-6 btn btn-warning'>abbrechen</a>";
}	
	?>
  </form>
  <?php	echo $alert; ?>
</div>