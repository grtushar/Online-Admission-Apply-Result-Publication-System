<?php
// i will tell you get data from excel with php

//first of all you add this files your project.
// And i show my excel file and add  some data

//start now :)
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
		//$resultcount=1;

		$roomno=$connection->sheets[0]["cells"][$startrow][1]; // take username from xls file
		$capacity=$connection->sheets[0]["cells"][$startrow][2];
		$level=$connection->sheets[0]["cells"][$startrow][3];

		while ( (!empty($roomno)) && (!empty($capacity)) && (!empty($level))) {
			# code...
			$stid = oci_parse($conn, "insert into room values ('$roomno' ,'$capacity','$level')");
			oci_execute($stid);
			//$resultcount++;
			$startrow++;
			$roomno=$connection->sheets[0]["cells"][$startrow][1]; // take username from xls file
			$capacity=$connection->sheets[0]["cells"][$startrow][2];
			$level=$connection->sheets[0]["cells"][$startrow][3];
		}

		header("Location: http://localhost:8081/adbsite/administrator.php");





?>
