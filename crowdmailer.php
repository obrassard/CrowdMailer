<?php
/**
* crowdmailer.php
* Created by Olivier Brassard on 21-12-17.
* Copyright © 2017 Olivier Brassard. All rights reserved.
*/

require_once "dbfunctions.php";

$messageBody = validatePost("message");
$from = validatePost("from");
$subject = validatePost("subject");

if (!($messageBody && $from && $subject)){
    header('Location: result.php?r=failed');
    die();
}

$headers = "From: ".$from."\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$emailList = getEmails();

$count = 0;
foreach ($emailList as $email){
    $msg = "Bonjour ".$email['Name']." !<br><br>".$messageBody;
    $msg = wordwrap($msg,70);
    mail($email['Email'],$subject,$msg,$headers);
    $count++;
}

header('Location: result.php?r='.$count);

?>