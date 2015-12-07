<?php
session_start();
$_SESSION["appTime"] = $_POST["appTime"]; // radio button selection from previous form
include("layoutHeader.php");
?>
<!--NEW CODE-->
<div class="centered">
    <form action="StudProcessSch.php" method="post" name="SelectTime">
        <?php
            $debug = false;
			include('GetStudentData.php');
			$COMMON = new Common($debug);
			
			$firstn = getFirstName();
			$lastn = getLastName();
			$studid = $_SESSION["studID"];
			$major = getMajor();
			$email = getEmail();
			
			if($_SESSION["resch"] == true){
				$sql = "select * from Proj2Appointments where `EnrolledID` like '%$studid%'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				$row = mysql_fetch_row($rs);
				$oldAdvisorID = $row[2];
				$oldDatephp = strtotime($row[1]);
				
				if($oldAdvisorID != 0){
					$sql2 = "select * from Proj2Advisors where `id` = '$oldAdvisorID'";
					$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
					$row2 = mysql_fetch_row($rs2);
					$oldAdvisorName = $row2[1] . " " . $row2[2];
				}
				else {
                    $oldAdvisorName = "Group";
                }
				
				echo "<h2>Previous Appointment</h2>";
				echo "<label for='info'>";
				echo "Advisor: ", $oldAdvisorName, "<br>";
				echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</label><br>";
			}
			
			$currentAdvisorName;
			$currentAdvisorID = getAdvisor();
			$currentDatephp = strtotime($_SESSION["appTime"]);
			if($currentAdvisorID != 0){
				$sql2 = "select * from Proj2Advisors where `id` = '$currentAdvisorID'";
				$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
				$row2 = mysql_fetch_row($rs2);
				$currentAdvisorName = $row2[1] . " " . $row2[2];
			}
			else{$currentAdvisorName = "Group";}
			
			echo "<h3>Confirm Appointment</h3>";
			echo "<h4>Advisor: ",$currentAdvisorName,"</h4>";
			echo "<h5>Appointment: ",date('l, F d, Y g:i A', $currentDatephp),"</h5><br>";
		?>
    	<?php
			if($_SESSION["resch"] == true) {
				echo "<input type='submit' name='finish' class='button large go' value='Reschedule'>";
			}
			else {
                echo "<input id='submit-invis' style='display:none' type='submit' name='finish' value='Submit'>";
			    echo "<a id='submit' class='waves-effect waves-light btn-large'>Submit</a>"; 
            }
		?>
        <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
        <input id='cancel-invis' style='display:none' type="submit" name="finish" value="Cancel">
	   </form>
</div>
<script>
    
    $('#submit').click(function() {
        $('#submit-invis').trigger('click');
    });
    
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
    
</script>
<?php
    include("layoutFooter.php");
?>