<?php
        foreach ($_POST as $var => $value) {
            echo "$var = $value<br>";
        }

        $conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        } else {
            //echo "Connection Successful<br><br>";
        }

        $username = $_GET["username"];
        //echo $username;
        $isql = "";
        function update () {
                global $isql, $conn;
                echo $isql;
                $stid1 = oci_parse($conn, $isql);
                if(!$stid1) exit(0); //echo "1something went wrong\n";
                if(!oci_execute($stid1)) // The row is committed and immediately visible to other users
                  exit(0);//    echo "something went wronng1";
        }
        function monthnumber ($month) {
            if($month == "JAN") return "1";
            else if ($month == "FEB") return "2";
            else if ($month == "MAR") return "3";
            else if ($month == "APR") return "4";
            else if ($month == "MAY") return "5";
            else if ($month == "JUNE") return "6";
            else if ($month == "JULY") return "7";
            else if ($month == "AUG") return "8";
            else if ($month == "SEP") return "9";
            else if ($month == "OCT") return "10";
            else if ($month == "NOV") return "11";
            else if ($month == "DEC") return "12";
        }

        function RetSubNo ($name) {
            if($name == "CSE") return "1";
            else if ($name == "EEE") return "2";
            else if ($name == "IPE") return "3";
            else if ($name == "ME") return "4";
            else if ($name == "CE") return "5";
            else if ($name == "TE") return "6";
            else if ($name == "ARC") return "7";
        }

        function CalculateSubPre($one, $two, $three, $four, $five, $six, $seven, $cat) {
            $ret = $one . $two . $three . $four . $five . $six;
            if($cat == "Architecture") $ret .= $seven;
            return $ret;
        }

        $firstname = $_POST["First_name"];
        $lastname=$_POST["Last_name"];
        $fathername=$_POST["fathers_name"];
        $mothername=$_POST["mothers_name"];
        $email=$_POST["email"];
        $mobileno=$_POST["mobile"];
        $date=$_POST["date"];
        $month=$_POST["month"];
        $year=$_POST["year"];
        $birthdate= $date . "-" . monthnumber($month) ."-". $year;
        //echo $birthdate;
        $address=$_POST["address"];

       // $username = $_POST["username"];
        $pass = $_POST["pass"];
        $AC = "A";
        $SubPre = CalculateSubPre($_POST["FirstChoice"], $_POST["SecondChoice"], $_POST["ThirdChoice"], $_POST["FourthChoice"], $_POST["FifthChoice"], $_POST["SixthChoice"], $_POST["SeventhChoice"], $_POST["AdmissionCatagory"]);
        if($_POST["AdmissionCatagory"] == "Engineering") $AC = "E";

        $sscgpa=(float)($_POST["ssc_gpa"]);
        $hscgpa=(float)($_POST["hsc_gpa"]);
        $schoolname=$_POST["ssc_institution_name"];
        $collegename=$_POST["hsc_institution_name"];
        $sscpassingyear=(int)($_POST["ssc_year"]);
        $hscpassingyear=(int)($_POST["hsc_year"]);
        $sscboard=$_POST["ssc_board"];
        $hscboard=$_POST["hsc_board"];
        $sscrollno=(int)($_POST["ssc_roll_no"]);
        $hscrollno=(int)($_POST["hsc_roll_no"]);
        $sscregno=(int)($_POST["ssc_reg_no"]);
        $hscregno=(int)($_POST["hsc_reg_no"]);

        //Applicant
        if($pass != null) {
          echo "aise1";
          $isql = "update Applicant set \"password\" = '$pass' where username = '$username'";
          update();
        }
        if($SubPre != null) {
            echo "aise2";
            $isql = "update Applicant set subjectpreference = '$SubPre' where username = '$username'";
            update();
        }
        if($AC != null) {
            echo "aise3";
            $isql = "update Applicant set admissionTestCategory = '$AC' where username = '$username'";
            update();
        }

        //APPLICANT_INFO
        if($firstname != null) {
            $isql = "update APPLICANT_INFO set firstname = '$firstname' where username = '$username'";
            update();
        }
        if($lastname != null) {
            $isql = "update APPLICANT_INFO set lastname = '$lastname' where username = '$username'";
            update();
        }
        if($fathername != null) {
            $isql = "update APPLICANT_INFO set fathername = '$fathername' where username = '$username'";
            update();
        }
        if($mothername != null) {
            $isql = "update APPLICANT_INFO set mothername = '$mothername' where username = '$username'";
            update();
        }
        if($email != null) {
            $isql = "update APPLICANT_INFO set email = '$email' where username = '$username'";
            update();
        }
        if($mobileno != null) {
            $isql = "update APPLICANT_INFO set mobileno = '$mobileno' where username = '$username'";
            update();
        }
        if($date != null && $month != null && $year != null) {
            $isql = "update APPLICANT_INFO set birthdate = to_date('$birthdate', 'dd-mm-yyyy') where username = '$username'";
            update();
        }
        if($address != null) {
            $isql = "update APPLICANT_INFO set address = '$address' where username = '$username'";
            update();
        }

        //ACADEMIC_INFO
        if($sscgpa != null) {
            $isql = "update ACADEMIC_INFO set sscgpa = '$sscgpa' where username = '$username'";
            update();
        }
        if($hscgpa != null) {
            $isql = "update ACADEMIC_INFO set hscgpa = '$hscgpa' where username = '$username'";
            update();
        }
        if($schoolname != null) {
            $isql = "update ACADEMIC_INFO set schoolname = '$schoolname' where username = '$username'";
            update();
        }
        if($collegename != null) {
            $isql = "update ACADEMIC_INFO set collegename = '$collegename' where username = '$username'";
            update();
        }
        if($sscpassingyear != null) {
            $isql = "update ACADEMIC_INFO set sscpassingyear = '$sscpassingyear' where username = '$username'";
            update();
        }
        if($hscpassingyear != null) {
            $isql = "update ACADEMIC_INFO set hscpassingyear = '$hscpassingyear' where username = '$username'";
            update();
        }
        if($sscboard != null) {
            $isql = "update ACADEMIC_INFO set sscboard = '$sscboard' where username = '$username'";
            update();
        }
        if($hscboard != null) {
            $isql = "update ACADEMIC_INFO set hscboard = '$hscboard' where username = '$username'";
            update();
        }
        if($sscrollno != null) {
            $isql = "update ACADEMIC_INFO set sscrollno = '$sscrollno' where username = '$username'";
            update();
        }
        if($hscrollno != null) {
            $isql = "update ACADEMIC_INFO set hscrollno = '$hscrollno' where username = '$username'";
            update();
        }
        if($sscregno != null) {
            $isql = "update ACADEMIC_INFO set sscregno = '$sscregno' where username = '$username'";
            update();
        }
        if($hscregno != null) {
            $isql = "update ACADEMIC_INFO set hscregno = '$hscregno' where username = '$username'";
            update();
        }

        $val = "updated";
        header("Location: http://localhost:8081/adbsite/updatepage.php?value=$val");
?>
