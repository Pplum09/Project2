<?php
session_start();
include("layoutHeader.php");
?>
<div class="container">
<h4>Select which appointment you would like to delete: </h4>
          <?php
            $debug = false;
            include('CommonMethods.php');
            $COMMON = new Common($debug);

            $sql = "SELECT * FROM `Proj2Appointments` WHERE `AdvisorID` != '0' and `Time` > '".date('Y-m-d H:i:s')."' ORDER BY `Time`";
            $rs = $COMMON->executeQuery($sql, "Advising Appointments");
            $row = mysql_fetch_array($rs, MYSQL_NUM); 
			//first item in row
            if($row){
                echo("<form action=\"AdminConfirmEditInd.php\" method=\"post\" name=\"Confirm\">");
                echo("<table class='striped'>");
                echo("<thead><th>Time</th><th>Majors</th><th>Enrolled</th></thead>\n");

                $secsql = "SELECT `FirstName`, `LastName` FROM `Proj2Advisors` WHERE `id` = '$row[2]'";
                $secrs = $COMMON->executeQuery($secsql, "Advising Appointments");
                $secrow = mysql_fetch_row($secrs);

              if($row[4]){
                $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[4]'";
                $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
                $trdrow = mysql_fetch_row($trdrs);
              }

              echo("<tr><td><input class='with-gap' type=\"radio\" id='$row[0]' name=\"IndApp\" 
                required value=\"row[]=$row[1]&row[]=$secrow[0]&row[]=$secrow[1]&row[]=$row[3]&row[]=$row[4]\"><label for='$row[0]'></label>");
              echo(date('l, F d, Y g:i A', strtotime($row[1])). "</td>");
              if($row[3]){
                echo("<td>$row[3]</td>"); 
              }
              else{
                echo("Available to all majors"); 
              }
              
              if($row[4]){
                echo("<td>$trdrow[0] $trdrow[1]</td>");
              }
              else{
                echo("<td>Empty</td>");
              }
			  echo("</tr>\n");

              
                // WHY WERE THEY SPLIT UP LIKE THIS?
			  //rest of items in row
              while ($row = mysql_fetch_array($rs, MYSQL_NUM)) {
                $secsql = "SELECT `FirstName`, `LastName` FROM `Proj2Advisors` WHERE `id` = '$row[2]'";
                $secrs = $COMMON->executeQuery($secsql, "Advising Appointments");
                $secrow = mysql_fetch_row($secrs);

                if($row[4]){
                  $trdsql = "SELECT `FirstName`, `LastName` FROM `Proj2Students` WHERE `StudentID` = '$row[4]'";
                  $trdrs = $COMMON->executeQuery($trdsql, "Advising Appointments");
                  $trdrow = mysql_fetch_row($trdrs);
                }

                echo("<tr><td><input class='with-gap' type=\"radio\" id='$row[0]' name=\"IndApp\" 
                  required value=\"row[]=$row[1]&row[]=$secrow[0]&row[]=$secrow[1]&row[]=$row[3]&row[]=$row[4]\"><label for='$row[0]'></label>");
                echo(date('l, F d, Y g:i A', strtotime($row[1])). "</td>");
                if($row[3]){
                  echo("<td>$row[3]</td>"); 
                }
                else{
                  echo("Available to all majors"); 
                }

                

                if($row[4]){
                  echo("<td>$trdrow[0] $trdrow[1]</td>");
                }
                else{
                  echo("<td>Empty</td>");
                }
				echo("</tr>\n");
		
                
				
              }
              echo("</table>");

              echo("<div class=\"nextButton\">");
                echo "<a id='delete' class='waves-effect waves-light btn-large'>Delete Appointment</a>&nbsp;&nbsp;";
                  echo "<a id='cancel' class='waves-effect waves-light btn-large'>Cancel</a>";
                echo("<input id='delete-invis' style='display:none' type=\"submit\" name=\"next\" class=\"button large go\" value=\"Delete Appointment\">");
              echo("</div>");
			  echo("</form>");
			  echo("<form method=\"link\" action=\"AdminUI.php\">");
              
              echo("<input id='cancel-invis' style='display:none' type=\"submit\" name=\"next\" value=\"Cancel\">");
              echo("</form>");
            }
            else{
              echo("<br><b>There are currently no individual appointments scheduled at the current moment.</b>");
              echo("<br><br>");
			  echo("</td</tr>");
              echo("<form method=\"link\" action=\"AdminUI.php\">");
                echo "<a id='cancel' class='waves-effect waves-light btn-large'>Return to Home</a>";
              echo("<input id='cancel-invis' style='display:none' type=\"submit\" name=\"next\" class=\"button large go\" value=\"Return to Home\">");
              echo("</form>");
            }
          ?>
</div>		  
<script>
    $('#delete').click(function() {
        $('#delete-invis').trigger('click');
    });
    
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
</script>
<?php 
include('./workOrder/workButton.php'); 
include("layoutFooter.php");
?>