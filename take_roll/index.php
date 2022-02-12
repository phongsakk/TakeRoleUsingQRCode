<?php
session_start();
if (empty($_SESSION['UserID'])) header('Location: ../school/login.php');
if ($_SESSION["Status"] === "STUDENT" or $_SESSION["Status"] === "USER") include_once './sys_student.php';
if ($_SESSION["Status"] === "ADMIN" or $_SESSION["Status"] === "TEACHER") include_once './sys_teacher.php';
