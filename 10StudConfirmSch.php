<?php
session_start();
$_SESSION["appTime"] = $_POST["appTime"]; // radio button selection from previous form
include("CommonMethods.php");
include("layoutHeader.php");
?>
<!--NEW CODE-->
<div class="centered">
    <form action="StudProcessSch.php" method="post" name="SelectTime">
        <?php
            $debug = false;
			$COMMON = new Common($debug);
			
			$firstn = $_SESSION["firstN"];
			$lastn = $_SESSION["lastN"];
			$studid = $_SESSION["studID"];
			$major = $_SESSION["major"];
			$email = $_SESSION["email"];
			
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
				
				echo "<h3>Previous Appointment</h3>";
				echo "<h4>Advisor: ", $oldAdvisorName, "</h4>";
				echo "<h5>Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "</h5><br>";
			}
			
			$currentAdvisorName;
			$currentAdvisorID = $_SESSION["advisor"];
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
				echo "<input id='reschedule-invis' style='display:none' type='submit' name='finish' class='button large go' value='Reschedule'>";
			     echo "<a id='reschedule' class='waves-effect waves-light btn-large'>Reschedule</a>&nbsp;&nbsp;";
                    echo "<a id='cancel' class='waves-effect waves-light btn-large'>Cancel</a>";
                 
            }
			else {
                echo "<input id='submit-invis' style='display:none' type='submit' name='finish' value='Submit'>";
			    echo "<a id='submit' class='waves-effect waves-light btn-large'>Submit</a>&nbsp;&nbsp; "; 
                echo "<a id='cancel' class='waves-effect waves-light btn-large'>Cancel</a>";
            }
		?>
        <input id='cancel-invis' style='display:none' type="submit" name="finish" value="Cancel">
	   </form>
</div>
<script>
    
    $('#reschedule').click(function() {
        $('#reschedule-invis').trigger('click');
    });
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