<?php
  session_start();
  include('GetAdvisorData.php');
  $debug = false;
  $COMMON = new Common($debug);
include("layoutHeader.php");
?>
<div class='container'>
		<h4>New Advisor has been created:</h4>

		<?php
			// Get added advisor's data without overwriting $_SESSION["userID"]

			$sql = "SELECT * FROM `Proj2Advisors` WHERE `New` = 'true'";
      			$rs = $COMMON->executeQuery($sql, "Advising Appointments");
      			$row = mysql_fetch_row($rs);

			$id = $row[0];
			$first = $row[1];
			$last = $row[2];
			$user = $row[3];
			$pass = $row[4];


	// New advisor was added to table regardless of whether an equivalent advisor already existed: if there are two
	// advisors with the same data, the new one will be deleted

	$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$user' AND `FirstName` = '$first' AND  `LastName` = '$last'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$num_rows = mysql_num_rows($rs);

      if($num_rows == 2){
        echo("<h3>Advisor $first $last already exists</h3>");
	
	$sql = "DELETE FROM `Proj2Advisors` WHERE `id` = '$id'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
      }
      else{
	echo ("<h3>$first $last<h3>");

	$sql = "UPDATE `Proj2Advisors` SET `New`= 'false' WHERE `id` = '$id'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
      }
		?>
		<form method="link" action="AdminUI.php">
			<a id='home' class="waves-effect waves-light btn-large">Home</a>
            <input id='home-invis' style='display:none' type="submit" name="next" value="Return to Home">
		</form>
</div>
<script>
    $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
</script>
<?php
include("layoutFooter.php");
?>