<?php
  global $action, $page, $id;
  $action = $_REQUEST["action"];
  if (empty($action)) {$action = 'display';}
    
  if (isset($_REQUEST['page'])) {
     $page = $_REQUEST['page'];
  } else {
     $page = 1;
  }  
  
  $id = $_REQUEST["id"];
  if (empty($id)) {$id = 0;} 
  
  
  $f = $_REQUEST["form"];
  $topmenu = array('', 
  		   '', 
  		   '', 
  		   '', 
  		   '', 
  		   '');
  		   
  $titles = array('Cadastro de Autônomos',
                  'Empresa Limitada',
                  'Conta Bancária Empresa',
                  'Registro de Marca',
                  'VS Informação p/Negócios',
                  'Consultoria On-line',
                  'Enviar Documentos'
  	         );
  
  $files  = array('autonomo.php',
                  'limitada.php',
                  'conta.php',
                  'info.php',
                  'consultoria.php',
                  'documentos.php'
                  );
  
  $ms = ' class="current"';
  switch ($f)
  {
    case 'autonomo'    : $i = 0; break;
    case 'limitada'    : $i = 1; break;
    case 'conta'       : $i = 2; break;
    case 'info'        : $i = 3; break;
    case 'consultoria' : $i = 4; break;
    case 'documentos'  : $i = 5; break;
  }  

  $topmenu[$i] = $ms;
  $title = $titles[$i];
  $file  = 'includes/' . $files[$i];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vertice Services - Admin</title>
