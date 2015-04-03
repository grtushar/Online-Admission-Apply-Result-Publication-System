<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
     error_reporting(0);
     $name = $_GET["username"];
      $conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
      if (!$conn) {
          $e = oci_error();
          trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
      } else {
          //echo "Connection Successful<br><br>";
      }

      function subDecoder( $x ) {
          if($x == "1") return "CSE";
          else if($x == "2") return "EEE";
          else if($x == "3") return "IPE";
          else if($x == "4") return "ME";
          else if($x == "5") return "CE";
          else if($x == "6") return "TE";
          else if($x == "7") return "ARC";
      }

      //Applicant Info
      $stid = oci_parse($conn, "SELECT * FROM Applicant_Info where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $firstname = $row[1];
            $lastname = $row[2];
            $fathername = $row[3];
            $mothername = $row[4];
            $email = $row[5];
            $mobile = $row[6];
            $birthdate = $row[7];
            $addr = $row[8];
      } else {
            //echo "error";
      }

      //Academic Info
      $stid = oci_parse($conn, "SELECT * FROM Academic_Info where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $sscgpa = $row[1];
            $hscgpa = $row[2];
            $schoolname = $row[3];
            $collegename = $row[4];
            $sscyear = $row[5];
            $hscyear = $row[6];
            $sscboard = $row[7];
            $hscboard = $row[8];
            $sscroll = $row[9];
            $hscroll = $row[10];
            $sscreg = $row[11];
            $hscreg = $row[12];
      } else {
            //echo "error";
      }

      $stid = oci_parse($conn, "SELECT * FROM Applicant where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $subpre = $row[2];
            $category = $row[3];
      } else {
            //echo "error";
      }

      if($category == "A") {
          $category = "Architecture";
      } else {
          $category = "Engineering";
      }


      $firstC = "N/A";
      $secondC = "N/A";
      $thirdC = "N/A";
      $fourthC = "N/A";
      $fifthC = "N/A";
      $sixthC = "N/A";
      $seventhC = "N/A";

      $len = strlen ( $subpre );
      for($i = 0; $i < $len; $i += 1) {
          if($i == 0)   $firstC = subDecoder( $subpre{$i} );
          else if($i == 1)   $secondC = subDecoder( $subpre{$i} );
          else if($i == 2)   $thirdC = subDecoder( $subpre{$i} );
          else if($i == 3)   $fourthC = subDecoder( $subpre{$i} );
          else if($i == 4)   $fifthC = subDecoder( $subpre{$i} );
          else if($i == 5)   $sixthC = subDecoder( $subpre{$i} );
          else if($i == 6)   $seventhC = subDecoder( $subpre{$i} );
      }

      $stid = oci_parse($conn, "SELECT * FROM applicantroominfo where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $roomno = $row[1];
      } else {
            //echo "error";
      }

      $confirmdept = "N/A";
      $score = "N/A";
      $waitdept = "N/A";
      $stid = oci_parse($conn, "SELECT * FROM Result where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $score = $row[2];
            $confirmdept = $row[3];
      } else {
            //echo "error";
      }

      $waitdept = "N/A";
      $stid = oci_parse($conn, "SELECT * FROM waitinglist where username = '$name'");
      oci_execute($stid);

      if($row = oci_fetch_array($stid, OCI_BOTH)) {
            $waitdept = $row[2];
      } else {
            //echo "error";
      }

      oci_free_statement($stid);
      oci_close($conn);
?>
<html  xmlns="http://www.w3.org/1999/xhtml">
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
  <div class="content">
    <p>&nbsp;</p>
      <form name ="logout" method="" action= "login.php">
        <input class = "logout" type="submit" value="logout">
      </form>
    <form id="form2" name="form2" method="post" action="http://localhost:8081/adbsite/updatepage.php?username=<?php echo $name; ?>">

      <p>Admission Catagory : <label> <?php echo $category; ?> </label></p>
      <p>Subject preference :
        <div id = "Info">
            <p>
                First Choice: <label> <?php echo $firstC; ?> </label> <br>
                Second Choice: <label> <?php echo $secondC; ?> </label> <br>
                Third Choice: <label> <?php echo $thirdC; ?> </label> <br>
                Fourth Choice: <label> <?php echo $fourthC; ?> </label> <br>
                FIfth Choice: <label> <?php echo $fifthC; ?> </label> <br>
                Sixth Choice: <label> <?php echo $sixthC; ?> </label> <br>
                Seventh Choice: <label> <?php echo $seventhC; ?> </label> </p>
        </div>
      </p>
      <p>Admission Test Room No : <label> <?php echo $roomno; ?> </label></p>
      <p>Result :</p>
      <p> Achieved Score : <label> <?php echo $score; ?> </label></p>
      <p> Confirmed Department : <label> <?php echo $confirmdept; ?> </label></p>
      <p> Waiting Department : <label> <?php echo $waitdept; ?> </label></p>

      <p><span class="b">Applicant Info</span></p>
         <div id = "Info">
          <p>First Name : <label>  <?php echo $firstname; ?>  </label> </p>
          <p>Last Name : <label> <?php echo $lastname; ?> </label> </p>
          <p>Father's Name : <label> <?php echo  $fathername; ?> </label> </p>
          <p>Mother's Name : <label><?php echo $mothername; ?> </label> </p>
          <p>Email : <label><?php echo $email;?> </label> </p>
          <p>Moblile : <label><?php echo $mobile;?> </label> </p>
          <p>Date of Birth :
              <label for="date"></label>
              <label for="month"></label>
              <label for="year"></label>
              <label><?php echo $birthdate;?> </label>
          </p>
          <p>Address : <label><?php echo $addr;?> </label> </p>
        </div>


    <p class="a"><span class="b">Academic Info:</span></p>
      <p><strong>SSC</strong></p>
         <div id = "Info">
          <p>GPA :<label> <?php echo $sscgpa; ?> </label></p>
          <p>Institution Name :     <label> <?php echo $schoolname; ?> </label></p>
          <p>Roll No : <label> <?php echo $sscroll; ?> </label></p>
          <p>Reg No : <label> <?php echo $sscreg; ?> </label></p>
          <p>Passing Year : <label>  <?php echo $sscyear; ?> </label> </p>
          <p>Board : <label> <?php echo $sscboard; ?> </label> </p>
        </div>


      <p><strong>HSC</strong></p>
       <div id = "Info">
        <p>GPA : <label> <?php echo $hscgpa; ?> </label> </p>
        <p>Institution Name : <label> <?php echo $collegename; ?> </label> </p>
        <p>Roll No : <label> <?php echo $hscroll; ?> </label></p>
        <p>Reg No : <label> <?php echo $hscreg; ?> </label> </p>
        <p>Passing Year : <label> <?php echo $hscyear; ?> </label> </p>
        <p>Board :<label> <?php echo $hscboard; ?> </label></p>
      </div>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Update Info" />
      </p>
      <p>&nbsp;</p>
    </form>
  </div>
  <div class="footer">
  <!-- end .footer --></div>
<!-- end .container --></div>
</body>
</html>
