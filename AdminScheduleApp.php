<?php
session_start();
?>

<?php include('header.php'); ?>
    <title>Schedule Appointment</title>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
	<h1>Schedule Appointments</h1>
	<h2>Select advising type</h2><br>
	
	<form method="post" action="AdminProcessSchedule.php">
	<div class="nextButton">
		<input type="submit" name="next" class="button large go" value="Individual">
		<input type="submit" name="next" class="button large go" value="Group" style="float: right;">
	</div>
	</form>
        </div>
	</div>
		</form>
		<form method="link" action="AdminUI.php">
		<input type="submit" name="home" class="button large" value="Cancel">
		</form>
   	</div>
	</div>
<?php include('footer.php'); ?>

