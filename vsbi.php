<?
/*
$name = $_POST ["name"];
$company = $_POST ["company"];
$kindofbusiness = $_POST ["kindofbusiness"];
$phone = $_POST ["phone"];
$email = $_POST ["email"];
$comments = $_POST ["comments"];
$u_ip = $_POST ["ip"];
$date_time = $_POST ["date_time"];


	$message = "";
	$u_ip = ($REMOTE_ADDR);
	$date_time = date("F j, Y, g:i a");
	settype($message, "string"); 
	$message .= "Mensagem recebida do site Vertice Services\n";
	$message .= "==============================================================\n";
	$message .= "ASSUNTO: Vertice Services Informação p/ Negócios";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nNome completo: $name\n";
	$message .= "Nome da empresa: $company\n";
	$message .= "Tipo de negócio: $kindofbusiness\n";
	$message .= "Telefone para contato: $phone\n";
	$message .= "E-mail: $email\n\n\n";
	$message .= "Comentários:\n";
	$message .= "$comments\n\n";
	$message .= "IP..............: $u_ip\n";
	$message .= "Date and time...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services";
	$subject = "VSBI - Vertice Services";
	$toAddress = "info@archived.wcre8tive.com/verticeservices";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("applyonline_vsbusinessinfo_thankyou.htm");
	
*/

?>

<?php 

////////////////////////////////////
////
////    PHP Processa form
////    by Elienay C. Macedo
////    elienaycarvalho@gmail.com
////
////////////////////////////////////


//change this

	$script = 'applyonline_vsbusinessinfo';	              

	//$to      = 'dev@wespadigital.com';   
	$to      = 'info@archived.wcre8tive.com/verticeservices';   
	$subject = 'Informação de Negócios Vertice Services';	      
	$headers = 'From: ' . $to ;         
	
	$host     = 'localhost';
	$username = 'verticel_forms';
	$password = '123mudar';
	$db       = 'verticel_forms';
	$table    = 'vsbi';
	
	$page_return = $script . '_thankyou.htm';

$name = $_REQUEST["name"];
$company = $_REQUEST["company"];
$kindofbusiness = $_REQUEST["kindofbusiness"];
$phone = $_REQUEST["phone"];
$email = $_REQUEST["email"];
$comments = $_REQUEST["comments"];
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d');

//mysql add-on

	$link = mysql_connect($host,$username,$password);
	if (!$link) {die('Could not connect: ' . mysql_error());}

	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) {die ('Nao posso usar $db : ' . mysql_error());}	        
        
       
	$sql = "INSERT INTO vsbi (
			NOME, 
			EMPRESA, 
			TIPO_NEGOCIO, 
			FONE, 
			EMAIL, 
			COMENTARIOS, 
			IP, 
			DATA
		)
		VALUES (
			'$name',
			'$company',
			'$kindofbusiness',
			'$phone',
			'$email',
			'$comments',
			'$ip',
			'$date_time');";
		      
	$result = mysql_query($sql);
	
	if (!$result) {die('Invalid query: ' . mysql_error()); }	
	mysql_close($link);
//end


//message start
	$message = '';
	settype($message, 'string'); 
	
	$message .= "Mensagem recebida do site Vertice Services\n";
	$message .= "==============================================================\n";
	$message .= "ASSUNTO: Vertice Services Informação p/ Negócios\n";	
	$message .= "==============================================================\n\n";


	$message .= "Nome completo: $name\n";
	$message .= "Nome da empresa: $company\n";
	$message .= "Tipo de negócio: $kindofbusiness\n";
	$message .= "Telefone para contato: $phone\n";
	$message .= "E-mail: $email\n\n\n";
	$message .= "Comentários:\n";
	$message .= "$comments\n\n";	
	$message .= "Data...: $date_time\n";
	$message .= "IP..............: $ip\n";


        //echo $message;
        //echo $sql;
        
	if (!mail($to, $subject, $message, $headers)) {echo 'Error';}	
	
	//mail to $fromAddress	
	include($page_return); 	
	
?>
