<?php

mysql_connect("localhost", "username", "password") or die(mysql_error());
mysql_select_db("openemr") or die(mysql_error());

$uid = $_POST['uid'];
$password = $_POST['password'];

$sql = "update userdata set password='$password' where id='$uid'"; 

$res = mysql_query($sql);

echo $res;

?>
