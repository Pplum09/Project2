<?php
session_start();
include("layoutHeader.php");
?>
<div class="container">
    <h1>UMBC COEIT Engineering and Computer Science Advising</h1>
    <h2>Admin Sign In</h2>

    <?php
        $id = $_SESSION["userID"];
        if(empty($id)){		// Altered to check if username and password line up with a real advisor ID
            echo "<h3 style='color:red'>Invalid Username/Password combination</h3>";
        }
    ?>
    <form action="AdminProcessSignIn.php" method="POST" name="SignIn">
        <label for="UserN">Username</label>
        <input id="UserN" size="20" maxlength="50" type="text" name="UserN" required autofocus>
        <label for="PassW">Password</label>
        <input id="PassW" size="20" maxlength="50" type="password" name="PassW" required>
        
        <input type="submit" name="next" class="button large go" value="Next">
	</form>
</div>
<?php
include("layoutFooter.php");
?>