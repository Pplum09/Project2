<?php
session_start();
$debug = false;
include('GetStudentData.php');
$COMMON = new Common($debug);
include("layoutHeader.php");
?>
<div class="center">
    <h3>Cancel Current Appointment</h3>
	    <?php
			$firstn = getFirstName();
			$lastn = getLastName();
			$studid = $_SESSION["studID"];
			$major = getMajor();
			$email = getEmail();
			
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
			else{$oldAdvisorName = "Group";}

			echo "Advisor: ", $oldAdvisorName, "<br>";
			echo "Appointment: ", date('l, F d, Y g:i A', $oldDatephp), "<br>";
		?>		
    <form action = "StudProcessCancel.php" method = "post" name = "Cancel">
        
        <!--DISPLAYED BUTTONS-->
        <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
        <a id='keep' class="waves-effect waves-light btn-large">Keep</a>

        <!--HIDDEN-->
        <input id='cancel-invis' style='display:none' type="submit" name="cancel" value="Cancel">
        <input id='keep-invis' style='display:none' type="submit" name="cancel" value="Keep">
    </form>
</div>
<script>
    
    $('#keep').click(function() {
        $('#keep-invis').trigger('click');
    });
    
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
    
</script>
<?php
    include("layoutFooter.php");
?>