<?php
  include 'config.php';
   
  $link = mysql_connect($host,$username,$password);
  if (!$link) {die('Could not connect: ' . mysql_error());}

  $db_selected = mysql_select_db($db, $link);
  if (!$db_selected) {die ("Can't use $db : " . mysql_error());}
  
  $sql = "SELECT * FROM self_employed WHERE ID = $id LIMIT 1";
  
  $result = mysql_query($sql);
    
  $table = '           <table class="listing" cellpadding="0" cellspacing="0">';
	     
  $fields = array("ID" => "C�digo",
                  "TITULO" => "T�tulo",
                  "NOME" => "Nome",
                  "NASCIMENTO" => "Data de Nascimento",
                  "EMAIL" => "Email",
                  "FONE" => "Fone",
                  "INSURANCE" => "Possui Insurance Number?",
                  "INSURANCE_NUMBER" => "Insurance number",
                  "ENDERECO" => "Endere�o",
                  "CIDADE" => "Cidade",
                  "ESTADO" => "Estado",
                  "POSTAL" => "C�digo Postal",
                  "INICIO_AUTONOMO" => "In�cio como aut�nomo",
                  "ATIVIDADE" => "Atividade",
                  "NOME_NEGOCIO" => "Nome do neg�cio",
                  "MESMO_ENDERECO" => "O endere�o comercial � o mesmo pessoal?",
                  "ENDERECO_COMERCIAL" => "Endere�o comercial",
                  "CIDADE_COMERCIAL" => "Cidade",
                  "ESTADO_COMERCIAL" => "Estado",
                  "CODIGO_COMERCIAL" => "C�digo Postal",
                  "TELEFONE_COMERCIAL" => "Telefone comercial",
                  "EMAIL_COMERCIAL" => "Email comercial",
                  "RECEBE_LIGACAO" => "Gostaria de receber uma liga��o?",
                  "ASSISTENCIA_BANCARIA" => "Gostaria de assist�ncia para abrir uma conta banc�ria?",
                  "DATA" => "Data",
                  "IP" => "IP");
  
  $row = mysql_fetch_array($result, MYSQL_BOTH);
  
  echo '<h3>' . $row['TITULO'] . ' ' . $row['NOME'] . '</h3>';
  
  foreach ($fields as $name => $value) {     
     if ($value == "") {$label = $name;} else {$label = htmlentities($value);}
     $table .= '	      <tr><td width="200" align="right"><b>' . $label . '</b></td><td>' . htmlentities($row[$name]) . "</td></tr>\n";;   
  }  
  
  $table .= '                        </table>';
  echo $table;
  
  echo '<br/><p align="right"><a href="javascript:history.go(-1)">Voltar</a></p>';
  mysql_close($link);
 
?>

