<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);
include("layoutHeader.php");
?>
    <h4 class="center">Search for Appointments</h4>
    <div class="row">
        <div class="col s4 offset-s4">
            <form id="search" action="11StudSearchResult.php" method="post" name="SearchApp">
                <div>
                    <a>Date<input id='date'type="date" name='date' class="datepicker" value=""></a>
                </div>
                <div id='times'>
                <h5>Times</h5>
                    <input id='box1' type="checkbox" name='time[]' value='08:00:00'>
                    <label for="box1">8:00AM - 8:30AM</label><br>
                    <input id='box2'type="checkbox" name='time[]' value='08:30:00'>
                    <label for="box2">8:30AM - 9:00AM</label><br>
                    <input id='box3' type="checkbox" name='time[]' value='09:00:00'>
                    <label for="box3">9:00AM - 9:30AM</label><br>
                    <input id='box4' type="checkbox" name='time[]' value='09:30:00'>
                    <label for="box4">9:30AM - 10:00AM</label><br>
                    <input id='box5' type="checkbox" name='time[]' value='10:00:00'>
                    <label for="box5">10:00AM - 10:30AM</label><br>
                    <input id='box6' type="checkbox" name='time[]' value='10:30:00'>
                    <label for="box6">10:30AM - 11:00AM</label><br>
                    <input id='box7' type="checkbox" name='time[]' value='11:00:00'>
                    <label for="box7">11:00AM - 11:30AM</label><br>
                    <input id='box8' type="checkbox" name='time[]' value='11:30:00'>
                    <label for="box8">11:30AM - 12:00AM</label><br>
                    <input id='box9' type="checkbox" name='time[]' value='12:00:00'>
                    <label for="box9">12:00PM - 12:30PM</label><br>
                    <input id='box10' type="checkbox" name='time[]' value='12:30:00'>
                    <label for="box10">12:30PM - 1:00PM</label><br>
                    <input id='box11' type="checkbox" name='time[]' value='13:00:00'>
                    <label for="box11">1:00PM - 1:30PM</label><br>
                    <input id='box12' type="checkbox" name='time[]' value='13:30:00'>
                    <label for="box12">1:30PM - 2:00PM</label><br>
                    <input id='box13' type="checkbox" name='time[]' value='14:00:00'>
                    <label for="box13">2:00PM - 2:30PM</label><br>
                    <input id='box14'type="checkbox" name='time[]' value='14:30:00'>
                    <label for="box14">2:30PM - 3:00PM</label><br>
                    <input id='box15' type="checkbox" name='time[]' value='15:00:00'>
                    <label for="box15">3:00PM - 3:30PM</label><br>
                    <input id='box16'type="checkbox" name='time[]' value='15:30:00'>
                    <label for="box16">3:30PM - 4:00PM</label><br>
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
          <script>
              $(document).ready(function() {
                $('select').material_select();
            });
              
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year
                format: 'mm/dd/yyyy'
            });
            </script>
<?php
    include("layoutFooter.php");
?>