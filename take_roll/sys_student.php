<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบเช็กชื่อนักศึกษา</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <style>
        @media print {
            * {
                font-size: 0.75rem;
            }

            form,
            button,
            a,
            h1 {
                visibility: hidden;
                height: 0;
            }

            #printarea {
                position: fixed;
                top: 0;
                left: 0;
                padding: 1.5rem 1rem !important;
                border: 1px solid gray;
            }

            #printarea>.col-4 {
                width: calc(150px + .75rem);
            }

            #printarea .row {
                flex-direction: row;
                justify-content: flex-end;
            }

            #printarea .row>.col-4 {
                width: auto;
                flex-grow: 1;
            }

            #printarea .row>.col-8 {
                width: 60%;
            }
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <h1 class="w-100 text-center mt-5 mb-2">ระบบเช็กชื่อ</h1>
        <div class="p-2 bg-light mb-2 rounded">
            <form action="../take_roll/index.php" class="d-flex justify-content-around">
                <div class="col-4 d-flex align-items-center">
                    <label for="class">เลือกกลุ่มเรียน</label>
                    <select class="form-select form-select w-auto mx-2 flex-fill" name="class" required>
                        <option value="" selected disabled>-- กลุ่มเรียน --</option>
                        <?php
                        include('../school/conn/object_connect.php');
                        $sql = "SELECT * FROM memberinclass INNER JOIN class on class.ClassID=memberinclass.ClassID WHERE memberinclass.UserID='{$_SESSION['UserID']}'";
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
                <div class="col-4 d-flex align-items-center">
                    <label for="option">เลือกเมนู</label>
                    <select class="form-select form-select w-auto mx-2 flex-fill" name="option" required>
                        <option value="" selected disabled>-- เมนู --</option>
                        <option value="watch" <?php if (isset($_GET['option']) and $_GET['option'] == 'watch') echo "selected"; ?>>ดูข้อมูล</option>
                        <option value="manage" <?php if (isset($_GET['option']) and $_GET['option'] == 'manage') echo "selected"; ?>>สร้าง QR CODE</option>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-info">เลือก</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_GET['option']) and $_GET['option'] == "watch")
            include('./sys_student_watch.php');
        if (isset($_GET['option']) and $_GET['option'] == "manage")
            include('./sys_student_manage.php');
        ?>
        <div class="row mt-5">
            <div class="col text-right"><a role="button" href="../school/console.php" class="btn btn-primary">กลับหน้าควบคุม</a></div>
        </div>
    </div>
</body>

</html>