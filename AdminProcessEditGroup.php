<?php
session_start();
$debug = false;
include('CommonMethods.php');
$COMMON = new Common($debug);

// Gets appointment info to later set `Alter` column in table to either edit or delete, depending on the request
$group = $_POST["GroupApp"];
parse_str($group);

if ($_POST["next"] == "Delete Appointment"){
	// Appointment is labeled as appointment to delete

	$sql = "UPDATE `Proj2Appointments` SET `Alter`= 'Delete' WHERE `Time` = '$row[0]' 
              AND `Major` = '$row[1]' 
              AND `EnrolledNum` = '$row[2]'
              AND `Max` = '$row[3]'";
	$rs = $COMMON->executeQuery($sql, "Advising Appointments");

	header('Location: AdminConfirmEditGroup.php');
}
elseif ($_POST["next"] == "Edit Appointment"){
	// Appointment is labeled as appointment to edit

	$sql = "UPDATE `Proj2Appointments` SET `Alter`= 'Edit' WHERE `Time` = '$row[0]' 
              AND `Major` = '$row[1]' 
              AND `EnrolledNum` = '$row[2]'
              AND `Max` = '$row[3]'";
	$rs = $COMMON->executeQuery($sql, "Advising Appointments");

	header('Location: AdminProceedEditGroup.php');
}

?>