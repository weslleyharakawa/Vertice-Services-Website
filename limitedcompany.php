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
	$message .= "Limited Company Registration\n";
	$message .= "==============================================================\n";
	$message .= "1. Company Name";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nCompany name (1st option): $companyname_1stoption\n";
	$message .= "Company name (2nd option): $companyname_2ndoption\n\n\n";
	$message .= "==============================================================\n";
	$message .= "2. Directors";
	$message .= "\n==============================================================\n";
	$message .= "Director 1";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nTitle: $companydirector_title\n";
	$message .= "Name and Surname: $name\n";
	$message .= "Date of birth: $companydirector_date_of_birth\n";
	$message .= "Email: $email\n";
	$message .= "Contact phone: $companydirector_phone\n";
	$message .= "Nationality: $companydirector_nationality\n";
	$message .= "Address (line1): $companydirector_address\n";
	$message .= "Address (line2): $companydirector_address2\n";
	$message .= "City/Town: $companydirector_town\n";
	$message .= "State/Region: $companydirector_county\n";
	$message .= "Postcode: $companydirector_postcode\n";
	$message .= "Country: $companydirector_country\n\n\n";
	$message .= "Director 2";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nTitle: $companydirector2_title\n";
	$message .= "Name and Surname: $companydirector2_name\n";
	$message .= "Date of birth: $companydirector2_date_of_birth\n";
	$message .= "Email: $companydirector2_email\n";
	$message .= "Contact phone: $companydirector2_phone\n";
	$message .= "Nationality: $companydirector2_nationality\n";
	$message .= "Address (line1): $companydirector2_address\n";
	$message .= "Address (line2): $companydirector2_address2\n";
	$message .= "City/Town: $companydirector2_town\n";
	$message .= "State/Region: $companydirector2_county\n";
	$message .= "Postcode: $companydirector2_postcode\n";
	$message .= "Country: $companydirector2_country\n\n\n";
	$message .= "Director 3";
	$message .= "--------------------------------------------------------------\n";	
	$message .= "\n\nTitle: $companydirector3_title\n";
	$message .= "Name and Surname: $companydirector3_name\n";
	$message .= "Date of birth: $companydirector3_date_of_birth\n";
	$message .= "Email: $companydirector3_email\n";
	$message .= "Contact phone: $companydirector3_phone\n";
	$message .= "Nationality: $companydirector3_nationality\n";
	$message .= "Address (line1): $companydirector3_address\n";
	$message .= "Address (line2): $companydirector3_address2\n";
	$message .= "City/Town: $companydirector3_town\n";
	$message .= "State/Region: $companydirector3_county\n";
	$message .= "Postcode: $companydirector3_postcode\n";
	$message .= "Country: $companydirector3_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "3. Secretary";
	$message .= "\n==============================================================\n";	
	$message .= "\n\nIs the 1st Director a Company Secretary? $companysecretary_iscompanysecr\n";
	$message .= "Title: $companysecretary_title\n";
	$message .= "Name and Surname: $companysecretary_name\n";
	$message .= "Address (line1): $companysecretary_address\n";
	$message .= "Address (line2): $companysecretary_address2\n";
	$message .= "City/Town: $companysecretary_town\n";
	$message .= "State/Region: $companysecretary_county\n";
	$message .= "Postcode: $companysecretary_postcode\n";
	$message .= "Country: $companysecretary_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "4. Shareholder/Capital";
	$message .= "\n==============================================================\n";
	$message .= "Capital / Shareholder";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nTotal Capital: $shareholder_totcap\n";
	$message .= "Number of shares: $shareholder_numshares\n";
	$message .= "Value of each share: $shareholder_valeach\n";
	$message .= "If the shareholder is also a director? $shareholder_isdirector\n\n\n";
	$message .= "Shareholder 1 Details";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nTitle: $shareholder_title\n";
	$message .= "Name and Surname: $shareholder_name\n";
	$message .= "Date of birth: $shareholder_date_of_birth\n";
	$message .= "Email: $shareholder_email\n";
	$message .= "Contact phone: $shareholder_phone\n";
	$message .= "Nationality: $shareholder_nationality\n";
	$message .= "Address (line1): $shareholder_address\n";
	$message .= "Address (line2): $shareholder_address2\n";
	$message .= "City/Town: $shareholder_town\n";
	$message .= "State/Region: $shareholder_county\n";
	$message .= "Postcode: $shareholder_postcode\n";
	$message .= "Country: $shareholder_country\n\n\n";
	$message .= "Shareholder 2 Details";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nTitle: $shareholder_title\n";
	$message .= "Name and Surname: $shareholder2_name\n";
	$message .= "Date of birth: $shareholder2_date_of_birth\n";
	$message .= "Email: $shareholder2_email\n";
	$message .= "Contact phone: $shareholder2_phone\n";
	$message .= "Nationality: $shareholder2_nationality\n";
	$message .= "Address (line1): $shareholder2_address\n";
	$message .= "Address (line2): $shareholder2_address2\n";
	$message .= "City/Town: $shareholder2_town\n";
	$message .= "State/Region: $shareholder2_county\n";
	$message .= "Postcode: $shareholder2_postcode\n";
	$message .= "Country: $shareholder2_country\n\n\n";
	$message .= "Shareholder 3 Details";
	$message .= "--------------------------------------------------------------\n";
	$message .= "\n\nTitle: $shareholder3_title\n";
	$message .= "Name and Surname: $shareholder3_name\n";
	$message .= "Date of birth: $shareholder3_date_of_birth\n";
	$message .= "Email: $shareholder3_email\n";
	$message .= "Contact phone: $shareholder3_phone\n";
	$message .= "Nationality: $shareholder3_nationality\n";
	$message .= "Address (line1): $shareholder3_address\n";
	$message .= "Address (line2): $shareholder3_address2\n";
	$message .= "City/Town: $shareholder3_town\n";
	$message .= "State/Region: $shareholder3_county\n";
	$message .= "Postcode: $shareholder3_postcode\n";
	$message .= "Country: $shareholder3_country\n\n\n";
	$message .= "==============================================================\n";
	$message .= "5. Registered Address";
	$message .= "\n==============================================================\n";
	$message .= "\n\nAddress (line1): $registered_address1\n";
	$message .= "Address (line2): $registered_address2\n";
	$message .= "Address (line3): $registered_address3\n";
	$message .= "City/Town: $registered_town\n";
	$message .= "State/Region: $registered_county\n";
	$message .= "Postcode: $registered_postcode\n";
	$message .= "Country: $registered_country\n\n\n";
	$message .= "IP..............: $u_ip\n";
	$message .= "Date and time...: $date_time";
	settype($toName, "string"); 
	settype($toAddress, "string"); 
	settype($subject, "string"); 
	settype($fromName, "string"); 
	settype($fromAddress, "string"); 
	settype($replyAddress, "string"); 
	$toName="Vertice Services";
	$subject = "Limited Company Registration - Vertice Services";
	$toAddress = "info@verticeservices.com";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("applyonline_limitedcompany_thankyou.htm");
	

?>