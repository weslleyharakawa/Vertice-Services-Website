<?php 
	$post = $_POST;		
	
	//$keys = array_flip($post);
	$keys = array_keys($post);
	$wizard = '';

	$wizard = '
	
	////JAVASCRIPT Verifica campos; (arrumar ultimo item das arrays Fld e Msg)

<script language="javascript">	
        function verifica()
	{
	
            var ms = \'Por favor, preencha o campo: \';
            //var ms = \'Please, fill the field: \';
                        
	   var Fld = new Array(
                               "';
	   
	   $wizard .= implode($keys, '",' . chr(10) . '                               "');
	   
           $wizard .= '                              );
                                

	   var Msg = new Array(
	                       "';
	                       
	   $wizard .= implode($keys, '",' . chr(10) . '                               "');
	                       
           $wizard .= "                              );

           var formObj = document.form1;
           
           
	    for (i=0; i<formObj.elements.length; i++) {  
	        var fieldValue = formObj.elements[i].value;  
	        if (fieldValue == '') {
	           var x = isRequerid(formObj.elements[i].name, Fld);  
		    if (x > -1) { 
                       //alert(Msg[x]);  
                       alert(ms + Msg[x] + '!');  
   	               formObj.elements[i].focus();  
	               return false;  
                    }
	        }
	    }   	  

	    return true;  
	}

	function isRequerid(fieldName, fields)
        {
	   var x;
  	   for (x in fields) {
           	if (fieldName == fields[x])  {	            
		   return x;
                }
           }
           return -1;	
        }

</script>

<?php 

////////////////////////////////////
////
////    PHP Processa form
////    by Elienay C. Macedo
////    elienaycarvalho@gmail.com
////
////////////////////////////////////


//change this

	\$script = 'script_name';	              

	\$to      = 'dev@wespadigital.com';   
	\$subject = 'Contato no site';	      
	\$headers = 'From: ' . \$to ;         
	
	\$host     = 'localhost';
	\$username = 'db_forms';
	\$password = '123mudar';
	\$db       = 'db_forms';
	\$table    = 'tablename';
	
	\$page_return = \$script . '_thankyou.htm';

";           
           
           
foreach ($keys as $k) {
   $wizard .= '$' . $k . ' = $_REQUEST["' . $k .'"];' . chr(10);
}            
           
   $wizard .= "\$ip = \$_SERVER['REMOTE_ADDR'];
\$date_time = date('Y-m-d');

//mysql add-on

	\$link = mysql_connect(\$host,\$username,\$password);
	if (!\$link) {die('Could not connect: ' . mysql_error());}

	\$db_selected = mysql_select_db(\$db, \$link);
	if (!\$db_selected) {die ('Nao posso usar \$db : ' . mysql_error());}	        
        
       
	\$sql = \"INSERT INTO \$table (
";
                         

foreach ($keys as $k) {
   $wizard .= '			' . strtoupper($k) . ', ' . chr(10);
}            

$wizard .= '			IP, ' . chr(10);
$wizard .= '			DATA';
$wizard .= "
		)
		VALUES (
";

foreach ($keys as $k) {
   //$wizard .= "'$" . $k . ' . chr(10);
   $wizard .= "			'$" . $k . "'," . chr(10);   
}            


$wizard .= "			'\$ip',
			'\$date_time');\";
		
		//echo \$sql;
        
	\$result = mysql_query(\$sql);
	
	if (!\$result) {die('Invalid query: ' . mysql_error()); }	
	mysql_close(\$link);

//end


//message start
	\$message = '';
	settype(\$message, 'string'); 
	
	\$message .= \"[TITULO]\\n\\n\";
	\$message .= \"==============================================================\\n\";
	\$message .= \"[SUBTITULO]\\n\";
	\$message .= \"==============================================================\\n\\n\";

";
	
			
foreach ($keys as $k) {
   //$wizard .= "'$" . $k . ' . chr(10);
   $wizard .= '$message .= "' . strtoupper($k) . ': $' . ($k) . '\\n";' .  chr(10);   
}

$wizard .= "
	\$message .= \"Data: \$date_time\\n\";
	\$message .= \"IP: \$ip . \\n\";
	
	if (!mail(\$to, \$subject, \$message, \$headers)) {echo 'Error';}	
	
	//mail to \$fromAddress	
	include(\$page_return); 	
	
	
//debug
	//echo \$sql;	
	//echo \$message;
	
?>
";          
        echo $wizard;
?>