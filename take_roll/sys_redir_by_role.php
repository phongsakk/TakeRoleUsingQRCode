<?php
session_start();
if ($_SESSION['Status'] == "ADMIN") {
    header("location:../school/admin_page.php");
} else if ($_SESSION['Status'] == "TEACHER") {
    header("location:../school/teacher_page.php");
} else if ($_SESSION['Status'] == "STUDENT") {
    header("location:../school/student_page.php");
} else {
    header("location:../school/user_page.php");
}
