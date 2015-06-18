<?

/*
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
	
*/

////////////////////////////////////
////
////    PHP Processa form
////    by Elienay C. Macedo
////    elienaycarvalho@gmail.com
////
////////////////////////////////////


//change this

	$script = 'applyonline_uploadfiles';	              

	//$to      = 'dev@wespadigital.com';   
	$to      = "info@verticeltd.com";
	$subject = 'Arquivo recebido do website Vertice Services';	      
	$headers = 'From: ' . $to ;         
	
	$host     = 'localhost';
	$username = 'verticel_forms';
	$password = '123mudar';
	$db       = 'verticel_forms';
	$table    = 'files';
	
	$page_return = $script . '_thankyou.htm';

$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$file_title = $_REQUEST["file_title"];
$file_description = $_REQUEST["file_description"];
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d');

//mysql add-on

	$link = mysql_connect($host,$username,$password);
	if (!$link) {die('Could not connect: ' . mysql_error());}

	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) {die ('Nao posso usar $db : ' . mysql_error());}	        
        
       
	$sql = "INSERT INTO $table (
			NAME, 
			EMAIL, 
			FILE_TITLE, 
			FILE_DESCRIPTION, 
			IP, 
			DATA
		)
		VALUES (
			'$name',
			'$email',
			'$file_title',
			'$file_description',
			'$ip',
			'$date_time');";
		
		//echo $sql;
        
	$result = mysql_query($sql);
	
	if (!$result) {die('Invalid query: ' . mysql_error()); }	
	mysql_close($link);

//end


//message start
	$message = '';
	settype($message, 'string'); 
	
	$message .= "[TITULO]\n\n";
	$message .= "==============================================================\n";
	$message .= "[SUBTITULO]\n";
	$message .= "==============================================================\n\n";

$message .= "ABOUT: $about\n";
$message .= "NAME: $name\n";
$message .= "EMAIL: $email\n";
$message .= "FILE_TITLE: $file_title\n";
$message .= "FILE_DESCRIPTION: $file_description\n";
$message .= "BOTON_X: $boton_x\n";
$message .= "BOTON_Y: $boton_y\n";

	$message .= "Data: $date_time\n";
	$message .= "IP: $ip . \n";
	
	if (!mail($to, $subject, $message, $headers)) {echo 'Error';}	
	
	//mail to $fromAddress	
	include($page_return); 	
	
	
//debug
	//echo $sql;	
	//echo $message;

?>