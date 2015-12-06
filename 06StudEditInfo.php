<?php
session_start();

$debug = false;
include('../CommonMethods.php');
$COMMON = new Common($debug);

$sql = "select * from Proj2Students";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

while($row = mysql_fetch_row($rs)){
	if($row[3] == $_SESSION["studID"]){
		
		$_SESSION["firstN"] = $row[1];
		$_SESSION["lastN"] = $row[2];
		$_SESSION["email"] = $row[4];
		$_SESSION["major"] = $row[5];
	}
}

?>
<?php
    include("layoutHeader.php");
?>

<div class='container' style='margin-top:8px'>
    <form action="StudProcessEdit.php" method="post" name="Edit">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="firstN" size="30" maxlength="20 "type="text" name="firstN" required autofocus required value=<?php echo $_SESSION["firstN"]?>>
                            <label for="firstN">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="lastN" size="30" maxlength="20" type="text" name="lastN" required value=<?php echo $_SESSION["lastN"]?>>
                            <label for="lastN">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="studID" size="30" maxlength="20" type="text" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" name="studID" required disabled value=<?php echo $_SESSION["studID"]?>>
                            <label for="studID">Student ID</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" size="30" maxlength="40" type="email" name="email" required value=<?php echo $_SESSION["email"]?>>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div>    
                        <select id="major" name="major">
                            <option <?php if($_SESSION["major"] == "") {echo("selected");}?> disabled>Select Major</option>
                            <option <?php if($_SESSION["major"] == 'Computer Engineering'){echo("selected");}?>>Computer Engineering</option>
				            <option <?php if($_SESSION["major"] == 'Computer Science'){echo("selected");}?>>Computer Science</option>
				            <option <?php if($_SESSION["major"] == 'Mechanical Engineering'){echo("selected");}?>>Mechanical Engineering</option>
				            <option <?php if($_SESSION["major"] == 'Chemical Engineering'){echo("selected");}?>>Chemical Engineering</option
                        </select>
                        <label>Materialize Select</label>
                    </div>
                    <div>
                        <input type="submit" name="next" value="Next">
                    </div>      
                </form>
</div>

<div style="display:none">

			<h2>Edit Student Information<span class="login-create"></span></h2>
			<form action="StudProcessEdit.php" method="post" name="Edit">
			<div class="field">
				<label for="firstN">First Name</label>
				<input id="firstN" size="30" maxlength="50" type="text" name="firstN" required value=<?php echo $_SESSION["firstN"]?>>
			</div>
			<div class="field">
			  <label for="lastN">Last Name</label>
			  <input id="lastN" size="30" maxlength="50" type="text" name="lastN" required value=<?php echo $_SESSION["lastN"]?>>
			</div>
			<div class="field">
				<label for="studID">Student ID</label>
				<input id="studID" size="30" maxlength="7" type="text" pattern="[A-Za-z]{2}[0-9]{5}" title="AB12345" name="studID" disabled value=<?php echo $_SESSION["studID"]?>>
			</div>
			<div class="field">
				<label for="email">E-mail</label>
				<input id="email" size="30" maxlength="255" type="email" name="email" required value=<?php echo $_SESSION["email"]?>>
			</div>
			<div class="field">
				  <label for="major">Major</label>
				  <select id="major" name = "major">
					<option <?php if($_SESSION["major"] == 'Computer Engineering'){echo("selected");}?>>Computer Engineering</option>
					<option <?php if($_SESSION["major"] == 'Computer Science'){echo("selected");}?>>Computer Science</option>
					<option <?php if($_SESSION["major"] == 'Mechanical Engineering'){echo("selected");}?>>Mechanical Engineering</option>
					<option <?php if($_SESSION["major"] == 'Chemical Engineering '){echo("selected");}?>>Chemical Engineering</option>
					</select>
			</div>
			<div class="nextButton">
				<input type="submit" name="save" class="button large go" value="Save">
			</div>

		</form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
    <script>
    
        $(document).ready(function() {
                $('select').material_select();
            });
    </script>
</div>
    <?php
    include("layoutFooter.php");
?>