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
    <form name ="logout" method="" action= "login.php">
        <input class = "updatelogout" type="submit" value="logout">
    </form>
  <div class="Admincontent">
      <form name="seat" method="post" action="insertSeat.php" >
      <p>
        Enter seat capacity for the subjects
      </p>
        <p>
          <span class="a">CSE</span>
          <input name="cse" type="text" size="50" />
        </p>
       <p>
          <span class="a">EEE</span>
          <input name="eee" type="text" size="50" />
       </p>
       <p>
          <span class="a">ME</span>
          <input name="me" type="text" size="50" />
       </p>
       <p>
          <span class="a">CE</span>
          <input name="ce" type="text" size="50" />
       </p>
       <p>
          <span class="a">IPE</span>
          <input name="ipe" type="text" size="50" />
       </p>
       <p>
          <span class="a">TE</span>
          <input name="te" type="text" size="50" />
       </p>
       <p>
          <span class="a">ARC</span>
          <input name="arc" type="text" size="50" />
       </p>
       <p class="submitseat">
         <input type="submit" value="submit" size="20">
       </p>
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

