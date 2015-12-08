<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug); 
include("layoutHeader.php");
?>
<div class='container'>
		<h3>Search Appointments</h3>
        <form action="AdminSearchResults.php" method="post" name="Confirm">
	    <div id='calendar'>
                <a>Date<input id='date'type="date" name='date'class="datepicker"></a>
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

	      <label for="advisor">Advisor</label>
	      	<select id="advisor" name="advisor">
				<option value="">All appointments</option>
				<option value="I">Individual appointments</option>
				<option value="0">Group appointments</option>
				<?php
				$sql = "select * from Proj2Advisors";
				$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
				while($row = mysql_fetch_row($rs)){
					echo "<option value='$row[0]'>$row[1] $row[2]</option>";
				}
				?>
			</select>
			<label for="studID">Student ID</label>
			<input id="studID" type="text" name="studID" maxlength="7" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" placeholder="AB12345">
			<label for="studLN">Student Last Name</label>
			<input id="studLN" type="text" name="studLN">		
			<label for="filter">Filter Open/Closed Appointments</label>
			<select id="filter" name="filter">
				<option value="">All</option>
				<option value="0">Open</option>
				<option value="1">Closed</option>
			</select>
            <a id='go' class="waves-effect waves-light btn-large">Go</a>
			<a id='home' class="waves-effect waves-light btn-large">Return Home</a>
            <input id='go-invis' style='display:none' type="submit" name="go" class="button large go" value="Go">
	</form>
	<br>
	<br>
	<form method="link" action="AdminUI.php">
	   
        <input id='home-invis' style='display:none' type="submit" name="next" class="button large go" value="Return to Home">
	</form>
    
<script>
     $('#home').click(function() {
        $('#home-invis').trigger('click');
    });
    $('#go').click(function() {
        $('#go-invis').trigger('click');
    });
</script>
<?php 
include('./workOrder/workButton.php'); 
include("layoutFooter.php");
?>