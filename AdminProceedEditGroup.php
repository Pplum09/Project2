<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Edit Group Appointment</title>
    <script type="text/javascript">
    function saveValue(target){
      var stepVal = document.getElementById(target).value;
      alert("Value: " + stepVal);
    }
    </script>
	<link rel='stylesheet' type='text/css' href='css/standard.css'/>
  </head> 
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
          <h1>Edit Group Appointment</h1>
		  <div class="field">
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

            echo("<div class=\"nextButton\">");
            echo("<input type=\"submit\" name=\"next\" class=\"button large go\" value=\"Submit\">");
            echo("</div>");
            echo("</div>");
            echo("<div class=\"bottom\">");
            if($row[5] > 0){
              echo "<p style='color:red'>Note: There are currently $row[5] students enrolled in this appointment. <br>
                    The student limit cannot be changed to be under this amount.</p>";
            }
            echo("</div>");
          ?>
		  </div>
  </div>
  </div>
  </form>
  </body>
  
</html>
