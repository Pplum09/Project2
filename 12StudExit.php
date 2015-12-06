<?php
session_start();
include('GetStudentData.php');
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Exit Message</title>
    <link rel="stylesheet" type="text/css" href="css/standard.css">
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	    <div class="statusMessage">
	    <?php
			$_SESSION["resch"] = false;			
			if(getStatus() == "complete"){
				echo "You have completed your sign-up for an advising appointment.";
			}
			elseif(getStatus() == "none"){
				echo "You did not sign up for an advising appointment.";
			}
			if(getStatus() == "cancel"){
				echo "You have cancelled your advising appointment.";
			}
			if(getStatus() == "resch"){
				echo "You have changed your advising appointment.";
			}
			if(getStatus() == "keep"){
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
  </body>
</html>