<?php

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mailTo = "rohilsalian29july@gmail.com";
    $headers = "From: ". $mailFrom;
    $txt = "You have got an email from".$name.".\n\n".$message;

    mail($mailTo, $subject, $txt);
    headers("Location: index.php?mailsend");
}

?>