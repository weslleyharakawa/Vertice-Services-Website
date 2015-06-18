<?

$name = $_POST ["ame"];
$email = $_POST ["email"];
$phone = $_POST ["phone"];
$comments = $_POST ["comments"];
$u_ip = $_POST ["ip"];
$date_time = $_POST ["date_time"];


	$message = "";
	$u_ip = ($REMOTE_ADDR);
	$date_time = date("F j, Y, g:i a");
	settype($message, "string"); 
	$message .= "Contact Us\n";
	$message .= "==============================================================\n";
	$message .= "Contact - Vertice Services";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nName: $name\n";
	$message .= "Email: $email\n";
	$message .= "Contact Phone: $phone\n\n\n";
	$message .= "COMMENTS:\n";
	$message .= "$comments\n\n";
	$message .= "IP from..............: $u_ip\n";
	$message .= "Received at...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services Ltd";
	$subject = "Contact - Vertice Services";
	$toAddress = "info@verticeservices.com";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("contactus_thankyou.htm");
	

?>