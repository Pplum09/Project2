<?php
session_start();
$debug = false;
include('CommonMethods.php');

	/* 	The following functions eliminate the need for all $_SESSION variables other
		than $_SESSION["studID"]. Each function returns a replacement for a session
		variable given the student's ID, passed as a parameter.
	*/


function getStudExist() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$num_rows = mysql_num_rows($rs);

	if($num_rows == 0) {
		return FALSE;
	} else {
		return TRUE;
	}
}

function getFirstName() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	$name = ucwords(strtolower($row[1]));		// Converts all uppercase to normal capitalization
	return $name;
}	

function getLastName() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	$name = ucwords(strtolower($row[2]));		// Converts all uppercase to normal capitalization
	return $name;
}	

function getEmail() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	return $row[4];
}
	
function getMajor() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	return $row[5];
}

function getStatus() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	return $row[6];
}

function getAdvisor() {
	$COMMON = new Common($debug);
	$sID = $_SESSION["studID"];

	$sql = "select * from Proj2Students where `StudentID` = '$sID'";
	$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
	$row = mysql_fetch_row($rs);

	return $row[7];
}

?>			