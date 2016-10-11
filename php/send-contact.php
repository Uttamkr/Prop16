<?php
	if(strlen($_POST['name'])>0 and strlen($_POST['email'])>0 and strlen($_POST['message'])>0 )
	{
	$name = @trim(stripslashes($_POST['name'])); 
	$email = @trim(stripslashes($_POST['email']));
	$message = @trim(stripslashes($_POST['message'])); 

	if(empty($name)){
		echo "Name is a required field.";
		exit(0);
	}

	if(empty($email)){
		echo "Email is a required field.";
		exit(0);
	}

	if(empty($message)){
		echo "Message is a required field.";
		exit(0);
	}

	$email_from = $email;
	$email_to = 'prop.rnsit@gmail.com';

	$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" .  "\n\n" . 'Message: ' . $message;

	$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . "\n\n" . 'Message: ' . $message);
	if($success){
		echo "Thank you. We will reach out to you at the earliest.";
	}
	else{
		echo "An unexpected error occured. Please try again.";
	}
}
	else
	{
	echo "Please fill all the fields.";
}
?>
