<?php
include('../school/conn/object_connect.php');
$ClassID = $_POST['ClassID'];
$Week = $_POST['Week'];
$Date = $_POST['Date'];
$ClassBegin = $_POST['ClassBegin'];
$ClassEnd = $_POST['ClassEnd'];
$LateAt = $_POST['LateAt'];
try {
    $sql = "INSERT INTO takeroll(ClassID,Week,Date,ClassBegin,ClassEnd,LateAt) VALUES(?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("iissss", ...[$ClassID, $Week, $Date, $ClassBegin, $ClassEnd, $LateAt]);
    if (!$stmt->execute()) throw new Exception($stmt->error_reporting);
    $TID = $stmt->insert_id;
    $sql = "INSERT INTO membertakeroll(TID,UserId,Status)
                SELECT DISTINCT 
                    (?) AS TID, 
                    UserID, 
                    ('ABSENT') AS Status 
                FROM memberinclass 
                WHERE ClassID = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ii", ...[$TID, $ClassID]);
    if (!$stmt->execute()) throw new Exception($stmt->error_reporting);
} catch (Exception $e) {
    exit($e->getMessage());
}
$go = str_replace("option=manage", "option=watch", $_SERVER['HTTP_REFERER']);
header("Location: $go");
