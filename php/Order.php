<?php

$name = $_POST['name'];
$email = $_POST['email'];

//confirmation email to client
if(!empty($name) || !empty($email))
{
	$to      = $email;
$subject = 'Registration Confirmation: Phumuza Consulting';
$message = 'Hi '.$name.'. We\' recieved your order request. One of our consultants will get back to you as soon as we can. Thank you.';
$headers = 'From: vumani@phumuza.co.za' . "\r\n" .
    'Reply-To: vumani@phumuza.co.za' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); 
}
else
{
	echo "<script>alert('Please fill in all fields')</script>";
}
?>