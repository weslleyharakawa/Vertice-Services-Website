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
	$message .= "Vertice Services - Registro de Autônomo\n\n";
	$message .= "==============================================================\n";
	$message .= "Detalhes do cliente";
	$message .= "\n==============================================================\n\n";	
	$message .= "Título: $title\n";
	$message .= "Nome completo: $Name\n";
	$message .= "Data de nascimento: $date_of_birth\n";
	$message .= "E-mail: $Email\n";
	$message .= "Telefone: $phone_number\n";
	$message .= "Número do National Insurance: $insurence_numb $insurence_no\n";
	$message .= "Endereço Pessoal: $postal_address\n";
	$message .= "Cidade: $town\n";
	$message .= "País: $county\n";
	$message .= "Cód. Postal: $postcode\n\n\n";
	$message .= "==============================================================\n";
	$message .= "Detalhes da empresa";
	$message .= "\n==============================================================\n\n";
	$message .= "Quando você começou a trabalhar como autonônomo? $date_of_start\n";
	$message .= "Qual a atividade que você esta trabalhando (ocupação)? $sort_job\n";
	$message .= "Qual o nome do negócio? $business_name\n";
	$message .= "Endereço do negócio: $same_addresses $business_address\n";
	$message .= "Cidade: $business_town\n";
	$message .= "Estado: $business_county\n";
	$message .= "Cód. Postal: $business_postalcode\n";
	$message .= "Telefone comercial: $business_phone\n";
	$message .= "E-mail comercial: $business_email\n\n";
	$message .= "==============================================================\n";
	$message .= "Assistência";
	$message .= "\n==============================================================\n";
	$message .= "\n\nVocê gostaria de receber uma ligação de um contador para conversar a respeito da suas obrigações e taxas sem nenhum custo? $freecall\n\n";
	$message .= "==============================================================\n";
	$message .= "Conta Bancária Empresa";
	$message .= "\n==============================================================\n\n";
	$message .= "\n\nVocê gostaria de assistência para abrir uma conta bancária para a sua empresa? $business_bank\n\n";
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