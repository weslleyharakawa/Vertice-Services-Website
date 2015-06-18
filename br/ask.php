<?

$Nome_Completo = $_POST ["Nome_Completo"];
$Empresas = $_POST ["Empresa"];
$Endereco = $_POST ["Endereco"];
$Email = $_POST ["Email"];
$Telefone = $_POST ["Telefone"];
$Pergunta = $_POST ["Pergunta"];
$u_ip = $_POST ["ip"];
$date_time = $_POST ["date_time"];


	$message = "";
	$u_ip = ($REMOTE_ADDR);
	$date_time = date("F j, Y, g:i a");
	settype($message, "string"); 
	$message .= "Mensagem recebida do site Vertice Services\n";
	$message .= "==============================================================\n";
	$message .= "ASSUNTO: Dúvidas e Perguntas";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nNome: $Nome_Completo\n";
	$message .= "Empresa: $Empresa\n";
	$message .= "Endereço: $Endereco\n";
	$message .= "E-mail: $Email\n";
	$message .= "Telefone: $Telefone\n\n\n";
	$message .= "PERGUNTA:\n";
	$message .= "$Pergunta\n\n";
	$message .= "IP Origem..............: $u_ip\n";
	$message .= "Data e hora do envio...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Caipirinha Jazz Bar";
	$subject = "Duvidas e Perguntas - Vertice Services";
	$toAddress = "info@archived.wcre8tive.com/verticeservices";
	$fromName = $Nome_Completo;
	$fromAddress = $Email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("consultancy_askusaquestion_thankyou.htm");
	

?>