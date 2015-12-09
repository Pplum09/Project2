<?php
session_start();

// log in validation added
 $debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);

// get names from post data
$studentID = $_POST["studID"];

// build query string
$sql = "select * from Proj2Students where `StudentID` = '$studentID'";

// execute query
$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

// validate query
if ($row[3] == $studentID) {
    $_SESSION["firstN"] = $_POST["firstN"];
    $_SESSION["lastN"] = $_POST["lastN"];
    $_SESSION["studID"] = $_POST["studID"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["major"] = $_POST["major"];

    header('Location: 02StudHome.php');
}

else {
    $_SESSION["userDNE"] = TRUE;
    header('Location: 01StudSignIn.php');   
}

?>
