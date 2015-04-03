<?php
		$waitinglistId=1;

		$conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
		//$conn1 = oci_connect('CSE426', 'cse426', 'localhost/XE');
		if (!$conn)
		{
    		      $e = oci_error();
    		      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		else
		{
   			 //echo "Connection Successful<br><br>";
		}
		function findSub ($name)
		{
    		              if($name == "1") return "CSE";
   			else if ($name == "2") return "EEE";
   			else if ($name == "3") return "IPE";
                		else if ($name == "4") return "ME";
                		else if ($name == "5") return "CE";
                		else if ($name == "6") return "TE";
                		else if ($name == "7") return "ARC";
		}

		function findSeat ($seatCheck)
		{
			$conn1 = oci_connect('CSE426', 'cse426', 'localhost/XE');
    	               	$stid1= oci_parse($conn1, "select seat from Dept where deptname='$seatCheck'");//check if seat is available or not
			oci_execute($stid1);
			if($row1 = oci_fetch_row($stid1)) // see if sub is availavle or not
			{
                            		$subCount=(int)$row1[0];
                            		if($subCount>0)
                            		{
                            			return 1;
                            		}
                            		else
                            			return 0;
                      		}

		}

		function assignSub ($subName,$username)
		{
			global $waitinglistId;
			$word=str_split($subName);// split sub preference into words
			for ($i=0; $i <strlen($subName) ; $i++)
			{
				# code...
				$deptname=findSub($word[$i]); // decode find sub name
				$seatBool=findSeat($deptname);
				if($seatBool==1)
				{
					$conn2 = oci_connect('CSE426', 'cse426', 'localhost/XE');
					$stid2 = oci_parse($conn2, "update result set dept='$deptname' where username='$username'");
					oci_execute($stid2);
					break;
				}
				elseif ($seatBool==0)
				{
					# code...
					//echo $username."\n". $deptname. "\n";
					$conn3 = oci_connect('CSE426', 'cse426', 'localhost/XE');
					$stid3 = oci_parse($conn3, "insert into WAITINGLIST values('$username','$waitinglistId','$deptname')");
					oci_execute($stid3);
					$waitinglistId++;

				}
			}

		}

		$stid = oci_parse($conn, "select username,subjectpreference from Engineering");
		oci_execute($stid);

	           while (($row=oci_fetch_row($stid))!=false)
                        {
                               $username=$row[0];
                               $subPref=$row[1];
                               assignSub($subPref,$username);
                           //echo $subPref;
                        }
                        oci_free_statement($stid);
                        oci_close($conn);

      	$conn4 = oci_connect('CSE426', 'cse426', 'localhost/XE');
      	$stid4 = oci_parse($conn4, "select username,subjectpreference from Archi");
		oci_execute($stid4);

            while (($row2=oci_fetch_row($stid4))!=false)
            {
               $username=$row2[0];
               $subPref=$row2[1];
               assignSub($subPref,$username);
               //echo $subPref;
            }
      oci_free_statement($stid4);
      oci_close($conn4);

      header("Location: http://localhost:8081/adbsite/administrator.php");
?>
