<?php

 mysql_connect("localhost", "openemr", "RyL7P0rbzDMK") or die(mysql_error());
 mysql_select_db("openemr") or die(mysql_error());


$user = $_POST['user'];
$pid = $_POST['pid'];
$bps = $_POST['bps'];
$bpd = $_POST['bpd'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$temperature = $_POST['temperature'];
$pulse = $_POST['pulse'];
$respiration = $_POST['respiration'];


$sql = "insert into form_vitals set pid='$pid', date=NOW(), user='$user', authorized='Yes', bps='$bps', bpd='$bpd', weight='$weight', height='$height', temperature='$temperature', pulse='$pulse', respiration='$respiration', activity=1";

$result1 = mysql_query($sql) or die(mysql_error());

echo $result1;

?>
