<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="MyStyle.css">
<script src="MyScript.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Admission</title>

</head>

<body>
<div class="container">
  <div class="header">

  </div>
  <div class=>
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
  <div class="content">
    <form id="form2" name="form2" method="get" action="profile.php">
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
        $stid = oci_parse($conn, "select username from applicant_info");
        oci_execute($stid);
        echo '<label>Name:';
        echo '<select name="username">';
        echo '<option value="">username</option>';
        while (($row=oci_fetch_row($stid))!=false)
        {
            echo '<option value="' .$row[0]. '">' .$row[0]. '</option>';
        }
        echo '</select>';
        echo '</label>';
      ?>
      <input type="submit" value="Show Info">
    </form>
  </div>
  <div class="footer">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>

</div>
</body>
</html>
