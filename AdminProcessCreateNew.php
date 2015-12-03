<?php
session_start();

$_SESSION["AdvF"] = $_POST["firstN"];
$_SESSION["AdvL"] = $_POST["lastN"];
$_SESSION["AdvLoc"] = $_POST["Loc"];
$_SESSION["AdvRoom"] = $_POST["Room"];
$_SESSION["AdvUN"] = $_POST["UserN"];
$_SESSION["AdvPW"] = $_POST["PassW"];
$_SESSION["PassCon"] = false;

if($_POST["PassW"] == $_POST["ConfP"]){
    header('Location: AdminCreateNew.php');
}
elseif($_POST["PassW"] != $_POST["ConfP"]){
    $_SESSION["PassCon"] = true;
    header('Location: AdminCreateNewAdv.php');
}

?>