<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
      error_reporting(0);
      $value = $_GET["value"];
      if($value == "invalid") {
        $value = "invalid username or password";
      } else if($value == "inserted") {
        $value = "Registration Successfull. Login, to view your profile!";
      } else {
        $value = "";
      }
?>
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
  <div class="sidebar1">
    <ul class="nav">
      <li> </li>
      <li></li>
      <li></li>
      <li></li>
    </ul>

    <p><!-- end .sidebar1 --></p>
  </div>
  <div class="content">
    <p>&nbsp;</p>
    <form id="form1" name ="form1" method="post" action= "loginCheck.php">
    <!--<form action="" method="get"> -->
    <p><span class="a">Username</span>
      <input name="username" type="text" id="username" size="50" />

    <p><span class="a">Password </span>
      <input name="password" type="password" id="password" size="51" />
    </p>
    <p>
      <input class = "loginRegButton" type="submit" name="Login" id="Login" value="Login" />
      <a href="register.php">
        <input class = "loginRegButton" type="button" name="Register" id="Register" value="Register" /></a>
    </p>
     <p>&nbsp;</p> <p>&nbsp;</p>
    <p> <label>  <?php echo $value; ?>  </label> </p>
    <p>&nbsp;</p>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp; </p>
  </div>
  <div class="footer">
    <p>&nbsp;          </p>
    <p>&nbsp;</p>
  <!-- end .footer --></div>
<!-- end .container --></div>
</body>


</html>
