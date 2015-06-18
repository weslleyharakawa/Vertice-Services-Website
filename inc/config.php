<?
session_name('meuserver');
session_start();
include('mysql.php');
include('class.php');
include('imgs.php');





function img_permitidas($img){
$retorna = false;
$P_IMG = explode(",",".gif,.jpeg,.jpg,.png,.zip,.pdf,.rar,.doc,.xls");

for($x=0;$x < count($P_IMG);$x++){
if(extencao(strtolower($img)) == $P_IMG[$x]){
$retorna = true;
}
}

return $retorna;
}

function admin($url){
if(!$_SESSION['login'] || $_SESSION['login'] == ''){
	redir($url);
	exit;
}
}

function redir($pagina){
header("Location: $pagina");
}


function check_string($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

switch ($theType) {
case "text":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "long":
case "int":
$theValue = ($theValue != "") ? intval($theValue) : "NULL";
break;
case "double":
$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
break;
case "date":
$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
break;
case "defined":
$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
break;
}
return $theValue;
}

function is_email_valid($email) {
  if(eregi("^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$", $email)) return TRUE;
  else return FALSE;
}

    /********************************************* 
    * Publish On : Jan 10th, 2004                * 
    * Scripter   : Hermawan Haryanto             * 
    * Version    : 1.0                           * 
    * License    : GPL (General Public License)  * 
    **********************************************/ 

    function sendmail ($from_name, $from_email, $to_name, $to_email, $subject, $text_message="", $html_message, $attachment="") 
    { 
        $from = "$from_name <$from_email>"; 
        $to   = "$to_name <$to_email>"; 
        $main_boundary = "----=_NextPart_".md5(rand()); 
        $text_boundary = "----=_NextPart_".md5(rand()); 
        $html_boundary = "----=_NextPart_".md5(rand()); 
        $headers  = "From: $from\n"; 
        $headers .= "Reply-To: $from\n"; 
        $headers .= "X-Mailer: Hermawan Haryanto (http://hermawan.com)\n"; 
        $headers .= "MIME-Version: 1.0\n"; 
        $headers .= "Content-Type: multipart/mixed;\n\tboundary=\"$main_boundary\"\n"; 
        $message .= "\n--$main_boundary\n"; 
        $message .= "Content-Type: multipart/alternative;\n\tboundary=\"$text_boundary\"\n"; 
        $message .= "\n--$text_boundary\n"; 
        $message .= "Content-Type: text/plain; charset=\"ISO-8859-1\"\n"; 
        $message .= "Content-Transfer-Encoding: 7bit\n\n"; 
        $message .= ($text_message!="")?"$text_message":"Text portion of HTML Email"; 
        $message .= "\n--$text_boundary\n"; 
        $message .= "Content-Type: multipart/related;\n\tboundary=\"$html_boundary\"\n"; 
        $message .= "\n--$html_boundary\n"; 
        $message .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n"; 
        $message .= "Content-Transfer-Encoding: quoted-printable\n\n"; 
        $message .= str_replace ("=", "=3D", $html_message)."\n"; 
        if (isset ($attachment) && $attachment != "" && count ($attachment) >= 1) 
        { 
            for ($i=0; $i<count ($attachment); $i++) 
            { 
                $attfile = $attachment[$i]; 
                $file_name = basename ($attfile); 
                $fp = fopen ($attfile, "r"); 
                $fcontent = ""; 
                while (!feof ($fp)) 
                { 
                    $fcontent .= fgets ($fp, 1024); 
                } 
                $fcontent = chunk_split (base64_encode($fcontent)); 
                @fclose ($fp); 
                $message .= "\n--$html_boundary\n"; 
                $message .= "Content-Type: application/octetstream\n"; 
                $message .= "Content-Transfer-Encoding: base64\n"; 
                $message .= "Content-Disposition: inline; filename=\"$file_name\"\n"; 
                $message .= "Content-ID: <$file_name>\n\n"; 
                $message .= $fcontent; 
            } 
        } 
        $message .= "\n--$html_boundary--\n"; 
        $message .= "\n--$text_boundary--\n"; 
        $message .= "\n--$main_boundary--\n"; 
        if(mail ($to, $subject, $message, $headers)){
        	return true;
        }else{
        	return false;
        }
    } 
?>