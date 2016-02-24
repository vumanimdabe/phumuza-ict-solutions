<?php
$query = $_POST['Query'];
$name = $_POST['Name'];
$email = $_POST['Email'];


if(!empty($name) || !empty($email) || !empty($query))
{
	$to      = 'vumanimdabe@gmail.com';
$subject = 'Site Request: '.$name;
$message = 'Name: '.$name.'Contact Email: '.$email.'\nClient Query: '.$query;
$headers = 'From: webmaster@phumuza.co.za' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); 
}
else
{
	echo "<script>alert('Please fill in all fields')</script>";
}
?>