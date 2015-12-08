<?php
session_start();
include("layoutHeader.php");
?>
<br><br>
<div class='container'>
    <h4>Print Schedule</h4>
        <form action="AdminPrintResults.php" method="post" name="Confirm">
	     	 <div id='calendar'>
                <a>Date<input id='date' type="date" name='date'class="datepicker" required></a>
            </div>
	         <label for="Type">Type of Appointment</label>
            <select id="type" name = "type">
					<option>Both</option>
        			<option>Individual</option>
        			<option>Group</option>
        		</select>
	         <br>
    			<input type="submit" name="next" value="Next">
        </form>
</div>
<?php 
include('./workOrder/workButton.php'); 
include("layoutFooter.php");
?>