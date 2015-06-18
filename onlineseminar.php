<?

/*

$firstchoice_day = $_POST ["firstchoice_day"];
$firstchoice_month = $_POST ["firstchoice_month"];
$firstchoice_time = $_POST ["firstchoice_time"];
$secondchoice_day = $_POST ["secondchoice_day"];
$secondchoice_month = $_POST ["secondchoice_month"];
$secondchoice_time = $_POST ["secondchoice_time"];
$salerepresentative = $_POST ["salerepresentative"];
$topic1 = $_POST ["topic1"];
$topic2 = $_POST ["topic2"];
$topic3 = $_POST ["topic3"];
$topic4 = $_POST ["topic4"];
$topic5 = $_POST ["topic5"];
$topic6 = $_POST ["topic6"];
$title = $_POST ["title"];
$name = $_POST ["name"];
$email = $_POST ["email"];
$company = $_POST ["company"];
$postal_address = $_POST ["postal_address"];
$postal_address2 = $_POST ["postal_address2"];
$town = $_POST ["town"];
$county = $_POST ["county"];
$postcode = $_POST ["postcode"];
$country = $_POST ["country"];
$phone = $_POST ["phone"];
$u_ip = $_POST ["ip"];
$date_time = $_POST ["date_time"];


	$message = "";
	$u_ip = ($REMOTE_ADDR);
	$date_time = date("F j, Y, g:i a");
	settype($message, "string"); 
	$message .= "Message received from Vertice Services Website\n";
	$message .= "==============================================================\n";
	$message .= "SUBJECT: Consultation On line";
	$message .= "\n==============================================================\n";	
	$message .= "\n\n1st Choice: $firstchoice_day $firstchoice_month $firstchoice_time\n";
	$message .= "2sd Choice: $secondchoice_day $secondchoice_month $secondchoice_time\n";
	$message .= "$salerepresentative\n\n\n";
	$message .= "Topics of Interest";
	$message .= "--------------------------------------------------------------\n";
	$message .= "$topic1\n";
	$message .= "$topic2\n";
	$message .= "$topic3\n";
	$message .= "$topic4\n";
	$message .= "$topic5\n";
	$message .= "$topic6\n\n\n";
	$message .= "Contact Information";
	$message .= "--------------------------------------------------------------\n";
	$message .= "Title: $title\n";
	$message .= "Name and surname: $name\n";
	$message .= "Email: $email\n";
	$message .= "Company: $company\n";
	$message .= "Address 1: $postal_address\n";
	$message .= "Address 2: $postal_address2\n";
	$message .= "City/Town: $town\n";
	$message .= "State/Region: $county\n";
	$message .= "Postal Code: $country\n";
	$message .= "Phone: $phone\n";
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
	$subject = "Consultation On line - Vertice Services";
	$toAddress = "info@verticeservices.com";
	$fromName = $name;
	$fromAddress = $email;
	if(!mail("\"$toName\" <$toAddress>", $subject, $message, "From: \"$fromName\"<$fromAddress>\nDate: $date\nReply-To: $fromAddress")) echo ("ERRO");
	include("applyonline_onlineseminar_thankyou.htm");
	
*/

////////////////////////////////////
////
////    PHP Processa form
////    by Elienay C. Macedo
////    elienaycarvalho@gmail.com
////
////////////////////////////////////


//change this

	$script = 'applyonline_onlineseminar';	              

	//$to      = 'dev@wespadigital.com';   
	$to      = 'info@archived.wcre8tive.com/verticeservices';   

	$subject = 'Contato no site';	      
	$headers = 'From: ' . $to ;         
	
	$host     = 'localhost';
	$username = 'verticel_forms';
	$password = '123mudar';
	$db       = 'verticel_forms';
	$table    = 'consultoria';
	
	$page_return = $script . '_thankyou.htm';

$wesassun = $_REQUEST["wesassun"];
$firstchoice_day = $_REQUEST["firstchoice_day"];
$firstchoice_month = $_REQUEST["firstchoice_month"];
$firstchoice_time = $_REQUEST["firstchoice_time"];
$data1 = date('Y') . "-$firstchoice_month-$firstchoice_day";

$secondchoice_day = $_REQUEST["secondchoice_day"];
$secondchoice_month = $_REQUEST["secondchoice_month"];
$secondchoice_time = $_REQUEST["secondchoice_time"];
$data2 = date('Y') . "-$secondchoice_month-$secondchoice_day";

$f1 = $_REQUEST["topic1"];
$f2 = $_REQUEST["topic2"];
$f3 = $_REQUEST["topic3"];
$f4 = $_REQUEST["topic4"];
$f5 = $_REQUEST["topic5"];
$f6 = $_REQUEST["topic6"];

$title = $_REQUEST["title"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$company = $_REQUEST["company"];
$postal_address = $_REQUEST["postal_address"];
$postal_address2 = $_REQUEST["postal_address2"];
$town = $_REQUEST["town"];
$county = $_REQUEST["county"];
$postcode = $_REQUEST["postcode"];
$country = $_REQUEST["country"];
$phone = $_REQUEST["phone"];
$boton_x = $_REQUEST["boton_x"];
$boton_y = $_REQUEST["boton_y"];
$ip = $_SERVER['REMOTE_ADDR'];
$date_time = date('Y-m-d');

//mysql add-on

	$link = mysql_connect($host,$username,$password);
	if (!$link) {die('Could not connect: ' . mysql_error());}

	$db_selected = mysql_select_db($db, $link);
	if (!$db_selected) {die ('Nao posso usar $db : ' . mysql_error());}	        
        
       
	$sql = "INSERT INTO $table (
			TITULO, 
			NOME, 
			EMAIL, 
			EMPRESA, 
			ENDERECO, 
			ENDERECO2, 
			CIDADE, 
			ESTADO, 
			CEP, 
			PAIS, 
			TELEFONE, 
			DATA1,
			HORA1,
			DATA2,
			HORA2,			
			F1,
			F2,
			F3,
			F4,
			F5,
			F6,															
			IP, 
			DATA
		)
		VALUES (
			'$title',
			'$name',
			'$email',
			'$company',
			'$postal_address',
			'$postal_address2',
			'$town',
			'$county',
			'$postcode',
			'$country',
			'$phone',			
			'$data1',
			'$firstchoice_time',
			'$data2',						
			'$secondchoice_time',
			'$f1',
			'$f2',
			'$f3',
			'$f4',
			'$f5',
			'$f6',															
			'$ip',
			'$date_time');";
				
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

$message .= "WESASSUN: $wesassun\n";
$message .= "FIRSTCHOICE_DAY: $firstchoice_day\n";
$message .= "FIRSTCHOICE_MONTH: $firstchoice_month\n";
$message .= "FIRSTCHOICE_TIME: $firstchoice_time\n";
$message .= "SECONDCHOICE_DAY: $secondchoice_day\n";
$message .= "SECONDCHOICE_MONTH: $secondchoice_month\n";
$message .= "SECONDCHOICE_TIME: $secondchoice_time\n";
$message .= "TOPIC1: $topic1\n";
$message .= "TITLE: $title\n";
$message .= "NAME: $name\n";
$message .= "EMAIL: $email\n";
$message .= "COMPANY: $company\n";
$message .= "POSTAL_ADDRESS: $postal_address\n";
$message .= "POSTAL_ADDRESS2: $postal_address2\n";
$message .= "TOWN: $town\n";
$message .= "COUNTY: $county\n";
$message .= "POSTCODE: $postcode\n";
$message .= "COUNTRY: $country\n";
$message .= "PHONE: $phone\n";
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

	//echo $data1 . ' - ' . $data2;
?>