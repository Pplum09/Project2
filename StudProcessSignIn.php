<?php
  //Start the session.
session_start();

//Set the session variables (Student sign-in form).
$_SESSION["firstN"] = strtoupper($_POST["firstN"]);
$_SESSION["lastN"] = strtoupper($_POST["lastN"]);
$_SESSION["studID"] = strtoupper($_POST["studID"]);
$_SESSION["email"] = $_POST["email"];

if($_POST["major"] == "Chemical Engineering")
{
    $_POST["major"] = "CENG";
}
else if($_POST["major"] == "Computer Engineering")
{
    $_POST["major"] = "CMPE";
}
else if($_POST["major"] == "Computer Science")
{
    $_POST["major"] = "CMSC";
}
else if($_POST["major"] == "Engineering Undecided")
{
    $_POST["major"] = "ENGR";
}
else if($_POST["major"] == "Mechanical Engineering")
{
    $_POST["major"] = "MENG";
}

$_SESSION["major"] = $_POST["major"];

//Redirects current page to 02StudHome.php
header('Location: 02StudHome.php');
?>
