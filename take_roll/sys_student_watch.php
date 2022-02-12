<?php
include('../school/conn/object_connect.php');
$UserID = $_SESSION['UserID'];
$ClassID = $_GET['class'];
$sql = "SELECT M.Name,C.ClassTitle FROM memberinclass MIC 
        INNER JOIN member M 
        ON MIC.UserID=M.UserID
        INNER JOIN class C
        ON MIC.ClassID=C.ClassID 
        WHERE MIC.UserID = ?
        AND MIC.ClassID = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", $UserID, $ClassID);
$stmt->execute();
$info = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<div class="p-2 bg-light mb-2 rounded">
    <table class="table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th colspan="18"><?= $info['Name'] ?></th>
            </tr>
            <tr>
                <th>กลุ่มเรียน</td>
                <th colspan="18"><?= $info['ClassTitle'] ?></th>
            </tr>
        </thead>
        <tbody>
            <tr class="table-active">
                <th>Weeks</th>
                <?php
                $i = 0;
                while ($i < 18) {
                ?>
                    <td class="text-center"><?= ++$i ?></td>
                <?php
                }
                ?>
            </tr>
            <tr>
                <th>Status</th>
                <?php
                $sql = "SELECT * FROM membertakeroll MTR 
                INNER JOIN takeroll T
                ON MTR.TID=T.TID
                WHERE MTR.UserID=?
                AND T.ClassID=?";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("ii", $UserID, $ClassID);
                $stmt->execute();
                $arr = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                $stat = array_column($arr, "Status");
                $time = array_column($arr, "timestamp");
                $stmt->close();
                $i = 0;
                while ($i < 18) {
                ?>
                    <td class="text-center" title="<?= isset($stat[$i]) ? "$stat[$i]" : "NONE"; ?>"><?= isset($stat[$i]) ? ($stat[$i] === "PRESENT" ? "1" : ($stat[$i] === "LATE" ? "ส" : "0")) : "-"; ?></td>
                <?php
                    $i++;
                }
                ?>
            </tr>
        </tbody>
    </table>
</div>