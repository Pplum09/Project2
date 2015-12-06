<?php

/* Had to make sure sessions was enabled. Some help here:

https://wiki.umbc.edu/pages/viewpage.action?pageId=46563550

cd /afs/umbc.edu/public/web/sites/coeadvising/prod/php/session/

/usr/bin/fs sa /afs/umbc.edu/public/web/sites/coeadvising/prod/php/session/ web.coeadvising all


then edit .htaccess file here in the same directory

*/


session_start();

include('GetAdvisorData.php');
$debug = false;
$Common = new Common($debug);

// Added to get admin ID from the input username

$tempN = $_POST["UserN"];
$tempP = $_POST["PassW"];
$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$tempN' AND `Password` = '$tempP'";
$rs = $Common->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
$row = mysql_fetch_row($rs);

$_SESSION["userID"] = $row[0];		// Addition to provide a single session variable in place of all others

$user = getUsername();
$pass = getPassword();

$sql = "SELECT * FROM `Proj2Advisors` WHERE `Username` = '$user' AND `Password` = '$pass'";
$rs = $Common->executeQuery($sql, "Advising Appointments");
$row = mysql_fetch_row($rs);

if($row){
	if($debug) { echo("<br>".var_dump($_SESSION)."<- Session variables above<br>"); }
	else { header('Location: AdminUI.php'); }
}
else{
	header('Location: AdminSignIn.php'); 
}

?>