<div class="p-2 bg-light mb-2 rounded" data-print="true">
    <h2 class="col-12 text-center">สร้างกลุ่มเรียนใหม่</h2>
    <div class="col-10 bg-white mx-auto p-3">
        <form action="./stdn_manage_request.php" method="POST">
            <div class="input-group mb-3">
                <span class="input-group-text col-3">ชื่อกลุ่มเรียน</span>
                <input type="text" class="form-control" placeholder="ตั้งชื่อกลุ่มเรียน" name="classTitle" aria-label="Username" aria-describedby="input1" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-3">รายละเอียด</span>
                <input type="text" class="form-control" placeholder="เพิ่มรายละเอียด" name="classDetail" aria-label="Username" aria-describedby="input1" />
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-3">เวลาเริ่ม</span>
                <input type="time" class="form-control" name="beginTime" value="08:00">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="submit" value="classCreate">ยืนยันการส่งฟอร์ม</button>
            </div>
        </form>
    </div>
</div>