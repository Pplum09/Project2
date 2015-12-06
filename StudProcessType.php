<?php
/*
    filename: StudProcessType.php
    description: this script serves post data to other
    script files when a student selects whether they want
    an individual or group advising appointment
*/
session_start();
if ($_POST["type"] == "Group"){
        $_SESSION["advisor"] = $_POST["type"];
        header('Location: 08StudSelectTime.php');
}
elseif ($_POST["type"] == "Individual"){
        header('Location: 07StudSelectAdvisor.php');
}
?>