<link rel="stylesheet" type="text/css" href="css/theme.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>Vertice Services - Área administrativa</h2>
            <div id="topmenu">
              <ul>
                <li<?php echo $topmenu[0]; ?>><a href="index.php?action=display&form=autonomo">Autônomo</a></li>
                <li<?php echo $topmenu[1]; ?>><a href="index.php?action=display&form=limitada">Empresa Limitada</a></li>
                <li<?php echo $topmenu[2]; ?>><a href="index.php?action=display&form=conta">Conta Bancária Empresa</a></li>
                <li<?php echo $topmenu[3]; ?>><a href="index.php?action=display&form=info">Informação para Negócios</a></li>
                <li<?php echo $topmenu[4]; ?>><a href="index.php?action=display&form=consultoria">Consultoria On-line</a></li>
                <li<?php echo $topmenu[5]; ?>><a href="index.php?action=display&form=documentos">Enviar Documentos</a></li>                                
              </ul>
            </div>
   	  </div>
   	  
  <div id="top-panel">
        <div id="wrapper">
            <div id="content">                
            	<h2><?php echo $title; ?></h2>          
                <br/>
                <?php include $file; ?>
            </div>
            <div id="sidebar">
              <ul>
                <li>
                  <h3><a href="index.php?action=display&amp;form=autonomo" class="user">Autônomos</a></h3>
                  <ul>
                    <li><a href="index.php?action=display&amp;form=autonomo" class="group">Listar autônomos</a></li>
                    <li><a href="#" class="useradd">Adicionar</a></li>
                  </ul>
                </li>

                <li>
                  <h3><a href="#" class="house">Autônomo</a></h3>
                  <ul>
                    <li><a href="#" class="report">Sales Report</a></li>
                    <li><a href="#" class="report_seo">SEO Report</a></li>
                    <li><a href="#" class="search">Search</a></li>
                  </ul>
                </li>
                <li>
                  <h3><a href="#" class="folder_table"> Empresa Limitada</a></h3>
                  <ul>
                    <li><a href="#" class="addorder">New order</a></li>
                    <li><a href="#" class="shipping">Shipments</a></li>
                    <li><a href="#" class="invoices">Invoices</a></li>
                  </ul>
                </li>
                <li>
                  <h3><a href="#" class="manage">Conta Bancária</a></h3>
                  <ul>
                    <li><a href="#" class="manage_page">Pages</a></li>
                    <li><a href="#" class="cart">Products</a></li>
                    <li><a href="#" class="folder">Product categories</a></li>
                    <li><a href="#" class="promotions">Promotions</a></li>
                  </ul>
                </li>
                <li>
                  <h3><a href="#" class="user">Informações Neg.</a></h3>
                  <ul>
                    <li><a href="#" class="useradd">Add user</a></li>
                    <li><a href="#" class="group">User groups</a></li>
                    <li><a href="#" class="search">Find user</a></li>
                    <li><a href="#" class="online">Users online</a></li>
                  </ul>
                </li>
                <li>
                  <h3><a href="#" class="user">Consultoria Online</a></h3>
                  <ul>
                    <li><a href="#" class="useradd">Add user</a></li>
                    <li><a href="#" class="group">User groups</a></li>
                    <li><a href="#" class="search">Find user</a></li>
                    <li><a href="#" class="online">Users online</a></li>
                  </ul>
                </li>
                <li>
                  <h3><a href="#" class="user">Enviar documentos</a></h3>
                  <ul>
                    <li><a href="#" class="useradd">Add user</a></li>
                    <li><a href="#" class="group">User groups</a></li>
                    <li><a href="#" class="search">Find user</a></li>
                    <li><a href="#" class="online">Users online</a></li>
                  </ul>
                </li>
              </ul>
            </div>
        </div>
        <div id="footer">

		<center><table WIDTH="780" BORDER=0 CELLPADDING=0 CELLSPACING=0 bordercolor="#FFFFFF" bgcolor="#FFFFFF" >
		<tr>
		<td WIDTH="115">
		<center><font face="Arial,Helvetica"><font color="#666666"><font size=-2>web
		desenvolvida por</font></font></font>
		<br><a href="http://www.wespadigital.co.uk" target="new"><img SRC="lg-wi.gif" ALT="WESPA Digital" BORDER=0 height=36 width=114></a></center>
		</td>
		
		<td WIDTH="550">
		<center><table WIDTH="100%" BORDER=0 CELLPADDING=0 CELLSPACING=0 bordercolor="#FFFFFF" COLS=1 bgcolor="#FFFFFF" >
		<tr>
		<td>
		<center><font color="#000000"><font size=-2><font face="Arial, Helvetica, sans-serif">Copyright
		2009 </font><b><font face="Verdana, Arial">Vertice Services Ltd</font></b></font></font></center>
		
		</td>
		</tr>
		
		<tr>
		<td>
		<center><font color="#000000"><font size=-2><font face="Arial, Helvetica, sans-serif">Todos
		os direitos reservados. </font><font face="Arial,Helvetica">Webmaster
		<a href="mailto:info@wespadigital.co.uk">WESPA
		Digital</a></font></font></font></center>
		</td>
		</tr>
		
		<tr>
		<td>
		<center><font color="#000000"><font size=-2><font face="Arial,Helvetica">63
		Loveridge Rd. NW6 2DR London Tel: </font><b><font face="Verdana">020 7624
		1616</font></b><font face="Arial,Helvetica">&nbsp;&nbsp; Fax:
		
		</font><b><font face="Verdana">020
		7624 2121</font></b></font></font></center>
		</td>
		</tr>
		
		<tr>
		<td>
		<center><font color="#000000"><font size=-2><font face="Arial,Helvetica">e-mail:
		</font><b><font face="Verdana"><a href="mailto:info@verticeservices.com">info@verticeservices.com</a></font></b></font></font></center>
		</td>
		</tr>
		</table></center>
		</td>
		
		<td WIDTH="115">
		<center><a href="http://www.macromedia.com/go/flashplayer" target="new"><img SRC="getflash.gif" ALT="Baixe GRÁTIS o Macromedia Flash Player" BORDER=0 height=31 width=88></a></center>
		
		</td>
		</tr>
		</table></center>

        </div>
</div>
</body>
</html>
