<?

$pg = 'selfemplyed';

$title = $_REQUEST["title"];
$Name = $_REQUEST["Name"];
$date_of_birth = $_REQUEST["date_of_birth"];
$Email = $_REQUEST["Email"];
$town = $_REQUEST["town"];
$phone_number = $_REQUEST["phone_number"];
$insurence_numb = $_REQUEST["insurence_numb"];
$insurence_no = $_REQUEST["insurence_no"];
$postal_address = $_REQUEST["postal_address"];
$county = $_REQUEST["county"];
$postcode = $_REQUEST["postcode"];
$date_of_start = $_REQUEST["date_of_start"];
$sort_job = $_REQUEST["sort_job"];
$business_name = $_REQUEST["business_name"];
$same_addresses = $_REQUEST["same_addresses"];
$business_address = $_REQUEST["business_address"];
$business_town = $_REQUEST["business_town"];
$business_county = $_REQUEST["business_county"];
$business_postalcode = $_REQUEST["business_postalcode"];
$business_phone = $_REQUEST["business_phone"];
$business_email = $_REQUEST["business_email"];
$freecall = $_REQUEST["freecall"];
$business_bank = $_REQUEST["business_bank"];
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('d-m-Y');

include 'config.php';


//mysql add-on
	$link = mysql_connect($host,$username,$password);
	if (!$link) {die('Could not connect: ' . mysql_error());}

	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) {die ("Can't use $db : " . mysql_error());}	        
        
        //////////////
        
	$sql = "INSERT INTO `verticel_forms`.`self_employed` (
			`TITULO` ,
			`NOME` ,
			`NASCIMENTO` ,
			`EMAIL` ,
			`FONE` ,
			`INSURANCE` ,
			`INSURANCE_NUMBER` ,
			`ENDERECO` ,
			`CIDADE` ,
			`ESTADO` ,
			`POSTAL` ,
			`INICIO_AUTONOMO` ,
			`ATIVIDADE` ,
			`NOME_NEGOCIO` ,
			`MESMO_ENDERECO` ,
			`ENDERECO_COMERCIAL` ,
			`CIDADE_COMERCIAL` ,
			`ESTADO_COMERCIAL` ,
			`CODIGO_COMERCIAL` ,
			`TELEFONE_COMERCIAL` ,
			`EMAIL_COMERCIAL` ,
			`RECEBE_LIGACAO` ,
			`ASSISTENCIA_BANCARIA`,
			`IP`,
			`DATA`
		)
		VALUES (
			'$title',
			'$Name',
			'$date_of_birth',
			'$Email',
			'$town',
			'$phone_number',
			'$insurence_numb',
			'$insurence_no',
			'$postal_address',
			'$county',
			'$postcode',
			'$date_of_start',
			'$sort_job',
			'$business_name',
			'$same_addresses',
			'$business_address',
			'$business_town',
			'$business_county',
			'$business_postalcode',
			'$business_phone',
			'$business_email',
			'$freecall',
			'$business_bank',
			'$ip',
			'$date_time');";
		
		//echo $sql;
        
        //////////////
	
	$query = mysql_query($sql);
	mysql_close($link);
	//echo $sql;
//end


	$message = "";
	settype($message, "string"); 
	$message .= "Vertice Services - Registro de Aut�nomo\n\n";
	$message .= "==============================================================\n";
	$message .= "Detalhes do cliente";
	$message .= "\n==============================================================\n\n";	
	$message .= "T�tulo: $title\n";
	$message .= "Nome completo: $Name\n";
	$message .= "Data de nascimento: $date_of_birth\n";
	$message .= "E-mail: $Email\n";
	$message .= "Telefone: $phone_number\n";
	$message .= "N�mero do National Insurance: $insurence_numb $insurence_no\n";
	$message .= "Endere�o Pessoal: $postal_address\n";
	$message .= "Cidade: $town\n";
	$message .= "Pa�s: $county\n";
	$message .= "C�d. Postal: $postcode\n\n\n";
	$message .= "==============================================================\n";
	$message .= "Detalhes da empresa";
	$message .= "\n==============================================================\n\n";
	$message .= "Quando voc� come�ou a trabalhar como auton�nomo? $date_of_start\n";
	$message .= "Qual a atividade que voc� esta trabalhando (ocupa��o)? $sort_job\n";
	$message .= "Qual o nome do neg�cio? $business_name\n";
	$message .= "Endere�o do neg�cio: $same_addresses $business_address\n";
	$message .= "Cidade: $business_town\n";
	$message .= "Estado: $business_county\n";
	$message .= "C�d. Postal: $business_postalcode\n";
	$message .= "Telefone comercial: $business_phone\n";
	$message .= "E-mail comercial: $business_email\n\n";
	$message .= "==============================================================\n";
	$message .= "Assist�ncia";
	$message .= "\n==============================================================\n";
	$message .= "\n\nVoc� gostaria de receber uma liga��o de um contador para conversar a respeito da suas obriga��es e taxas sem nenhum custo? $freecall\n\n";
	$message .= "==============================================================\n";
	$message .= "Conta Banc�ria Empresa";
	$message .= "\n==============================================================\n\n";
	$message .= "\n\nVoc� gostaria de assist�ncia para abrir uma conta banc�ria para a sua empresa? $business_bank\n\n";
	$message .= "IP de origem..............: $ip\n";
	$message .= "Data deste registro...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services Ltd";
	$subject = "Registro de Autonomo - Vertice Services";
	$toAddress = "info@archived.wcre8tive.com/verticeservices";
	$fromName = $Name;
	$fromAddress = $Email;

        //echo $message;
	if (!mail($to, $subject, $message, $headers)) {echo 'Error';}	
	
	//mail to $fromAddress	
	include($pages[$pg]);        
?>