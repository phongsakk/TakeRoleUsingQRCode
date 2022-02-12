<?php
if (empty($_GET['class'])) :
    include('./sys_teacher_no_id.php');
else :
?>
    <div class="p-2 bg-light mb-2 rounded" data-print="true">
        <div class="col-8 mx-auto">
            <?php
            include("../school/conn/object_connect.php");
            $sql = "SELECT *, 
                    (SELECT COUNT(*) FROM memberinclass mic WHERE mic.ClassID=c.ClassID)AS TotalStudent,
                    (SELECT COUNT(*) FROM takeroll t WHERE t.ClassID=c.ClassID)AS TotalWeeks 
                    FROM class c 
                    WHERE c.ClassID=?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $_GET['class']);
            $stmt->execute();
            $class = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            $sql = "SELECT * FROM memberinclass mic INNER JOIN class c ON c.ClassID=mic.ClassID INNER JOIN member m ON mic.UserID=m.UserID WHERE c.ClassID=?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("i", $_GET['class']);
            $stmt->execute();
            $g = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th colspan=3>
                            <h2 class="col-12 text-center">ดูข้อมูล</h2>
                        </th>
                    </tr>
                    <tr class="table-active">
                        <td colspan=3>
                            <b>กลุ่มเรียน :</b> <?= $class['ClassTitle'] ?>
                        </td>
                    </tr>
                    <tr class="table-active">
                        <td colspan=3>
                            <b>รายละเอียด :</b> <?= $class['ClassDetail'] ?: "-" ?>
                        </td>
                    </tr>
                    <tr class="table-active">
                        <td>
                            <b>จำนวนผู้เรียน :</b> <?= $class['TotalStudent'] ?: "0" ?> คน
                        </td>
                        <td></td>
                        <td>
                            <b>เช็กชื่อแล้ว :</b> <?= $class['TotalWeeks'] ?: "0" ?> สัปดาห์
                        </td>
                    </tr>
                </thead>
                <?php
                if (isset($_GET['add'])) :
                    $sql = "SELECT * FROM member m WHERE m.UserID NOT IN (SELECT mic.UserID FROM memberinclass mic WHERE mic.ClassID=?)";
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param("i", $_GET['class']);
                    $stmt->execute();
                    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    $stmt->close();
                ?>
                    <tbody class="mt-3">
                        <tr>
                            <form action="./stdn_manage_request.php" method="post">
                                <th>
                                    รหัสนักเรียน
                                </th>
                                <td>
                                    <input type="hidden" name="ClassID" value="<?= $_GET['class'] ?>" />
                                    <input type="text" class="form-control" list="Users" name="UserID" required />
                                    <datalist id="Users">
                                        <?php
                                        foreach ($users as $u) :
                                        ?>
                                            <option value="<?= str_pad((string)$u['UserID'], 3, "0", STR_PAD_LEFT) ?>"><?= $u['Name'] ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </datalist>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-info" name="submit" value="addStudent">เพิ่ม</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                <?php
                else :
                ?>
                    <thead>
                        <tr>
                            <th class="col-3">ID</th>
                            <th class="col">Name</th>
                            <th class="col-4"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($g) :
                            foreach ($g as $m) :
                        ?>
                                <tr>
                                    <td><?= str_pad((string)$m['UserID'], 3, "0", STR_PAD_LEFT) ?></td>
                                    <td><?= $m['Name'] ?></td>
                                    <td>
                                        <form action="./stdn_manage_request.php">
                                            <input type="hidden" name="ClassID" value="<?= $_GET['class'] ?>">
                                            <input type="hidden" name="UserID" value="<?= $m['UserID'] ?>">
                                            <button type="submit" class="btn btn-danger" name="submit" value="removeStudent">ลบออก</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                        else :
                            ?>
                            <tr>
                                <td>...</td>
                                <td>...</td>
                                <td>...</td>
                            </tr>
                        <?php
                        endif;
                        ?>
                        <tr>
                            <td colspan=3 class="text-center">
                                <a href="<?= $_SERVER['REQUEST_URI'] . "&add=true" ?>" class="btn btn-info">เพิ่มผู้เรียน</a>
                            </td>
                        </tr>
                    </tbody>
                <?php
                endif;
                ?>
            </table>
        </div>
    </div>
<?php
endif;
