<?php
if (empty($_GET['class'])) :
    include('./sys_teacher_no_id.php');
else :
?>
    <div class="p-2 bg-light mb-2 rounded">
        <table class="table table-hover text-center align-middle">
            <thead class="text-center align-middle">
                <tr>
                    <th colspan="2" class="border-0"></th>
                    <th colspan="18" class="border-0">สัปดาห์ที่</th>
                </tr>
                <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">ชื่อ</th>

                    <?php
                    $i = 0;
                    while ($i < 18) {
                    ?>
                        <td><?= ++$i ?></td>
                    <?php
                    }
                    ?>

                </tr>
            </thead>
            <tbody>
                <?php
                include('../school/conn/object_connect.php');
                $ClassID = $_GET['class'];

                $sql = "SELECT * FROM memberinclass I INNER JOIN member M ON I.UserID=M.UserID WHERE ClassID='$ClassID'";
                $res = $mysqli->query($sql);
                $member = $res->fetch_all(MYSQLI_ASSOC);

                foreach ($member as $index => $m) {
                    $sql = "SELECT * FROM membertakeroll MTR INNER JOIN takeroll TR ON MTR.TID=TR.TID WHERE MTR.UserID = '{$m['UserID']}' AND TR.ClassID='$ClassID' ORDER BY Week ASC";
                    $res = $mysqli->query($sql);
                    $weeks = $res->fetch_all(MYSQLI_ASSOC);
                    $n = array_column($weeks, "Status");
                ?>
                    <tr role="button">
                        <td><?= $index + 1 ?></td>
                        <td class=" text-left"><?= $m['Name'] ?></td>
                        <?php
                        for ($i = 0; $i < 18; $i++) {
                        ?>
                            <td class="border-left border-right" title="<?= isset($n[$i]) ? "$n[$i]" : "NONE"; ?>"><?= isset($n[$i]) ? ($n[$i] === "PRESENT" ? "1" : ($n[$i] === "LATE" ? "ส" : "0")) : ""; ?></td>
                        <?php
                        }
                        ?>
                    </tr>
                <?php
                }
                $mysqli->close();
                ?>
            </tbody>
        </table>
    </div>
<?php
endif;
