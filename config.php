<?
//mail to info@domain.com
	//$to      = 'dev@wespadigital.com';   
	$to      = 'info@verticeltd.com';   
$subject = "Contato no site";		
$headers = 'From: ' . $to ;

//
$host     = "localhost";
$username = "verticel_forms";
$password = "123mudar";
$db       = "verticel_forms";	


//pagina de retorno
$page = 'obrigado.htm';

$pages = array();
$pages['selfemplyed'] = 'applyonline_self-employed_thankyou.htm';