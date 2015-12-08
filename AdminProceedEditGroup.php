<?php
session_start();
include("layoutHeader.php");
?>
<div class='container'>  
    <h3>Edit Group Appointment</h3>
          <?php
            $debug = false;
            include('CommonMethods.php');
            $COMMON = new Common($debug);

// Changed to get appointment data by checking for appointments labeled to edit rather than
// relying on session variables
	$sql = "SELECT * FROM `Proj2Appointments` WHERE `Alter` = 'Edit'";
        $rs = $COMMON->executeQuery($sql, "Advising Appointments");
	$row = mysql_fetch_row($rs);

            echo("<form action=\"AdminConfirmEditGroup.php\" method=\"post\" name=\"Edit\">");
            echo("Time: ". date('l, F d, Y g:i A', strtotime($row[1])). "<br>");
            echo("Majors included: ");
            if($row[3]){
              echo("$row[3]<br>"); 
            }
            else{
              echo("Available to all majors<br>"); 
            }
            echo("Number of students enrolled: $row[5] <br>");
            echo("Student limit: ");
            echo("<input type=\"number\" id=\"stepper\" name=\"stepper\" min=\"$row[5]\" max=\"$row[6]\" value=\"$row[6]\" />");

            echo("<br><br>");

            echo "<a id='submit' class='waves-effect waves-light btn-large'>Submit</a>";
            echo("<input id='submit-invis' style='display:none' type=\"submit\" name=\"next\" class=\"button large go\" value=\"Submit\">");
            if($row[5] > 0){
              echo "<p style='color:red'>Note: There are currently $row[5] students enrolled in this appointment. <br>
                    The student limit cannot be changed to be under this amount.</p>";
            }
          ?>
</div>
<script>
     $('#submit').click(function() {
        $('#submit-invis').trigger('click');
    });
</script>
<?php
    include("layoutFooter.php");
?>
