<?php

 mysql_connect("localhost", "openemr", "RyL7P0rbzDMK") or die(mysql_error());
 mysql_select_db("openemr") or die(mysql_error());


$uid = $_POST['uid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];



$sql = "select * from patient_data where lname like '$lastname'";

if($firstname){
$sql = $sql . " and fname like '$firstname'";
}
if($dob){
 $sql = $sql . " and DOB like '$dob'";
}




$result1 = mysql_query($sql) or die(mysql_error());
while($row = mysql_fetch_array($result1)){
	$fname = $row['fname'];
	$lname = $row['lname'];
	$res_dob = $row['DOB'];
	$sex = $row['sex'];
	$mrn = $row['pid'];

	echo $mrn . "," . $lname . "," . $fname . "," . $res_dob . "," . $sex . ";";


}

echo "EOF";
?>
