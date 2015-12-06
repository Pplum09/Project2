<?php
session_start();
?>
<?php
    include("layoutHead.php");
?>
    <div id="login">
      <div id="form">
        <div class="top">
		<h1>Schedule Appointment</h1>
		<h2>What kind of advising appointment would you like?</h2><br>
	<form action="StudProcessType.php" method="post" name="SelectType">
	<div class="nextButton">
		<input type="submit" name="type" class="button large go" value="Individual">
		<input type="submit" name="type" class="button large go" value="Group" style="float: right;">
	    </div>
		</div>
		</form>


<br>
<br>
		<div>
		<form method="link" action="02StudHome.php">
		<input type="submit" name="home" class="button large" value="Cancel">
		</form>
		</div>
<?php
    include("layoutFoot.php");
?>