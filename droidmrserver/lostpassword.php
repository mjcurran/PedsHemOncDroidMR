<?php
require_once "Mail.php";

mysql_connect("localhost", "username", "password") or die(mysql_error()); 
 mysql_select_db("openemr") or die(mysql_error()); 

$username = $_POST['username'];

$from = "email@address";
$subject = "Your DroidMR password has been reset";
$body = "This email was sent because a password reset request was sent for the DroidMR app." .
"\n If you didn't request this please contact WheelShare admin by replying to email@gmail.com. \n Your password has been reset to: ";


$valid_chars = "abcdefghijklmnopqrstuvwxyz1234567890";
    // start with an empty random string
    $random_string = "";

    // count the number of chars in the valid chars string so we know how many choices we have
    $num_valid_chars = strlen($valid_chars);

    // repeat the steps until we've created a string of the right length
    for ($i = 0; $i < 5; $i++)
    {
        // pick a random number from 1 up to the number of valid chars
        $random_pick = mt_rand(1, $num_valid_chars);

        // take the random character out of the string of valid chars
        // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
        $random_char = $valid_chars[$random_pick-1];

        // add the randomly-chosen char onto the end of our string so far
        $random_string .= $random_char;
    }





$body .= $random_string . " - Please log in and change it immediately.";

$sql1 = "select email from userdata where username='$username'";
$res1 = mysql_query($sql1) or die(mysql_error());

$row1 = mysql_fetch_array($res1);
$to = $row1['email'];

$params['host'] = 'smtp.gmail.com';
$params['port'] = '587';
$params['auth'] = 'PLAIN';
$params['username'] = "email@gmail.com";
$params['password'] = "password";



 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
$smtp =& Mail::factory('smtp', $params);

$mail = $smtp->send($to, $headers, $body);




 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
$sql2 = "update userdata set password='$random_string' where username='$username'";

$res2 = mysql_query($sql2) or die(mysql_error());

   echo("<p>Message successfully sent!</p>");
  }




?>
