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
      <form name ="Result" method="get" action= "InsertResult.php">
        <?php
        $conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
         if (!$conn)
          {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
         }
        else
        {
          //echo "Connection Successful<br><br>";
        }
        $stid = oci_parse($conn, "select distinct dept from result");
        oci_execute($stid);
        echo '<label>Dept Name:';
        echo '<select name="deptname">';
        echo '<option value="">deptname</option>';
        while (($row=oci_fetch_row($stid))!=false)
        {
            echo '<option value="' .$row[0]. '">' .$row[0]. '</option>';
        }
        echo '</select>';
        echo '</label>';
      ?>
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

