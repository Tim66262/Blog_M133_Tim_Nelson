<?php
  $userId = getUserIdFromSession();
  // Falls der Benutzer bereits angemeldet ist, wechselt die App in den Member-Bereich
  if ($userId > 0) {
    header("Location: index.php?function=".getValue('cfg_func_member')[0]);
	exit;
  }
  $meldung = "";
  $alertText = "alert-danger";
  $targetFile = str_replace("\\", "/", getcwd()).EXCHANGE_PATH.EXPORT_FILE;
  if (isset($_POST["submit"])) {
	$status = exportUsers($targetFile);
	if ($status["alert"] == 1) $alertText = "alert-warning";
	elseif ($status["alert"] == 2) $alertText = "alert-success";
	$meldung = $status["meldung"];
  }
?>

<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']."?function=export"; ?>">
  <div class="col-md-12 text-center">
	<h4>
	  <?php
		echo "Der Export der benuter wird auf dem \"$targetFile\" Verzeichnis hinterlegt.";
	  ?>
	</h4>
	<br /><br />
	<button type="submit" name="submit" class="btn-success">Export starten</button>
  </div>
</form>
<?php if (strlen($meldung) > 0) echo "<br /><div class='col-md-offset-2 col-md-12 alert $alertText'>$meldung</div>"; ?>
