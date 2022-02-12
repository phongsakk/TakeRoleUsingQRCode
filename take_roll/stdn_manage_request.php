<?php
if (empty($_REQUEST['submit'])) exit();
include("../school/conn/object_connect.php");
switch ($_REQUEST['submit']) {
    case "classCreate":
        $sql = "INSERT INTO class(ClassTitle,ClassDetail,ClassBeginDefault)VALUES(?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $_REQUEST['classTitle'], $_REQUEST['classDetail'], $_REQUEST['beginTime']);
        $stmt->execute();
        $classID = $stmt->insert_id;
        break;
    case "addStudent":
        // จับคู่ผู้เรียนกับกลุ่มเรียน
        $classID = $_REQUEST['ClassID'];
        $sql = "INSERT INTO memberinclass(UserID,ClassID)VALUES(?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $_REQUEST['UserID'], $_REQUEST['ClassID']);
        if (!$stmt->execute()) exit("ไม่สามารถเพิ่มได้");
        $stmt->close();
        // เช็กชื่อหากมีคลาสอยู่แล้ว
        $sql = "INSERT INTO membertakeroll(UserID,TID,Status)(SELECT (?) AS UserID, (t.TID) AS TID, 'ABSENT' AS Status FROM takeroll t WHERE t.ClassID=?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $_REQUEST["UserID"], $_REQUEST['ClassID']);
        $stmt->execute();
        $stmt->close();
        break;
    case "removeStudent":
        $classID = $_REQUEST['ClassID'];
        // ลบประวัติการเช็กชื่อก่อน
        $sql = "SELECT * FROM takeroll WHERE ClassID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $_REQUEST['ClassID']);
        $stmt->execute();
        $takerolls = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        $sql = "DELETE FROM membertakeroll WHERE UserID = ? AND TID = ?";
        $stmt = $mysqli->prepare($sql);
        foreach ($takerolls as $t) {
            $stmt->bind_param("ii", $_REQUEST['UserID'], $t['TID']);
            $stmt->execute();
        }
        $stmt->close();
        // ลบความสัมพันธ์ระหว่างผู้เรียนและรายวิชาที่เลือก
        $sql = "DELETE FROM memberinclass WHERE UserID = ? AND ClassID = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $_REQUEST['UserID'], $_REQUEST['ClassID']);
        $stmt->execute();
        $stmt->close();
        break;
    default:
        var_export($_REQUEST);
        exit();
}
$mysqli->close();
header("Location: ./index.php?option=classManage&class=$classID");
