<?php
  $Result="Result";
  $Room="Room";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="MyStyle.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Admission</title>
</head>

<body>
</f>
<div class="container">
  <div class="header">

  </div>
  <div >
    <ul class="nav">
      <li> </li>
      <li></li>
      <li></li>
      <li></li>
    </ul>

    <p><!-- end .sidebar1 --></p>
  </div>

  <div class="Admincontent">
    <form name ="logout" method="" action= "login.php">
        <input class = "updatelogout" type="submit" value="logout">
    </form>

      <form name ="Result" method="post" action= "InsertResult.php">
        <input class = "adminButton" type="submit" value="Insert Result">
      </form>
      <form name ="Room" method="post" action= "InsertRoom.php">
        <input class = "adminButton" type="submit" value="Insert Room">
      </form>
      <form name ="Info" method="post" action= "AppInfo.php">
        <input class = "adminButton" type="submit" value="Application Info">
      </form>
      <form name ="Seat" method="post" action= "Seat.php">
        <input class = "adminButton" type="submit" value="Insert Subject Seat">
      </form>
      <form name="result" method="post" action="resultProcess.php">
        <input class = "adminButton" type="submit" value="Result Process">
      </form>
      <form name="show result" method="post" action="showresult.php">
        <input class = "adminButton" type="submit" value="Show result">
      </form>
  </div>

  <div class="footer">
    <p>&nbsp;          </p>
    <p>&nbsp;</p>
  <!-- end .footer --></div>
<!-- end .container -->
</div>
</body>
</html>

