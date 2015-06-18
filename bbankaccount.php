<?

////////////////////////////////////
////
////    PHP Processa form
////    by Elienay C. Macedo
////    elienaycarvalho@gmail.com
////
////////////////////////////////////


//change this

	$script = 'applyonline_businessbankaccount';	              

	//$to      = 'dev@wespadigital.com';   
	$to      = 'info@verticeltd.com';   
	$subject = 'Formulário - Conta Bancária Empresa';	      
	$headers = 'From: ' . $to ;         
	
	$host     = 'localhost';
	$username = 'verticel_forms';
	$password = '123mudar';
	$db       = 'verticel_forms';
	
	$page_return = $script . '_thankyou.htm';

$title = $_REQUEST["title"];
$name = $_REQUEST["name"];
$country_origin = $_REQUEST["country_origin"];
$country_currently = $_REQUEST["country_currently"];
$contact1 = $_REQUEST["contact1"];
$contact2 = $_REQUEST["contact2"];
$email = $_REQUEST["email"];
$mobile = $_REQUEST["mobile"];
$phone = $_REQUEST["phone"];
$query = $_REQUEST["query"];
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d');

//mysql add-on

	$link = mysql_connect($host,$username,$password);
	if (!$link) {die('Could not connect: ' . mysql_error());}

	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) {die ('Nao posso usar $db : ' . mysql_error());}	        
        
       
	$sql = "INSERT INTO contatos (
			TITULO, 
			NOME, 
			PAIS, 
			PAIS_RESIDE, 
			CONTATO_EMAIL, 
			CONTATO_TELEFONE, 
			EMAIL, 
			CELULAR, 
			FONE, 
			COMENTARIOS, 
			IP, 
			DATA
		)
		VALUES (
			'$title',
			'$name',
			'$country_origin',
			'$country_currently',
			'$contact1',
			'$contact2',
			'$email',
			'$mobile',
			'$phone',
			'$query',
			'$ip',
			'$date_time');";
		       
	mysql_query($sql);
	mysql_close($link);
//end


//message start
	$message = '';
	settype($message, 'string'); 
	
	$message .= "Conta Bancária Empresa\n\n";
	$message .= "==============================================================\n";
	$message .= "Dados do cliente\n";
	$message .= "==============================================================\n\n";

	$message .= "NOME: $title $name\n";
	$message .= "PAÍS: $country_origin\n";
	$message .= "PAÍS QUE RESIDE: $country_currently\n";
	$message .= "CONTATO VIA EMAIL: $contact1\n";
	$message .= "CONTATO VIA TELEFONE: $contact2\n";
	$message .= "EMAIL: $email\n";
	$message .= "CELULAR: $mobile\n";
	$message .= "TELEFONE: $phone\n";
	$message .= "COMENTÁRIOS: $query\n";

        
	if (!mail($to, $subject, $message, $headers)) {echo 'Error';}	
	
	//mail to $fromAddress	
	include($page_return); 		

//debug
	//echo $sql . '<br><br>';
	//echo $message;
?>