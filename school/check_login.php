<?php
session_start();
include "conn/connect.php";

$strSQL = "SELECT * FROM `member` WHERE Username = '"
	. mysqli_real_escape_string($objCon, $_POST['txtUsername'])
	. "' and Password = '"
	. mysqli_real_escape_string($objCon, $_POST['txtPassword'])
	. "'";
$objQuery = mysqli_query($objCon, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
mysqli_close($objCon);

if (!$objResult) exit("Username หรือ Password ผิดพลาด!");

$_SESSION["UserID"] = $objResult["UserID"];
$_SESSION["Status"] = $objResult["Status"];

session_write_close();

header("location:./console.php");
