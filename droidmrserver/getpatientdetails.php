<?php

 mysql_connect("localhost", "openemr", "RyL7P0rbzDMK") or die(mysql_error());
 mysql_select_db("openemr") or die(mysql_error());


$pid = $_POST['pid'];



$sql = "select * from patient_data where pid='$pid'";


$result1 = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result1)){
	$sex = $row['sex'];
	$mrn = $row['pubpid'];
	$diagnosis = $row['genericname1'];
	echo $mrn . "," . $diagnosis . "," . $sex;


}

?>
