<?php

 mysql_connect("localhost", "openemr", "RyL7P0rbzDMK") or die(mysql_error());
 mysql_select_db("openemr") or die(mysql_error());


$name = $_POST['username'];
$pass = $_POST['password'];
$sql = "select password, uid from login where username='$name'";

$res = mysql_query($sql) or die(mysql_error()); ;
while($row = mysql_fetch_array($res)){
if($row['password'] == $pass){
//	print "<html><body><td>";
	print "Authorized," . $row['uid'];
//	print "</td></body></html>";
}else{
//	print "<html><body><td>";
	print "Invalid username or password";
//	print "</td></body></html>";
}
}

?>
