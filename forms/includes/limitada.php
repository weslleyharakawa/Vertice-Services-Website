<?php
  global $action, $page, $id;
  
  switch ($action)
  {
     case 'display' : include 'autonomo_display.php'; break;
     case 'edit'    : include 'autonomo_edit.php'; break;
  }
  
?>

