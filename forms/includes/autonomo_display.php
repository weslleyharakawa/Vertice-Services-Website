<?php
  include 'config.php';
  
  $href = "index.php?action=display&form=autonomo";
  
  
   
  $link = mysql_connect($host,$username,$password);
  if (!$link) {die('Could not connect: ' . mysql_error());}

  $db_selected = mysql_select_db($db, $link);
  if (!$db_selected) {die ("Can't use $db : " . mysql_error());}
  
  //pagination 
  $sql = "SELECT count(*) FROM self_employed";
  $result = mysql_query($sql) or trigger_error("SQL", E_USER_ERROR);
  $query_data = mysql_fetch_row($result);
  $numrows = $query_data[0];
  
  $lastpage      = ceil($numrows/$rows_per_page);
  
  global $page;
  
  $page = (int)$page;
  if ($page > $lastpage) {$page = $lastpage;}
  if ($page < 1) {$page = 1;}
  
  $limit = 'LIMIT ' .($page - 1) * $rows_per_page .',' .$rows_per_page;

  //display  
  //$sql = "SELECT * FROM self_employed ORDER BY ID DESC LIMIT $rows_per_page OFFSET " . $rows_per_page * ($page - 1);
  $sql = "SELECT * FROM self_employed ORDER BY ID DESC $limit";
  
  $pagination = "";

  if ($page == 1) 
     {$pagination .= " Primeiro Anterior ";} 
  else 
     {$pagination .= " <a href='$href&page=1'>Primeiro</a> ";
      $prevpage = $page-1;
      $pagination .= " <a href='$href&page=$prevpage'>Anterior</a> ";
     } // if

   $pagination .= htmlentities(" ( Página $page de $lastpage ) ");

   if ($page == $lastpage) 
      {$pagination .= htmlentities(" Próximo Último ");} 
   else 
      {$nextpage = $page+1;
       $pagination .= " <a href='$href&page=$nextpage'>" . htmlentities("Próximo") . "</a> ";
       $pagination .= " <a href='$href&page=$lastpage'>" . htmlentities("Último") . "</a> ";
      } // if
       
  //echo $sql;  
  $result = mysql_query($sql);
  
  echo '
           <table class="listing" cellpadding="0" cellspacing="0">
	      <tr>
	      	   <th class="first" width="16"></th>
	      	   <th width="16"></th> 
	           <th width="32">ID</th>
	           <th width="80">Data</th>
	           <th width="160">Nome</th>
	           <th width="80">Fone</th>
		   <th class="last">Email</th>
	     </tr>';
  
  
  while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
     $txt = "	      <tr>\n";
  
     $e = "index.php?action=edit&form=autonomo&id=" . $row['ID'];
     $d = "index.php?action=edit&form=autonomo&id=" . $row['ID'];
    
     $txt .= "	         <td>" . '<a href="'. $e . '"><img src="img/icons/edit.png" border="0"/></a>' . "</td>\n";
     $txt .= "	         <td>" . '<a href="'. $d . '"><img src="img/icons/delete.png" border="0"/></a>' . "</td>\n";

     $txt .= "	         <td>" . $row['ID'] . "</td>\n";
     $txt .= "	         <td>" . $row['DATA'] . "</td>\n";
     $txt .= "	         <td>" . $row['TITULO'] . ' ' . $row['NOME'] . "</td>\n";
     $txt .= "	         <td>" . $row['FONE'] . "</td>\n";
     $txt .= "	         <td>" . $row['EMAIL'] . "</td>\n";     
     
    
     $txt .= "	      </tr>\n";
  
     echo $txt;
  }  
    
  echo '                        </table>';
  mysql_close($link);
  
  //echo $sql;
  
  echo '<br/><div align="right">' . $pagination . "</div>";
  
?>

