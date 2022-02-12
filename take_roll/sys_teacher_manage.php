<?php
if (empty($_GET['class'])) :
    include('./sys_teacher_no_id.php');
else :
    include('../school/conn/object_connect.php');

    $ClassID = $_GET['class'];

    $sql = "SELECT ClassID,ClassBeginDefault,(SELECT COUNT(*) FROM takeroll WHERE ClassID = '$ClassID') AS Total FROM class WHERE ClassID = '$ClassID'";
    $stmt = $mysqli->query($sql);
    $checking = $stmt->fetch_assoc();

?>
    <form method="post" action="./sys_request.php" class="p-2 bg-light mb-2 rounded">
        <div class="col-6 mx-auto align-middle">
            <div class="row py-1 m-0 mb-1 w-100">
                <div class="alert alert-info" role="alert">
                    <?= isset($checking['Total']) ? $checking['Total'] : 0 ?> Weeks Checked !
                </div>
            </div>
            <div class="row py-1 mb-1 d-flex align-items-center">
                <div class="col-4">สัปดาห์ที่</div>
                <div class="col-8"><input class="form-control" type="number" name="Week" min="1" max="18" value="<?= $checking['Total'] + 1 ?>"></div>
            </div>
            <div class="row py-1 mb-1 d-flex align-items-center">
                <div class="col-4">วันที่</div>
                <div class="col-8">
                    <input class="form-control" type="date" name="Date" value="<?= date("Y-m-d") ?>">
                </div>
            </div>
            <div class="row py-1 mb-1 d-flex align-items-center">
                <div class="col-4">เวลาเริ่ม</div>
                <div class="col-8">
                    <input class="form-control" type="time" name="ClassBegin" value="<?= date("H:i", strtotime($checking['ClassBeginDefault'])) ?>">
                </div>
            </div>
            <div class="row py-1 mb-1 d-flex align-items-center">
                <div class="col-4">เวลาเช็กสาย</div>
                <div class="col-8">
                    <input class="form-control" type="time" name="LateAt" value="<?= date("H:i", strtotime('+30 minutes', strtotime($checking['ClassBeginDefault']))) ?>">
                </div>
            </div>
            <div class="row py-1 mb-1 d-flex align-items-center">
                <div class="col-4">เวลาสิ้นสุด</div>
                <div class="col-8">
                    <input class="form-control" type="time" name="ClassEnd" value="<?= date("H:i", strtotime('+3 hours', strtotime($checking['ClassBeginDefault']))) ?>">
                </div>
            </div>
            <div class="row py-1 w-100">
                <input type="hidden" name="ClassID" value="<?= $ClassID ?>">
                <div class="col text-center"><button class="btn btn-info">ยืนยัน</button></div>
            </div>
        </div>
    </form>
<?php
endif;
