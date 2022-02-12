<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เข้าสู่ระบบ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-2">
    <h1 class="w-100 text-center mt-5 mb-2">เข้าสู่ระบบ</h1>
    <div class="p-2 bg-light mb-2 rounded">
      <div class="col-6 mx-auto mt-3">
        <form name="form1" method="post" action="check_login.php">
          <div class="mb-3 row">
            <label for="txtUsername" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input class="form-control" name="txtUsername" type="text" id="txtUsername">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="txtPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input class="form-control" name="txtPassword" type="password" id="txtPassword">
            </div>
          </div>
          <div class="text-center">
            <a href="<?= isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "../index.php" ?>" class="btn btn-warning" role="button">กลับ</a>
            <input class="btn btn-info" type="submit" name="Submit" value="เข้าสู่ระบบ">
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src=" https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</body>

</html>