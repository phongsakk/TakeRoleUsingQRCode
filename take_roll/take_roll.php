<?php
if (empty($_GET['token'])) exit();

$req = str_split((string)$_GET['token'], 3);
$UserID = $req[0];
$ClassID = $req[1];

$CurrentDay = date('Y-m-d');
$CurrentTime = date('H:i:s');

include('../school/conn/object_connect.php');
$sql = "SELECT * FROM takeroll where Date = ? AND ClassEnd > ? AND ClassBegin < ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $CurrentDay, $CurrentTime, $CurrentTime);
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

foreach ($result as $class) {
    $late = check_status($CurrentTime, $class['LateAt']);
    $sql = "UPDATE membertakeroll SET Status=? WHERE TID=?";
    if ($late === "LATE") $sql .= " AND Status = 'ABSENT'";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", ...[$late, $class['TID']]);
    $stmt->execute();
    $sql = "SELECT Class";
    echo "เช็กชื่อแล้ว : สถานะ=" . $late . " : <a href='../take_roll/?'>ดูข้อมูล</a><br>";
}
echo "";

// header('Location: ../take_roll');

function check_status(string $CurrentTime, string $LateAt): string
{
    if (strtotime($CurrentTime) < strtotime($LateAt)) return "PRESENT";
    return "LATE";
}
