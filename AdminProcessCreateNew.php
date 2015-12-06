<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);

$firstN = $_POST["firstN"];		// Modified to eliminate session variables- new advisor info is directly inserting in
$lastN = $_POST["lastN"];		// the advisor table in upcoming sql query
$userN = $_POST["UserN"];
$passW = $_POST["PassW"];

// Added sql query: adds new advisor to table before checking for the same advisor already existing. Confirm password input is
// considered to be the same as password input until checked later

$sql = "insert into `Proj2Advisors`(`FirstName`, `LastName`, `Username`, `Password`, `ConfirmPassword`, `New`) values ('$firstN','$lastN','$userN','$passW','true','true')";
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

if($_POST["PassW"] == $_POST["ConfP"]){
	header('Location: AdminCreateNew.php');
}
elseif($_POST["PassW"] != $_POST["ConfP"]){
	$sql = "UPDATE `Proj2Advisors` SET `ConfirmPassword`= 'false' WHERE `New` = 'true'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);

	header('Location: AdminCreateNewAdv.php');
}

?>