<?php
session_start();
$firstN = strtoupper($_POST["firstN"]);
$lastN = strtoupper($_POST["lastN"]);
$studID = $_POST["studID"];
$email = $_POST["email"];
$major = $_POST["major"];
// registration validation added
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);

// get names from post data
$studentID = $_POST["studID"];

// build query string
$sql = "select `StudentID` from Proj2Students where `StudentID` = '$studentID'";

// execute query
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

// if true, then user does not exist, thus add user info
if ($row[0] == "") {
  $_SESSION["regPass"] = TRUE;
    
  // create query string
  $sql = "INSERT INTO `Proj2Students`(`FirstName`, `LastName`, `StudentID`, `Email`, `Major`, `Status`) VALUES ('". $firstN ."','". $lastN ."', '". $studID ."', '". $email ."','". $major ."','N')";
  $rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
}
// registration fail, ID already exists
else {
  $_SESSION["regPass"] = FALSE; 
}

header("Location: 01StudSignIn.php"); 
?>