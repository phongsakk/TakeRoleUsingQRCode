<?php
session_start();
if (empty($_SESSION['UserID'])) exit("Please Login!");
if (in_array($_SESSION['Status'], array('STUDENT', 'USER'))) {
    include("./console_user.php");
} else {
    include("./console_admin.php");
}
