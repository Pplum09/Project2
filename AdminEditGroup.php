<?php
session_start();
include("layoutHeader.php");
?>
<div class='container'>
          <h4>Edit Group Appointment</h4>
		  <?php
            $debug = false;
            include('CommonMethods.php');
            $COMMON = new Common($debug);

            $sql = "SELECT * FROM `Proj2Appointments` WHERE `AdvisorID` = '0' ORDER BY `Time`";
            $rs = $COMMON->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_array($rs, MYSQL_NUM); 
			//first item in row
            if($row){
              echo("<form action=\"AdminProcessEditGroup.php\" method=\"post\" name=\"Confirm\">");
	echo("<table class='striped'>\n<thead>");
	echo("<th>Time</th><th>Majors</th><tdhSeats Enrolled</th><th>Total Seats</th></thead>\n");

		// Display first appointment info for possible selection

              echo("<td><input class='with-gap' type=\"radio\" id='$row[0]' name=\"GroupApp\" 
                required value=\"row[]=$row[1]&row[]=$row[3]&row[]=$row[5]&row[]=$row[6]\"><label for='$row[0]'></label>");
              echo(date('l, F d, Y g:i A', strtotime($row[1])). "</td>");
              if($row[3]){
                echo("<td>".$row[3]."</td>"); 
              }
              else{
                echo("<td>Available to all majors</td>"); 
              }

              echo("<td>$row[5]</td><td>$row[6]");
			  echo("</label>");
			
			//rest of row (other appointments)
              echo("</td></tr>\n");
              while ($row = mysql_fetch_array($rs, MYSQL_NUM)) {
                echo("<tr><td><input class='with-gap' type=\"radio\" id='$row[0]' name=\"GroupApp\" 
                  required value=\"row[]=$row[1]&row[]=$row[3]&row[]=$row[5]&row[]=$row[6]\"><label for='$row[0]'></label>");
                echo(date('l, F d, Y g:i A', strtotime($row[1])). "</td>");
                if($row[3]){
                  echo("<td>".$row[3]."</td>"); 
                }
                else{
                  echo("<td>Available to all majors</td>"); 
                }

                echo("<td>$row[5]</td><td>$row[6]");
				echo("</label>");
                echo("</td></tr>");
                
              }

		echo("</table>");
                echo "<br><br><a id='delete' class='waves-effect waves-light btn-large'>Delete Appointment</a>&nbsp;&nbsp;";
                echo "<a id='edit' class='waves-effect waves-light btn-large'>Edit Appointment</a>&nbsp;";
                echo "<a id='cancel' class='waves-effect waves-light btn-large'>Cancel</a>&nbsp;";
                echo("<input id='delete-invis' style='display:none' type=\"submit\" name=\"next\" value=\"Delete Appointment\">");
              echo("<input id='edit-invis' style='display:none' type=\"submit\" name=\"next\" value=\"Edit Appointment\">");
			  echo("</form>");
			  echo("<form method=\"link\" action=\"AdminUI.php\">");
              echo("<input id='cancel-invis' style='display:none' type=\"submit\" name=\"next\" class=\"button large\" value=\"Cancel\">");
              echo("</form>");
            }
            else{
              echo("<br><b>There are currently no group appointments scheduled at the current moment.</b>");
              echo("<br><br>");
              echo("<form method=\"link\" action=\"AdminUI.php\">");
                 echo "<a id='cancel' class='waves-effect waves-light btn-large'>Cancel</a>";
                echo("<input id='cancel-invis' style='display:none' type=\"submit\" name=\"next\" value=\"Return to Home\">");
              echo("</form>");
            }
          ?>
</div>
<script>
    $('#delete').click(function() {
        $('#delete-invis').trigger('click');
    });
    $('#edit').click(function() {
        $('#edit-invis').trigger('click');
    });
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
</script>
<?php 
include('./workOrder/workButton.php');
include('layoutFooter.php');
?>
  