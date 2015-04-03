<?php
  error_reporting(0);
  $val=$_get["value"];
  if ($val=="Insert") {
    $val="Succefully inserted";
    # code...
  }
  else{
    $val="";
  }
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
    <form name ="logout" method="" action= "login.php">
        <input class = "updatelogout" type="submit" value="logout">
    </form>
  <div class="Admincontent">
     <form name ="admin" method="post" action= "exreadRoom.php">
      <p>Insert xls file for Room</p>
      <input type="file" accept=".xls" name="datafile" size="40"><br>
      <input type="submit" value="submit">
     </form>


  </div>
  <p>
    <?php
      echo $val;
    ?>
  </p>
  <div class="footer">
    <p>&nbsp;          </p>
    <p>&nbsp;</p>
  <!-- end .footer --></div>
<!-- end .container -->
</div>
</body>
</html>

