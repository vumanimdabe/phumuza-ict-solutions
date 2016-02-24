
<?php
$email_n = $_POST['newsletterEmail'];
$myfile = fopen("newsletter.txt", "a") or die("Unable to open file!");
$txt = "\n";
fwrite($myfile, $txt);
$txt = "\n".$email_n."\n";
fwrite($myfile, $txt);
fclose($myfile);


$to      = 'vumanimdabe@gmail.com';
$subject = 'the subject';
$message = 'Hello master a new user has signed up for the newsletter. ' .$email_n;
$headers = 'From: webmaster@phumuza.co.za' . "\r\n" .
    'Reply-To: webmaster@phumuza.co.za' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
