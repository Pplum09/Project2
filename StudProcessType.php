<?php
session_start();
include('GetStudentData.php');
if ($_POST["type"] == "Group"){
	getAdvisor() = $_POST["type"];
	header('Location: 08StudSelectTime.php');
}
elseif ($_POST["type"] == "Individual"){
	header('Location: 07StudSelectAdvisor.php');
}
?>