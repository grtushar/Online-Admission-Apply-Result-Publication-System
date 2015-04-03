<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
    error_reporting(0);
    $value = $_GET["value"];
    if($value == "updated") {
        echo "<script type=\"text/javascript\">alert(\"Updated Successully\")</script>";
    } else {
      $value = "";
    }

    $username = $_GET["username"];
    //echo $username;
    // $value = "";
    // if($value == null) {
    //   $value = "";
    // } else {
    //   $value = "invalid username or password";
    // }
?>

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
        <input class ="updatelogout"  type="submit" value="logout">
      </form>
  <div class="content">
    <p>&nbsp;</p>
    <form id="form2" name="form2" method="post" action="http://localhost:8081/adbsite/update.php?username=<?php echo $username;?>">

      <p><span class="a">Password</span>
      <input name="pass" type="password" id="textfield3" size="51" />
            </p>
       <p><span class="a">Re-enter Password</span>
      <input name="RE-enter_password" type="password" id="textfield4" size="39" />
      </p>

      <p><span class="a" >Admission Catagory</span>
        <label for="select"></label>
        <select name="AdmissionCatagory" id="AdmissionCatagory">
          <option>Engineering</option>
          <option>Architecture</option>
        </select>
      </p>

      <p><span class="b"><span class="a">Subject preference : </span></span>
        <label for="textfield28"></label>
        <label for="select"></label>
        <div id = "Info">
          First Choice:
          <select name="FirstChoice" id="pl1" onchange="check();">
            <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          Second Choice:
          <select name="SecondChoice" id="pl2" onchange="check();">
          <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          Third Choice:
          <select name="ThirdChoice" id="pl3" onchange="check();">
            <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          Fourth Choice:
          <select name="FourthChoice" id="pl4" onchange="check();">
             <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          FIfth Choice:
          <select name="FifthChoice" id="pl5" onchange="check();">
            <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          Sixth Choice:
          <select name="SixthChoice" id="pl6" onchange="check();">
            <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
          <br>
          Seventh Choice:
          <select name="SeventhChoice" id="pl7" onchange="check();">
            <option value="">Choose</option>
            <option value="1">IPE</option>
            <option value="2">EEE</option>
            <option value="3">CSE</option>
            <option value="4">CE</option>
            <option value="5">TE</option>
            <option value="6">ME</option>
            <option value="7">ARC</option>
          </select>
        </div>
      </p>
      <p>&nbsp;</p>

      <p><span class="b">Applicant Info</span></p>
      <p class="a">First Name
        <label for="textfield17"></label>
        <input name="First_name" type="text" id="textfield17" size="50" />
      </p>
      <p class="a">Last Name
        <label for="textfield18"></label>
        <input name="Last_name" type="text" id="textfield18" size="50" />
      </p>
      <p class="a">Father's Name
        <label for="textfield19"></label>
        <input name="fathers_name" type="text" id="textfield19" size="45" />
      </p>
      <p class="a">Mother's Name
        <label for="textfield20"></label>
        <input name="mothers_name" type="text" id="textfield20" size="44" />
      </p>
      <p class="a">Email
        <label for="textfield21"></label>
        <input name="email" type="text" id="textfield21" size="56" />
      </p>
      <p class="a">Moblile
        <label for="textfield22"></label>
        <input name="mobile" type="text" id="textfield22" size="54" />
      </p>
      <p class="a">Date of Birth
        <label for="date"></label>
        <select name="date" id="date">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
        </select>
        <label for="month"></label>
        <select name="month" id="month">
          <option>JAN</option>
          <option>FEB</option>
          <option>MAR</option>
          <option>APR</option>
          <option>MAY</option>
          <option>JUN</option>
          <option>JUL</option>
          <option>AUG</option>
          <option>SEP</option>
          <option>OCT</option>
          <option>NOV</option>
          <option>DEC</option>
        </select>
        <label for="year"></label>
        <select name="year" id="year">
          <option>2015</option>
          <option>2014</option>
          <option>2013</option>
          <option>2012</option>
          <option>2011</option>
          <option>2010</option>
          <option>2009</option>
          <option>2008</option>
          <option>2007</option>
          <option>2006</option>
          <option>2005</option>
          <option>2004</option>
          <option>2003</option>
          <option>2002</option>
          <option>2001</option>
        </select>
      </p>
      <p class="a">Address
        <label for="textfield23"></label>
        <input name="address" type="text" id="textfield23" size="53" />
      </p>

    <p class="a">&nbsp;</p>
    <p class="a"><span class="b">Academic Info:</span></p>

      <p class="a">SSC</p>
      <p><span class="a">GPA</span>
        <input name="ssc_gpa" type="text" id="textfield24" size="57" />
      </p>
      <p class="a">Institution Name
        <input name="ssc_institution_name" type="text" id="textfield25" size="40" />
      </p>
      <p class="a">Roll No
        <input name="ssc_roll_no" type="text" id="textfield31" size="52" />
      </p>
      <p class="a">Reg No
        <input name="ssc_reg_no" type="text" id="textfield32" size="52" />
      </p>
      <p class="a">Passing Year
          <select name="ssc_year" id="ssc_year">
            <option>2015</option>
            <option>2014</option>
            <option>2013</option>
            <option>2012</option>
            <option>2011</option>
          </select>
      </p>
      <p class="a">Board
        <input name="ssc_board" type="text" id="textfield29" size="55" />
      </p>
      <p class="a">HSC</p>
      <p><span class="a">GPA</span>
        <input name="hsc_gpa" type="text" id="textfield" size="57" />
      </p>
      <p class="a">Institution Name
        <input name="hsc_institution_name" type="text" id="textfield5" size="40" />
      </p>
      <p class="a">Roll No
        <input name="hsc_roll_no" type="text" id="textfield6" size="52" />
      </p>
      <p class="a">Reg No
        <input name="hsc_reg_no" type="text" id="textfield7" size="52" />
      </p>
      <p class="a">Passing Year
        <select name="hsc_year" id="select7">
          <option>2015</option>
          <option>2014</option>
          <option>2013</option>
          <option>2012</option>
          <option>2011</option>
        </select>
      </p>
      <p class="a">Board
        <input name="hsc_board" type="text" id="textfield8" size="55" />
      </p>
      <p>
        <input type="submit" name="Submit" id="Submit" value="Update" />
      </p>
      <p>&nbsp;</p>
    </form>
  </div>
  <div class="footer">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
