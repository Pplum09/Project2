<?php
session_start();
?>

<?php include('header.php'); ?>
    <title>Exit Message</title>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	    <div class="statusMessage">
	    <?php
			$_SESSION["resch"] = false;			
			if($_SESSION["status"] == "complete"){
				echo "You have completed your sign-up for an advising appointment.";
			}
			elseif($_SESSION["status"] == "none"){
				echo "You did not sign up for an advising appointment.";
			}
			if($_SESSION["status"] == "cancel"){
				echo "You have cancelled your advising appointment.";
			}
			if($_SESSION["status"] == "resch"){
				echo "You have changed your advising appointment.";
			}
			if($_SESSION["status"] == "keep"){
				echo "No changes have been made to your advising appointment.";
			}
		?>
        </div>
		<form action="02StudHome.php" method="post" name="complete">
	    <div class="returnButton">
			<input type="submit" name="return" class="button large go" value="Return to Home">
	    </div>
		</div>
		</form>
	      <?php include('footer.php'); ?>