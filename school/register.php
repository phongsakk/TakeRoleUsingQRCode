<html>

<head>
  <title>ThaiCreate.Com Tutorials</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
  <form name="form1" method="post" action="save_register.php">
    <h1>สมัคสมาชิก </h1><br>
    <table width="484" height="189" border="1" style="width: 400px">
      <tbody>
        <tr>
          <td width="125"> &nbsp;Username</td>
          <td width="180">
            <input name="txtUsername" type="text" id="txtUsername" size="20">
          </td>
        </tr>
        <tr>
          <td> &nbsp;Password</td>
          <td><input name="txtPassword" type="password" id="txtPassword">
          </td>
        </tr>
        <tr>
          <td> &nbsp;Confirm Password</td>
          <td><input name="txtConPassword" type="password" id="txtConPassword">
          </td>
        </tr>
        <tr>
          <td>&nbsp;Name</td>
          <td><input name="txtName" type="text" id="txtName" size="35"></td>
        </tr>
        <tr>
          <td> &nbsp;Status</td>
          <td>
            <select name="ddlStatus" id="ddlStatus">
              <!--<option value="ADMIN">ADMIN</option>-->
              <option value="USER">สมาชิกทั่วไป</option>
              <option value="USER">student</option>
              <!--<option value="USER">officer</option>-->
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <input type="submit" name="Submit" value="บันทึก">
  </form>
</body>

</html>