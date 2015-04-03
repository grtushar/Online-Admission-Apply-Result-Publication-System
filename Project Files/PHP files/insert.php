<?php

        // Before running, create the table:
        //   CREATE TABLE MYTABLE (col1 NUMBER);

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

        $username = $_POST["username"];
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

        $isql =  "insert into APPLICANT values ('$username' , '$pass','$SubPre', '$AC')";
        $stid = oci_parse($conn, $isql);
        if(!$stid) exit(0);
        if(!oci_execute($stid)) // The row is committed and immediately visible to other users
            exit(0);

        $isql1 =  "insert into APPLICANT_INFO values ('$username' , '$firstname','$lastname', '$fathername','$mothername','$email','$mobileno', to_date('$birthdate', 'dd-mm-yyyy'),'$address')";


        $stid1 = oci_parse($conn, $isql1);
        if(!$stid1) exit(0); //echo "1something went wrong\n";
        if(!oci_execute($stid1)) // The row is committed and immediately visible to other users
            exit(0);//    echo "something went wronng1";


        $isql2 =  "insert into ACADEMIC_INFO values ('$username','$sscgpa','$hscgpa','$schoolname','$collegename','$sscpassingyear','$hscpassingyear','$sscboard','$hscboard','$sscrollno','$hscrollno','$sscregno','$hscregno')";

        $stid2 = oci_parse($conn, $isql2);
        if(!$stid2) exit(0); //echo "2something went wrong\n";
        if(!oci_execute($stid2)) // The row is committed and immediately visible to other users
            exit(0);//echo "something went wronng2";

        $stid4 = oci_parse($conn, "BEGIN getroom(:out); END;"); // fetching a room for student
        OCIBindByName($stid4,":out",$out,32);
        oci_execute($stid4);
        //echo $out;

        $isql3 = "insert into APPLICANTROOMINFO values ('$username', '$out')";
        $stid3 = oci_parse($conn, $isql3);
        if(!$stid3) exit(0);
        if(!oci_execute($stid3)) exit(0);

        $insert = "inserted";
        header("Location: http://localhost:8081/adbsite/login.php?value=$insert");
        echo "Data inserted";
?>
