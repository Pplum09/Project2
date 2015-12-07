<?php
session_start();
$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);
?>
<?php
    include("layoutHeader.php");
?>
<link rel="stylesheet" href="css/jquery.timepicker.css">
<script src="js/jquery.timepicker.min.js"></script> 
    <h4 class="center">Search for Appointments</h4>
    <div class="row">
        <div class="col s4 offset-s4">
            <form id="search" action="11StudSearchResult.php" method="post" name="SearchApp">
                <div>
                    <a>Date<input id='date'type="date" name='date'class="datepicker"></a>
                </div>
                <div>
                    <span>
                    <div>Start Time:</div>
                    <div>
                        <input id='startTime' name="time[]">
                    </div>
                    </span>
                    <span>
                    <div>End Time:</div>
                    <div>
                        <input id='endTime'> 
                    </div>
                    </span>
                </div> 
                <div>
                    <select id="advisor" name="advisor">
                        <option value="" selected>All Appointments</option>
                        <option value='I'>Individual Appointments</option>
				        <option value='0'>Group Appointments</option>
				        <?php
                            $sql = "SELECT * FROM Proj2Advisors";
                            $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
                            while($row = mysql_fetch_row($rs)){
                                echo "<option value='$row[0]'>$row[1] $row[2]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div style="margin-top:10px">
                    <input type="submit" name="go" value="Submit">
                </div>
            </form>  
            <form action="02StudHome.php" method="post" name="complete">
            <div style="margin-top:10px" class="returnButton">
                <input type="submit" name="return" value="Return to Home">
            </div>
		</form>
		</div>
    </div>
<button id="test">TEST</button>
          <script>
              $(document).ready(function() {
                $('select').material_select();
            });
              
            $('#test').click(function() {
                var startTime = $('#startTime').val();
                var endTime = $('#endTime').val();
                // holds am/pm info
                var timeCheck = startTime.slice(-2);
                
                // just time
                startTime = startTime.slice(0, -2);
                
                if (timeCheck == "pm") {
                    var hour = starTime.slice(0, -2);
                    var hourNum = parseInt(hour) + 12;
                    hour = hourNum.toString();
                    startTime = hour + startTime.slice(1, 4);
                }
                
                timeCheck = endTime.slice(-2);
                if (timeCheck == "pm") {
                    var hour = endTime.slice(0, -2);
                    var hourNum = parseInt(hour) + 12;
                    hour = hourNum.toString();
                    endTime = hour + endTime.slice(1, 4);
                }
                
                $('#startTime').val() = startTime + ":00";
                $('#endTime').val() = endTime + ":00";
            });
              
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                format: 'dd/mm/yyyy'
            });
              
            $('#startTime').timepicker({'step': 30});
            $('#endTime').timepicker({'step': 30});
          </script>
<?php
    include("layoutFooter.php");
?>