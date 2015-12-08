<?php
session_start();
include('GetAdvisorData.php');
include('layoutHeader.php');
?>

<div class='container'>
     <script type="text/javascript">
    //   window.onload = function () {
    //       document.getElementById("PassW").onchange = validatePassword;
    //       document.getElementById("ConfP").onchange = validatePassword;
    //   }
    //   function validatePassword(){
    //     var pass2=document.getElementById("ConfP").value;
    //     var pass1=document.getElementById("PassW").value;
    //     if(pass1!=pass2)
    //         document.getElementById("ConfP").setCustomValidity("Passwords Don't Match");
    //     else
    //         document.getElementById("PassW").setCustomValidity('');  
    //     //empty string means no validation error
    //   }
    // </script>
		<h3>Create New Advisor Account</h3>
		<?php
      if(getConfirmPassword() == "false"){
        echo "<h3 style='color:red'>Passwords do not match!!</h3>";

	// New advisor data should not be in the table if password and confirm password fields don't match
	$debug = false;
	$COMMON = new Common($debug);

	$sql = "DELETE FROM `Proj2Advisors` WHERE `New` = 'true'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
      }
    ?>
		<form action="AdminProcessCreateNew.php" method="post" name="Create">
		
	      		<label for="firstN">First Name</label>
	      		<input id="firstN" size="20" maxlength="50" type="text" name="firstN" required autofocus>
	    	

	    	<div class="field">
	     		<label for="lastN">Last Name</label>
	      		<input id="lastN" size="20" maxlength="50" type="text" name="lastN" required>
	   	</div>	

		<div class="field">
	     		<label for="UserN">Username</label>
	      		<input id="UserN" size="20" maxlength="50" type="text" name="UserN" required>
	   	</div>	 

		<div class="field">
	     		<label for="PassW">Password</label>
	      		<input id="PassW" size="20" maxlength="50" type="password" name="PassW" required>
	   	</div>	

		<div class="field">
	     		<label for="ConfP">Confirm Password</label>
	      		<input id="ConfP" size="20" maxlength="50" type="password" name="ConfP" required>
	   	</div>	
		<br>
            <a id='submit' class="waves-effect waves-light btn-large">Submit</a>
            <a id='cancel' class="waves-effect waves-light btn-large">Cancel</a>
            <input id='submit-invis' style='display:none' type="submit" name="next" class="button large go" value="Submit">
		</form>
		<form method="link" action="AdminUI.php">
			<input id='cancel-invis' style='display:none' type="submit" name="home" class="button large" value="Cancel">
		</form>

</div>
<script>
    $('#submit').click(function() {
        $('#submit-invis').trigger('click');
    });
    $('#cancel').click(function() {
        $('#cancel-invis').trigger('click');
    });
</script>
<?php
include("layoutFooter.php");
?>