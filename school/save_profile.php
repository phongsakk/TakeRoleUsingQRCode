<?php
session_start();
if (empty($_SESSION['UserID'])) exit("Please Login!");

include "conn/connect.php";

if ($_POST["txtPassword"] != $_POST["txtConPassword"]) exit("Password not Match!");

$strSQL = "UPDATE `member` SET Password = '" . trim($_POST['txtPassword']) . "' 
	,Name = '" . trim($_POST['txtName']) . "' WHERE UserID = '" . $_SESSION["UserID"] . "' ";
$objQuery = mysqli_query($objCon, $strSQL);

echo "Save Completed!<br>";

echo "<br> Go to <a href='console.php'>Console page</a>";

mysqli_close($objCon);
