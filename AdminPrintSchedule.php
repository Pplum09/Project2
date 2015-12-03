<?php
session_start();
?>

<?php include('header.php'); ?>
    <title>Print Schedule</title>
    <script type="text/javascript">
    function saveValue(target){
	var stepVal = document.getElementById(target).value;
	alert("Value: " + stepVal);
    }
    </script>
  </head>
  <body>
    <div id="login">
      <div id="form">
        <div class="top">
		      <h1>Print Schedule</h1>
          <form action="AdminPrintResults.php" method="post" name="Confirm">
	         <div class="field">
	     	     <label for="date">Date</label>
             <input id="date" type="date" name="date" placeholder="mm/dd/yyyy" required autofocus> (mm/dd/yyyy)
	         </div>

	         <div class="field">
        		<label for="Type">Type of Appointment</label>
            <select id="type" name = "type">
					<option>Both</option>
        			<option>Individual</option>
        			<option>Group</option>
        		</select>
	         </div>

	         <br>

    	    <div class="nextButton">
    			<input type="submit" name="next" class="button large go" value="Next">
        </form>
	</div>
	</div>
<?php include('footer.php'); ?>

