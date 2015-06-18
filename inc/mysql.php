<?php
//phpinfo();
#dados do servidor


$nomeserver = 'localhost';
$login = 'verticel_db';
$senha = '123mudar';
$banco = 'verticel_db';




function abre_banco($nomeserver,$login,$senha,$banco){

mysql_connect($nomeserver,$login,$senha)  or  die (include'erro.html');
return @ mysql_select_db($banco)  or  die (include'erro.html');
}

abre_banco($nomeserver,$login,$senha,$banco);



?>