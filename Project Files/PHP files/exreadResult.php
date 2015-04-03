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
		require("reader.php"); // php excel reader

		$file = $_POST["datafile"]; //datafile is the value of file chooser
		$connection=new Spreadsheet_Excel_Reader(); // our main object
		$connection->read($file);
		$startrow=2;
		$resultcount=1;

		$username=$connection->sheets[0]["cells"][$startrow][1]; // take username from xls file
		$score=$connection->sheets[0]["cells"][$startrow][2];

		while ( (!empty($username)) && (!empty($score))) {
			# code...
			$stid = oci_parse($conn, "insert into result(username,resultId,score) values ('$username' ,'$resultcount','$score')");
			oci_execute($stid);
			$resultcount++;
			$startrow++;
			$username=$connection->sheets[0]["cells"][$startrow][1]; // take username from xls file
			$score=$connection->sheets[0]["cells"][$startrow][2]; // take score
		}
		header("Location: http://localhost:8081/adbsite/administrator.php");





?>
