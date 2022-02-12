<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการระบบเช็กชื่อ</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container mt-2">
        <h1 class="w-100 text-center mt-5 mb-2">จัดการการเช็กชื่อ</h1>
        <div class="p-2 bg-light mb-2 rounded">
            <form action="../take_roll/index.php" class="d-flex justify-content-around">
                <div class="col-4 d-flex align-items-center">
                    <label for="option">เลือกเมนู</label>
                    <select class="form-select form-select w-auto mx-2 flex-fill" name="option" required>
                        <option value="" selected disabled>-- เมนู --</option>
                        <optgroup label="จัดการการเช็กชื่อ">
                            <option value="watch" <?= (isset($_GET['option']) and $_GET['option'] == 'watch') ? "selected" : "" ?>>ดูประวัติการเช็กชื่อ</option>
                            <option value="manage" <?= (isset($_GET['option']) and $_GET['option'] == 'manage') ? "selected" : "" ?>>เปิดระบบเช็กชื่อประจำสัปดาห์</option>
                        </optgroup>
                        <optgroup label="จัดการชั้นเรียน">
                            <option value="classCreate" <?= (isset($_GET['option']) and $_GET['option'] === "classCreate") ? "selected" : "" ?>>เพิ่มกลุ่มเรียน</option>
                            <option value="classManage" <?= (isset($_GET['option']) and $_GET['option'] === "classManage") ? "selected" : "" ?>>จัดการสมาชิกกลุ่มเรียน</option>
                        </optgroup>

                    </select>
                </div>
                <div class="col-4 d-flex align-items-center">
                    <label for="class">เลือกกลุ่มเรียน</label>
                    <select class="form-select form-select w-auto mx-2 flex-fill" name="class">
                        <option value="" selected disabled>-- กลุ่มเรียน --</option>
                        <?php
                        include('../school/conn/object_connect.php');
                        $sql = "SELECT * FROM class";
                        $res = $mysqli->query($sql);
                        $class = $res->fetch_all(MYSQLI_ASSOC);
                        $mysqli->close();
                        foreach ($class as $cls) {
                        ?>
                            <option value="<?= $cls['ClassID'] ?>" <?php if (isset($_GET['class']) and $_GET['class'] == $cls['ClassID']) echo "selected"; ?>><?= $cls['ClassTitle'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-info">เลือก</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET['option']) and $_GET['option'] == "watch")
            include('./sys_teacher_watch.php');
        if (isset($_GET['option']) and $_GET['option'] == "manage")
            include('./sys_teacher_manage.php');
        if (isset($_GET['option']) and $_GET['option'] == "classCreate")
            include('./sys_teacher_class_create.php');
        if (isset($_GET['option']) and $_GET['option'] == "classManage")
            include('./sys_teacher_class_manage.php');
        ?>
        <div class="row mt-5">
            <div class="col text-end"><a role="button" href="../school/console.php" class="btn btn-primary">กลับหน้าควบคุม</a></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

</body>

</html>