<?php 
session_start();
$debug = false;

if($debug) { echo("Session variables-> ".var_dump($_SESSION)); }

include('GetAdvisorData.php');
$COMMON = new Common($debug);
include("layoutHeader.php");
?>
    <div id="login">
      <div id="form">
        <div class="top">
	<h2> Hello 
	<?php
	$temp = getUsername();
	if(!isset($temp)) // someone landed this page by accident
	{
		return;
	}		

		$User = getUsername();
		$Pass = getPassword();
		$sql = "SELECT `firstName` FROM `Proj2Advisors` 
			WHERE `Username` = '$User' 
			and `Password` = '$Pass'";

		$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
		$row = mysql_fetch_row($rs);
		echo $row[0];
	?>
	</h2>
	
	<form action="AdminProcessUI.php" method="post" name="UI">
		<div class="nextButton">
		<input type="submit" name="next" class="button large selection" value="Schedule appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Print schedule for a day"><br>
		<input type="submit" name="next" class="button large selection" value="Edit appointments"><br>
		<input type="submit" name="next" class="button large selection" value="Search for an appointment"><br>
		<input type="submit" name="next" class="button large selection" value="Create new Admin Account"><br>
		</div>
	
	</form>
	<br>

	<form method="link" action="Logout.php">
		<div class="nextButton">
		<input type="submit" name="next" class="button large go" value="Log Out">
		</div>
	</form>
          
        </div>
        <div class="field">
          
        </div>
	</div>

	<?php include('./workOrder/workButton.php'); ?>
<?php
    include("layoutFooter.php");
?>
