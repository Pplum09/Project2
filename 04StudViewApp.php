<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);

$studID = $_SESSION["studID"];
include("layoutHeader.php");
?>
<div class="container">
    <h1>View Appointment</h1>
        <?php
            $sql = "select * from Proj2Appointments where `EnrolledID` like '%$studID%'";
			$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			// if for some reason there really isn't a match, (something got messed up, tell them there really isn't one there)
			$num_rows = mysql_num_rows($rs);

			if($num_rows > 0) {
				$row = mysql_fetch_row($rs); // get legit data
				$advisorID = $row[2];
				$datephp = strtotime($row[1]);
				
				if($advisorID != 0){
					$sql2 = "select * from Proj2Advisors where `id` = '$advisorID'";
					$rs2 = $COMMON->executeQuery($sql2, $_SERVER["SCRIPT_NAME"]);
					$row2 = mysql_fetch_row($rs2);
					$advisorName = $row2[1] . " " . $row2[2];
				}
				else{$advisorName = "Group";}
				echo "Advisor: ", $advisorName, "<br>";
				echo "Appointment: ", date('l, F d, Y g:i A', $datephp), "<br><br>";
			}

			else { // something is up, and there DB table needs to be fixed
			
				echo("No appointment was detected. It may have been cancelled. Please make another appointment.");
				$sql = "update `Proj2Students` set `Status` = 'N' where `StudentID` = '$studID'";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
			}
	

		?>
    <a onclick="location.href = '02StudHome.php'" class="waves-effect waves-light btn-large">Home</a>
</div>
<?php
    include("layoutFooter.php");
?>