<?php
  include 'config.php';
   
  $link = mysql_connect($host,$username,$password);
  if (!$link) {die('Could not connect: ' . mysql_error());}

  $db_selected = mysql_select_db($db, $link);
  if (!$db_selected) {die ("Can't use $db : " . mysql_error());}
  
  $sql = "SELECT * FROM self_employed WHERE ID = $id LIMIT 1";
  
  $result = mysql_query($sql);
    
  $table = '           <table class="listing" cellpadding="0" cellspacing="0">';
	     
  $fields = array("ID" => "Código",
                  "TITULO" => "Título",
                  "NOME" => "Nome",
                  "NASCIMENTO" => "Data de Nascimento",
                  "EMAIL" => "Email",
                  "FONE" => "Fone",
                  "INSURANCE" => "Possui Insurance Number?",
                  "INSURANCE_NUMBER" => "Insurance number",
                  "ENDERECO" => "Endereço",
                  "CIDADE" => "Cidade",
                  "ESTADO" => "Estado",
                  "POSTAL" => "Código Postal",
                  "INICIO_AUTONOMO" => "Início como autônomo",
                  "ATIVIDADE" => "Atividade",
                  "NOME_NEGOCIO" => "Nome do negócio",
                  "MESMO_ENDERECO" => "O endereço comercial é o mesmo pessoal?",
                  "ENDERECO_COMERCIAL" => "Endereço comercial",
                  "CIDADE_COMERCIAL" => "Cidade",
                  "ESTADO_COMERCIAL" => "Estado",
                  "CODIGO_COMERCIAL" => "Código Postal",
                  "TELEFONE_COMERCIAL" => "Telefone comercial",
                  "EMAIL_COMERCIAL" => "Email comercial",
                  "RECEBE_LIGACAO" => "Gostaria de receber uma ligação?",
                  "ASSISTENCIA_BANCARIA" => "Gostaria de assistência para abrir uma conta bancária?",
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

