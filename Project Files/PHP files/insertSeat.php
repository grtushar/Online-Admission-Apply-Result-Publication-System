<?php

$conn = oci_connect('CSE426', 'cse426', 'localhost/XE');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    //echo "Connection Successful<br><br>";
}

$cse=(int)$_POST["cse"];
$eee=(int)$_POST["eee"];
$me=(int)$_POST["me"];
$ce=(int)$_POST["ce"];
$te=(int)$_POST["te"];
$ipe=(int)$_POST["ipe"];
$arc=(int)$_POST["arc"];

$stid = oci_parse($conn, "insert into dept values ('CSE' ,'$cse')");
oci_execute($stid);
$stid1=oci_parse($conn, "insert into dept values ('EEE' ,'$eee')");
oci_execute($stid1);
$stid2=oci_parse($conn,	 "insert into dept values ('ME' ,'$me')" );
oci_execute($stid2);
$stid3=oci_parse($conn, "insert into dept values ('CE' ,'$ce')");
oci_execute($stid3);
$stid4=oci_parse($conn, "insert into dept values ('TE' ,'$te')");
oci_execute($stid4);
$stid5=oci_parse($conn, "insert into dept values ('IPE' ,'$ipe')");
oci_execute($stid5);
$stid6=oci_parse($conn, "insert into dept values ('ARC' ,'$arc')");
oci_execute($stid6);
header("Location: http://localhost:8081/adbsite/administrator.php");
?>
