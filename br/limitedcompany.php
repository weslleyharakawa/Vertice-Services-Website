<?
$name = $_POST ["name"];
$companyname_1stoption = $_POST ["companyname_1stoption"];
$companyname_2ndoption = $_POST ["companyname_2ndoption"];
$companydirector_title = $_POST ["companydirector_title"];
$name = $_POST ["name"];
$companydirector_date_of_birth = $_POST ["companydirector_date_of_birth"];
$email = $_POST ["email"];
$companydirector_phone = $_POST ["companydirector_phone"];
$companydirector_nationality = $_POST ["companydirector_nationality"];
$companydirector_address = $_POST ["companydirector_address"];
$companydirector_address2 = $_POST ["companydirector_address2"];
$companydirector_town = $_POST ["companydirector_town"];
$companydirector_county = $_POST ["companydirector_county"];
$companydirector_postcode = $_POST ["companydirector_postcode"];
$companydirector_country = $_POST ["companydirector_country"];
$companysecretary_iscompanysecr = $_POST ["companysecretary_iscompanysecr"];
$companysecretary_title = $_POST ["companysecretary_title"];
$companysecretary_name = $_POST ["companysecretary_name"];
$companysecretary_address = $_POST ["companysecretary_address"];
$companysecretary_address2 = $_POST ["companysecretary_address2"];
$companysecretary_town = $_POST ["companysecretary_town"];
$companysecretary_county = $_POST ["companysecretary_county"];
$companysecretary_postcode = $_POST ["companysecretary_postcode"];
$companysecretary_country = $_POST ["companysecretary_country"];
$companydirector2_title = $_POST ["companydirector2_title"];
$companydirector2_name = $_POST ["companydirector2_name"];
$companydirector2_date_of_birth = $_POST ["companydirector2_date_of_birth"];
$companydirector2_email = $_POST ["companydirector2_email"];
$companydirector2_phone = $_POST ["companydirector2_phone"];
$companydirector2_nationality = $_POST ["companydirector2_nationality"];
$companydirector2_address = $_POST ["companydirector2_address"];
$companydirector2_address2 = $_POST ["companydirector2_address2"];
$companydirector2_town = $_POST ["companydirector2_town"];
$companydirector2_county = $_POST ["companydirector2_county"];
$companydirector2_postcode = $_POST ["companydirector2_postcode"];
$companydirector2_country = $_POST ["companydirector2_country"];
$companydirector3_title = $_POST ["companydirector3_title"];
$companydirector3_name = $_POST ["companydirector3_name"];
$companydirector3_date_of_birth = $_POST ["companydirector3_date_of_birth"];
$companydirector3_email = $_POST ["companydirector3_email"];
$companydirector3_phone = $_POST ["companydirector3_phone"];
$companydirector3_nationality = $_POST ["companydirector3_nationality"];
$companydirector3_address = $_POST ["companydirector3_address"];
$companydirector3_address2 = $_POST ["companydirector3_address2"];
$companydirector3_town = $_POST ["companydirector3_town"];
$companydirector3_county = $_POST ["companydirector3_county"];
$companydirector3_postcode = $_POST ["companydirector3_postcode"];
$companydirector3_country = $_POST ["companydirector3_country"];
$companysecretary_iscompanysecr = $_POST ["companysecretary_iscompanysecr"];
$companysecretary_title = $_POST ["companysecretary_title"];
$companysecretary_name = $_POST ["companysecretary_name"];
$companysecretary_address = $_POST ["companysecretary_address"];
$companysecretary_address2 = $_POST ["companysecretary_address2"];
$companysecretary_town = $_POST ["companysecretary_town"];
$companysecretary_county = $_POST ["companysecretary_county"];
$companysecretary_postcode = $_POST ["companysecretary_postcode"];
$companysecretary_country = $_POST ["companysecretary_country"];
$shareholder_totcap = $_POST ["shareholder_totcap"];
$shareholder_numshares = $_POST ["shareholder_numshares"];
$shareholder_valeach = $_POST ["shareholder_valeach"];
$shareholder_isdirector = $_POST ["shareholder_isdirector"];
$shareholder_title = $_POST ["shareholder_title"];
$shareholder_name = $_POST ["shareholder_name"];
$shareholder_date_of_birth = $_POST ["shareholder_date_of_birth"];
$shareholder_email = $_POST ["shareholder_email"];
$shareholder_phone = $_POST ["shareholder_phone"];
$shareholder_nationality = $_POST ["shareholder_nationality"];
$shareholder_address = $_POST ["shareholder_address"];
$shareholder_address2 = $_POST ["shareholder_address2"];
$shareholder_town = $_POST ["shareholder_town"];
$shareholder_county = $_POST ["shareholder_county"];
$shareholder_postcode = $_POST ["shareholder_postcode"];
$shareholder_country = $_POST ["shareholder_country"];
$shareholder2_title = $_POST ["shareholder2_title"];
$shareholder2_name = $_POST ["shareholder2_name"];
$shareholder2_date_of_birth = $_POST ["shareholder2_date_of_birth"];
$shareholder2_email = $_POST ["shareholder2_email"];
$shareholder2_phone = $_POST ["shareholder2_phone"];
$shareholder2_nationality = $_POST ["shareholder2_nationality"];
$shareholder2_address = $_POST ["shareholder2_address"];
$shareholder2_address2 = $_POST ["shareholder2_address2"];
$shareholder2_town = $_POST ["shareholder2_town"];
$shareholder2_county = $_POST ["shareholder2_county"];
$shareholder2_postcode = $_POST ["shareholder2_postcode"];
$shareholder2_country = $_POST ["shareholder2_country"];
$shareholder3_title = $_POST ["shareholder3_title"];
$shareholder3_name = $_POST ["shareholder3_name"];
$shareholder3_date_of_birth = $_POST ["shareholder3_date_of_birth"];
$shareholder3_email = $_POST ["shareholder3_email"];
$shareholder3_phone = $_POST ["shareholder3_phone"];
$shareholder3_nationality = $_POST ["shareholder3_nationality"];
$shareholder3_address = $_POST ["shareholder3_address"];
$shareholder3_address2 = $_POST ["shareholder3_address2"];
$shareholder3_town = $_POST ["shareholder3_town"];
$shareholder3_county = $_POST ["shareholder3_county"];
$shareholder3_postcode = $_POST ["shareholder3_postcode"];
$shareholder3_country = $_POST ["shareholder3_country"];
$registered_address1 = $_POST ["registered_address1"];
$registered_address2 = $_POST ["registered_address2"];
$registered_address3 = $_POST ["registered_address3"];
$registered_town = $_POST ["registered_town"];
$registered_county = $_POST ["registered_county"];
$registered_postcode = $_POST ["registered_postcode"];
$registered_country = $_POST ["registered_country"];

	$message = "";
	$u_ip = ($REMOTE_ADDR);
	$date_time = date("F j, Y, g:i a");
	settype($message, "string"); 
	$message .= "Registro de Empresa Limitada On-line\n";
	$message .= "==============================================================\n";
	$message .= "1. Nome da Empresa";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nNome da empresa (op��o 1): $companyname_1stoption\n";
	$message .= "Nome da empresa (op��o 1): $companyname_2ndoption\n\n\n";
	$message .= "==============================================================\n";
	$message .= "2. Diretores";
	$message .= "\n==============================================================\n";
	$message .= "Primeiro Diretor";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nT�tulo: $companydirector_title\n";
	$message .= "Nome completo: $name\n";
	$message .= "Data de nascimento: $companydirector_date_of_birth\n";
	$message .= "E-mail: $email\n";
	$message .= "Telefone: $companydirector_phone\n";
	$message .= "Nacionalidade: $companydirector_nationality\n";
	$message .= "Endere�o (linha 1): $companydirector_address\n";
	$message .= "Endere�o (linha 2): $companydirector_address2\n";
	$message .= "Cidade: $companydirector_town\n";
	$message .= "Estado: $companydirector_county\n";
	$message .= "C�d. Postal: $companydirector_postcode\n";
	$message .= "Pa�s: $companydirector_country\n\n\n";
	$message .= "Segundo Diretor (opcional)";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nT�tulo: $companydirector2_title\n";
	$message .= "Nome completo: $companydirector2_name\n";
	$message .= "Data de nascimento: $companydirector2_date_of_birth\n";
	$message .= "E-mail: $companydirector2_email\n";
	$message .= "Telefone: $companydirector2_phone\n";
	$message .= "Nacionalidade: $companydirector2_nationality\n";
	$message .= "Endere�o (linha 1): $companydirector2_address\n";
	$message .= "Endere�o (linha 2): $companydirector2_address2\n";
	$message .= "Cidade: $companydirector2_town\n";
	$message .= "Estado: $companydirector2_county\n";
	$message .= "C�d. Postal: $companydirector2_postcode\n";
	$message .= "Pa�s: $companydirector2_country\n\n\n";
	$message .= "Terceiro Diretor (opcional)";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nT�tulo: $companydirector3_title\n";
	$message .= "Nome completo: $companydirector3_name\n";
	$message .= "Data de nascimento: $companydirector3_date_of_birth\n";
	$message .= "E-mail: $companydirector3_email\n";
	$message .= "Telefone: $companydirector3_phone\n";
	$message .= "Nacionalidade: $companydirector3_nationality\n";
	$message .= "Endere�o (linha 1): $companydirector3_address\n";
	$message .= "Endere�o (linha 2): $companydirector3_address2\n";
	$message .= "Cidade: $companydirector3_town\n";
	$message .= "Estado: $companydirector3_county\n";
	$message .= "C�d. Postal: $companydirector3_postcode\n";
	$message .= "Pa�s: $companydirector3_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "3. Secret�rio";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nPessoa apontada como Secret�ria? $companysecretary_iscompanysecr\n";
	$message .= "T�tulo: $companysecretary_title\n";
	$message .= "Nome Completo: $companysecretary_name\n";
	$message .= "Endere�o (linha 1): $companysecretary_address\n";
	$message .= "Endere�o (linha 2): $companysecretary_address2\n";
	$message .= "Cidade: $companysecretary_town\n";
	$message .= "Estado: $companysecretary_county\n";
	$message .= "C�d. Postal: $companysecretary_postcode\n";
	$message .= "Pa�s: $companysecretary_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "4. Acionistas e Capital";
	$message .= "\n==============================================================\n";
	$message .= "O Capital";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nCapital Total: $shareholder_totcap\n";
	$message .= "N�mero de a��es: $shareholder_numshares\n";
	$message .= "Valor de cada a��o: $shareholder_valeach\n";
	$message .= "O acionista da empresa tamb�m � diretor? $shareholder_isdirector\n\n\n";
	$message .= "Acionista 1 (detalhes)";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\T�tulo: $shareholder_title\n";
	$message .= "Nome completo: $shareholder_name\n";
	$message .= "Data de nascimento: $shareholder_date_of_birth\n";
	$message .= "E-mail: $shareholder_email\n";
	$message .= "Telefone: $shareholder_phone\n";
	$message .= "Nacionalidade: $shareholder_nationality\n";
	$message .= "Endere�o (linha 1): $shareholder_address\n";
	$message .= "Endere�o (linha 2): $shareholder_address2\n";
	$message .= "Cidade: $shareholder_town\n";
	$message .= "Estado: $shareholder_county\n";
	$message .= "C�d. Postal: $shareholder_postcode\n";
	$message .= "Pa�s: $shareholder_country\n\n\n";
	$message .= "Acionista 2 (detalhes)";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nT�tulo: $shareholder_title\n";
	$message .= "Nome completo: $shareholder2_name\n";
	$message .= "Data de nascimento: $shareholder2_date_of_birth\n";
	$message .= "E-mail: $shareholder2_email\n";
	$message .= "Telefone: $shareholder2_phone\n";
	$message .= "Nacionalidade: $shareholder2_nationality\n";
	$message .= "Endere�o (linha 1): $shareholder2_address\n";
	$message .= "Endere�o (linha 2): $shareholder2_address2\n";
	$message .= "Cidades: $shareholder2_town\n";
	$message .= "Estado: $shareholder2_county\n";
	$message .= "C�d. Postal: $shareholder2_postcode\n";
	$message .= "Pa�s: $shareholder2_country\n\n\n";
	$message .= "Acionista 3 (detalhes)";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nT�tulo: $shareholder3_title\n";
	$message .= "Nome completo: $shareholder3_name\n";
	$message .= "Data de nascimento: $shareholder3_date_of_birth\n";
	$message .= "E-mail: $shareholder3_email\n";
	$message .= "Telefone: $shareholder3_phone\n";
	$message .= "Nacionalidade: $shareholder3_nationality\n";
	$message .= "Endere�o (linha 1): $shareholder3_address\n";
	$message .= "Endere�o (linha 2): $shareholder3_address2\n";
	$message .= "Cidade: $shareholder3_town\n";
	$message .= "Estado: $shareholder3_county\n";
	$message .= "C�d. Postal: $shareholder3_postcode\n";
	$message .= "Pa�s: $shareholder3_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "5. Endere�o de Registro";
	$message .= "\n==============================================================\n";
	$message .= "\n\nEndere�o (linha 1): $registered_address1\n";
	$message .= "Endere�o (linha 2): $registered_address2\n";
	$message .= "Endere�o (linah 3): $registered_address3\n";
	$message .= "Cidade: $registered_town\n";
	$message .= "Estado: $registered_county\n";
	$message .= "C�d. Postal: $registered_postcode\n";
	$message .= "Pa�s: $registered_country\n\n\n";
	$message .= "IP de origem..............: $u_ip\n";
	$message .= "Data deste registro...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services";
	$subject = "Registro de Empresa Limitada - Vertice Services";
	$toAddress = "info@verticeltd.com";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("applyonline_limitedcompany_thankyou.htm");
	

?>