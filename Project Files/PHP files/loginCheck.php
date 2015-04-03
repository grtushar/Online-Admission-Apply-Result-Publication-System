<?php

      $conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
      } else {
          //echo "Connection Successful<br><br>";
      }
      // foreach ($_POST as $var => $value) {
      //     echo "$var = $value<br>";
      // }

      $loginusername = $_POST["username"];
      $loginpassword = $_POST["password"];

      $sql1 =  "select * from Applicant where username = '$loginusername' and \"password\" = '$loginpassword'";
      $sql2 =  "select * from Admin where username = '$loginusername' and \"password\" = '$loginpassword'";

      $stid1 = oci_parse($conn, $sql1);
      $stid2 = oci_parse($conn, $sql2);

      oci_execute($stid1);
      oci_execute($stid2);

      //$log = false;
      $val = "invalid";
      if (oci_fetch($stid1)) {
          //header("301: ".$loginusername);
          header("Location: http://localhost:8081/adbsite/profile.php?username=$loginusername");
          exit;
      } else if(oci_fetch($stid2)) {
          header("Location: http://localhost:8081/adbsite/administrator.php");
      } else {
         header("Location: http://localhost:8081/adbsite/login.php?value=$val");
      }
?>
