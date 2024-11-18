<?php

if($_SERVER["REQUEST_METHOD"]=="POST") {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];
	$emailaddress = $_POST['emailaddress'];
	$browser = isset($_POST['browser'])?implode(",",$_POST['browser']):"Not specified";
	$os = $_POST['os'];
	$websiteOpinion = $_POST['websiteOpinion'];
	$comments = $_POST['comments'];

	$mailTo = "email@email.net";
	$subject = "Contact Us Form Submission";
	$headers = "From: " .$emailaddress;
	$txt = "You have receieved a new contact form submission.\n\n";
	$txt .= "First Name: " .$firstname ."\n";
	$txt .= "Last Name: " .$lastname ."\n";
	$txt .= "Phone Number: " .$phonenumber ."\n";
	$txt .= "Email Address: " .$emailaddress ."\n";
	$txt .= "Brower(s) Used: " .$browser ."\n";
	$txt .= "Operating System: " .$os ."\n";
	$txt .= "Comments: \n" .$comments ."\n";

	if (mail($mailTo, $subject, $txt, $headers)) {
		header("Location: contact.htm?mailsend");
	} else {
		echo "There was an error sending the email.";
	}
}
?>