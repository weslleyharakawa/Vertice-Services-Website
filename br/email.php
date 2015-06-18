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
	$message .= "Mensagem recebida do site Vertice Services\n";
	$message .= "==============================================================\n";
	$message .= "ASSUNTO: Contato";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nNome: $name\n";
	$message .= "E-mail: $email\n";
	$message .= "Telefone de contato: $phone\n\n\n";
	$message .= "MENSAGEM:\n";
	$message .= "$comments\n\n";
	$message .= "IP de origem..............: $u_ip\n";
	$message .= "Recebido em...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services Ltd";
	$subject = "Contato - Vertice Services";
	$toAddress = "info@verticeltd.com";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("contactus_thankyou.htm");
	

?>