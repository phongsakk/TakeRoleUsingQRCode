<?php
$link = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/Dewi/take_roll/take_roll.php?token={$_SESSION['UserID']}{$_GET['class']}";
include('../school/conn/object_connect.php');
$sql = "SELECT M.Status, M.UserID, C.ClassID, M.Name, C.ClassTitle 
        FROM memberinclass MIC 
        INNER JOIN member M 
        ON MIC.UserID=M.UserID 
        INNER JOIN class C 
        ON MIC.ClassID=C.ClassID 
        WHERE M.UserID=? 
        AND C.ClassID=?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ii", ...[$_SESSION['UserID'], $_GET['class']]);
$stmt->execute();
$info = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<div id="printarea" class="p-2 bg-light mb-2 rounded text-center" data-print="true">

    <img class="mt-3 mb-2 img-thumbnail" src="<?= "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=$link" ?>" alt="QR CODE">

    <div class="col-4 p-2 mx-auto text-left img-thumbnail" role="button">
        <div class="row">
            <div class="col-4"><b>รหัส</b></div>
            <div class="col-8"><?= $info['Status'] . "-" . str_pad($info['UserID'], 3, "0", STR_PAD_LEFT) . "-" . str_pad($info['ClassID'], 3, "0", STR_PAD_LEFT) ?></div>
        </div>
        <div class="row">
            <div class="col-4"><b>ชื่อ</b></div>
            <div class="col-8"><?= $info['Name'] ?></div>
        </div>
        <div class="row">
            <div class="col-4 fw-bold"><b>กลุ่มเรียน</b></div>
            <div class="col-8"><?= $info['ClassTitle'] ?></div>
        </div>
    </div>
</div>